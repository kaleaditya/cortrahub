<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProgramEnquiryAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company, $trainers, $details, $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($company, $trainers, $details, $pdf = null)
    {
        $this->company = $company;
        $this->trainers = $trainers;
        $this->details = $details;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->markdown('emails.admin_program_enquiry')
            ->subject('New Program Enquiry from ' . $this->company->company_name . ' - Enquiry #' . $this->details['enquiry_id']);

        if ($this->pdf) {
            $email->attach($this->pdf->getRealPath(), [
                'as' => $this->pdf->getClientOriginalName(),
                'mime' => $this->pdf->getMimeType(),
            ]);
        }

        return $email;
    }
}
