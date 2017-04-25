<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{

    // returns an unauthorized error if the store doesn't esists
    public function unauthenticated(){
        $response = [
            "error" => [
                "store" => "You need to login with a valid store account"
            ],
            "status_code" => 401
        ];

        return response()->json( $response, 401 );
    }

}
