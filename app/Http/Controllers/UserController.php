<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            return view('auth.verify-email');
        }
    }

    public function send_verification_email(Request $request)
    {
        $user = $request->user();
        if ($user->hasVerifiedEmail()) {
            return redirect('/dashboard')->with('success', 'User succesfully verified');
        }
        $user->sendEmailVerificationNotification();
        return view('auth.verify-email');
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

    public function password_request()
    {
        return view('auth.forgot-password');
    }

    public function password_email(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['success' => 'Password reset link has been sent to email.'])
            : back()->with(['error' => 'Failed to sent password reset link']);
    }

    public function password_reset(Request $request)
    {
        $token = $request->token;
        $email = $request->email;
        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['success' => 'Password has been sucessfully changed'])
            : back()->with(['error' => 'Failed to change password']);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out');

    }
}
