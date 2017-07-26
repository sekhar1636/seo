<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $fillable = [
         'slideshow_id', 'title','description','path'
    ];
}
