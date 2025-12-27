<?php

use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\APIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/{lang}')->group(function () {
    Route::any('google-ads', [APIController::class, 'GoogleAds']);
    Route::any('video', [APIController::class, 'video']);
    Route::any('google_ads', [APIController::class, 'google_ads']);
    Route::any('contact', [APIController::class, 'contact']);
    Route::any('support', [APIController::class, 'support']);
});
