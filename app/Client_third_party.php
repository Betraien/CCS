<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_third_party extends Model
{
    

public function third_party(){

    return $this->belongsTo('App\Third_party');
    }

    // public function user_third_party(){

    //     return $this->hasMany('App\user_third_parties');
    //     }
    

}   