<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class UserController extends Controller
{

    public function login()
    {
        return view('users.login');
    }

    public function register()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6'],


        ]);

        $formfields['password'] = bcrypt($formfields['password']);

        //Create User
        $user = User::create($formfields);

        event(new Registered($user));
        auth()->login($user);

        return redirect('/dashboard')->with('success', 'User created and logged in');
    }

    public function verify_notice(Request $request)
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect('/dashboard')->with('error', 'You are already verified');
        } else {
            return view('users.verification.verify-email');
        }
    }

    public function send_verification_email(Request $request)
    {
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            return redirect('/dashboard')->with('success', 'User succesfully verified');
        }
        $user->sendEmailVerificationNotification();
        return view('users.verification.verify-email');
    }

    public function verify_email(EmailVerificationRequest $request)
    {
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            return redirect(route('dashboard.home'))->with('error', 'You are already verified');
        }
        if ($user->markEmailAsVerified()) {

            event(new Verified($user));
            return redirect(route('dashboard.home'))->with('success', 'You are successfully verified');
        }
    }

    public function authenticate(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/dashboard/home')->with('success', 'You are now logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out');

    }
}
