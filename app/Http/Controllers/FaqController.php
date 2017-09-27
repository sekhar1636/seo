<?php

namespace App\Http\Controllers;

use App\Faq;

class FaqController extends Controller
{
    /* Get route map to /faq */
    public function getFaq(){
        $faq['application'] = Faq::where('_type', '=', "Application")->get();
        $faq['audition'] = Faq::where('_type', '=', "Audition")->get();
        $faq['members'] = Faq::where('_type', '=', "Members")->get();
        $faq['selection'] = Faq::where('_type', '=', "Selection")->get();
        return view('common.faq',compact('faq'));
    }
}
