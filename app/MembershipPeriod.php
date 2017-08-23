<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPeriod extends Model
{
    protected $fillable = [
         'name', 'price','start_date','end_date','status'
    ];
	
}
