<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;
use App\Product;
use App\ProductVariant;
use Stripe\Stripe as Stripe;
use \Stripe\Plan as StripePlan;
use App\User;
use App\Membership;
use App\MembershipPeriod;
use App\Payment;
use App\SubscriptionPackage;
use Validator;
use Carbon\Carbon;
use App\ActorRole;



class StaffController extends Controller
{
    public function getProfile(){

        $verify = '';
        if(\Auth::user()->verified == 1)
        {
            $verify = 1;
        }
        else
        {
            $verify = 0;
        }
        $act = ActorRole::where('user_id',\Auth::user()->id)->first();
        return view('staff.dashboard')->with([
            'verify' => $verify,
            'staff_roles' => $act
        ]);
    }

    public function mail()
    {
        $user = \Auth::user();
        dispatch(new SendVerificationMail($user));
        return redirect()->route('staff::staffProfile')->with('success_message', 'Mail Sent Successfully');
    }

    protected function products()
    {
        $products = Product::latest()->orderBy('id', 'desc')->get();
        return view("staff.products",compact('products'));
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
        \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']);
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
            return redirect()->route('staff::staffProfile')->with('success_message', 'Successfully bought products.');
        }

    }
    
   

    public function edit(){
        $staffid = \Auth::user()->id;
        $staff = Staff::where('user_id',$staffid)->get();
        $roles = ActorRole::where('user_id',$staffid)->get();
        return view('staff.editprofile')->with([
            'staff'=>$staff,
            'roles'=>$roles
        ]);
    }

    public function update(Request $request)
    {
        /*$validator = \Validator::make($request->all(),
            [
            ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }*/
        if($request->tes == "PUT"){
            $staff = Staff::where('user_id',\Auth::user()->id)->first();
        }
        else
        {
            $staff = new Staff;
        }

        $from_date = Carbon::createFromFormat('d/m/Y', $request->from)->toDateString();
        $to_date = Carbon::createFromFormat('d/m/Y', $request->to)->toDateString();

        $id = \Auth::user()->id;
        $user = User::findorfail($id);
        $user->name = $request->get('display_name');
        $user->save();

        $staff->user_id = $id;
        $staff->email = $request->email;
        $staff->from = $from_date;
        $staff->to = $to_date;
        $staff->primary_sought = $request->primary_sought;
        $staff->secondary_sought = $request->secondary_sought;
        $staff->age_twenty_one = $request->age_twenty_one;
        $staff->job_in = $request->job_in;
        $staff->accompanist = $request->accompanist;
        $staff->administration = $request->administration;
        $staff->box_office = $request->box_office;
        $staff->carpentry = $request->carpentry;
        $staff->choreography = $request->choreography;
        $staff->costume_design = $request->costume_design;
        $staff->sewing = $request->sewing;
        $staff->technical_director = $request->technical_director;
        $staff->graphics = $request->graphics;
        $staff->house_management = $request->house_management;
        $staff->lighting_design = $request->lighting_design;
        $staff->electrics = $request->electrics;
        $staff->director = $request->director;
        $staff->musical_director = $request->musical_director;
        $staff->photography = $request->photography;
        $staff->video = $request->video;
        $staff->props = $request->props;
        $staff->publicity = $request->publicity;
        $staff->running_crew = $request->running_crew;
        $staff->scenic_artist = $request->scenic_artist;
        $staff->set_design = $request->set_design;
        $staff->sound = $request->sound;
        $staff->state_management = $request->state_management;
        $staff->company_management = $request->company_management;
        $staff->phone_number = $request->phone_number;
        if($request->hasFile('resume')) {
            $this->uploadResume($staff,$request->file('resume'), $request->get('name'));
        }
        if($request->tes == "PUT"){
            if($staff->update()){
                return redirect()->back()->with('success_message', 'Profile Data Successfully Updated');
            }
        }else{
            if($staff->save()){
                return redirect()->route('actor::actorProfile')->with('success_message', 'Profile Data Successfully Created');
            }
        }
    }

    public function staffroles(Request $request)
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

        return redirect()->route('staff::staffProfile')->with('success_message', 'user roles Successfully Created');

    }

    public function updatePortfolio(Request $request)
    {


        $staff = Staff::where('user_id', \Auth::user()->id)->first();

        $staff->portfolio = $request->portfolio;
        $staff->update();
        return redirect()->back()->with('success_message', 'Portfolio Successfully Updated');

    }

    public function uploadResume($staff,$file, $name){
        $destinationPath = 'files/resumes/staff'; // upload path
        $extension = $file->getClientOriginalExtension();
        $fileName = $name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);
        $staff->resume_path = $destinationPath.'/'.$fileName;
    }

    public function getStaff(){
        if(\Auth::check()){

        if(\Auth::user()->payment_status==1)
        {
        $staffs = \App\User::join('staff','staff.user_id', '=', 'users.id')
            ->where('payment_status',1)->orderBy('name', 'asc')
            ->get();
        return view('staff.staffsearch')->with([
            'staffs'=>$staffs,
            'staffactive' => 'active'
        ]);
            }
        }
        else{
            return redirect()->route('getIndex')->with('error_message','Not Authorised!!!!');
        }
    }

    public function staffPhotoDelete(){
        $staff = Staff::where('user_id', \Auth::User()->id)->first();
        unlink(public_path().'/'.$staff->precrop_path);
        $staff->precrop_url = null;
        $staff->precrop_path = null;
        $staff->photo_path = null;
        $staff->photo_url = null;
        if($staff->update()){
            return redirect()->back()->with('success_message', 'Picture successfully deleted.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not deleted. Try again!');
        }
    }

    public function view($id)
    {
        $staff = User::findorfail($id);
        $roles = ActorRole::where('user_id', $id)->get();
        return view('staff.profileView')->with([
            'staff'=>$staff,
            'roles'=>$roles
        ]);
    }


    public function postPhotoUpdate(Request $request)
    {
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

        $staff_info = Staff::where('user_id',\Auth::user()->id)->get();

        if(!empty($staff_info)){
            $staff = Staff::where('user_id',\Auth::user()->id)->first();
        }else{
            $staff = new Staff;
        }

        $destinationPath = 'files/profiles/staff'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = \Auth::user()->name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);


        $staff->precrop_path = $destinationPath.'/'.$fileName;
        $staff->precrop_url = $destinationPath.'/'.$fileName;

        if(!empty($staff_info)){

            if($staff->update()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }

        }else{
            $staff->user_id = \Auth::user()->id;
            if($staff->save()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }

        }
    }

    public function postCropPhotoUpdate(Request $request){
        $targ_w = $targ_h = 230;
        $jpeg_quality = 90;
        $staff_info = Staff::where('user_id',\Auth::user()->id)->get();
        $src = $staff_info[0]['precrop_url'];

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



        $staff = Staff::where('user_id', \Auth::user()->id)->first();

        $destinationPath = 'files/profiles/staff'; // upload path

        $fileName = \Auth::user()->name.rand(11111,99999).'.jpg'; // renameing image
        $originalPath = $destinationPath.'/'.$fileName;

        $staff->photo_path = $originalPath;
        $staff->photo_url = $originalPath;
        header('Content-type: image/jpeg');
        imagejpeg($dst_r,public_path().'/'.$originalPath,$jpeg_quality);
        if($staff->update()){
            return redirect()->back()->with('success_message', 'Profile picture successfully updated.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not uploaded. Try again!');
        }

    }

    public function postEditPassword(Request $request)
    {
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
        }
        else
        {
            return redirect()->back()->with('error_message', 'Incorrect password! Please enter correct password.');
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

    public function payment()
    {

        $user = User::find(\Auth::user()->id);
        if($user->subscribed('main'))
        {
            return redirect()->route('staff::staffProfile')->with('success_message', 'Already Subscribed');
        }
        else
        {
            $membershipPeriods = MembershipPeriod::latest()->where('type','Staff')->where('status',1)->orderBy('id', 'desc')->get();
            $products = Product::orderBy('id', 'desc')->get();
            //$products = Product::findorfail(2);
            //$n = $products->product_variant;
            //dd($n);
            $states = $this->getStateWithSelected();
            return view('staff.payment')->with(['products'=>$products,'membershipPeriods' => $membershipPeriods, 'states' => $states]);
        }
    }

    public function paymentStore(Request $request){
        $request->all();

        $validator = Validator::make($request->all(), [
            'subscription' => "required",
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

       // $description = "";
        //$totalPrice = 0;
        $membershipPeriod = MembershipPeriod::findOrFail($request->subscription);
        //$totalPrice = $totalPrice + $membershipPeriod->price;
        //$description.= "StrawHat Subscription\nPlan: ".$membershipPeriod->name." Price: ".$membershipPeriod->price;
        /*$size = sizeof($request->products);

        if($request->products)
        {
            foreach($request->products AS $prod)
            {
                $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';
                if(!empty($proid && $varid))
                {
                    $product = Product::findOrFail($proid);
                    $varient = ProductVariant::findorFail($varid);
                    $totalPrice = $totalPrice + $varient['price'];
                    $description.= "\nProduct: ".$product->name." ".$varient['product_variant']." Price: ".$varient['price'];
                }
            }
        }*/

       /* $totalPrice = $totalPrice*100;
        \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']);
        $result = \Stripe\Charge::create(array(
            "amount" => $totalPrice,
            "currency" => "usd",
            "receipt_email" => \Auth::user()->email,
            "source" => $request->token,
            "description" => $description
        ));*/

            $memb = Membership::where('user_id',\Auth::user()->id)->first();
            if(count($memb))
            {
                $memb->membership_period_id = $membershipPeriod->id;
                $memb->update();
            }
            else
                {
                    $membership = new Membership;
                    $membership->membership_period_id = $membershipPeriod->id;
                    $membership->user_id = \Auth::user()->id;
                    $membership->save();
                }

            //save the payment details for subscription
           /* $payment = new Payment;
            $payment->user_id = \Auth::user()->id;
            $payment->transaction_id = $result->id;
            $payment->membership_period_id = $membershipPeriod->id;
            $payment->price = $membershipPeriod->price;
            $payment->save(); */

            //subscription table
            $subes = SubscriptionPackage::where('user_id',\Auth::user()->id)->get();

            if(isset($subes[0])) {
                $sub = SubscriptionPackage::findorFail($subes[0]->id);

                if (!empty($sub)) {
                    $sub->name = $membershipPeriod->name;
                    $sub->stripe_id = "due to staff";
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
                $stripe_sub->stripe_id = "due to staff";
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

          /*  if($request->products)
            {
                foreach($request->products AS $prod){
                    $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                    $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';

                    if(!empty($varid && $proid)) {
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
            return redirect()->route('staff::staffProfile')->with('success_message', 'Successfully subscribed.');

    }
    /*public function staffoaddownl($id){
        $user = User::Findorfail($id);
        $file_path = asset($user->staff->resume_path);
        $headers = ['Content-Type: application/pdf'];
        $newName = 'resumedownload'.time().'.pdf';

        return response()->download($file_path, $newName, $headers);
    }*/


}
