<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Input;
use Session;
use Socialite;
use Validator;
use App\Slide;

class ContactController extends Controller
{
    /* Get route map to /contact */
    public function getContact(){
        $slides = Slide::latest()->where("slideshow_id","=",3)->orderBy('id', 'desc')->get();
        return view('common.contact',compact('slides'))->with('contactactive','active');
    }

    /*Post route map to /contact*/
    public function postContact(Request $request){
        $validator = \Validator::make($request->all(),
            [
                'username' => "required|max:50|min:3",
                'description'=>'required|max:600',
                'mail'=>'required|email'
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $user = "";
        try {
            \Mail::send('email.contact', ['name'=>$request->get('username'),'email'=>$request->get('mail') ,'description'=>$request->get('description') ], function ($m) use ($user) {
                $m->to('qundeelahmad@gmail.com')->subject('User Contact');
            });
            return redirect()->back()->with('success_message', 'Feedback successfully sent');
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'Unable to send feedback please wait.');
        }
    }
}
