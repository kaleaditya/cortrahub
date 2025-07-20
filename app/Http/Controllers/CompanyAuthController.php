<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyApprovalMail;

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
        $company->trainers()->syncWithoutDetaching([$trainerId]);
        return response()->json(['success' => true, 'message' => 'Trainer added to shortlist!']);
    }

    public function removeFromList(Request $request, $trainerId) {
        $company = Auth::guard('company')->user();
        $company->trainers()->detach($trainerId);
        return response()->json(['success' => true, 'message' => 'Trainer removed from shortlist!']);
    }

    public function showEnquiryForm() {
        $company = Auth::guard('company')->user();
        $shortlistedTrainers = $company->trainers;
        return view('company.program_enquiry', compact('company', 'shortlistedTrainers'));
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
            'pdf' => ['nullable', 'file', 'mimes:pdf', 'max:5120'], // 5MB
        ]);
        // Save to DB or send email as needed
        // ...
        // Send email to all shortlisted trainers
        $shortlistedTrainers = $company->trainers;
        $pdf = $request->file('pdf');
        $details = [
            'date' => $data['date'],
            'location' => $data['location'],
            'duration' => $data['duration'],
            'start_time' => $data['start_time'],
            'attendees' => $data['attendees'],
            'budget' => $data['budget'] ?? '',
            'program_brief' => $data['program_brief'] ?? '',
        ];
        foreach ($shortlistedTrainers as $trainer) {
            \Mail::to($trainer->email)->send(new \App\Mail\ProgramEnquiryTrainerMail($trainer, $company, $details, $pdf));

            \App\Models\EmailLog::create([
                'company_id' => $company->id,
                'trainer_id' => $trainer->id,
                'to_email' => $trainer->email,
                'subject' => 'You have a new Program Enquiry from ' . $company->company_name,
                'body' => view('emails.trainer_program_enquiry', [
                    'trainer' => $trainer,
                    'company' => $company,
                    'details' => $details,
                    'pdf' => $pdf
                ])->render(),
                'pdf_name' => $pdf ? $pdf->getClientOriginalName() : null,
            ]);
        }
        return back()->with('success', 'Enquiry submitted and emails sent to trainers!');
    }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}
