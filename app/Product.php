<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
         'name', 'description','price','status'
    ];

     protected $table='products';

    public function product_variant()
    {
        return $this->hasMany('App\ProductVariant');
    }
}
