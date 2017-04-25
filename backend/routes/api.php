<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(["namespace" => "api"], function(){
  
  // Stores routes - all the actions below are performed by a store
  Route::group(["namespace" => "stores", "prefix" => "", "middleware" => "api.stores"], function(){
    Route::get("joboffers", "JobOfferController@index");
    Route::get("joboffer/{id}/workers", "JobOfferController@workers");
  });


  // Workers routes - all the actions below are performed by a worker
  Route::group(["namespace" => "workers", "prefix" => "", "middleware" => "api.workers"], function(){
    Route::get("alljoboffers", "JobOfferController@index");
    Route::post("joboffer/{id}/interest", "JobOfferController@createInterest");  
    Route::options("joboffer/{id}/interest", "JobOfferController@createInterest");  
    Route::delete("joboffer/{id}/interest", "JobOfferController@destroyInterest");
  });

});