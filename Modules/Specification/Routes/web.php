<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Specification\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resource('specifications', WebController::class);
        Route::any('datatable-specifications', [WebController::class, 'datatable'])->name('datatable-specifications');
    });
});
