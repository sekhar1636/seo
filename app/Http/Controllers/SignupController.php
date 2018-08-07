<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Validator;
use App\Jobs\SendVerificationMail;
use Carbon\Carbon;
use Auth;
use App\StaticPage;

class SignupController extends Controller
{
    //Get function for signup
    public function getSignup(){
        $cP = StaticPage::where('slug','tandc')->get();

        return view('common.register',['cp' => $cP[0]->page_description]);
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
                    $actor_time = Carbon::createFromTime(00,00,00)->toTimeString();
                    $actor = new App\Actor;
                    $actor->user_id = $user->id;
                    $actor->hardcopy_status = 0;
                    $actor->audition_status = 0;
                    $actor->audition_hour = $actor_time;
                    $actor->save();
                    return redirect()->route('actor::actorProfile');
                }else if(Auth::user()->role == 'theater'){
                    $theater = new App\Theater;
                    $theater->user_id = $user->id;
                    $theater->save();
                    return redirect()->route('theater::theaterProfile');
                }else if(Auth::user()->role == 'staff'){
                    $staff = new App\Staff;
                    $staff->user_id = $user->id;
                    $staff->email = $user->email;
                    $staff->subscription = 0;
                    $staff->status = 1;
                    $staff->save();
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
}
