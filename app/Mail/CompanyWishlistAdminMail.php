<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Company;

class CompanyWishlistAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $trainers;
    public $category;
    public $details;

    /**
     * Create a new message instance.
     */
    public function __construct(Company $company, $trainers, $category, $details = [])
    {
        $this->company = $company;
        $this->trainers = $trainers;
        $this->category = $category;
        $this->details = $details;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Company Wishlist - ' . $this->category . ' Trainers Selected')
                    ->view('emails.company_wishlist_admin')
                    ->with([
                        'company' => $this->company,
                        'trainers' => $this->trainers,
                        'category' => $this->category,
                        'details' => $this->details
                    ]);
    }
} 