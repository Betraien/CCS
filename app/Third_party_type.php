<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Third_party_type extends Model
{
    public function third_party(){
    
        return $this->hasMany('App\Third_party');
    }
 
}
