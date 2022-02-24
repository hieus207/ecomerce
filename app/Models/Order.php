<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'id',
        'guest_id',
        'user_id',
        'customer_name',
        'phone_number',
        'address',
        'buy_quantity',
        'tax',
        'discount',
        // AMOUNT=Buy_quantity*price
        'amount',
        'payment_method',
        'status'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function OrderProduct(){
        return $this->hasMany('App\Models\OrderProduct');
    }

    public function PaymentMethod(){
        return $this->belongsTo('App\Models\PaymentMethod');
    }

}
