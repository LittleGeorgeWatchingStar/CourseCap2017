<?php

namespace App\Http\Middleware;

use Closure;

class Student
{
    
    public function handle($request, Closure $next)
    {
        if (session('role') !=0 ) {
            return redirect('/');
        }

        return $next($request);
    }
}
