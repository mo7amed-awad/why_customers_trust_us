<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\City\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resources(['cities' => WebController::class]);
        Route::any('datatable-cities', [WebController::class, 'datatable'])->name('datatable-cities');
    });
});
