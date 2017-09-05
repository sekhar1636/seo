<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;
use App;
use Auth;
use Input;
use Session;
use Socialite;
use Validator;
use App\User;

class SignupController extends Controller
{
    /*View For Signup*/
    public function getSignup()
    {
        return view('common.register');
    }

    public function postSignup(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => "required|max:60",
                'user' => "required|unique:users,email|email|max:100",
                'password' => "min:6|required|max:15",
                'role' => "required|max:30",
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

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('user');
        $user->password = bcrypt($request->get('password'));
        $user->role = $request->get('role');
        $user->email_token = base64_encode($request->get('user'));
        $user->status = 1;
        if($user->save())
        {
            //TODO : Sent Registration Email Here
            dispatch(new SendVerificationEmail($user));

            $authenticate = array(
                'email' => $request->get('user'),
                'password' => $request->get('password'),
                'status'=>1
            );
            if (Auth::attempt($authenticate))
            {
                if(Auth::user()->role == 'actor')
                {
                    return redirect()->route('actor::actorProfile');
                }
                else if(Auth::user()->role == 'theater')
                {
                    return redirect()->route('theater::theaterProfile');
                }
                else if(Auth::user()->role == 'staff')
                {
                    return redirect()->route('staff::staffProfile');
                }
                else
                {
                    dd('No User Exist');
                }
            }
            else
            {
                return redirect()
                    ->back()->with('error_message', 'Incorrect credentials or account not approved yet.');
            }
        }
        else
        {
            return redirect()
                ->back()->with('error_message', 'Invalid input fields');
        }

    }
}
