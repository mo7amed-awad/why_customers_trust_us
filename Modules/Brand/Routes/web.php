<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Brand\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resources(['brands' => WebController::class]);
        Route::any('datatable-brands', [WebController::class, 'datatable'])->name('datatable-brands');
    });
});
