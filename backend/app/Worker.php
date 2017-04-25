<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function jobOffers(){
      return $this->belongsToMany("App\JobOffer");
    }
}
