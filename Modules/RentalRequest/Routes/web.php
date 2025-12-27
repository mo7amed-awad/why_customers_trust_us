<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\RentalRequest\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resources(['rental_requests' => WebController::class]);
        Route::any('datatable-rental_requests', [WebController::class, 'datatable'])->name('datatable-rental_requests');
    });
});
