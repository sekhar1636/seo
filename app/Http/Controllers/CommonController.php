<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App;
use Auth;
use Input;
use Session;
use Socialite;
use Validator;
use App\Slideshow;
use App\Slide;
use App\Faq;
use App\Jobs\SendVerificationMail;
use App\User;

class CommonController extends Controller
{
	use ResetsPasswords;

	//Index Page of website
	public function getIndex(){
        $slideshows = [];
        $slides = [];
        //Home Page slider
	    $slides = Slideshow::where("id","=",2)->get();

        if(count($slides)){
            if($slides[0]['status'] == 1) $slideshows = Slide::where("slideshow_id", $slides[0]['id'])->get();
        }

	    return view('common.index', compact('slideshows'));
	}

	/* Get route map to /faq */
	public function getFaq(){
		$faq['application'] = Faq::where('_type', '=', "Application")->get();
		$faq['audition'] = Faq::where('_type', '=', "Audition")->get();
		$faq['members'] = Faq::where('_type', '=', "Members")->get();
		$faq['selection'] = Faq::where('_type', '=', "Selection")->get();
		return view('common.faq',compact('faq'));
	}

	/* Get route map to /younger */
	public function getYounger(){
		$slides = Slide::latest()->where("slideshow_id","=",2)->orderBy('id', 'desc')->get();
		return view('common.younger',compact('slides'));
	}

	public function getContent(){
		return view('common.content');
	}

	/* Get route map to /contact */
	public function getContact(){
		$slides = Slide::latest()->where("slideshow_id","=",3)->orderBy('id', 'desc')->get();
		return view('common.contact',compact('slides'));
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

	//Get function for signup
	public function getSignup(){
		return view('common.register');
	}
	public function postSignup(Request $request){
		
		$validator = Validator::make($request->all(),
			[
				'name' => "required|max:60",
				'user' => "required|unique:users,email|email|max:100",
				'password' => "min:6|required|max:15",
				'role' => "required|max:30",
			]
		);
		if ($validator->fails()) {
			return redirect()
				->back()
				->withErrors($validator->errors())
				->with('error_message', 'Invalid data please provide complete data.')
				->withInput(\Input::except('password'));
		}	

		$user = new \App\User;
		$user->name = $request->get('name');
		$user->email = $request->get('user');
		$user->password = bcrypt($request->get('password'));
		$user->role = $request->get('role');
        $user->email_token = base64_encode($request->get('user'));
		$user->status = 1;
		if($user->save()){
			//TODO : Sent Registration Email Here

            dispatch(new SendVerificationMail($user));

			$authenticate = array(
			    'email' => $request->get('user'),
			    'password' => $request->get('password'),
			    'status'=>1
		   	);
			if (Auth::attempt($authenticate)) {
				if(Auth::user()->role == 'actor'){
					return redirect()->route('actor::actorProfile');
				}else if(Auth::user()->role == 'theater'){
					return redirect()->route('theater::theaterProfile');
				}else if(Auth::user()->role == 'staff'){
					return redirect()->route('staff::staffProfile');
				}else{
					dd('No User Exist');
				}
			} else {
				return redirect()
						->back()->with('error_message', 'Incorrect credentials or account not approved yet.');
			}
		}else{
			return redirect()
					->back()->with('error_message', 'Invalid input fields');
		}		

	}

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
            return redirect()->back()->with('success_message', 'Please check email to reset password');
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', 'Unable to send forgot email please wait.');
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

	public function getReset($id, $token){
		$expire = \App\User::where('id', $id)->where('remember_token', $token)->count();
		if($expire == 0){
			return redirect()->route('getLogin')->with('error_message', 'Reset password link expired.');
		}
		return view('common.reset');
	}
	public function postReset(Request $request,$id, $token){
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
		$user = \App\User::where('id', $id)->where('remember_token', $token)->first();
		if($user){
			$user->password = bcrypt($request->get('password'));
			$user->remember_token = str_random(60);
			$user->save();
	
			return redirect()->route('getLogin')->with('success_message', 'Password successfully updated. Please login!');
		}else{
			return redirect()->route('getLogin')->with('error_message', 'Reset password link expired.');
		}

	}



        /*email verify*/
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


	/**
	* Get Function To View Actor Profile
	*/


	public function getTheater(){
		dd('Theater Page Coming Soon');
	}
	public function getStaff(){
		dd('Staff Page Coming Soon');
	}

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
