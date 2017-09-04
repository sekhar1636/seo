<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
	
	public function delete()
    {
        // delete related actor 
        $this->actor()->delete();
        // delete the user
        return parent::delete();
    }

}
