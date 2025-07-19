<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Debug logging
        \Log::info('Password reset request received', $request->all());
        
        $request->validate([
            'email' => 'required|email',
            'user_type' => 'required|in:trainer,company'
        ]);

        $email = $request->email;
        $userType = $request->user_type;

        if ($userType === 'company') {
            // Handle company password reset
            return $this->handleCompanyPasswordReset($request);
        } else {
            // Handle trainer password reset (default Laravel behavior)
            return $this->handleTrainerPasswordReset($request);
        }
    }

    /**
     * Handle company password reset
     */
    protected function handleCompanyPasswordReset(Request $request)
    {
        $email = $request->email;
        
        // Check if company exists
        $company = Company::where('email', $email)->first();
        
        if (!$company) {
            return back()->withErrors(['email' => 'We can\'t find a company with that email address.']);
        }

        // Generate reset token
        $token = Str::random(60);
        
        // Store the token in the password_resets table
        \DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            [
                'email' => $email,
                'token' => Hash::make($token),
                'created_at' => now(),
                'user_type' => 'company'
            ]
        );

        // Send email with reset link
        $resetUrl = url(route('password.reset', [
            'token' => $token,
            'email' => $email,
            'user_type' => 'company'
        ], false));

        // You can customize this email template
        try {
            \Mail::send('emails.company_password_reset', [
                'company' => $company,
                'resetUrl' => $resetUrl
            ], function ($message) use ($company) {
                $message->to($company->email);
                $message->subject('Reset Password Notification');
            });
            
            // Log the email attempt
            \Log::info('Company password reset email sent to: ' . $company->email);
            
            return back()->with('status', 'We have emailed your password reset link to ' . $email . '!');
        } catch (\Exception $e) {
            \Log::error('Failed to send company password reset email: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Failed to send email. Please try again.']);
        }
    }

    /**
     * Handle trainer password reset
     */
    protected function handleTrainerPasswordReset(Request $request)
    {
        $email = $request->email;
        
        // Check if trainer exists in users table
        $trainer = User::where('email', $email)->first();
        
        if (!$trainer) {
            return back()->withErrors(['email' => 'We can\'t find a trainer with that email address.']);
        }

        // Generate reset token
        $token = Str::random(60);
        
        // Store the token in the password_resets table
        \DB::table('password_resets')->updateOrInsert(
            ['email' => $email],
            [
                'email' => $email,
                'token' => Hash::make($token),
                'created_at' => now(),
                'user_type' => 'trainer'
            ]
        );

        // Send email with reset link
        $resetUrl = url(route('password.reset', [
            'token' => $token,
            'email' => $email,
            'user_type' => 'trainer'
        ], false));

        // Send email using Laravel's default password reset notification
        try {
            \Mail::send('emails.trainer_password_reset', [
                'trainer' => $trainer,
                'resetUrl' => $resetUrl
            ], function ($message) use ($trainer) {
                $message->to($trainer->email);
                $message->subject('Reset Password Notification');
            });
            
            // Log the email attempt
            \Log::info('Password reset email sent to: ' . $trainer->email);
            
            return back()->with('status', 'We have emailed your password reset link to ' . $email . '!');
        } catch (\Exception $e) {
            \Log::error('Failed to send password reset email: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Failed to send email. Please try again.']);
        }
    }
}
