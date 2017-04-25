<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkerController extends Controller
{

    // returns an unauthorized error if the store doesn't esists
    public function unauthenticated(){
        $response = [
            "error" => [
                "worker" => "You need to login with a valid worker account"
            ],
            "status_code" => 401
        ];

        return response()->json( $response, 401 );
    }

}
