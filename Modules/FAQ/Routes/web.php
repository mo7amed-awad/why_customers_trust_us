<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\FAQ\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resource('faqs', WebController::class);
        Route::any('datatable-faqs', [WebController::class, 'datatable'])->name('datatable-faqs');
    });
});
