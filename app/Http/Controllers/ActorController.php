<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function getProfile(){
    	\Stripe\Stripe::setApiKey("sk_test_zeE2PThsOCW3262KjaYFQg9T");
//     	if(\Stripe\Plan::retrieve("golsd")){
// 	dd('asd');
// }else{
// 	dd('ddasd');
// }

//     	\Stripe\Plan::create(array(
// 		  "amount" => 2000,
// 		  "interval" => "month",
//  		  "interval_count"=> 3,
// 		  "name" => "Amazing Gold Plan",
// 		  "currency" => "usd",
// 		  "id" => "gold")
// 		);


    	return view('actor.dashboard');
    }
    public function getEditProfile(){
    	if(\Auth::user()->actor){
    		return redirect()->route('actor::actorProfile');
    	}
    	return view('actor.editProfile');
    }
    public function postEditProfile(Request $request){
    	$validator = \Validator::make($request->all(),
            [
                'name' => "required|max:40|min:3",
                'age'=>'required|max:3|min:1',
                'gender'=>'required|max:7',
                'height'=>'required|max:4',
                'hair'=>'required|max:20',
                'eyes'=>'required|max:20',
                'weight'=>'required|max:4',
                'school' => "required|max:150|min:3",
                'auditionType'=>'required',
                'vocalRange'=>'required',
                'jobType'=>'required',
                'dance'=>'required',
                'technical'=>'required',
                'ethnicity'=>'required',
                'instrument'=>'required',
                'misc'=>'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        	$actor = new \App\Actor;
        	$actor->user_id = \Auth::user()->id;
	        $actor->name = $request->get('name');
	        $actor->age = $request->get('age');
	        $actor->gender = $request->get('gender');
	        $actor->height = $request->get('height');
	        $actor->hair = $request->get('hair');
	        $actor->eyes = $request->get('eyes');
	        $actor->weight = $request->get('weight');
	        $actor->school = $request->get('school');
	        $actor->auditionType = $request->get('auditionType');
	        $actor->vocalRange = $request->get('vocalRange');
	        $actor->jobType = implode(',', $request->get('jobType'));
	        $actor->technical = implode(',', $request->get('technical'));
	        $actor->ethnicity = implode(',', $request->get('ethnicity'));
	        $actor->dance = implode(',', $request->get('dance'));
	        $actor->instrument = implode(',', $request->get('instrument'));
	        $actor->misc = implode(',', $request->get('misc'));
	        if($actor->save()){
	        	 return redirect()->route('actor::actorProfile');
	        }
    }
}
