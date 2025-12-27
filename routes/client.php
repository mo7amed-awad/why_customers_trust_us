<?php

use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

Route::any('/', function () {
    return redirect()->route('client.home', ['lang' => 'en']);
});

Route::group(['prefix' => '{lang?}', 'where' => ['lang' => 'ar|en'], 'as' => 'client.'], function () {
    Route::any('/', [HomeController::class, 'home'])->name('home');
    Route::any('/privacy', [HomeController::class, 'privacy'])->name('privacy');
    Route::any('/services', [HomeController::class, 'services'])->name('services');

    Route::any('/rental', [HomeController::class, 'rental'])->name('rental');
    Route::any('/rental/select', [HomeController::class, 'select_rental'])->name('rental.select');
    Route::any('/rental/{id}/checkout', [HomeController::class, 'checkout_rental'])->name('rental.checkout');
    Route::any('/rent', [HomeController::class, 'rent'])->name('rent');
    Route::any('/limousine', [HomeController::class, 'limousine'])->name('limousine');
    Route::any('/bidding', [HomeController::class, 'bidding'])->name('bidding');
    Route::any('/bidding/{id}/checkout', [HomeController::class, 'checkout_bidding'])->name('bidding.checkout');
    Route::any('/bid', [HomeController::class, 'bid'])->name('bid');

    Route::any('/terms', [HomeController::class, 'terms'])->name('terms');
    Route::any('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::any('/success/{id}', [HomeController::class, 'success'])->name('success');
    Route::any('/failed/{id}', [HomeController::class, 'failed'])->name('failed');

    Route::get('/rental_requests/tap/payments/response/{id}', [HomeController::class, 'TapResponse']);
});
