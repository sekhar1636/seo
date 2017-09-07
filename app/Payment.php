<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     protected $fillable = [
         'user_id ', 'transaction_id' ,'product_id', 'membership_period_id', 'price'
    ];
	
}
