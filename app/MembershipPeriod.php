<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipPeriod extends Model
{
    protected $fillable = [
         'name', 'price','type','start_date','end_date','status',
    ];

    protected $table = 'membership_periods';
}
