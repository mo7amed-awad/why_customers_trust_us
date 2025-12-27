<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Localization
{
    public function handle(Request $request, Closure $next)
    {

        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        } else {
            App::setLocale('ar');
        }
        if (str_contains($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], '/admin')) {
            if (auth('admin')->check()) {
                if (auth('admin')->user()->status == 0) {
                    Auth::guard('admin')->logout();

                    $request->session()->invalidate();
                    $request->session()->regenerateToken();

                    return redirect()->route('admin.login');
                }

                return $next($request);
            } else {
                return redirect()->route('admin.login');
            }
        }

        return $next($request);
    }
}
