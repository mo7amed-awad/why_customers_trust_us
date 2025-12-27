<?php

use Illuminate\Support\Facades\Route;
use Modules\WhyChooseUs\App\Http\Controllers\WhyChooseUsController;
use App\Http\Middleware\Localization;

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
        Route::resource('whychooseus', WhyChooseUsController::class);
        Route::any('datatable-teams', [WhyChooseUsController::class, 'datatable'])->name('datatable-whychooseus');
    });
});
