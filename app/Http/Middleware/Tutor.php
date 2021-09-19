<?php

namespace App\Http\Middleware;

use Closure;

class Tutor
{
    
    public function handle($request, Closure $next)
    {
        if (session('role') !=1 ) {
            return redirect('/');
        }

        return $next($request);
    }
}
