<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $fillable = [
        'name',
        'description'
    ];

    public function Product(){
        return $this->belongsToMany('App\Models\Product','product_tag','tag_id','product_id');
    }
}
