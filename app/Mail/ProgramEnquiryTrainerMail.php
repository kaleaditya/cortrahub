<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProgramEnquiryTrainerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $trainer, $company, $details, $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($trainer, $company, $details, $pdf = null)
    {
        $this->trainer = $trainer;
        $this->company = $company;
        $this->details = $details;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $email = $this->markdown('emails.trainer_program_enquiry')
            ->subject('You have a new Program Enquiry from ' . $this->company->company_name);

        if ($this->pdf) {
            $email->attach($this->pdf->getRealPath(), [
                'as' => $this->pdf->getClientOriginalName(),
                'mime' => $this->pdf->getMimeType(),
            ]);
        }

        return $email;
    }
} 