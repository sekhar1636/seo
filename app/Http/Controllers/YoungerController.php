<?php

namespace App\Http\Controllers;

use App\Slide;
use App\StaticPage;

class YoungerController extends Controller
{
    /* Get route map to /younger */
    public function getYounger(){
        $slides = Slide::latest()->where("slideshow_id","=",2)->orderBy('id', 'desc')->get();
        $static = StaticPage::where('slug','younger')->get();
        $sP = $static[0]->page_description;
        return view('common.younger',compact('slides'))->with(['youngeractive'=>'active','sP' => $sP]);
    }
}
