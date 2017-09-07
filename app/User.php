<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Authenticatable
{
    use Notifiable;
	use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','role', 'status', 'photo_path', 'photo_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * One to one relationship with actor table
    */
    public function actor()
    {
        return $this->hasOne('App\Actor');
    }
	
	public function delete()
    {
        // delete related actor 
        $this->actor()->delete();
        // delete the user
        return parent::delete();
    }
	
	public function memberships(){
		return $this->hasMany(Membership::class);
	}
	
	public function payments(){
		return $this->hasMany(Payment::class);
	}
	
	public function getSubscriptionAttribute(){
		if($this->memberships->count()>0){
			
			$membersipPeriod = $this->memberships->last()->membershipPeriod;
			if(strtotime($membersipPeriod->end_date)>=strtotime(date("Y-m-d"))){
				return 1;
			}else{
				return 0;
			}
			
		}else{
				return 0;
			}
	}

}
