<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

Route::any('/', function () {
    return redirect()->route('client.home', ['lang' => 'en']);
});

Route::group(['prefix' => '{lang?}', 'where' => ['lang' => 'ar|en'], 'as' => 'client.'], function () {
    Route::any('/', [HomeController::class, 'home'])->name('home');
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::post('otp', [RegisteredUserController::class, 'otp'])->name('otp');
    Route::post('resend-otp', [RegisteredUserController::class, 'reSendOtp'])->name('resend-otp');
});
