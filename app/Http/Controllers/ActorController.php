<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe as Stripe;
use \Stripe\Plan as StripePlan;
use App\User;
use App\Product;
use App\Membership;
use App\MembershipPeriod;
use App\Payment;

class ActorController extends Controller
{
    /**
    \Get Function For Actor
    \Server Dashboard 
    */
    public function index(){
        if(\Auth::user()->actor && \Auth::user()->subscription){
            return redirect()->route('actor::getEditProfile');
        }
    	return view('actor.dashboard');
    }
	
	public function products(){
		$products = Product::latest()->orderBy('id', 'desc')->get();
		return view("actor.products",compact('products'));
    }
	
	public function productBuy(Request $request){
		$description = "Products Invoice: ";
		$totalPrice = 0;
		$size = sizeof($request->products);
		for($i=0; $i<$size; $i++){
			$product = Product::findOrFail($request->products[$i]);
			$totalPrice = $totalPrice + $product->price;
			$description.= "\nProduct: ".$product->name." Price: ".$product->price;
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
			for($i=0; $i<$size; $i++){
				$product = Product::findOrFail($request->products[$i]);
				$payment = new Payment;
				$payment->user_id = \Auth::user()->id;
				$payment->transaction_id = $request->token;
				$payment->product_id = $product->id;
				$payment->price = $product->price;
				$payment->save();
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

    /**
    * TODO : Dummy payment just chaning payment status for now
    * Will update with proper payment system in future
    */
    public function payment(){
		$user = User::find(\Auth::user()->id);
		if($user->subscribed('main')){
			return redirect()->route('actor::actorProfile')->with('success_message', 'Already Subscribed');
		}else{
			$membershipPeriods = MembershipPeriod::latest()->orderBy('id', 'desc')->get();
			$products = Product::latest()->orderBy('id', 'desc')->get();
			return view('actor.payment')->with('products',$products)->with('membershipPeriods',$membershipPeriods);
		}
		
    }
	
	public function paymentStore(Request $request){
		$request->all();
		$description = "";
		$totalPrice = 0;
		$membershipPeriod = MembershipPeriod::findOrFail($request->subscription);
		$totalPrice = $totalPrice + $membershipPeriod->price;
		$description.= "StrawHat Subscription\nPlan: ".$membershipPeriod->name." Price: ".$membershipPeriod->price;
		$size = sizeof($request->products);
		for($i=0; $i<$size; $i++){
			$product = Product::findOrFail($request->products[$i]);
			$totalPrice = $totalPrice + $product->price;
			$description.= "\nProduct: ".$product->name." Price: ".$product->price;
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
			
			for($i=0; $i<$size; $i++){
				$product = Product::findOrFail($request->products[$i]);
				$payment = new Payment;
				$payment->user_id = \Auth::user()->id;
				$payment->transaction_id = $request->token;
				$payment->product_id = $product->id;
				$payment->price = $product->price;
				$payment->save();
			}
			return redirect()->route('actor::actorProfile')->with('success_message', 'Successfully subscribed.');
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
        
        $destinationPath = 'assets/photos'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = \Auth::user()->name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);


        $actor->precrop_path = $destinationPath.'/'.$fileName; 
        $actor->precrop_url = $destinationPath.'/'.$fileName; 
        
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
