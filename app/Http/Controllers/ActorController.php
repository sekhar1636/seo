<?php

namespace App\Http\Controllers;

use App\Actor;
use App\ProductVariant;
use App\SubscriptionPackage;
use Illuminate\Http\Request;
use Stripe\Stripe as Stripe;
use \Stripe\Plan as StripePlan;
use App\User;
use App\Product;
use App\Membership;
use App\MembershipPeriod;
use App\Payment;
use App\Jobs\SendVerificationMail;
use Carbon\Carbon;

class ActorController extends Controller
{
    /**
    \Get Function For Actor
    \Server Dashboard
     */
    public function index(){
        $verify = '';
        $user = \Auth::user()->verified;
        $user_id = \Auth::user()->id;
        if($user == 1)
        {
            $verify = 1;
        }
        else
        {
            $verify = 0;
        }
        $hardcop = Actor::select('hardcopy_status','audition_status')->where('user_id',$user_id)->get();

        $mytime = \Carbon\Carbon::now();
        $today_date = $mytime->toDateString();

        $mem_date = Membership::select('membership_period_id')->where('user_id',$user_id)->get();

        if(count($mem_date))
        {
            $mem_id = (!empty($mem_date[0]['membership_period_id'])) ? $mem_date[0]['membership_period_id'] : '';
            if(count($mem_id))
            {
                $memb_date = MembershipPeriod::findorfail($mem_id);
                //dd($memb_date->end_date);
            }

        }
        $hardcopy = (!empty($hardcop[0]['hardcopy_status'])) ? (!empty($hardcop[0]['hardcopy_status'])) : 0;
        $audition = (!empty($hardcop[0]['audition_status'])) ? (!empty($hardcop[0]['audition_status'])) : 0;

        return view('actor.dashboard')->with([
            'verify' => $verify,
            'hardcopy' => $hardcopy,
            'audition_status' => $audition
        ]);
    }

    public function products(){
        $products = Product::latest()->orderBy('id', 'desc')->get();
        return view("actor.products",compact('products'));
    }

    public function mail()
    {
        $user = \Auth::user();
        dispatch(new SendVerificationMail($user));
        return redirect()->route('actor::actorProfile')->with('success_message', 'Mail Sent Successfully');
    }

    public function productBuy(Request $request){
        $description = "Products Invoice: ";
        $totalPrice = 0;
        $size = sizeof($request->products);
        if($size)
        {
            foreach($request->products as $prod){
                $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';
                if($proid && $varid) {
                    $product = Product::findOrFail($proid);
                    $varient = ProductVariant::findorFail($varid);
                    $totalPrice = $totalPrice + $varient['price'];
                    $description .= "\nProduct: " . $product->name . " Price: " . $varient['price'];
                }
            }

        }
        $totalPrice = $totalPrice*100;
        Stripe::setApiKey("sk_test_qAom6u4p21fG4a6GMn0JrRd3");
        $result = \Stripe\Charge::create(array(
            "amount" => $totalPrice,
            "currency" => "usd",
            "source" => $request->token,
            "description" => $description
        ));

        if(!isset($result->status)){
            return redirect()->back()->with('error_message', 'Something went wrong. Error:'.$result->type);
        }else{
            foreach($request->products as $prod){
                $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';
                if($proid && $varid){
                    $product = Product::findOrFail($proid);
                    $varient = ProductVariant::findorFail($varid);
                    $payment = new Payment;
                    $payment->user_id = \Auth::user()->id;
                    $payment->transaction_id = $request->token;
                    $payment->product_id = $product->id;
                    $payment->price = $varient['price'];
                    $payment->save();
                }
            }
            return redirect()->route('actor::actorProfile')->with('success_message', 'Successfully bought products.');
        }

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
        $uid = \Auth::user()->id;
        $actor = Actor::where('user_id',$uid)->get();
        $roles = User::findorFail($uid);
        $rol = explode(',',$roles->roles_chosen);

        if(!empty($actor[0]))
        {
            return view('actor.editProfile')->with('actor',$actor)->with('weight', $weight)->with('age', $age)->with('rol',$rol);
        }
        //$actors = User::where('payment_status',1)->where('verified',1)->orderBy('id','desc');
        //$user = \Auth::user();
        //if($user->verified==1 && $user->payment_status==1)
            return view('actor.editProfile')->with([
                'weight'=>$weight,
                'age'=>$age,
                'rol'=>$rol
            ]);
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

        if($request->tes == "PUT")
        {
            $actor = Actor::where('user_id',\Auth::user()->id)->first();
        }
        else
        {
            $actor = new Actor;

        }

        $from_date = Carbon::createFromFormat('d/m/Y', $request->from)->toDateString();
        $to_date = Carbon::createFromFormat('d/m/Y', $request->to)->toDateString();

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
        $actor->from = $from_date;
        $actor->to = $to_date;
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
        $destinationPath = 'assets/files'; // upload path
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

    public function userroles(Request $request)
    {
        $user = User::findorFail(\Auth::user()->id);
        $user->roles_chosen = implode(',', $request->roles_chosen);
        $user->save();

        return redirect()->route('actor::actorProfile')->with('success_message', 'user roles Successfully Created');
    }
    /**
     * TODO : Dummy payment just chaning payment status for now
     * Will update with proper payment system in future
     */
    public function payment()
    {
        $user = User::find(\Auth::user()->id);
        if($user->subscribed('main'))
        {
            return redirect()->route('actor::actorProfile')->with('success_message', 'Already Subscribed');
        }
        else
        {
            $membershipPeriods = MembershipPeriod::latest()->where('type','Actor')->where('status',1)->orderBy('id', 'desc')->get();
            $products = Product::orderBy('id', 'desc')->get();
            //$products = Product::findorfail(2);
            //$n = $products->product_variant;
            //dd($n);
            return view('actor.payment')->with(['products'=>$products,'membershipPeriods' => $membershipPeriods]);
        }

    }

    public function paymentStore(Request $request){
        $request->all();
        $description = "";
        $totalPrice = 0;
        $membershipPeriod = MembershipPeriod::findOrFail($request->subscription);
        $totalPrice = $totalPrice + $membershipPeriod->price;
        $description.= "StrawHat Subscription\nPlan: ".$membershipPeriod->name." Price: ".$membershipPeriod->price;
        /*$size = sizeof($request->products);

        if($request->products){
            foreach($request->products AS $prod){
                $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';
                if($proid && $varid){
                    $product = Product::findOrFail($proid);
                    $varient = ProductVariant::findorFail($varid);
                    $totalPrice = $totalPrice + $varient['price'];
                    $description.= "\nProduct: ".$product->name." ".$varient['product_variant']." Price: ".$varient['price'];
                }
            }
        }*/

        $totalPrice = $totalPrice*100;
        \Stripe\Stripe::setApiKey("sk_test_qAom6u4p21fG4a6GMn0JrRd3");
        try{
            $result = \Stripe\Charge::create(array(
                "amount" => $totalPrice,
                "currency" => "usd",
                "source" => $request->token,
                "description" => $description
            ));

        } catch (\Stripe\Error\Card $e) {
            return redirect()->back()->with('error_message',$e->getMessage());
        } catch (\Stripe\Error\InvalidRequest $e) {
            return redirect()->back()->with('error_message','Kindly Refresh the Page.!');
        } catch (\Stripe\Error\Authentication $e) {
            return redirect()->back()->with('error_message',$e->getMessage());
        } catch (\Stripe\Error\ApiConnection $e) {
            return redirect()->back()->with('error_message',$e->getMessage());
        } catch (\Stripe\Error\Base $e) {
            return redirect()->back()->with('error_message',$e->getMessage());
        } catch (Exception $e) {
            return redirect()->back()->with('error_message',$e->getMessage());
        }
        if(!isset($result->status)){
            return redirect()->back()->with('error_message', 'Something went wrong. Error:'.$result->type);
        }else{
            $membership = new Membership;
            $membership->membership_period_id = $membershipPeriod->id;
            $membership->user_id = \Auth::user()->id;
            $membership->save();

            //save the payment details for subscription
            $payment = new Payment;
            $payment->user_id = \Auth::user()->id;
            $payment->transaction_id = $request->token;
            $payment->membership_period_id = $membershipPeriod->id;
            $payment->price = $membershipPeriod->price;
            $payment->save();

            //subscription table
            $subes = SubscriptionPackage::where('user_id',\Auth::user()->id)->get();

            if(isset($subes[0])) {
                $sub = SubscriptionPackage::findorFail($subes[0]->id);

                if (!empty($sub)) {
                    $sub->name = $membershipPeriod->name;
                    $sub->stripe_id = $result->id;
                    $sub->stripe_plan = $membershipPeriod->type;
                    $sub->quantity = 1;
                    $sub->trial_ends_at = $membershipPeriod->start_date;
                    $sub->ends_at = $membershipPeriod->end_date;
                    $sub->save();

                }
            }
            else
            {

                $stripe_sub = new SubscriptionPackage;
                $stripe_sub->user_id = \Auth::user()->id;
                $stripe_sub->name = $membershipPeriod->name;
                $stripe_sub->stripe_id = $result->id;
                $stripe_sub->stripe_plan = $membershipPeriod->type;
                $stripe_sub->quantity = 1;
                $stripe_sub->trial_ends_at = $membershipPeriod->start_date;
                $stripe_sub->ends_at = $membershipPeriod->end_date;
                $stripe_sub->save();

            }

            //user table
            $use = User::findorFail(\Auth::user()->id);
            $use->payment_status = 1;
            $use->save();

            /*if($request->products)
            {
                foreach($request->products AS $prod){
                $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';

                if($varid && $proid) {
                    $product = Product::findOrFail($proid);
                    $varient = ProductVariant::findOrFail($varid);

                    $payment = new Payment;
                    $payment->user_id = \Auth::user()->id;
                    $payment->transaction_id = $request->token;
                    $payment->product_id = (!empty($product['id'])) ? $product['id'] : '0';
                    $payment->price = (!empty($varient['price'])) ? $varient['price'] : '0';
                    $payment->save();
                }
			}
            }*/
            return redirect()->route('actor::actorProfile')->with('success_message', 'Successfully subscribed.');
        }
    }
    /**for preparing data**/
    public static function prepareData($data){

        if($data){
            $removeWhitespace = preg_replace('/\s+/', '', $data);
            $removeComma = str_replace(',', ' ', $removeWhitespace);
            return $removeComma.' ';
        }else{
            return " ";
        }

    }

    /**for checking date comparision and return**/
    public static function check_in_range($start_date, $end_date, $start_lookup, $end_lookup)
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
            if(($user_ts >= $start_ts) && ($user_ts <= $end_ts)) return "true";
        }

        return "false";

    }
	
	/* Getting actor availability */
	public static function getAvailability($from, $to){
		//contion for employment availability

			$availability = "";
           //imediate
            $imediate = ActorController::check_in_range($from, $to, date('Y-m-d'), date('Y-m-d'));
            if($imediate == "true")
				$availability .= "Immediate ";
				
			//for getting summer
			$sd = date("Y-m-d", strtotime("third monday".date("Y-05")));
			$ed = date("Y-m-d", strtotime("first monday ".date("Y-09")));
			$summer = ActorController::check_in_range($from, $to, $sd, $ed);
			if($summer == "true")
				$availability .= "Summer ";


			//for getting fall
			$fd = date("Y-m-d", strtotime("first monday ".date("Y-09")));
			$fed = date("Y-12-25");
			$fall = ActorController::check_in_range($from, $to, $fd, $fed);
			if($fall == "true")
				$availability .= "Fall ";

			//for getting next year
			$ny = date("Y-m-d", strtotime("+1 year".date("Y-01-01")));
			$eny = date("Y-m-d", strtotime("+1 year".date("Y-12-31")));
			$next_year = ActorController::check_in_range($from, $to, $ny, $eny);
			if($next_year== "true")
				$availability .= "NextYear ";
			
			return $availability;
	}
    /*getting actors in actor view*/
    public function getActors(){

        $actors = \App\User::join('actors','actors.user_id', '=', 'users.id')
            ->where('payment_status',1)->orderBy('first_name', 'asc')
            ->get();

        $actorList = "";
        /*Loop through the Actors*/
				
        /*foreach($actors as $actor){
            
            $mixClass = $actor->gender . ' ';
            $mixClass .= $this->prepareData($actor->ethnicity) . ' ';
            $mixClass .= $this->prepareData($actor->misc) . ' ';
            $mixClass .= $this->prepareData($actor->technical) . ' ';
            $mixClass .= $this->prepareData($actor->dance) . ' ';
            $mixClass .= $this->prepareData($actor->jobType) . ' ';
            $mixClass .= $this->prepareData($actor->instrument). ' ';

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

            $first_name = $actor->first_name;
			$last_name = $actor->last_name;
			$auditionType = preg_replace('/\s+/', '', $actor->auditionType);
			$skill_vocal = preg_replace('/\s+/', '', $actor->vocalRange);
			$from = $actor->from;
			$to = $actor->to;
			$user_id = $actor->user_id;
			if($actor->photo_url){
                $photo_url = $actor->photo_url ;
            }else{
                $photo_url = asset('assets/images/photos/default-medium.jpg');
            }
			$height = (int) $actor['physical']['ht'];
			
			
			$actorList = array( "first_name"=>$first_name, "last_name"=>$last_name, "auditionType"=>$auditionType, "from"=>$from, "to"=>$to, "photo_url"=>$photo_url, "user_id"=>$user_id, "skill_vocal"=>$skill_vocal, "mix_class"=>$mixClass );

            
        }*/
        return view('actor.actorSearch1')->with('actorList', $actors);

    }

    /** View user */
    public function view($id){
        $actor = \App\User::findOrFail($id);
        return view('actor.profileView')->with('actor', $actor);
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

        if(\Auth::user()->Actor){
            $actor = \App\Actor::where('user_id',\Auth::user()->id)->first();
        }else{
            $actor = new \App\Actor;
        }

        $destinationPath = 'assets/photos'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = \Auth::user()->name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);


        $actor->precrop_path = $destinationPath.'/'.$fileName;
        $actor->precrop_url = $destinationPath.'/'.$fileName;

        if(\Auth::user()->Actor){

            if($actor->update()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }

        }else{
            $actor->user_id = \Auth::user()->id;
            if($actor->save()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }

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

        $destinationPath = 'assets/photos'; // upload path

        $fileName = \Auth::user()->name.rand(11111,99999).'.jpg'; // renameing image
        $originalPath = $destinationPath.'/'.$fileName;

        $actor->photo_path = $originalPath;
        $actor->photo_url = $originalPath;
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



}
