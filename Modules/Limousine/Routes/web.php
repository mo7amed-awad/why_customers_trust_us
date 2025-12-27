<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Limousine\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resource('limousines', WebController::class);
        Route::any('datatable-limousines', [WebController::class, 'datatable'])->name('datatable-limousines');
    });
});
