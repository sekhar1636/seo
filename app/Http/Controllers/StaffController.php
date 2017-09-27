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
        return view('staff.dashboard')->with([
            'verify' => $verify
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
        \Stripe\Stripe::setApiKey("sk_test_qAom6u4p21fG4a6GMn0JrRd3");
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
            return redirect()->route('staff::staffProfile')->with('success_message', 'Successfully bought products.');
        }

    }

    public function edit(){
        $staffid = \Auth::user()->id;
        $staff = Staff::where('user_id',$staffid)->get();
        return view('staff.editprofile')->with(['staff'=>$staff]);
    }

    public function update(Request $request)
    {
        $validator = \Validator::make($request->all(),
            [
            ]);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        if($request->tes == "PUT"){
            $staff = Staff::where('user_id',\Auth::user()->id)->first();
        }
        else
        {
            $staff = new Staff;
        }
        $staff->user_id = \Auth::user()->id;
        $staff->email = $request->email;
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

    public function postPhotoUpdate(Request $request)
    {
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

        $staff_info = Staff::where('user_id',\Auth::user()->id)->get();

        if(!empty($staff_info)){
            $staff = Staff::where('user_id',\Auth::user()->id)->first();
        }else{
            $staff = new Staff;
        }

        $destinationPath = 'assets/photos'; // upload path
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

        $destinationPath = 'assets/photos'; // upload path

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

    public function payment()
    {

        $user = User::find(\Auth::user()->id);
        if($user->subscribed('main'))
        {
            return redirect()->route('staff::staffProfile')->with('success_message', 'Already Subscribed');
        }
        else
        {
            $membershipPeriods = MembershipPeriod::latest()->where('type','Staff')->orderBy('id', 'desc')->get();
            $products = Product::orderBy('id', 'desc')->get();
            //$products = Product::findorfail(2);
            //$n = $products->product_variant;
            //dd($n);
            return view('staff.payment')->with(['products'=>$products,'membershipPeriods' => $membershipPeriods]);
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

        $description = "";
        $totalPrice = 0;
        $membershipPeriod = MembershipPeriod::findOrFail($request->subscription);
        $totalPrice = $totalPrice + $membershipPeriod->price;
        $description.= "StrawHat Subscription\nPlan: ".$membershipPeriod->name." Price: ".$membershipPeriod->price;
        $size = sizeof($request->products);

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
        }

        $totalPrice = $totalPrice*100;
        \Stripe\Stripe::setApiKey("sk_test_qAom6u4p21fG4a6GMn0JrRd3");
        $result = \Stripe\Charge::create(array(
            "amount" => $totalPrice,
            "currency" => "usd",
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

            if($request->products)
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
            }
            return redirect()->route('staff::staffProfile')->with('success_message', 'Successfully subscribed.');
        }
    }

}
