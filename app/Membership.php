<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [
         'membership_period_id ', 'user_id'
    ];
	
	public function membershipPeriod(){
		return $this->belongsTo(MembershipPeriod::class);
	}
}
