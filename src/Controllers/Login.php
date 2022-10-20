<?php

namespace Bet\Login\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

use Bet\Login\Requests\requestLogin;
use App\Http\Controllers\Controller;

class Login extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('simpleLogin::backend.login_v2');
    }

    public function login(requestLogin $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $remember = $request->remember ? true : false;

        if (RateLimiter::remaining($request->username, $perMinute = 5)) {
            RateLimiter::hit($request->username);

            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.home'));
            }

            return back()->withErrors([
                'username' => 'Username or Password is incorrect',
            ])->onlyInput('username');
        }

        return back()->withErrors([
            'username' => 'Your username has been blocked, please try again later',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to(route('login.index'));
    }
}
