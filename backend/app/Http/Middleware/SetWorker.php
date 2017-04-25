<?php

namespace App\Http\Middleware;

use Closure;

class SetWorker
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
        // sets the worker here, to speed up things for the sake of this exercise we assume that the current Worker is "Cerbiatto"
        $worker = \App\Worker::where("name", "Cerbiatto")->first();

        // you can uncomment the line below to test the fallback response in case of a non-existant worker
        // $worker = null;

        // intercept every request with an error in case the store is not set or doesn't exists
        if ( !$worker ){
            return \App::make("App\Http\Controllers\api\WorkerController")->unauthenticated();
        }

        $request->attributes->add(["worker" => $worker]);

        return $next($request);
    }
}
