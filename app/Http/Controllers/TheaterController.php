<?php

namespace App\Http\Controllers;

use App\Theater;
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
use App\SpecialPayment;


class TheaterController extends Controller
{
    public function getProfile(){
        $verify = '';
        if(\Auth::user()->verified == 1){
            $verify = 1;
        }else{
            $verify = 0;
        }
        return view('theater.dashboard')->with([
            'verify' => $verify
        ]);
    }

    public function mail()
    {
        $user = \Auth::user();
        dispatch(new SendVerificationMail($user));
        return redirect()->route('theater::theaterProfile')->with('success_message', 'Mail Sent Successfully');
    }

    protected function products()
    {
        $products = Product::latest()->where('status',1)->orderBy('id', 'desc')->get();
        $states = $this->getStateWithSelected();
        return view("theater.products",compact('products'))->with(['states' => $states]);
    }

    public function productBuy(Request $request)
    {
        $description = "Products Invoice: ";
        $totalPrice = 0;
        $size = sizeof($request->products);
        if($size)
        {
            $totalPric = [];
            foreach($request->products as $prod){
                $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';
                if($proid && $varid) {
                    $product = Product::findOrFail($proid);
                    $varient = ProductVariant::findorFail($varid);
                    $productPrice = (!empty($prod['price'])) ? $prod['price'] : 1 * $varient['price'];
                    $totalPric[] = (!empty($prod['price'])) ? $prod['price'] : 1 * $varient['price'];
                    //$totalPrice = $totalPrice + $productPrice;
                    //dd($totalPrice.' '.$prod['price'].' '.$varient['price']);
                    // $tp[] = $totalPrice;
                    $description .= "\nProduct: " . $product->name . " Price: " . $prod['price'] * $varient['price'];
                }
            }

        }
        $tp = array_sum($totalPric);
        $totalPrice = ($totalPrice + $tp)*100;
        \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']);
        $result = \Stripe\Charge::create(array(
            "amount" => $totalPrice,
            "currency" => "usd",
            "receipt_email" => \Auth::user()->email,
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
                    $prodpricecount = (!empty($prod['price'])) ? $prod['price'] : 1;
                    $varientcountprice = (!empty($varient['price'])) ? $prodpricecount * $varient['price'] : '0';
                    $payment = new Payment;
                    $payment->user_id = \Auth::user()->id;
                    $payment->transaction_id = $result->id;
                    $payment->product_id = $product->id;
                    $payment->varient_id = $varient->id;
                    $payment->price = $varientcountprice; //$prod['price'] * $varient['price'];
                    $payment->save();
                }
            }
            return redirect()->route('theater::theaterProfile')->with('success_message', 'Successfully bought products.');
        }

    }

    public function edit()
    {
        $theaterid = \Auth::user()->id;
        $theater = Theater::where('user_id',$theaterid)->get();
        return view('theater.editprofile')->with(['theater'=>$theater]);
    }

    public function update(Request $request)
    {
        $validator = \Validator::make($request->all(),[]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }

        if($request->tes == "PUT"){
            $theater = Theater::where('user_id',\Auth::user()->id)->first();
        }else{
            $theater = new Theater;
        }

        $id = \Auth::user()->id;
        $user = User::findorfail($id);
        $user->name = $request->get('display_name');
        $user->save();

        $theater->user_id = $id;
        $theater->company_name = $request->company_name;
        $theater->email = $request->email;
        $theater->contact_number = $request->contact_number;
        $theater->website = $request->website;
        $theater->company_description = $request->company_description;
        $theater->mailing = $request->mailing;
        $theater->telephone = $request->telephone;
        $theater->fax = $request->fax;
        $theater->zipcode = $request->zipcode;
        $theater->non_musical_yes = $request->non_musical_yes;
        $theater->non_musical_no = $request->non_musical_no;
        $theater->non_musical_not_certain = $request->non_musical_not_certain;
        $theater->dancers_yes = $request->dancers_yes;
        $theater->dancers_no = $request->dancers_no;
        $theater->dancers_not_certain = $request->dancers_not_certain;
        $theater->friday = $request->friday;
        $theater->saturday = $request->saturday;
        $theater->sunday = $request->sunday;
        $theater->accompanist = $request->accompanist;
        $theater->administration = $request->administration;
        $theater->box_office = $request->box_office;
        $theater->carpentry = $request->carpentry;
        $theater->choreographer = $request->choreographer;
        $theater->costume_design = $request->costume_design;
        $theater->director = $request->director;
        $theater->electrics = $request->electrics;
        $theater->graphics = $request->graphics;
        $theater->house = $request->house;
        $theater->light_ops = $request->light_ops;
        $theater->makeup_wig_design = $request->makeup_wig_design;
        $theater->music_director = $request->music_director;
        $theater->paint_charge = $request->paint_charge;
        $theater->photography = $request->photography;
        $theater->pit_musician = $request->pit_musician;
        $theater->properties = $request->properties;
        $theater->publicity = $request->publicity;
        $theater->running_crew = $request->running_crew;
        $theater->scenic_artist = $request->scenic_artist;
        $theater->set_design = $request->set_design;
        $theater->sewing_wardrobe = $request->sewing_wardrobe;
        $theater->sound = $request->sound;
        $theater->state_management = $request->state_management;
        $theater->technical_direction = $request->technical_direction;
        $theater->video = $request->video;
        $theater->name_table_1 = $request->name_table_1;
        $theater->title_table_1 = $request->title_table_1;
        $theater->name_table_2 = $request->name_table_2;
        $theater->title_table_2 = $request->title_table_2;
        $theater->aea_contract = $request->aea_contract;
        $theater->email_videos = $request->email_videos;

        if($request->tes == "PUT"){
            if($theater->update()){
                return redirect()->back()->with('success_message', 'Profile Data Successfully Updated');
            }
        }else{
            if($theater->save()){
                return redirect()->route('actor::actorProfile')->with('success_message', 'Profile Data Successfully Created');
            }
        }
    }

    public function theaterPhotoDelete()
    {
        $theater = Theater::where('user_id', \Auth::User()->id)->first();
        unlink(public_path().'/'.$theater->precrop_path);
        unlink(public_path().'/'.$theater->photo_path);
        $theater->precrop_url = null;
        $theater->precrop_path = null;
        $theater->photo_url = null;
        $theater->photo_path = null;
        if($theater->update()){
            return redirect()->back()->with('success_message', 'Picture successfully deleted.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not deleted. Try again!');
        }
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

        $theater_info = Theater::where('user_id',\Auth::user()->id)->get();

        if(!empty($theater_info)){
            $theater = Theater::where('user_id',\Auth::user()->id)->first();
        }else{
            $theater = new Theater;
        }

        $destinationPath = 'files/profiles/theater'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "bmp") {
            $fileName = \Auth::user()->name . rand(11111, 99999) . '.' . $extension; // renameing image
            $file->move(public_path($destinationPath), $fileName);


            $theater->precrop_path = $destinationPath . '/' . $fileName;
            $theater->precrop_url = $destinationPath . '/' . $fileName;

            if (!empty($theater_info)) {

                if ($theater->update()) {
                    return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive', 'active');
                } else {
                    return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
                }

            } else {
                $theater->user_id = \Auth::user()->id;
                if ($theater->save()) {
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

    public function postCropPhotoUpdate(Request $request)
    {
        $targ_w = $targ_h = 230;
        $jpeg_quality = 90;
        $theater_info = Theater::where('user_id',\Auth::user()->id)->get();
        $src = $theater_info[0]['precrop_url'];

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



        $theater = Theater::where('user_id', \Auth::user()->id)->first();

        $destinationPath = 'files/profiles/theater'; // upload path

        $fileName = \Auth::user()->name.rand(11111,99999).'.jpg'; // renameing image
        $originalPath = $destinationPath.'/'.$fileName;

        $theater->photo_path = $originalPath;
        $theater->photo_url = $originalPath;
        header('Content-type: image/jpeg');
        imagejpeg($dst_r,public_path().'/'.$originalPath,$jpeg_quality);
        if($theater->update()){
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
            return redirect()->route('theater::theaterProfile')->with('success_message', 'Already Subscribed');
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

            $membershipPeriods = MembershipPeriod::latest()->where('type','Theater')->where('status',1);
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
            return view('theater.payment')->with(['products'=>$products,'membershipPeriods' => $membershipPeriods, 'states' => $states]);
        }
    }

    public function paymentStore(Request $request)
    {
        $request->all();
        $validator = \Validator::make($request->all(),
            [
                'subscription' => "required",
            ]
        );
        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        $description = "";
        $totalPrice = 0;
        $membershipPeriod = MembershipPeriod::findOrFail($request->subscription);
        $totalPrice = $totalPrice + $membershipPeriod->price;
        $description.= "StrawHat Subscription\nPlan: ".$membershipPeriod->name." Price: ".$membershipPeriod->price;
        $size = sizeof($request->products);

        if($request->products)
        {
            $totalPric = [];
            foreach($request->products AS $prod)
            {
                $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';
                if(!empty($proid && $varid))
                {
                    $product = Product::findOrFail($proid);
                    $varient = ProductVariant::findorFail($varid);
                    $productPrice = (!empty($prod['price'])) ? $prod['price'] : 1 * $varient['price'];
                    $totalPric[] = (!empty($prod['price'])) ? $prod['price'] : 1 * $varient['price'];
                    //$totalPrice = $totalPrice + $productPrice;
                    //dd($totalPrice.' '.$prod['price'].' '.$varient['price']);
                   // $tp[] = $totalPrice;
                    $description.= "\nProduct: ".$product->name." ".$varient['product_variant']." Price: ".$productPrice['price'];
                }

            }

        }
        $tp = array_sum($totalPric);
        $totalPrice = ($totalPrice + $tp)*100;
        \Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']);
        $result = \Stripe\Charge::create(array(
            "amount" => $totalPrice,
            "currency" => "usd",
            "receipt_email" => \Auth::user()->email,
            "source" => $request->token,
            "description" => $description
        ));

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
                $payment->price                = $totalPrice/100;
                $payment->save();
            } else {
               $payment = new Payment;
                $payment->user_id              = \Auth::user()->id;
                $payment->transaction_id       = $result->id;
                $payment->membership_period_id = $membershipPeriod->id;
                $payment->price                = $totalPrice/100;
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
            }else{

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

            if($request->products)
            {
                foreach($request->products AS $prod){
                    $varid = (!empty($prod['varid'])) ? $prod['varid'] : '';
                    $proid = (!empty($prod['proid'])) ? $prod['proid'] : '';

                    if(!empty($varid && $proid)) {
                        $product = Product::findOrFail($proid);
                        $varient = ProductVariant::findOrFail($varid);
                        $prodpricecount = (!empty($prod['price'])) ? $prod['price'] : 1;
                        $varientcountprice = (!empty($varient['price'])) ? $prodpricecount * $varient['price'] : '0';
            }
            return redirect()->route('theater::theaterProfile')->with('success_message', 'Successfully subscribed.');
        }
    }

    public function getTheater()
    {
        if(\Auth::check()){
            if((\Auth::user()->payment_status==1)||(\Auth::user()->role == 'admin')) {
                $theaters = \App\User::join('theaters','theaters.user_id', '=', 'users.id')
                    ->where('users.payment_status',1)->orderBy('theaters.company_name', 'asc')
                    ->get();

                return view('theater.theaterSearch')->with([
                    'theaters'      => $theaters,
                    'theateractive' => 'active'
                ]);
            }
            else{
                return redirect()->route('getStaticPage',['slug' => 'theater'])->with('error_message','Sorry');
            }
        }
        else{
            return redirect()->route('getIndex')->with('error_message','Not Authorised!!!');
        }
    }
    /**for preparing data**/
    public static function prepareData($data)
    {
        if($data){
            $removeWhitespace = preg_replace('/\s+/', '', $data);
            $removeComma = str_replace(',', ' ', $removeWhitespace);
            return $removeComma.' ';
        }else{
            return " ";
        }

    }

    public function view($id)
    {
        $theater = User::findorfail($id);
        return view('theater.profileView')->with([
            'theater'=>$theater,
        ]);
    }
}