<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_third_party extends Model
{
    // public function client(){

    //     return $this->belongsTo('App\Client');
    // }
    
    public function third_party(){
    
        return $this->belongsTo('App\Third_party');
    }
    
    public function product(){
    
        return $this->belongsTo('App\Product');
    }
}
