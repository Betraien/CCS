<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Third_party extends Model
{
    public function user_third_party(){

        return $this->hasMnay('App\User_third_party');
    }

    public function third_party_type(){

        return $this->belongsTo('App\Third_party_type');
        //return $this->belongsTo('App\Third_party_type', 'type_id' , 'id'); this line used when you don't want to use laravel naming convention of foriegn keys
    }

    public function status(){

        return $this->belongsTo('App\Status');
    }

}
