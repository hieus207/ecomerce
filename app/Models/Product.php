<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'specification',
        'quantity_sold',
        'status',
        // so luong con trong kho
        'quantity',
        'price',
        'tags',

    ];

    public function Category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function ProductImage(){
        return $this->hasMany('App\Models\ProductImage','product_id');
    }

    public function Tags(){
        return $this->belongsToMany('App\Models\Tags','product_tag','product_id','tag_id');
    }

    public function OrderProduct(){
        return $this->belongsTo('App\Models\OrderProduct','product_id');
    }
}
