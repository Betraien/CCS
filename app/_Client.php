<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _Client extends Model
{
    public function client_third_party(){

        return $this->hasMnay('App\Client_third_party');
    }

    public function client_type(){

        return $this->belongsTo('App\Client_Type');
    }

}
