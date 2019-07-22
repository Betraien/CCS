<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user_third_party(){

        return $this->hasMnay('App\User_third_party');
    }
}
