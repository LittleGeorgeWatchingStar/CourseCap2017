<?php
/**
 * instruction
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class HttpsProtocol {



    public function handle(Request $request, Closure $next)

    {
//
//        if (!$request->isSecure()) {
//
//            return redirect()->secure($request->path());
//
//        }


        return $next($request);

    }

}