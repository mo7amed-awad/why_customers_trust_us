<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot()
    {

        $segments = request()->segments();
        if (isset($segments[0]) && in_array($segments[0], ['ar', 'en'])) {
            $locale = $segments[0];
            app()->setLocale($locale);
            session()->put('locale', $locale);
            URL::defaults(['lang' => $locale]);
        }
        Carbon::setLocale(app()->getLocale());
    }
}
