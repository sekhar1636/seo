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
use Carbon\Carbon;
use App\User;

class PasswordController extends Controller
{
    //Get Route Of PAssword Recover
    public function getForgot(){
        return view('common.forgot');
    }

    //Post Route Of Password Recover
    public function postForgot(Request $request){
        $validator = Validator::make($request->all(),
            [
                'mail' => "required|email|exists:users,email",
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->with('error_message', 'Invalid data please provide complete data.')
                ->withInput(\Input::except('password'));
        }
        $user  = \App\User::where('email', $request->get('mail'))->first();
        try {
            \Mail::send('email.forgot', ['id'=>$user->id,'token'=> $user->remember_token,'name'=>$user->username ], function ($m) use ($user) {
                $m->to($user->email)->subject('Reset Password');
            });
            $expiretime = Carbon::now()->addHours(4);
            $starttime = Carbon::now();
            $inj_user = User::findorfail($user->id);
            $inj_user->forgot_start = $starttime;
            $inj_user->forgot_end = $expiretime;
            $inj_user->update();
            //dd($starttime->toDateTimeString(). $expiretime->toDateTimeString());
            return redirect()->back()->with('success_message', 'Please check email to reset password');
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'Unable to send forgot email please wait.');
        }
    }

    public function getReset($id){
        $expire = \App\User::where('id', $id)->first();
        $exptime = $expire->forgot_end;
        $currenttime = Carbon::now();
        if($currenttime > $exptime){
            return redirect()->route('getLogin')->with('error_message', 'Reset password link expired.');
        }
        return view('common.reset');
    }
    public function postReset(Request $request,$id){
        $validator = Validator::make($request->all(),
            [
                'password' => "required|min:6|max:15",
                'password_confirmation'=>'required|min:6|max:15|same:password'
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->with('error_message', 'Invalid data please provide complete data.')
                ->withInput(\Input::except('password'));
        }
        $user = \App\User::where('id', $id)->first();
        if($user){
            $user->password = bcrypt($request->get('password'));
            $user->remember_token = str_random(60);
            $user->save();

            return redirect()->route('getLogin')->with('success_message', 'Password successfully updated. Please login!');
        }else{
            return redirect()->route('getLogin')->with('error_message', 'Reset password link expired.');
        }

    }
}
