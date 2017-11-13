<?php

namespace App\Http\Controllers;

use App\Homepage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App;
use Auth;
use Input;
use Socialite;
use Validator;
use App\Slideshow;
use App\Slide;
use App\Faq;
use App\Jobs\SendVerificationMail;
use App\User;
use Carbon\Carbon;

class CommonController extends Controller
{
	use ResetsPasswords;

	//Index Page of website
	public function getIndex(){
        $slideshows = [];
        $slides = [];
        //Home Page slider
	    $slides = Slideshow::where('status',1)->get();
	    $slideshows = Slide::where("slideshow_id", $slides[0]['id'])->get();

        $homepage = Homepage::select('content')->where('id',1)->get();
        $hom = $homepage[0]['content'];
	    return view('common.index', compact('slideshows'))->with(['homeactive'=>'active','homepage'=>$hom]);
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

	public function showReset($token)
	{
		\Session::flash("form", "reset");
		return view('dashboards.login')
			->with('token', $token)
			->with('form', 'reset');
	}
}
