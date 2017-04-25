<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;

use Closure;

class AllowCorsRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->getMethod() == "OPTIONS") {
          $req = \Response::make('', 200);
        } else {
          $req = $next($request);
        }

        $req->header('Access-Control-Allow-Origin', '*');
        $req->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        $req->header('Access-Control-Allow-Headers', 'Content-Type,Accept');


        return $req;
    }
}
