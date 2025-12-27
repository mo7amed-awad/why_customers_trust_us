<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentApproved
{
    public function handle(Request $request, Closure $next)
    {
        if (HaveAccess()) {
            return $next($request);
        } else {
            return redirect()->route('student.waiting');
        }
    }
}
