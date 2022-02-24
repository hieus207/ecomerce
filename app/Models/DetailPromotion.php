<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPromotion extends Model
{
    //
    protected $fillable = [
        'promotion_code',
        'description',
        'quantity',
        'min_price',
        'percent',
        'amount',
    ];
}
