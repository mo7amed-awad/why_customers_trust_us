<?php

use Illuminate\Support\Facades\Config;
use Modules\Setting\Entities\Model as Setting;

function country_code()
{
    return 'BH';
}
function currancy_code()
{
    return 'BHD';
}
function phone_code()
{
    return 973;
}

function format_number($number)
{
    return number_format($number, 3, '.', '');
}

function hasPermission($key)
{
    return auth(activeGuard())->user()->Permissions->where('key', $key)->count() > 0;
}

function lang($lang = null)
{
    if (isset($lang)) {
        return app()->islocale($lang);
    } else {
        return app()->getlocale();
    }
}

function previous_route($lang = null)
{
    return str_replace('.create', '.index', str_replace('.edit', '.index', app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName()));
}

function activeGuard($CheckGuard = null)
{
    if ($CheckGuard) {
        $active = array_filter(explode('/', $_SERVER['REQUEST_URI']))[1];
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check() && $active == $guard) {
                return $guard == $CheckGuard;
            }
        }

        return str_replace('/', '', Request()->route()->getPrefix());
    } else {
        $active = array_filter(explode('/', $_SERVER['REQUEST_URI']))[1];
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check() && $active == $guard) {
                return $guard;
            }
        }
    }

    return str_replace('/', '', Request()->route()->getPrefix());
}

function Settings()
{
    if (! Config::get('Settings')) {
        Config::set('Settings', Setting::Active()->get());
    }

    return Config::get('Settings');
}

function setting($key)
{
    return Settings()->where('key', $key)->first()?->value;
}

function DT_Lang()
{
    if (lang('ar')) {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json';
    } else {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json';
    }
}
