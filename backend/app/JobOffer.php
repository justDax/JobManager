<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    
    public function store(){
      return $this->belongsTo("App\Store");
    }

    public function workers(){
      return $this->belongsToMany("App\Worker");
    }

}
