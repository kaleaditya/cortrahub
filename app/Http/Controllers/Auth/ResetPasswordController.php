<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'user_type' => 'required|in:trainer,company'
        ]);

        $userType = $request->user_type;

        if ($userType === 'company') {
            return $this->resetCompanyPassword($request);
        } else {
            return $this->resetTrainerPassword($request);
        }
    }

    /**
     * Reset company password
     */
    protected function resetCompanyPassword(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        $password = $request->password;

        // Check if the reset token exists and is valid
        $resetRecord = DB::table('password_resets')
            ->where('email', $email)
            ->where('user_type', 'company')
            ->first();

        if (!$resetRecord || !Hash::check($token, $resetRecord->token)) {
            return back()->withErrors(['email' => 'Invalid password reset token.']);
        }

        // Check if token is expired (60 minutes)
        if (now()->diffInMinutes($resetRecord->created_at) > 60) {
            return back()->withErrors(['email' => 'Password reset token has expired.']);
        }

        // Find the company
        $company = Company::where('email', $email)->first();
        if (!$company) {
            return back()->withErrors(['email' => 'Company not found.']);
        }

        // Update the password
        $company->password = Hash::make($password);
        $company->save();

        // Delete the reset token
        DB::table('password_resets')
            ->where('email', $email)
            ->where('user_type', 'company')
            ->delete();

        // Fire password reset event
        event(new PasswordReset($company));

        return redirect()->route('login')->with('status', 'Your password has been reset successfully!');
    }

    /**
     * Reset trainer password
     */
    protected function resetTrainerPassword(Request $request)
    {
        $email = $request->email;
        $token = $request->token;
        $password = $request->password;

        // Check if the reset token exists and is valid
        $resetRecord = DB::table('password_resets')
            ->where('email', $email)
            ->where('user_type', 'trainer')
            ->first();

        if (!$resetRecord || !Hash::check($token, $resetRecord->token)) {
            return back()->withErrors(['email' => 'Invalid password reset token.']);
        }

        // Check if token is expired (60 minutes)
        if (now()->diffInMinutes($resetRecord->created_at) > 60) {
            return back()->withErrors(['email' => 'Password reset token has expired.']);
        }

        // Find the trainer in users table
        $trainer = User::where('email', $email)->first();
        if (!$trainer) {
            return back()->withErrors(['email' => 'Trainer not found.']);
        }

        // Update the password
        $trainer->password = Hash::make($password);
        $trainer->save();

        // Delete the reset token
        DB::table('password_resets')
            ->where('email', $email)
            ->where('user_type', 'trainer')
            ->delete();

        // Fire password reset event
        event(new PasswordReset($trainer));

        return redirect()->route('login')->with('status', 'Your password has been reset successfully!');
    }
}
