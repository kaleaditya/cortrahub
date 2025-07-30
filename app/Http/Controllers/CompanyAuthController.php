<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyApprovalMail;
use App\Mail\CompanyWishlistAdminMail;
use App\Mail\ProgramEnquiryAdminMail;

class CompanyAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('company_register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required',
            'your_name' => 'required',
            'email' => 'required|email|unique:companies',
            'designation' => 'nullable',
            'mobile' => 'nullable',
            'website' => 'nullable',
        ]);
        
        // Generate temporary password and username
        $tempPassword = '12345678';
        $username = $data['email'];
        
        $data['contact_name'] = $data['your_name'];
        unset($data['your_name']);
        $data['phone'] = $data['mobile'] ?? null;
        unset($data['mobile']);
        $data['password'] = bcrypt($tempPassword);
        $data['username'] = $username;
        $data['show_password'] = $tempPassword;
        $data['status'] = 'pending';
        
        Company::create($data);
        
        return redirect()->route('company.login')->with('success', 'Registration submitted successfully! Please wait for admin approval. You will receive login credentials via email once approved.');
    }

    public function showLoginForm()
    {
        return view('company_login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        // Check if company exists and is approved
        $company = Company::where('email', $credentials['email'])->first();
        
        if (!$company) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
        
        if ($company->status === 'pending') {
            return back()->withErrors(['email' => 'Your registration is pending approval. Please wait for admin approval and check your email for login credentials.']);
        }
        
        if (Auth::guard('company')->attempt($credentials)) {
            return redirect()->route('front.home');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        $company = Auth::guard('company')->user();
        return view('company_dashboard', compact('company'));
    }

    public function wishlist()
    {
        $company = Auth::guard('company')->user();
        // You can pass wishlist data here in the future
        return view('company_wishlist', compact('company'));
    }

    /**
     * Send approval email to company
     */
    public function sendApprovalEmail($id)
    {
        try {
            $company = Company::findOrFail($id);
            
            if ($company->status === 'sent') {
                return response()->json([
                    'success' => false,
                    'message' => 'Email has already been sent to this company.'
                ]);
            }
            
            // Generate new password for security
            $newPassword = '12345678';
            $username = $company->email;
            
            // Update company with new credentials
            $company->update([
                'password' => bcrypt($newPassword),
                'show_password' => $newPassword,
                'username' => $username,
                'status' => 'sent',
                'email_sent_at' => now()
            ]);
            
            // Send email
            Mail::to($company->email)->send(new CompanyApprovalMail($company, $username, $newPassword));
            
            return response()->json([
                'success' => true,
                'message' => 'Approval email sent successfully to ' . $company->email
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error sending email: ' . $e->getMessage()
            ], 500);
        }
    }




    public function addToList(Request $request, $trainerId) {
        $company = Auth::guard('company')->user();
        
        // Check if trainer is already in the list
        if ($company->trainers()->where('trainer_id', $trainerId)->exists()) {
            return response()->json(['success' => false, 'message' => 'Trainer is already in your list!']);
        }
        
        $company->trainers()->syncWithoutDetaching([$trainerId]);
        return response()->json(['success' => true, 'message' => 'Trainer added to shortlist!']);
    }

    public function removeFromList(Request $request, $trainerId) {
        $company = Auth::guard('company')->user();
        $company->trainers()->detach($trainerId);
        return response()->json(['success' => true, 'message' => 'Trainer removed from shortlist!']);
    }

    public function showEnquiryForm() {
        try {
            $company = Auth::guard('company')->user();
            
            if (!$company) {
                // For testing without auth
                $company = Company::first();
                if (!$company) {
                    return response('No company found for testing', 500);
                }
            }
            
            $shortlistedTrainers = $company->trainers()->with('roles', 'city_info')->get();
            
            // Group trainers by category
            $trainersByCategory = [];
            foreach ($shortlistedTrainers as $trainer) {
                $role = $trainer->roles->first();
                if ($role) {
                    $categoryName = $role->name;
                    if (!isset($trainersByCategory[$categoryName])) {
                        $trainersByCategory[$categoryName] = [];
                    }
                    $trainersByCategory[$categoryName][] = $trainer;
                }
            }
            
            return view('company.program_enquiry', compact('company', 'shortlistedTrainers', 'trainersByCategory'));
        } catch (\Exception $e) {
            return response('Error: ' . $e->getMessage(), 500);
        }
    }

    public function submitEnquiry(Request $request) {
        $company = Auth::guard('company')->user();
        $data = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'location' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'numeric', 'min:1', 'max:24'],
            'start_time' => ['required', 'date_format:H:i'],
            'attendees' => ['required', 'integer', 'min:1', 'max:1000'],
            'budget' => ['nullable', 'numeric', 'min:0'],
            'program_brief' => ['required', 'string', 'min:10', 'max:2000'],
            'selected_category' => ['required', 'string'],
            'selected_trainers' => ['required', 'string'], // JSON string
            'pdf' => ['nullable', 'file', 'mimes:pdf', 'max:5120'], // 5MB
        ]);
        
        // Handle PDF upload
        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfPath = $pdf->store('program_enquiries', 'public');
        }
        
        // Parse selected trainers
        $selectedTrainers = json_decode($data['selected_trainers'], true);
        
        if (empty($selectedTrainers)) {
            return response()->json([
                'success' => false,
                'message' => 'No trainers selected. Please select at least one trainer.'
            ]);
        }
        
        // Save enquiry to database
        $enquiry = \App\Models\ProgramEnquiry::create([
            'company_id' => $company->id,
            'selected_category' => $data['selected_category'],
            'date' => $data['date'],
            'location' => $data['location'],
            'duration' => $data['duration'],
            'start_time' => $data['start_time'],
            'attendees' => $data['attendees'],
            'budget' => $data['budget'],
            'program_brief' => $data['program_brief'],
            'pdf_path' => $pdfPath,
            'selected_trainers' => $selectedTrainers,
            'status' => 'pending'
        ]);
        
        // Send email to admin only (not to trainers)
        try {
            $adminEmail = config('mail.admin_email');
            $details = [
                'date' => $data['date'],
                'location' => $data['location'],
                'duration' => $data['duration'],
                'start_time' => $data['start_time'],
                'attendees' => $data['attendees'],
                'budget' => $data['budget'] ?? '',
                'program_brief' => $data['program_brief'],
                'selected_category' => $data['selected_category'],
                'enquiry_id' => $enquiry->id
            ];
            $trainerIds = array_column($selectedTrainers, 'id');
            $trainers = \App\Models\User::whereIn('id', $trainerIds)->with('city_info')->get();
            \Mail::to($adminEmail)->send(new \App\Mail\ProgramEnquiryAdminMail($company, $trainers, $details, $request->file('pdf')));
            
            // Remove selected trainers from company's shortlist
            $company->trainers()->detach($trainerIds);
            
            return response()->json([
                'success' => true,
                'message' => 'Program enquiry saved and email sent to admin successfully! Selected trainers have been removed from your shortlist.'
            ]);
        } catch (\Exception $e) {
            \Log::error('Enquiry email error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Enquiry saved, but failed to send email to admin: ' . $e->getMessage()
            ]);
        }
    }

    public function sendEnquiryToAdmin(Request $request) {
        $company = Auth::guard('company')->user();
        $data = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'location' => ['required', 'string', 'max:255'],
            'duration' => ['required', 'numeric', 'min:1', 'max:24'],
            'start_time' => ['required', 'date_format:H:i'],
            'attendees' => ['required', 'integer', 'min:1', 'max:1000'],
            'budget' => ['nullable', 'numeric', 'min:0'],
            'program_brief' => ['required', 'string', 'min:10', 'max:2000'],
            'selected_category' => ['required', 'string'],
            'selected_trainers' => ['required', 'string'], // JSON string
            'pdf' => ['nullable', 'file', 'mimes:pdf', 'max:5120'], // 5MB
        ]);
        
        // Parse selected trainers
        $selectedTrainers = json_decode($data['selected_trainers'], true);
        if (empty($selectedTrainers)) {
            return response()->json([
                'success' => false,
                'message' => 'No trainers selected. Please select at least one trainer.'
            ]);
        }
        // Get trainer details for admin email
        $trainerIds = array_column($selectedTrainers, 'id');
        $trainers = \App\Models\User::whereIn('id', $trainerIds)->with('city_info')->get();
        $adminEmail = config('mail.admin_email');
        $details = [
            'date' => $data['date'],
            'location' => $data['location'],
            'duration' => $data['duration'],
            'start_time' => $data['start_time'],
            'attendees' => $data['attendees'],
            'budget' => $data['budget'] ?? '',
            'program_brief' => $data['program_brief'],
            'selected_category' => $data['selected_category'],
            'enquiry_id' => $request->enquiry_id ?? null
        ];
        \Mail::to($adminEmail)->send(new \App\Mail\ProgramEnquiryAdminMail($company, $trainers, $details, $request->file('pdf')));
        return response()->json([
            'success' => true,
            'message' => 'Enquiry sent to admin successfully! Admin will review and contact the trainers.'
        ]);
    }

    public function sendWishlistToAdmin(Request $request)
    {
        $company = Auth::guard('company')->user();
        $shortlistedTrainers = $company->trainers()->with('roles', 'city_info')->get();
        
        if ($shortlistedTrainers->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No trainers in your wishlist. Please add trainers first.'
            ]);
        }
        
        // Group trainers by category
        $trainersByCategory = [];
        foreach ($shortlistedTrainers as $trainer) {
            $role = $trainer->roles->first();
            if ($role) {
                $categoryName = $role->name;
                if (!isset($trainersByCategory[$categoryName])) {
                    $trainersByCategory[$categoryName] = [];
                }
                $trainersByCategory[$categoryName][] = $trainer;
            }
        }
        
        // Send category-wise emails to admin
       // $adminEmail = 'urjamediain@gmail.com';
        $adminEmail = 'patel.jignesh293@gmail.com';
        
        foreach ($trainersByCategory as $category => $trainers) {
            Mail::to($adminEmail)->send(new CompanyWishlistAdminMail($company, $trainers, $category));
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Wishlist sent to admin successfully! Category-wise emails sent for ' . count($trainersByCategory) . ' categories.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}
