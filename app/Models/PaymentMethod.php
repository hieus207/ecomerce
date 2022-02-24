<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function Order(){
        return $this->hasMany('App\Models\Order','payment_method');
    }
}
