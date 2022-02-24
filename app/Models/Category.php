<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
        'name',
        'description'
    ];

    public function Catalog(){
        return $this->belongsTo('App\Models\Catalog','catalog_id');
    }

    public function Product(){
        return $this->hasMany('App\Models\Product','category_id');
    }

}
