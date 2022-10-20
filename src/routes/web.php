<?php

use Illuminate\Support\Facades\Route;

use Bet\Login\Controllers\Login;
use Bet\Login\Controllers\ForgotPassword;
use Bet\Login\Controllers\Register;


Route::group(['middleware' => ['web']], function () {

    // login system
    Route::middleware('guest')->group(function () {
        Route::get('/login', [Login::class, 'index'])->name('login.index');
        Route::post('/login', [Login::class, 'login'])->name('login.submit');

        Route::get('/register', [Register::class, 'index'])->name('register.index');
        Route::post('/register', [Register::class, 'register'])->name('register.submit');

        Route::get('/forgot', [ForgotPassword::class, 'index'])->name('forgotPassword.index');
        Route::post('/forgot', [ForgotPassword::class, 'forgotPassword'])->middleware('throttle:5,5')->name('forgotPassword.submit');

        Route::get('/resetPassword/{token}/{email}', [ForgotPassword::class, 'resetPasswordForm'])->name('password.reset');
        Route::post('/resetPassword', [ForgotPassword::class, 'resetPassword'])->name('password.reset.submit');
    });

    // email verification
    Route::middleware('auth')->group(function () {
        Route::get('/email/verify', [Register::class, 'verificationNotice'])->middleware('isVerified')->name('verification.notice');
        Route::post('/email/verification-notification', [Register::class, 'verificationEmail'])->middleware(['throttle:5,5', 'isVerified'])->name('verification.send');
        Route::get('/email/verify/{id}/{hash}', [Register::class, 'verificationVerify'])->middleware(['signed'])->name('verification.verify');
    });

    //log out
    Route::post('/logout', [Login::class, 'logout'])->name('logout');
});
