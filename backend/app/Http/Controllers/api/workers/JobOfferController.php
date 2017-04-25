<?php

namespace App\Http\Controllers\api\workers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;


class JobOfferController extends Controller
{

    private $worker;


    public function index(Request $request){
        $jobOffers = \App\JobOffer::all();
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



    public function createInterest(Request $request, $id){
        $response = [];
        $jobOffer = \App\JobOffer::find($id);
        $status = 200;

        Log::info("In the controller...");

        if ( !$jobOffer ){
            return $this->jobOfferNotFound($id);
        }

        $alreadyLiked = $this->worker()->jobOffers->contains($jobOffer->id);

        if ( $alreadyLiked ){
            $response["data"] = null;
            $response["error"] = [ "jobOffer" => "You already like this jobOffer" ];
            $response["status_code"] = 403;
            $status = 403;
        } else {
            $this->worker()->jobOffers()->attach( $jobOffer->id );
            $response["data"] = null;
            $response["error"] = null;
            $response["status_code"] = 200;
        }

        return response()->json( $response , $status );
    }


    // removes a like
    public function destroyInterest(Request $request, $id){
        $response = [];
        $jobOffer = \App\JobOffer::find($id);
        $status = 200;

        if ( !$jobOffer ){
            return $this->jobOfferNotFound($id);
        }

        $liked = $this->worker()->jobOffers->contains($jobOffer->id);

        if ( $liked ){
            $this->worker()->jobOffers()->detach( $jobOffer->id );
            $response["data"] = null;
            $response["error"] = null;
            $response["status_code"] = 200;
        } else {
            $response["data"] = null;
            $response["error"] = [ "jobOffer" => "You don't like this jobOffer" ];
            $response["status_code"] = 403;
            $status = 403;
        }

        return response()->json( $response , $status );
    }





    // retrieve the current worker set in the Middleware
    private function worker(){
        $this->worker = $this->worker ?: \Request::get("worker");
        return $this->worker;
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
