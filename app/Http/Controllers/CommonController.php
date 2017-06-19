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

	/* Get route map to /contact */
	public function getContact(){
		return view('common.contact');
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
			return redirect()->back();
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
		$user->status = 1;
		if($user->save()){
			//TODO : Sent Registration Email Here
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


	public function prepareData($data){

		if($data){
			$removeWhitespace = preg_replace('/\s+/', '', $data);
			$removeComma = str_replace(',', ' ', $removeWhitespace);
			return $removeComma.' ';
		}else{
			return " ";
		}
		
	}

	public function getActors(){
		$actors = \App\User::join('actors','actors.user_id', '=', 'users.id')
		->get();

		$actorList = "";
		/*Loop through the Actors*/
		foreach($actors as $actor){
			/*Build MIX Class*/
			$mixClass = $actor->gender . ' ';
				$mixClass .= $this->prepareData($actor->ethnicity) . ' ';
				$mixClass .=$this->prepareData($actor->misc) . ' ';
				$mixClass .= $this->prepareData($actor->technical) . ' ';
				$mixClass .= $this->prepareData($actor->dance) . ' ';
				$mixClass .= $this->prepareData($actor->jobType) . ' ';
				$mixClass .= $this->prepareData($actor->instrument);
			
			/*Build the Output*/
			$actorList .= '<div class="mix ' . $mixClass . '" ';
				$actorList .= 'data-first-name="' . $actor->first_name . '" ';
				$actorList .= 'data-last-name="' . $actor->last_name . '" ';
				// $actorList .= 'data-height="' . (int) $actor['physical']['ht'] . '" ';
				// $actorList .= 'data-height-group="' . $this->actorProcess->processHeightGroup($actor['physical']['ht']) . '" ';
				$actorList .= 'data-audition-type="' . $actor->auditionType . '" ';
				$actorList .= 'data-skill-vocal="' . $actor->vocalRange . '" ';
				
			$actorList .= '>';
				$actorList .= '<div class="mix-content">';
					$actorList .= '<h2>' . $actor->first_name.' '.$actor->last_name. '</h2>';
					if($actor->photo_url){
						$actorList .= '<img src="' . $actor->photo_url . '" height="130" style="height:130px;" class="actorThumb">' . '<br/>';
					}

						$actorList .= $actor->auditionType . '<br/>';
						
						// if($actor-> != 'N'){
						// 	$actorList .= '<strong>Apprentice: </strong>' . $this->actorProcess->processYesNoMaybe($actor['audition']['apprentice']) . '<br/>';
						// }

						// if($actor['audition']['intern'] != 'N'){
						// 	$actorList .= '<strong>Internship: </strong>' . $this->actorProcess->processYesNoMaybe($actor['audition']['intern']) . '<br/>';
						// }

						$actorList .= '<strong>Employment Availability:</strong><br/>' . $actor->from. ' to ' . $actor->to. '<br/>';
						
						if ($actor->resume_path){
							$actorList .= '<a href="' . public_path($actor->resume_path) . '" class="btn btn-block btn-primary" target="_blank"><span class="glyphicon glyphicon-download"></span> ' . $actor->last_name . '\'s Resume</a>';
						}
						$actorList .= '<a href="#" class="btn btn-block btn-default" target="_blank"><span class="glyphicon glyphicon-user"></span> ' . $actor->last_name . '\'s Profile</a>';
	
				$actorList .= '</div>';
			$actorList .= '</div>' . PHP_EOL;	
		}

		return view('actor.actorSearch')->with('actorList', $actorList);
	}
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
