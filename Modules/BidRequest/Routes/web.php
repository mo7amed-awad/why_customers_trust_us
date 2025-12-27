<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\BidRequest\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resources(['bid_requests' => WebController::class]);
        Route::any('datatable-bid_requests', [WebController::class, 'datatable'])->name('datatable-bid_requests');
    });
});
