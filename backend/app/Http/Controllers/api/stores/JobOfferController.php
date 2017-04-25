<?php

namespace App\Http\Controllers\api\stores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobOfferController extends Controller
{

    private $store;


    public function index(Request $request){
        $jobOffers = $this->store()->jobOffers;
        $response = [
            "data" => []
        ];

        foreach($jobOffers as $jobOffer){
            array_push($response["data"], [
                "id" => $jobOffer->id,
                "title" => $jobOffer->title,
                "description" => $jobOffer->description,
                "created_at" => strtotime($jobOffer->created_at),
                "updated_at" => strtotime($jobOffer->updated_at)
            ]);
        }

        $response["error"] = null;
        $response["status_code"] = 200;

        return response()->json( $response );        
    }


    public function workers(Request $request, $id){
        // retrieve the jobOffer by id from the current store jobOffers' array
        $jobOffer = $this->store()->jobOffers()->find($id);
        $response = [];
  
        // in case the jobOffer doesn't exists, or it doesn't belong to the current store...
        if ( !$jobOffer ){
            return $this->jobOfferNotFound($id);
        }

        $response["data"] = [];

        // build the workers data
        foreach ($jobOffer->workers as $worker) {
            array_push($response["data"], [
                "id" => $worker->id,
                "name" => $worker->name,
                "surname" => $worker->surname,
                "type" => "worker",
                "email" => $worker->email,
                "created_at" => strtotime($worker->created_at),
                "updated_at" => strtotime($worker->updated_at),
                "interest" => true
            ]);
        }
        $response["error"] = null;
        $response["status_code"] = 200;

      
        return response()->json( $response );
    }


    
    // retrieve the current store set in the Middleware
    private function store(){
        $this->store = $this->store ?: \Request::get("store");
        return $this->store;
    }

    
    // this is on a separate method because it will most likely be reused across multiple actions
    private function jobOfferNotFound($id){
        return response()->json([
            "data" => null,
            "error" => [
                "id" => "Cannot find a JobOffer with the id $id"
            ],
            "status_code" => 404
        ], 404);
    }

}
