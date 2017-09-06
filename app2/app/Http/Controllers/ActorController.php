<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jobs\SendVerificationEmail;

class ActorController extends Controller
{
    /**
    \Get Function For Actor
    \Server Dashboard 
    */
    public function index(){
        if(\Auth::user()->actor && \Auth::user()->payment_status){
            return redirect()->route('actor::getEditProfile');
        }
        $verify = '';
        if(\Auth::user()->verified == 1)
        {
            $verify = 1;
        }
        else
        {
            $verify = 0;
        }
        return view('actor.dashboard')->with([
            'verify' => $verify
        ]);
    }

    public function mail()
    {
        $user = \Auth::user();
        dispatch(new SendVerificationEmail($user));
        return redirect()->route('actor::actorProfile')->with('success_message', 'Mail Sent Successfully');
    }

    public function edit(){
        $weight = [];
        $age = [];
        for ($i=1; $i <= 100 ; $i++) { 
            $age[$i] = $i;
        }
        for ($i=75; $i <= 400 ; $i++) { 
            $weight[$i] = $i .' lbs';
        }
    	if(\Auth::user()->actor){
            return view('actor.editProfile')->with('actor',\Auth::user()->actor)->with('weight', $weight)->with('age', $age);
    	}
        
    	return view('actor.editProfile')->with('weight', $weight)->with('age', $age);
    }
    public function update(Request $request){
    	$validator = \Validator::make($request->all(),
            [
                "resume"=>"mimes:pdf|max:10000",
                'first_name' => "required|max:20|min:3",
                'last_name' => "required|max:20|min:3",
                'age'=>'required|max:3|min:1',
                'gender'=>'required|max:7',
                'feet'=>'required',
                'inch'=>'required',
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
                'from'=>'required',
                'to'=>'required'
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        if($request->get('method') == "PUT"){
            $actor = \App\Actor::where('user_id',\Auth::user()->id)->first();
        }else{
            $actor = new \App\Actor;
        }
        	
    	$actor->user_id = \Auth::user()->id;
        $actor->first_name = $request->get('first_name');
        $actor->last_name = $request->get('last_name');
        $actor->age = $request->get('age');
        $actor->gender = $request->get('gender');
        $actor->feet = $request->get('feet');
        $actor->inch = $request->get('inch');
        $actor->hair = $request->get('hair');
        $actor->eyes = $request->get('eyes');
        $actor->weight = $request->get('weight');
        $actor->school = $request->get('school');
        $actor->from = $request->get('from');
        $actor->to = $request->get('to');
        $actor->auditionType = $request->get('auditionType');
        $actor->vocalRange = $request->get('vocalRange');
        $actor->jobType = implode(',', $request->get('jobType'));
        $actor->technical = implode(',', $request->get('technical'));
        $actor->ethnicity = implode(',', $request->get('ethnicity'));
        $actor->dance = implode(',', $request->get('dance'));
        $actor->instrument = implode(',', $request->get('instrument'));
        $actor->misc = implode(',', $request->get('misc'));
        if($request->hasFile('resume')) {
           $this->uploadResume($actor,$request->file('resume'), $request->get('name'));      
        }
        if($request->get('method') == "PUT"){
            if($actor->update()){
                return redirect()->back()->with('success_message', 'Profile Data Successfully Updated');
            }
        }else{
           if($actor->save()){
                 return redirect()->route('actor::actorProfile')->with('success_message', 'Profile Data Successfully Created');
            }
        }
        
    }

    public function uploadResume($actor,$file, $name){
        $destinationPath = 'resume'; // upload path
        $extension = $file->getClientOriginalExtension();
        $fileName = $name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);
        $actor->resume_path = $destinationPath.'/'.$fileName; 
    }

    public function postEditPassword(Request $request){
        $validator = \Validator::make($request->all(),
            [
                'password' => "required|max:15|min:6",
                'new_password' => "required|max:15|min:6",
                're_password' => "required|max:15|min:6", 
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        if (\Hash::check($request->get('password'), \Auth::user()->password))
        {
            \Auth::user()->password = bcrypt($request->get('new_password'));
            \Auth::user()->update();
            return redirect()->back()->with('success_message', 'Password successfully updated.');
        }else{
            return redirect()->back()->with('error_message', 'Incorrect password! Please enter correct password.');
        }

    }

    /**
    * TODO : Dummy payment just chaning payment status for now
    * Will update with proper payment system in future
    */
    public function payment()
    {
        if(\Auth::user()->payment_status == 1){
            return redirect()->back()->with('success_message', 'Payment completed');
        }else{
            \Auth::user()->payment_status = 1;
            if(\Auth::user()->save()){
                return redirect()->back()->with('success_message', 'Payment completed');
            }else{
                return redirect()->back()->with('error_message', 'Payment not completed please try again.');
            }
        }
    }


    /*
    |Post function to upload images
    */
    public function postPhotoUpdate(Request $request){
       
        $validator = \Validator::make($request->all(),
            [
                "photo"=>"required|image|dimensions:max_width=600",
            ],
            [
                'photo.dimensions'=>'Photo width must be lest than 600.'
            ]
        );
         if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput()
                ->with('tabactive', 'active');
        }
 
        $actor = \App\Actor::where('user_id', \Auth::user()->id)->first(); 
        
        $destinationPath = 'photos'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = \Auth::user()->name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);


        $actor->precrop_path = $destinationPath.'/'.$fileName; 
        $actor->precrop_url = config('filesystems.url').$destinationPath.'/'.$fileName; 
        
        if($actor->update()){
            return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
        }else{
            return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
        }
           
    }


    public function postCropPhotoUpdate(Request $request){
        $targ_w = $targ_h = 230;
        $jpeg_quality = 90;
        $src = \Auth::user()->actor->precrop_url;
 
        $exploded = explode('.',$src);
        $ext = $exploded[count($exploded) - 1];

        $img_r = "";
        if (preg_match('/jpg|jpeg/i',$ext))
            $img_r=imagecreatefromjpeg($src);
        else if (preg_match('/png/i',$ext))
            $img_r=imagecreatefrompng($src);
        else if (preg_match('/gif/i',$ext))
            $img_r=imagecreatefromgif($src);
        else if (preg_match('/bmp/i',$ext))
            $img_r=imagecreatefrombmp($src);
        else
            return 0;

        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
        imagecopyresampled($dst_r,$img_r,0,0,$request->get('x'),$request->get('y'),
        $targ_w,$targ_h,$request->get('w'),$request->get('h'));

       

        $actor = \App\Actor::where('user_id', \Auth::user()->id)->first(); 
        
        $destinationPath = 'photos'; // upload path
      
        $fileName = \Auth::user()->name.rand(11111,99999).'.jpg'; // renameing image
        $originalPath = $destinationPath.'/'.$fileName; 
    
        $actor->photo_path = $originalPath;
        $actor->photo_url = config('filesystems.url').$originalPath; 
         header('Content-type: image/jpeg');
        imagejpeg($dst_r,public_path().'/'.$originalPath,$jpeg_quality);
        if($actor->update()){
            return redirect()->back()->with('success_message', 'Profile picture successfully updated.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not uploaded. Try again!');
        }
  
    }

    public function getDeletePhoto(){
        $actor = \App\Actor::where('user_id', \Auth::user()->id)->first(); 
        unlink(public_path().'/'.$actor->precrop_path);
        $actor->precrop_url = null;
        $actor->precrop_path = null;
    
        if($actor->update()){
            return redirect()->back()->with('success_message', 'Picture successfully deleted.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not deleted. Try again!');
        }
    }
    /**for preparing data**/
    public function prepareData($data){

        if($data){
            $removeWhitespace = preg_replace('/\s+/', '', $data);
            $removeComma = str_replace(',', ' ', $removeWhitespace);
            return $removeComma.' ';
        }else{
            return " ";
        }

    }

    /**for checking date comparision and return**/
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

    /**getting Actors from db**/
    public function getActors()
    {
        $actors = \App\User::join('actors','actors.user_id', '=', 'users.id')
            ->where('payment_status',1)
            ->get();

        $actorList = "";
        /*Loop through the Actors*/
        foreach($actors as $actor)
        {
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

            //for getting summer
            $sd = date("Y-m-d", strtotime("third monday".date("Y-05")));
            $ed = date("Y-m-d", strtotime("first monday ".date("Y-09")));
            $summer = $this->check_in_range($actor->from, $actor->to, $sd, $ed);
            if($summer) $mixClass .= $this->prepareData("Summer") . ' ';

            //for getting fall
            $fd = date("Y-m-d", strtotime("first monday ".date("Y-09")));
            $fed = date("Y-12-25");
            $fall = $this->check_in_range($actor->from, $actor->to, $fd, $fed);
            if($fall) $mixClass .= $this->prepareData("Fall") . ' ';

            //for getting next year
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

            if($actor->photo_url)
            {
                $actorList .= '<img src="' . $actor->photo_url . '" />';
            }

            else
            {
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

            if ($actor->resume_path)
            {
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
    public function view($id)
    {
        $actor = \App\User::findOrFail($id);
        return view('actor.profileView')->with('actor', $actor);
    }

}
