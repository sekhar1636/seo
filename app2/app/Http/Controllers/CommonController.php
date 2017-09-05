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




	public function prepareData($data){

		if($data){
			$removeWhitespace = preg_replace('/\s+/', '', $data);
			$removeComma = str_replace(',', ' ', $removeWhitespace);
			return $removeComma.' ';
		}else{
			return " ";
		}
		
	}

    public function check_in_range($start_date, $end_date, $start_lookup, $end_lookup)
    {
        // Convert to timestamp

        $begin = new \DateTime($start_date);
        $end = new \DateTime($end_date);
        $daterange = new \DatePeriod($begin, new \DateInterval('P1D'), $end);
        $start_ts = strtotime($start_lookup);
        $end_ts = strtotime($end_lookup);
        foreach($daterange as $date) {
            $user_ts = strtotime($date->format('Y-m-d'));
            // Check that user date is between start & end
           if(($user_ts >= $start_ts) && ($user_ts <= $end_ts)) return true;
        }

        return false;

    }



    public function getActors(){
        $actors = \App\User::join('actors','actors.user_id', '=', 'users.id')
            ->where('payment_status',1)
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
            $mixClass .= $this->prepareData($actor->instrument) . '';

            //contion for employment availability
            //imediate
            $imediate = $this->check_in_range($actor->from, $actor->to, date('Y-m-d'), date('Y-m-d'));
            if($imediate) $mixClass .= $this->prepareData("Immediate") . ' ';

            $sd = date("Y-m-d", strtotime("third monday".date("Y-05")));
            $ed = date("Y-m-d", strtotime("first monday ".date("Y-09")));
            $summer = $this->check_in_range($actor->from, $actor->to, $sd, $ed);
            if($summer) $mixClass .= $this->prepareData("Summer") . ' ';

            $fd = date("Y-m-d", strtotime("first monday ".date("Y-09")));
            $fed = date("Y-12-25");
            $fall = $this->check_in_range($actor->from, $actor->to, $fd, $fed);
            if($fall) $mixClass .= $this->prepareData("Fall") . ' ';

            $ny = date("Y-m-d", strtotime("+1 year".date("Y-01-01")));
            $eny = date("Y-m-d", strtotime("+1 year".date("Y-12-31")));
            $next_year = $this->check_in_range($actor->from, $actor->to, $ny, $eny);
            if($next_year) $mixClass .= $this->prepareData("Next Year") . ' ';

            $actorList .= '<div class="mix ' . $mixClass . '" ';
            $actorList .= 'data-first-name="' . $actor->first_name . '" ';
            $actorList .= 'data-last-name="' . $actor->last_name . '" ';
            // $actorList .= 'data-height="' . (int) $actor['physical']['ht'] . '" ';
            // $actorList .= 'data-height-group="' . $this->actorProcess->processHeightGroup($actor['physical']['ht']) . '" ';
            $actorList .= 'data-audition-type="' . preg_replace('/\s+/', '', $actor->auditionType)  . '" ';
            $actorList .= 'data-skill-vocal="' . preg_replace('/\s+/', '', $actor->vocalRange) . '" ';

            $actorList .= '>';

            $actorList .=  '<div class="col-md-4">';
            $actorList .=  ' <div class="tile-container">';
            $actorList .=  '<div class="tile-thumbnail">';
            $actorList .=  '<a href="javascript:;">';
            if($actor->photo_url){
                $actorList .= '<img src="' . $actor->photo_url . '" />';
            }else{
                $actorList .= '<img src="' . asset('images/photos/default-medium.jpg') . '" />';
            }
            $actorList .=  '</a>';
            $actorList .=  '</div>';
            $actorList .=  '<div class="tile-title">';
            $actorList .=  '<h3>';
            $actorList .=  '<a href="javascript:;">'. $actor->first_name.' '.$actor->last_name.'</a>';
            $actorList .=  '</h3>';
            $actorList .=  '<div class="tile-desc">';
            $actorList .=  '<p>';
            $actorList .=  $actor->auditionType;
            $actorList .=  '</p>';
            $actorList .=  '<p>Employment Availability:';
            $actorList .=  $actor->from. ' to ' . $actor->to;

            $actorList .=  '</p>';
            $actorList .=  '</div>';

            if ($actor->resume_path){
                $actorList .= '<a href="' . public_path($actor->resume_path) . '" class="btn btn-block btn-primary" target="_blank"><span class="glyphicon glyphicon-download"></span> ' . $actor->last_name . '\'s Resume</a>';
            }
            $actorList .= '<a href="'.route('getActorView', $actor->user_id).'" class="btn btn-block btn-default" target="_blank"><span class="glyphicon glyphicon-user"></span> ' . $actor->last_name . '\'s Profile</a>';

            $actorList .=  '</div>';
            $actorList .=  '</div>';
            $actorList .=  '</div>';



            $actorList .= '</div>' . PHP_EOL;

            /*Build the Output*/
        }
                return view('actor.actorSearch1')->with(
                        'actorList',$actorList
                    );
    }


    /**
	* Get Function To View Actor Profile
	*/
	public function view($id){
		$actor = \App\User::findOrFail($id);
		return view('actor.profileView')->with('actor', $actor);
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
