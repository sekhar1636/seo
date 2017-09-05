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
use App\User;

class ForgotController extends Controller
{
    //Get Route Of PAssword Recover
    public function getForgot()
    {
        return view('common.forgot');
    }

    //Post Route Of Password Recover
    public function postForgot(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'mail' => "required|email|exists:users,email",
            ]
        );
        if ($validator->fails())
        {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->with('error_message', 'Invalid data please provide complete data.')
                ->withInput(\Input::except('password'));
        }
        $user  = User::where('email', $request->get('mail'))->first();
        try
        {
            \Mail::send('email.forgot', ['id'=>$user->id,'token'=> $user->remember_token,'name'=>$user->username ], function ($m) use ($user)
            {
                $m->to($user->email)->subject('Reset Password');
            });
            return redirect()->back()->with('success_message', 'Please check email to reset password');
        }
        catch (Exception $e)
        {
            return redirect()->back()->with('error_message', 'Unable to send forgot email please wait.');
        }
    }
}
