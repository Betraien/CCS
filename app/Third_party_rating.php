<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Third_party_rating extends Model
{
 
    public function third_party(){
    
        return $this->belongsTo('App\Third_party');
    }
 
}
