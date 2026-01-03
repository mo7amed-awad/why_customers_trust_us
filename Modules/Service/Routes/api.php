<?php

use Illuminate\Support\Facades\Route;
use Modules\Service\Http\Controllers\APIController;

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

Route::group(['as' => 'api.'], function () {
    Route::prefix('/{lang}')->group(function () {
        Route::any('services/{service_id?}', [APIController::class, 'index']);
    });
});
