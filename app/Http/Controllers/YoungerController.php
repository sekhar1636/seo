<?php

namespace App\Http\Controllers;

use App\Slide;


class YoungerController extends Controller
{
    /* Get route map to /younger */
    public function getYounger(){
        $slides = Slide::latest()->where("slideshow_id","=",2)->orderBy('id', 'desc')->get();
        return view('common.younger',compact('slides'))->with('youngeractive','active');
    }
}
