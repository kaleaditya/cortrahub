<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/public/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        // First, try to find the user by email
        $user = User::where('email', $request->email)->first();
        
        // If user doesn't exist, return false (will show invalid credentials error)
        if (!$user) {
            return false;
        }
        
        // Check if user's mail_status is 1 (authorized)
        if ($user->mail_status != 1) {
            // Add custom error message for unauthorized users
            $this->addCustomError('email', 'Your account is not yet authorized. Please contact administrator.');
            return false;
        }
        
        // If mail_status is 1, proceed with normal authentication
        return $this->guard()->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }

    /**
     * Add custom error message to the session
     *
     * @param string $field
     * @param string $message
     * @return void
     */
    protected function addCustomError($field, $message)
    {
        session()->flash('errors', collect([$field => [$message]]));
    }
}