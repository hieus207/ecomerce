<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'amount'
    ];
    public $incrementing = false;



    public function Order(){
        return $this->belongsTo('App\Order');
    }

    public function Product(){
        return $this->hasMany('App\Product');
    }
}
