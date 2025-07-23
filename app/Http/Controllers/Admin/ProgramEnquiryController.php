<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramEnquiry;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProgramEnquiryTrainerMail;

class ProgramEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = ProgramEnquiry::with(['company'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
            
        return view('admin.program_enquiries.index', compact('enquiries'));
    }

    public function show($id)
    {
        $enquiry = ProgramEnquiry::with(['company'])->findOrFail($id);
        
        // Get trainer details
        $trainerIds = array_column($enquiry->selected_trainers_data, 'id');
        $trainers = User::whereIn('id', $trainerIds)->with('city_info')->get();
        
        return view('admin.program_enquiries.show', compact('enquiry', 'trainers'));
    }

    public function sendEmailToTrainer(Request $request, $enquiryId)
    {
        $request->validate([
            'trainer_id' => 'required|exists:users,id',
            'message' => 'required|string|min:10'
        ]);

        $enquiry = ProgramEnquiry::with(['company'])->findOrFail($enquiryId);
        $trainer = User::findOrFail($request->trainer_id);

        $details = [
            'date' => $enquiry->date,
            'location' => $enquiry->location,
            'duration' => $enquiry->duration,
            'start_time' => $enquiry->start_time,
            'attendees' => $enquiry->attendees,
            'budget' => $enquiry->budget,
            'program_brief' => $enquiry->program_brief,
            'selected_category' => $enquiry->selected_category,
            'admin_message' => $request->message
        ];

        // Send email to trainer
        Mail::to($trainer->email)->send(new ProgramEnquiryTrainerMail($trainer, $enquiry->company, $details));

        // Update enquiry status
        $enquiry->update(['status' => 'sent_to_trainers']);

        return response()->json([
            'success' => true,
            'message' => 'Email sent to ' . $trainer->name . ' successfully!'
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,sent_to_trainers,completed',
            'admin_notes' => 'nullable|string'
        ]);

        $enquiry = ProgramEnquiry::findOrFail($id);
        $enquiry->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Enquiry status updated successfully!'
        ]);
    }
}
