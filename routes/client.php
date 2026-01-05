<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Client\AdsController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\CommentController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\FavoriteController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\LikeController;
use App\Http\Controllers\Client\NotificationController;
use App\Http\Controllers\Client\PrivacyPolicyController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\TermsConditionsController;
use Illuminate\Support\Facades\Route;

Route::any('/', function () {
    return redirect()->route('client.home', ['lang' => 'en']);
});

Route::group(['prefix' => '{lang?}', 'where' => ['lang' => 'ar|en'], 'as' => 'client.'], function () {
    Route::any('/', [HomeController::class, 'home'])->name('home');
    Route::any('/ads/{id}', [AdsController::class, 'show'])
        ->whereNumber('id')
        ->name('ad');
    Route::any('/ads/{slug}', [AdsController::class, 'index'])
        ->where('slug', '[a-zA-Z\-]+')
        ->name('ads');
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::post('otp', [RegisteredUserController::class, 'otp'])->name('otp');
    Route::post('resend-otp', [RegisteredUserController::class, 'reSendOtp'])->name('resend-otp');
    Route::get('forgot-password', [ForgetPasswordController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [ForgetPasswordController::class, 'otp'])->name('password.phone');
    Route::post('create-password', [ForgetPasswordController::class, 'createNewPassword'])->name('create.password');
    Route::get('all-categories', [CategoryController::class, 'allCategories'])->name('all-categories');
    Route::get('ads-categories', [AdsController::class, 'adsCategories'])->name('ads-categories');
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('contact', [ContactController::class, 'contact'])->name('contact');
    Route::any('/terms-conditions', [TermsConditionsController::class, 'index'])->name('terms-conditions');
    Route::any('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy');

    Route::middleware('auth:user')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('ads-categories', [AdsController::class, 'adsCategories'])->name('ads-categories');
        Route::get('category/{slug}', [AdsController::class, 'showCategory'])->name('category.show');
        Route::get('ads/create/{subcategorySlug}', [AdsController::class, 'create'])->name('ads.create');
        Route::post('ads/store/{subcategorySlug}', [AdsController::class, 'store'])->name('ads.store');
        Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
        Route::post('/like/toggle', [LikeController::class, 'toggle'])->name('like.toggle');
        Route::post('/ads/{ad}/comment', [CommentController::class, 'store'])->name('ads.comment');
        Route::get('/notifications', [NotificationController::class, 'notifications'])->name('notifications');
        Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])
            ->where('id', '[0-9a-fA-F\-]+')
            ->name('notifications.read');
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    });
});
