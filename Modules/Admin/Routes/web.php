<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Controller;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => [Localization::class, 'auth:admin']], function () {
        Route::resources(['admins' => Controller::class]);
        Route::any('datatable-admins', [Controller::class, 'datatable'])->name('datatable-admins');
    });
});
