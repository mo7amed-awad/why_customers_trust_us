<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Rental\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resource('rentals', WebController::class);
        Route::any('datatable-rentals', [WebController::class, 'datatable'])->name('datatable-rentals');
        Route::post('rentals/{id}/images/sort', [WebController::class, 'sortImages'])->name('rentals.images.sort');
    });
});
