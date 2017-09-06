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

class CommonController extends Controller
{

	use ResetsPasswords;

	//Index Page of website
	public function getIndex(){
		return view('common.index');
	}

	/* Get route map to /faq */
	public function getFaq(){
		return view('common.faq');
	}

	/* Get route map to /younger */
	public function getYounger(){
		return view('common.younger');
	}

	public function getContent(){
		return view('common.content');
	}

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
			return redirect()->intended(route('getIndex'));
		} else {
			return redirect()
					->back()->with('error_message', 'Incorrect credentials or account not approved yet.');
		}
	}

    /**
     * Handle a registration request for the application.
     *
     * @param $token
     * @return \Illuminate\Http\Response
     */

        public function verify($token)
        {
            $user = User::where('email_token', $token)->first();
            if($user['verified'] == 0)
            {
                $user->verified = 1;
                if($user->save())
                {
                    return view('email.emailconfirm',['user'=>$user]);
                }
            }
            else
            {
                return view('email.alreadyverified');
            }
        }


	// public function getRole(){
	// 	return view('common.role');
	// }

	// public function postRole(){
	// 	$validator = Validator::make($request->all(),
	// 		[
	// 			'role' => "required|max:30",
	// 		]
	// 	);
	// 	if ($validator->fails()) {
	// 		return redirect()
	// 			->back()
	// 			->withErrors($validator->errors())
	// 			->with('error_message', 'Invalid data please provide complete data.')
	// 			->withInput();
	// 	}	

	// 	$user = \App\User::findOrFail(\Auth::user()->id);
	// 	$user->role = $request->get('role');
	// 	if($user->update()){
	// 		if(Auth::check()){
	// 			if(Auth::user()->role == 'actor'){
	// 				return redirect()->route('actor::actorProfile');
	// 			}else if(Auth::user()->role == 'theater'){
	// 				return redirect()->route('theater::theaterProfile');
	// 			}else if(Auth::user()->role == 'staff'){
	// 				return redirect()->route('staff::staffProfile');
	// 			}else{
	// 				dd('No User Exist');
	// 			}
	// 		}
	// 	}else{
	// 		return redirect()
	// 				->back()->with('error_message', 'Invalid input fields');
	// 	}	
	// }


	public function showReset($token)
	{
		\Session::flash("form", "reset");
		return view('dashboards.login')
			->with('token', $token)
			->with('form', 'reset');
	}

	
	//User Login Start Here
	public function logout()
	{
		\Auth::logout();
		Session::flush();
		return redirect('/');
	}
}
