<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //
    protected $fillable=[
        'name'
    ];

    public function Product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
