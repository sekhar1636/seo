<?php

namespace App\Http\Controllers;

use App\Actor;
use App\ActorRole;
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
use App\AuditionExtra;
use Yajra\Datatables\Facades\Datatables;
use DB;
use PDF;
use App\SpecialPayment;

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
        $hardcop = Actor::select('hardcopy_status','audition_status','resume_path')->where('user_id',$user_id)->get();

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
        $audition = (!empty($hardcop[0]['audition_status'])) ? (!empty($hardcop[0]['audition_status'])) : 0;
        $resume = (!empty($hardcop[0]['resume_path'])) ? (!empty($hardcop[0]['resume_path'])) : 0;

        $roles = ActorRole::where('user_id',$user_id)->first();
        $act = Actor::where('user_id',$user_id)->first();
        return view('actor.dashboard')->with([
            'verify' => $verify,
            'hardcopy' => $hardcop[0]['hardcopy_status'],
            'audition_status' => $audition,
            'resume' => $resume,
            'roles' => $roles,
            'act' => $act,
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
        Stripe::setApiKey($_ENV['STRIPE_SECRET']);
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
                    $payment->transaction_id = $result->id;
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
        $roles = ActorRole::where('user_id',$uid)->orderBy('id','asc')->get();
        $ae = AuditionExtra::updateorcreate(['user_id'=>$uid],['user_id',$uid]);
        $audition_extra = AuditionExtra::where('user_id',$uid)->get();
        if(count($audition_extra)){
            $ax = $audition_extra[0];
        } else {
            $ax = '';
        }
        if(!empty($actor[0]))
        {
            return view('actor.editProfile')->with('actor',$actor)->with('weight', $weight)->with('age', $age)->with('rol',$roles)->with('ax',$ax);
        }
        //$actors = User::where('payment_status',1)->where('verified',1)->orderBy('id','desc');
        //$user = \Auth::user();
        //if($user->verified==1 && $user->payment_status==1)
            return view('actor.editProfile')->with([
                'weight'=>$weight,
                'age'=>$age,
                'rol'=>$roles,
                'ax'=>$ax
            ]);
    }


    public function update(Request $request){
        $validator = \Validator::make($request->all(),
            [
                "resume"=>"mimes:pdf|max:10000",
                'first_name' => "required|max:20|min:1",
                'last_name' => "required|max:20|min:1",
                'age'=>'required|max:3|min:1',
                'gender'=>'required|max:7',
                'feet'=>'required',
                'inch'=>'required',
                'hair'=>'required|max:20',
                'eyes'=>'required|max:20',
                'weight'=>'required|max:4',
                //'school' => "required|max:150|min:3",
                'auditionType'=>'required',
                'vocalRange'=>'required',
                //'jobType'=>'required',
                //'dance'=>'required',
                //'technical'=>'required',
                'ethnicity'=>'required',
                /*'instrument'=>'required',
                'misc'=>'required',*/
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
            $id = \Auth::user()->id;
            $actor = Actor::where('user_id',$id)->first();

        }
        else
        {
            $actor = new Actor;
        }

        $actor_dance_experince = "";
        if($request->get('dance_exp') != "") {
            $danceExperince = "";
            foreach($request->get('dance_exp') as $key => $value) {
                if($value != "") {
                    $danceExperince .= $value.',';
                }
            }
            $actor_dance_experince = rtrim($danceExperince,', ');
        }

        $actor_instrument_experince = "";
        if($request->get('instrument_exp') != "") {
            $instrumentExperince = "";
            foreach($request->get('instrument_exp') as $key => $value) {
                if($value != "") {
                    $instrumentExperince .= $value.',';
                }
            }
            $actor_instrument_experince = rtrim($instrumentExperince,', ');
        }

        $from_date = Carbon::createFromFormat('d/m/Y', $request->from)->toDateString();
        $to_date = Carbon::createFromFormat('d/m/Y', $request->to)->toDateString();
        $id = \Auth::user()->id;
        $user = User::findorfail($id);
        $user->name = $request->get('display_name');
        $user->save();
        $actor->user_id = $id;
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
        $actor->jobType = $request->get('jobType') ? implode(',', $request->get('jobType')) : '';
        $actor->technical = $request->get('technical') ? implode(',', $request->get('technical')) : '';
        $actor->ethnicity = $request->get('ethnicity') ? implode(',', $request->get('ethnicity')) : '';
        $actor->dance = $request->get('dance') ? implode(',', $request->get('dance')) : '';
        $actor->dance_experince = $actor_dance_experince ? $actor_dance_experince : '';
        $actor->instrument = $request->get('instrument') ? implode(',', $request->get('instrument')) : '';
        $actor->instrument_experince = $actor_instrument_experince ? $actor_instrument_experince : '';
        $actor->misc = $request->get('misc') ? implode(',', $request->get('misc')) : '';
        $actor->phone_number = $request->phone_number;
        $actor->website_url = $request->website_url;
        $actor->pro_name = $request->pro_name;
        $actor->pro_mail = $request->pro_mail;
        $actor->state = $request->state[0];
        if($request->hasFile('resume')) {
            $this->uploadResume($actor,$request->file('resume'), $request->get('name'));
        }
        if($request->get('method') == "PUT"){
            if($actor->update()){
                return redirect()->back()->with('success_message', 'Profile Data Successfully Updated');
            }
        }else{
            if($actor->save()){
                return redirect()->back()->with('success_message', 'Profile Data Successfully Created');
            }
        }

    }
    public function userPaymentDatatable($id){
        DB::statement(DB::raw('set @rownum=0'));
        $invoices = Payment::where("user_id","=",$id)->selectRaw("@rownum  := @rownum  + 1 AS id,sum(price) as total_price,transaction_id")->groupBy('transaction_id');
        return Datatables::of($invoices)
            ->addColumn('details_url', function($invoice) {
                return route('actor::actorUserTransactionDetails',$invoice->transaction_id);
            })
            ->make(true);
    }

    public function userTransactionDetails($id){
        $payments = Payment::where("transaction_id","=",$id);
        return Datatables::of($payments)
            ->addColumn('item', function($payment) {
                if($payment->product_id===NULL){
                    return "Subscription Fee";
                }else{
                    return "Product Charges";
                }
            })
            ->make(true);
    }
    public function uploadResume($actor, $file, $name){
        $destinationPath = 'files/resumes/actor'; // upload path
        $extension = $file->getClientOriginalExtension();
        $fileName = $name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);
        if(\File::exists(public_path($actor->resume_path))){
            \File::delete(public_path($actor->resume_path));
        }
        //unlink($actor->resume_path);
        $actor->resume_path = $destinationPath.'/'.$fileName;
    }

    public function actorResumeDelete(){

        $actor = Actor::where('user_id', \Auth::User()->id)->first();
        if(\File::exists(public_path($actor->resume_path))){
            \File::delete(public_path($actor->resume_path));
        }
        $actor->resume_path = null;

        if($actor->update()){
            return redirect()->back()->with('success_message', 'Resume successfully deleted.');
        }else{
            return redirect()->back()->with('error_message', 'Resume not deleted. Try again!');
        }
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

        $user_id = \Auth::user()->id;
        $cus = ActorRole::where('user_id',$user_id)->get();

        if(count($cus))
        {
            $delete = ActorRole::where('user_id',$user_id)->delete();

            for($i=1;$i<11;$i++)
            {

                if(!empty($request->roles_chosen[$i]) || !empty($request->show[$i]) || !empty($request->theater[$i]) || !empty($request->dir_chor[$i])) {
                    $user = new ActorRole;
                    $user->roles_chosen = $request->roles_chosen[$i];
                    $user->show = $request->show[$i];
                    $user->theater = $request->theater[$i];
                    $user->dir_chor = $request->dir_chor[$i];
                    $user->user_id = $user_id;
                    $user->save();
                }else{ continue; }
            }
        }
        else
        {
            for($i=1;$i<11;$i++)
            {

                if(!empty($request->roles_chosen[$i]) || !empty($request->show[$i]) || !empty($request->theater[$i]) || !empty($request->dir_chor[$i])) {
                    $user = new ActorRole;
                    $user->roles_chosen = $request->roles_chosen[$i];
                    $user->show = $request->show[$i];
                    $user->theater = $request->theater[$i];
                    $user->dir_chor = $request->dir_chor[$i];
                    $user->user_id = $user_id;
                    $user->save();
                }else{ continue; }
            }
        }





        return redirect()->route('actor::actorProfile')->with('success_message', 'user roles Successfully Created');
    }
    /**
     * TODO : Dummy payment just chaning payment status for now
     * Will update with proper payment system in future
     */
    public function payment(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        if($user->subscribed('main'))
        {
            return redirect()->route('actor::actorProfile')->with('success_message', 'Already Subscribed');
        }
        else
        {
            $payment_type = "";
            if(isset($request['t']) && $request['t'] != '') {
                $paymentInfo  = explode("|",base64_decode($request['t']));
                
                if(isset($paymentInfo[0]) && $paymentInfo[0] != "") {
                    $payment_type = $paymentInfo[0];
                }
            }

            $membershipPeriods = MembershipPeriod::latest()->where('type','Actor')->where('status',1);
            if(isset($payment_type) && $payment_type == 's') {
                $membershipPeriods = $membershipPeriods->where("subscription_type","special");
            } else {
                $membershipPeriods = $membershipPeriods->where("subscription_type","default")->orWhere("subscription_type","");
            }
            $membershipPeriods = $membershipPeriods->orderBy('id', 'desc')->get();

            $products = Product::where('status',1);
            if(isset($payment_type) && $payment_type == 's') {
                $products = $products->where("product_type","special");
            } else {
                $products = $products->where("product_type","default")->orWhere("product_type","");
            }
            $products = $products->orderBy('id', 'desc')->get();

            $states = $this->getStateWithSelected();
            return view('actor.payment')->with(['products'=>$products,'membershipPeriods' => $membershipPeriods, 'states' => $states]);
        }

    }
    /**for state list**/
    public function getStateWithSelected(){
        $states = ["Alabama","Alaska","Arizona","Arkansas","California","Colorado ","Connecticut ","Delaware ","District of Columbia ","Florida ",
            "Georgia ","Hawaii ","Idaho ","Illinois ","Indiana ","Iowa ","Kansas ","Kentucky ","Louisiana ","Maine ","Maryland ","Massachusetts ",
            "Michigan ","Minnesota ","Mississippi ","Missouri ","Montana ","Nebraska ","Nevada ","New Hampshire ","New Jersey ","New Mexico ",
            "New York ","North Carolina ","North Dakota ","Ohio ","Oklahoma ","Oregon ","Pennsylvania ","Puerto Rico ","Rhode Island ","South Carolina ",
            "South Dakota ","Tennessee ","Texas ","Utah ","Vermont ","Virginia ","Washington ","West Virginia ","Wisconsin ","Wyoming "];
        return $states;
    }

    public function paymentStore(Request $request){
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
        \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']);
        try{
            $result = \Stripe\Charge::create(array(
                "amount" => $totalPrice,
                "currency" => "usd",
                "receipt_email" => \Auth::user()->email,
                "source" => $request->token,
                "description" => $description,
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
            $paymentType    = "";
            $$paymentUserId = "";
            $paymentToken   = "";
            if(isset($request->payment_type) && $request->payment_type != '') {
                $paymentInfo  = explode("|",base64_decode($request->payment_type));
                $payment_type = "";
                if(isset($paymentInfo[0]) && $paymentInfo[0] != "") {
                    $paymentType = $paymentInfo[0];
                }
                if(isset($paymentInfo[1]) && $paymentInfo[1] != "") {
                    $paymentUserId = $paymentInfo[1];
                }
                if(isset($paymentInfo[2]) && $paymentInfo[2] != "") {
                    $paymentToken = $paymentInfo[2];
                }
            }
            if(isset($paymentType) && $paymentType == 's') {
                $payment = SpecialPayment::where('user_id',$paymentUserId)->where('payment_token',$paymentToken)->first();
                $payment->transaction_id       = $result->id;
                $payment->membership_period_id = $membershipPeriod->id;
                $payment->price                = $membershipPeriod->price;
                $payment->save();
            } else {
               $payment = new Payment;
                $payment->user_id              = \Auth::user()->id;
                $payment->transaction_id       = $result->id;
                $payment->membership_period_id = $membershipPeriod->id;
                $payment->price                = $membershipPeriod->price;
                $payment->save(); 
            }
            

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

    /**for preparing audition data
    public static function actorRoleShow($data){
        if($data->count() > 0){
            $prep = $data->implode('roles_chosen');
            $prep .= $data->implode('show');
        }else{
            $prep = "";
        }
        return $prep;
    }**/

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
        if(\Auth::check()){
            if((\Auth::user()->payment_status==1)||(\Auth::user()->role == 'admin')) {
                $actors = \App\User::join('actors', 'actors.user_id', '=', 'users.id');
                $actors = $actors->with('actors_roles');
                $actors = $actors->where('users.payment_status', 1)->whereNotNull('actors.photo_path')->orderBy('actors.first_name', 'asc')->get();
                
                foreach($actors as $actor) {
                    $roles        = "";
                    $show         = "";
                    $userRole     = "";
                    $userShow     = "";
                    if(isset($actor['actors_roles']) && count($actor['actors_roles']) > 0) {                            
                        foreach($actor['actors_roles'] as $actors_roles) {
                            $roles .= $actors_roles['roles_chosen'].',';
                            $show  .= $actors_roles['show'].',';
                        }
                        $userRole = rtrim($roles,', ');
                        $userShow = rtrim($show,', ');
                    }
                    
                    $actorList[] = array('user_id'              => $actor['user_id'],
                                         'email'                => $actor['email'],
                                         'first_name'           => $actor['first_name'],
                                         'last_name'            => $actor['last_name'],
                                         'auditionType'         => $actor['auditionType'],
                                         'from'                 => $actor['from'],
                                         'to'                   => $actor['to'],
                                         'ethnicity'            => $actor['ethnicity'],
                                         'gender'               => $actor['gender'],
                                         'vocalRange'           => $actor['vocalRange'],
                                         'feet'                 => $actor['feet'],
                                         'hair'                 => $actor['hair'],
                                         'eyes'                 => $actor['eyes'],
                                         'photo_path'           => $actor['photo_path'],
                                         'photo_url'            => $actor['photo_url'],
                                         'weight'               => $actor['weight'],
                                         'school'               => $actor['school'],
                                         'payment_status'       => $actor['payment_status'],
                                         'verified'             => $actor['verified'],
                                         'misc'                 => $actor['misc'],
                                         'technical'            => $actor['technical'],
                                         'dance'                => $actor['dance'],
                                         'jobType'              => $actor['jobType'],
                                         'instrument'           => $actor['instrument'],
                                         'roles'                => $userRole,
                                         'show'                 => $userShow,
                                         'dance_experince'      => $actor['dance_experince'],
                                         'instrument_experince' => $actor['instrument_experince'],
                                    );
                }
                
                return view('actor.actorSearch')->with([
                    'actorList'     => $actorList,
                    'actoractive'   => 'active'
                ]);
            }else{
                return redirect()->route('getIndex')->with('error_message', 'You must have a paid subscription');
            }
        }
        else{
            return redirect()->route('getIndex')->with('error_message', 'Not Authorised!!!!!');
        }
    }


    public function actorPhotoDelete(){
        $actor = Actor::where('user_id', \Auth::User()->id)->first();
        unlink(public_path().'/'.$actor->precrop_path);
        unlink(public_path().'/'.$actor->photo_path);
        $actor->precrop_url = null;
        $actor->precrop_path = null;
        $actor->photo_path = null;
        $actor->photo_url = null;

        if($actor->update()){
            return redirect()->back()->with('success_message', 'Picture successfully deleted.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not deleted. Try again!');
        }
    }

    /** View user */
    public function view($id){
        $actor = User::findOrFail($id);
        $time = $actor->actor->adminAudition_time;
        $actualTime = "";
        if($time != ""){
            $ampmTime = Carbon::parse($time);
            $actualTime = $ampmTime->format('g:i A');
        }
        $actor_inside = Actor::where('user_id',$id)->get();
        if($actor->payment_status == 1 && $actor_inside[0]['first_name'] != NULL && $actor_inside[0]['last_name']!= NULL && $actor_inside[0]['photo_path']!= NULL)
        {
            $actor_role = ActorRole::where('user_id', $id)->orderBy('id', 'asc')->get();

            return view('actor.profileView')->with([
                'actor'=> $actor,
                'actor_role' => $actor_role,
                'time' => $actualTime!="" ? $actualTime : ""
            ]);
        }
        else
        {
            return redirect()->back()->with('error_message','Sorry Actor Profile is incomplete');
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
                'photo.dimensions'=>'Your photo must be less than 600px wide'
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

        $destinationPath = 'assets/photos/actor'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "bmp") {
            $fileName = trim(\Auth::user()->name) . rand(11111, 99999) . '.' . $extension; // renameing image
            $file->move(public_path($destinationPath), $fileName);


            $actor->precrop_path = $destinationPath . '/' . $fileName;
            $actor->precrop_url = $destinationPath . '/' . $fileName;

            if (\Auth::user()->Actor) {

                if ($actor->update()) {
                    return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive', 'active');
                } else {
                    return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
                }

            } else {
                $actor->user_id = \Auth::user()->id;
                if ($actor->save()) {
                    return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive', 'active');
                } else {
                    return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
                }

            }


        }
        else{
            return redirect()->back()->with('error_message', 'Supported File types .jpg, .png, .bmp only!');
        }
    }

    public function actoraudifields(Request $request)
    {
        $data = AuditionExtra::updateorcreate(
            [
                'user_id' => \Auth::user()->id
            ],
            [
                'last_audition_year' => $request->last_audition_year,
                'last_audition_two' => $request->last_audition_two,
                'last_year_year' => $request->last_year_year,
                'audition_last_apply' => $request->audition_last_apply,
                'summer_stock_last_year' => $request->summer_stock_last_year,
                'where_place' => $request->where_place,
                'unpaid_apprentice' => $request->unpaid_apprentice,
                'internship' => $request->internship,
                'standby_appointment' => $request->standby_appointment,
                'emca' => $request->emca,
                'sag' => $request->sag,
                'aftra' => $request->aftra,
                'agva' => $request->agva,
                'agma' => $request->agma,
                'friday_m' => $request->friday_m,
                'friday_af' => $request->friday_af,
                'saturday_m' => $request->saturday_m,
                'saturday_af' => $request->saturday_af,
                'sunday_m' => $request->sunday_m,
                'sunday_af' => $request->sunday_af,
            ]);
        return redirect()->back()->with('success_message','Record Added');
    }

    public function postCropPhotoUpdate(Request $request){
        $targ_w = $targ_h = 230;
        $jpeg_quality = 90;
        $src = \Auth::user()->actor->precrop_url;
        //dd($src);
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

        $destinationPath = 'files/profiles/actor'; // upload path

        $fileName = trim(\Auth::user()->name).rand(11111,99999).'.jpg'; // renameing image
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
        $actor->photo_path = null;
        $actor->photo_url = null;
        if($actor->update()){
            return redirect()->back()->with('success_message', 'Picture successfully deleted.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not deleted. Try again!');
        }
    }

    public function preview(){
        $actor = \App\Actor::where('user_id', \Auth::user()->id)->get();
        $audition_extra = AuditionExtra::where('user_id', \Auth::user()->id)->get();
        $email = \Auth::user()->email;
        return view('pdf.printapppreview')->with(['actor' => $actor, 'ae' => $audition_extra, 'email' => $email]);
    }

    public function pdf()
    {
        $actor = \App\Actor::where('user_id', \Auth::user()->id)->get();
        $audition_extra = AuditionExtra::where('user_id', \Auth::user()->id)->get();
        $email = \Auth::user()->email;
        $pdf = PDF::loadView('pdf.printapp', ['actor' => $actor, 'ae' => $audition_extra, 'email' => $email]);
        //return $pdf->stream('pdf.invoice');
        return $pdf->download('test.pdf');
    }


}