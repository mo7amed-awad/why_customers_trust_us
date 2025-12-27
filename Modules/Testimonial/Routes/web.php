<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Testimonial\Http\Controllers\WebController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resource('testimonials', WebController::class);
        Route::any('datatable-testimonials', [WebController::class, 'datatable'])->name('datatable-testimonials');
    });
});
