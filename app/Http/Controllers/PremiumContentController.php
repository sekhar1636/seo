<?php

namespace App\Http\Controllers;


class PremiumContentController extends Controller
{
    public function getContent(){
        return view('common.content');
    }
}
