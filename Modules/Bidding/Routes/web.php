<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Bidding\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resource('biddings', WebController::class);
        Route::any('datatable-biddings', [WebController::class, 'datatable'])->name('datatable-biddings');
        Route::post('biddings/{id}/images/sort', [WebController::class, 'sortImages'])->name('biddings.images.sort');
    });
});
