<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\Controller;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::GET('/settings/{type?}', [Controller::class, 'show'])->name('settings.index');
        Route::PUT('/settings/{type?}', [Controller::class, 'update'])->name('settings.update');
    });
});
