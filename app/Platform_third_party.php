<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform_third_party extends Model
{
    public function third_party(){

        return $this->belongsTo('App\Third_party');
    }
}
