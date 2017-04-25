<?php

namespace App\Http\Middleware;

use Closure;

class SetStore
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
        // sets the store here, to speed up things for the sake of this exercise we assume that the first Store is the one authenticated
        $store = \App\Store::first();

        // you can uncomment the line below to test the fallback response in case of a non-existant store
        // $store = null;

        // intercept every request with an error in case the store is not set or doesn't exists
        if ( !$store ){
            return \App::make("App\Http\Controllers\api\StoreController")->unauthenticated();
        }

        $request->attributes->add(["store" => $store]);

        return $next($request);
    }
}
