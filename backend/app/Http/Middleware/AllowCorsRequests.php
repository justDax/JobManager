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

        Log::info($request->getMethod());

        if ($request->getMethod() == "OPTIONS") {
          $req = \Response::make('', 200);
        } else {
          $req = $next($request);
        }

        $req->header('Access-Control-Allow-Origin', '*');
        $req->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        // for the sake of this test, blindly allows all the headers requested by the client
        $req->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));


        return $req;
    }
}
