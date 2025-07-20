<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Company extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_name',
        'email',
        'password',
        'designation',
        'phone',
        'website',
        'status',
        'username',
        'show_password',
        'email_sent_at'
    ];

    protected $hidden = ['password'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function register(Request $request) {
        $data = $request->validate([
            'company_name' => 'required',
            'contact_name' => 'required',
            'email' => 'required|email|unique:companies',
            'password' => 'required|confirmed|min:6',
        ]);
        $data['password'] = bcrypt($data['password']);
        Company::create($data);
        return redirect()->route('company.login')->with('success', 'Registered!');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('company')->attempt($credentials)) {
            return redirect()->route('company.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function trainers() {
        return $this->belongsToMany(User::class, 'company_trainer_list', 'company_id', 'trainer_id');
    }
}
