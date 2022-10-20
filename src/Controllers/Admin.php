<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user->email_verified_at) {
            echo 'you are not verified yet';
        }
        echo 'Welcome ' . $user->name;
    }
}
