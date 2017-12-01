<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class ActorRole extends Model
{
    protected $table = 'actors_role';

    protected $fillable = ['show','theater','dir_chor','roles_chosen','user_id'];
}