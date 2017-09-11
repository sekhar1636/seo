<?php
namespace App;

use Illuminate\Database\Eloquent\Model;


class Theater extends Model
{
    protected $table = 'theaters';

    public function user()
    {
        return $this->hasOne('App\User','id');
    }
}