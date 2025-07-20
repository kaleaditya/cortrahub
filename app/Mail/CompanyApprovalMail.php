<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Company;

class CompanyApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $username;
    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct(Company $company, $username, $password)
    {
        $this->company = $company;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Company Registration Approved - Login Credentials')
                    ->view('emails.company_approval')
                    ->with([
                        'company' => $this->company,
                        'username' => $this->username,
                        'password' => $this->password
                    ]);
    }
} 