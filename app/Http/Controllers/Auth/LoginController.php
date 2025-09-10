<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Gunakan username sebagai login
    public function username()
    {
        return 'username';
    }

    // Form login dengan info reCAPTCHA jika throttle
public function showLoginForm()
{
    $showCaptcha = true; // selalu tampil
    return view('auth.login', compact('showCaptcha'));
}


    // Validasi login + reCAPTCHA otomatis jika throttle
    protected function validateLogin(Request $request)
    {
        $rules = [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ];

        // Tambahkan captcha jika sudah terlalu banyak percobaan login
        if ($this->hasTooManyLoginAttempts($request)) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $request->validate($rules);
    }

    // Login override untuk handle throttle
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Jika terlalu banyak percobaan, lock
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only($this->username(), 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);
            return redirect()->intended($this->redirectTo);
        }

        $this->incrementLoginAttempts($request);

        return back()->withErrors([
            'loginError' => 'Username atau password salah'
        ])->withInput($request->only($this->username()));
    }
}
