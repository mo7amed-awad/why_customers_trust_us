<?php

use App\Http\Controllers\Admin\ForgetController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\TranslateController;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::POST('login', [LoginController::class, 'login']);
    Route::get('forget', [ForgetController::class, 'index'])->name('forget');
    Route::POST('forget', [ForgetController::class, 'forget'])->name('forget');
    Route::get('code/{uuid}', [ForgetController::class, 'code'])->name('code');
    Route::POST('resend', [ForgetController::class, 'resend'])->name('resend');
    Route::POST('verify', [ForgetController::class, 'verify'])->name('verify');
    Route::get('reset/{uuid}', [ForgetController::class, 'reset'])->name('reset');
    Route::POST('update-password/{uuid}', [ForgetController::class, 'update'])->name('update-password');
    Route::group(['middleware' => [Localization::class]], function () {
        Route::group(['middleware' => ['auth:admin']], function () {
            // routes/web.php
            Route::post('/translate/autofill', [TranslateController::class, 'autofill'])
                ->name('translate.autofill');
            Route::get('/test-public-push', function () {
                // 1) Compose a multilingual public notification (adjust text if you want)
                $title_ar = '📣 إعلان عام للاختبار';
                $title_en = '📣 Public announcement (test)';

                $desc_ar = 'رسالة عامة للاختبار';
                $desc_en = 'Public test message';

                // 2) Create real rows for ALL clients in notifications table
                $clients = \Modules\Client\Entities\Model::select('id')->get();
                $rows = [];

                foreach ($clients as $client) {
                    $rows[] = [
                        'title_ar' => $title_ar,
                        'title_en' => $title_en,
                        'desc_ar' => $desc_ar,
                        'desc_en' => $desc_en,
                        'type' => 'public',
                        'client_id' => $client->id,
                        'done' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                if (! empty($rows)) {
                    \Modules\Notification\Entities\Model::insert($rows);
                }

                // 3) Send a broadcast push to topic "all_users"
                \App\Functions\PushNotification::send([
                    'title' => $title_ar."\n".$title_en,
                    'desc' => $desc_ar."\n".$desc_en,
                    'type' => 'public',
                    'data' => [
                        'action' => 'broadcast',
                        'web_url' => url('/'),
                    ],
                    // NO client_id => goes to 'all_users' topic
                ]);

                return 'Public notification rows created for '.count($rows).' clients and push sent (check logs & device).';
            });

            Route::any('/', [HomeController::class, 'home'])->name('home');

            Route::get('attach-brand/{id}', [HomeController::class, 'attach'])->name('attach.brand');
            Route::get('detach-brand', [HomeController::class, 'detach'])->name('detach.brand');

            Route::any('profile', [ProfileController::class, 'show'])->name('profile.show');
            Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::any('logout', [LoginController::class, 'logout'])->name('logout');
        });
    });
});
