<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /**
	* Reverse relationship to user one to one
    */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
