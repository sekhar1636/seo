<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;

class LoginController extends Controller
{
    //Get function of login page
    public function getLogin(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->role == 'actor'){
                return redirect()->route('actor::actorProfile');
            }else if(Auth::user()->role == 'theater'){
                return redirect()->route('theater::theaterProfile');
            }else if(Auth::user()->role == 'staff'){
                return redirect()->route('staff::staffProfile');
            }else{
                dd('No User Exist');
            }
        }
        return view('common.login');
    }

    //Post Function of Login Page
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'username' => 'required|email',
                'password' => 'required'
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->with('error_message', 'Incorrect credentials or account not approved yet.')
                ->withInput();
        }
        $user = array(
            'email' => $request->get('username'),
            'password' => $request->get('password'),
            'status'=>1
        );
        if (Auth::attempt($user)) {
            if(Auth::user()->role == "admin"){
                return redirect()->route('admin::adminDashboard');
            }
            if(Auth::user()->role == "actor")
            {
                return redirect()->route('actor::actorProfile');
            }else if(Auth::user()->role == 'theater'){
                return redirect()->route('theater::theaterProfile');
            }else if(Auth::user()->role == 'staff'){
                return redirect()->route('staff::staffProfile');
            }
            //return redirect()->intended(route('getIndex'));
        } else {
            return redirect()
                ->back()->with('error_message', 'Incorrect credentials or account not approved yet.');
        }
    }
    public function logout()
    {
        \Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
