<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    
    public function jobOffers(){
      return $this->hasMany("App\JobOffer");
    }

}
