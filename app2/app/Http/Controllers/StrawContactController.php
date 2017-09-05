<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Jobs\SendVerificationEmail;
use App;
use Auth;
use Input;
use Session;
use Socialite;
use Validator;
use App\User;

class StrawContactController extends Controller
{
    /* Get route map to /contact */
    public function getContact()
    {
        return view('common.contact');
    }

    /*Post route map to /contact*/
    public function postContact(Request $request)
    {
        $validator = \Validator::make($request->all(),
            [
                'username' => "required|max:50|min:3",
                'description'=>'required|max:600',
                'mail'=>'required|email'
            ]
        );
        if ($validator->fails())
        {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $user = "";
        try
        {
            \Mail::send('email.contact', ['name'=>$request->get('username'),'email'=>$request->get('mail') ,'description'=>$request->get('description') ], function ($m) use ($user) {
                $m->to('bala@zaigoinfotech.com')->subject('User Contact');
            });
            return redirect()->back()->with('success_message', 'Feedback successfully sent');
        }
        catch (Exception $e)
        {
            return redirect()->back()->with('error_message', 'Unable to send feedback please wait.');
        }
    }
}
