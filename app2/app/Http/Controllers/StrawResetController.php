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

class StrawResetController extends Controller
{

    public function getReset($id, $token)
    {
        $expire = User::where('id', $id)->where('remember_token', $token)->count();
        if($expire == 0)
        {
            return redirect()->route('getLogin')->with('error_message', 'Reset password link expired.');
        }
        return view('common.reset');
    }


    public function postReset(Request $request,$id, $token)
    {
        $validator = Validator::make($request->all(),
            [
                'password' => "required|min:6|max:15",
                'password_confirmation'=>'required|min:6|max:15|same:password'
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
        $user = User::where('id', $id)->where('remember_token', $token)->first();
        if($user)
        {
            $user->password = bcrypt($request->get('password'));
            $user->remember_token = str_random(60);
            $user->save();

            return redirect()->route('getLogin')->with('success_message', 'Password successfully updated. Please login!');
        }
        else
        {
            return redirect()->route('getLogin')->with('error_message', 'Reset password link expired.');
        }

    }
}
