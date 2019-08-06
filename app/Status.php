<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function third_party(){

        return $this->hasMany('App\Third_party');
    }


    public function request_partnership(){

      //  return $this->hasMany('App\Request_partnership');
    }

    public function user_third_party(){

        return $this->hasMany('App\User_third_party');
    }


}
