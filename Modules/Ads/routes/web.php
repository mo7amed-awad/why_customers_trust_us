<?php

use Illuminate\Support\Facades\Route;
use Modules\Ads\App\Http\Controllers\AdsController;
use App\Http\Middleware\Localization;
use Modules\Ads\App\Http\Controllers\SparePartsTypesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resources(['ads' => AdsController::class]);
        Route::resources(['spare-part-types' => SparePartsTypesController::class]);
        Route::post('spare-part-types/delete-selected', [SparePartsTypesController::class, 'deleteSelected'])->name('spare-part-types.deleteSelected');
        Route::post('ads/toggle-active', [AdsController::class, 'toggleActive'])->name('ads.toggleActive');
    });
});
