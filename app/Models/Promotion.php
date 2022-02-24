<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    public function Product(){
        return $this->hasMany('App\Models\Category');
    }
    public function DetailPromotion(){
        return $this->hasMany('App\Models\DetailPromotion');
    }
}
