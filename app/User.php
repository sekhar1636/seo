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

    protected $table = 'users';

    protected $fillable = [
         'email', 'password','role', 'status', 'photo_path', 'photo_url', 'email_token'
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
    /**
     * One to one relationship with theater table
     */
    public function theater()
    {
        return $this->hasOne('App\Theater');
    }

    public function staff()
    {
        return $this->hasOne('App\Staff');
    }

    public function actors_role()
    {
        return $this->hasMany(ActorRole::class);
    }
	
	public function delete()
    {
        // delete related actor
        if($this->actor->count() > 0){

            if($this->actors_role->count() > 0){
                $this->actors_role()->delete();
            }
            $actor = $this->actor;
            if($actor->photo_path != "" || $actor->precrop_path != "" || $actor->photo_url != "" || $actor->precrop_url != "" || $actor->resume_path != ""){
                if(file_exists(env('PHOTO_URL').$actor->photo_path)){
                    @unlink(env('PHOTO_URL').$actor->photo_path);
                }
                if(file_exists(env('PHOTO_URL').$actor->precrop_path)){
                    @unlink(env('PHOTO_URL').$actor->precrop_path);
                }
                if(file_exists(env('PHOTO_URL').$actor->photo_url)){
                    @unlink(env('PHOTO_URL').$actor->photo_url);
                }
                if(file_exists(env('PHOTO_URL').$actor->precrop_url)){
                    @unlink(env('PHOTO_URL').$actor->precrop_url);
                }
                if(file_exists(env('PHOTO_URL').$actor->resume_path)){
                    @unlink(env('PHOTO_URL').$actor->resume_path);
                }
            }
            if($this->payments()->count() > 0){
                $this->payments()->delete();
            }
            if($this->memberships()->count() > 0){
                $this->memberships->delete();
            }
            $this->actor()->delete();
            // delete the user
            return parent::delete();
        }

        if($this->theater()->count() > 0){
            $theater = $this->theater();
            if($theater->photo_path != "" || $theater->precrop_path != "" || $theater->photo_url != "" || $theater->precrop_url != "" || $theater->resume_path != ""){
                if(file_exists(env('PHOTO_URL').$theater->photo_path)){
                    @unlink(env('PHOTO_URL').$theater->photo_path);
                }
                if(file_exists(env('PHOTO_URL').$theater->precrop_path)){
                    @unlink(env('PHOTO_URL').$theater->precrop_path);
                }
                if(file_exists(env('PHOTO_URL').$theater->photo_url)){
                    @unlink(env('PHOTO_URL').$theater->photo_url);
                }
                if(file_exists(env('PHOTO_URL').$theater->precrop_url)){
                    @unlink(env('PHOTO_URL').$theater->precrop_url);
                }
                if(file_exists(env('PHOTO_URL').$theater->resume_path)){
                    @unlink(env('PHOTO_URL').$theater->resume_path);
                }
            }
            if($this->payments()->count() > 0){
                $this->payments()->delete();
            }
            if($this->memberships()->count() > 0){
                $this->memberships->delete();
            }
            $this->theater()->delete();
            return parent::delete();
        }

        if($this->staff()->count() > 0){
            $staff = $this->staff();
            if($staff->photo_path != "" || $staff->precrop_path != "" || $staff->photo_url != "" || $staff->precrop_url != "" || $staff->resume_path != ""){
                if(file_exists(env('PHOTO_URL').$staff->photo_path)){
                    @unlink(env('PHOTO_URL').$staff->photo_path);
                }
                if(file_exists(env('PHOTO_URL').$staff->precrop_path)){
                    @unlink(env('PHOTO_URL').$staff->precrop_path);
                }
                if(file_exists(env('PHOTO_URL').$staff->photo_url)){
                    @unlink(env('PHOTO_URL').$staff->photo_url);
                }
                if(file_exists(env('PHOTO_URL').$staff->precrop_url)){
                    @unlink(env('PHOTO_URL').$staff->precrop_url);
                }
                if(file_exists(env('PHOTO_URL').$staff->resume_path)){
                    @unlink(env('PHOTO_URL').$staff->resume_path);
                }
            }
            if($this->payments()->count() > 0){
                $this->payments()->delete();
            }
            if($this->memberships()->count() > 0){
                $this->memberships->delete();
            }
            $this->staff()->delete();
            return parent::delete();
        }

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
