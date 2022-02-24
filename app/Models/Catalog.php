<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    protected $primaryKey = 'catalog_id';
    protected $fillable = [
        'catalog_id',
        'title',
        'content'
    ];

    public function Category(){
        return $this->hasMany('App\Models\Category','catalog_id');
    }
}
