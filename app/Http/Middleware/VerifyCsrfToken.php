<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        'http://tadbeer.emcan-group.com/payment/*',
        'https://tadbeer.emcan-group.com/payment/*',
    ];
}
