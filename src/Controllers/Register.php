<?php

namespace Bet\Login\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Controllers\Controller;

use Bet\Login\Requests\requestRegister;

use Exception;

class Register extends Controller
{
    public function index()
    {
        return view('simpleLogin::backend.register_v2');
    }

    public function register(requestRegister $request)
    {
        if ($request->terms == false) return redirect()->back()->withErrors('Please agreed on term and conditions to continue on registering')->withInput();

        $validRequest = $request->validated();

        $data = [
            'name' => $validRequest['fullname'],
            'username' => $validRequest['username'],
            'email' => $validRequest['email'],
            'password' => Hash::make($validRequest['password']),
        ];

        try {
            $newUser = User::create($data);
            if (!$newUser) {
                return false;
            }

            event(new Registered($newUser));
            auth()->login($newUser);

            return redirect()->route('verification.notice');
        } catch (Exception $error) {
            return redirect()->route('register.index')->withErrors('There is problem on your request, please try again later.');
        }
    }

    public function verificationNotice()
    {
        $data = [
            'user' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];
        return view('backend.verifyEmail_v2', $data);
    }

    public function verificationVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('admin.home');
    }

    public function verificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Verification link is sent!');
    }
}
