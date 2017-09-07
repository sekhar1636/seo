<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContentPage extends Model
{
    protected $fillable = [
         'slideshow_id', 'title','description'
    ];
	
	public function slideshow(){
		return $this->belongsTo(Slideshow::class);
	}
}
