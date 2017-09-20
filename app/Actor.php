<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /**
	* Reverse relationship to user one to one
    */
    protected $table = 'actors';
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function setPhoto($file, $saveDB = true)
    {
        // Medium

        // $stream = Image::make($file->getRealPath())
        //     ->fit(278, 186)
        //     ->stream('jpg', 80);
        // $stream = $stream->detach();
        

        $resumeID =  $this->id . '-medium-' . time() . '.pdf';
        $resumePath = 'assets/photos/profile-pics/' . $resumeID;

        DataIO::deleteFile($resumePath);

        $this->photo_url = \Config::get("filesystems.parent_url") . $resumePath;
        $this->photo_path = $resumePath;

        if($saveDB) {
            $this->save();
        }
    }


}
