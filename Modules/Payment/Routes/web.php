<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Payment\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resources(['payments' => WebController::class]);
        Route::any('datatable-payments', [WebController::class, 'datatable'])->name('datatable-payments');
    });
});
