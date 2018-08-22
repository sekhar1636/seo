<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialPayment extends Model
{
	protected $table     = 'special_payments';
     protected $fillable = ['user_id ', 'transaction_id' ,'product_id', 'membership_period_id', 'price','varient_id','status','payment_token'];
	
}
