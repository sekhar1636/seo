<?php

namespace App\Http\Controllers;

use App\Actor;
use App\Audition;
use App\Membership;
use App\ProductVariant;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Stripe\Stripe as Stripe;
use \Stripe\Plan as StripePlan;
use Stripe\Error\Card;
use Carbon\Carbon;
use DB;
use App\StaticPage;
use App\Faq;
use App\User;
use App\Slideshow;
use App\Slide;
use App\ContentPage;
use App\Product;
use App\MembershipPeriod;
use App\Payment;

class AdminController extends Controller
{
    public function index(){
    	return view("admin.index");
    }//end function
	
	//======================================================================
	// FAQ Functions
	//======================================================================
	
	public function faq(){
    	return view("admin.faq");
    }
	
	public function faqStore(Request $request){
    	$validator = \Validator::make($request->all(),
            [
                "question"=>"required|min:3",
                '_type' => "required",
				'answer' => "required|min:20"
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
				->with('tabactive', 'active')
                ->withInput();
        }else{
			//save faq
			Faq::create(request(['question','answer','_type']));
			return redirect()->back()->with('success_message', 'FAQ added successfully.');
		}
    }
	
	public function faqDataTable(){
		// Using Eloquent
		//return Datatables::eloquent(Faq::query())->make(true);
		$faqs = Faq::latest()->orderBy('id', 'desc');
		return Datatables::of($faqs)
            ->addColumn('action', function ($faq) {
                $action = '<a href="'.route('admin::adminFaqEdit', $faq->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
				$action.= '<a href="'.route('admin::adminFaqDelete', $faq->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				return $action;
            })->make(true);
    	
    }
	
	public function faqDestroy($id){
    	Faq::where('id',$id)->delete();
		return redirect()->back()->with('success_message', 'FAQ deleted successfully.');
	}
	
	public function faqEdit($id){
		
		$faq = Faq::findOrFail($id);
		return view('admin.faqEdit',compact('faq'));
    }
	
	public function faqUpdate(Request $request, $id){
		$validator = \Validator::make($request->all(),
            [
                "question"=>"required|min:3",
                '_type' => "required",
				'answer' => "required|min:20"
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
			$faq = Faq::findOrFail($id);
			$faq->question = $request['question'];
			$faq->answer = $request['answer'];
			$faq->_type = $request['_type'];
			$faq->save();
			return redirect()->route('admin::adminFaq')->with('success_message', 'FAQ edited successfully.');
		}
    }
	
	//======================================================================
	// Slideshow Functions
	//======================================================================
	
	public function slideshows(){
    	return view("admin.slideshows");
    }
	
	public function slideshowStore(Request $request){
    	$validator = \Validator::make($request->all(),
            [
                "name"=>"required|min:5",
                'status' => "required",
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
				->with('tabactive', 'active')
                ->withInput();
        }else{
			//save Slideshow
			Slideshow::create(request(['name','status']));
			return redirect()->back()->with('success_message', 'Slideshow added successfully.');
		}
    }
	
	public function slideshowDataTable(){
		$slideshows = Slideshow::latest()->orderBy('id', 'desc');
		return Datatables::of($slideshows)
            ->addColumn('action', function ($slideshow) {
				$action = "";
				if($slideshow->status<2){
				$action.= '<a href="'.route('admin::adminSlideshowEdit', $slideshow->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
				$action.= '<a href="'.route('admin::adminSlideshowDelete', $slideshow->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				}
				$action.= '<a href="'.route('admin::adminSlideshowAddSlide', $slideshow->id).'" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-plus"></i> Add Slide</a>';
				return $action;
            })
			->addColumn('details_url', function($slideshow) {
            	return route('admin::adminSlideshowSlidesDataTable',$slideshow->id);
        	})
			->editColumn('status', function ($slideshow) {
                return ($slideshow->status)? "Active" : "De-Activated";
            })
			->make(true);
    	
    }
	
	public function slideshowDestroy($id){
    	Slideshow::where('id',$id)->delete();
		return redirect()->back()->with('success_message', 'Slideshow deleted successfully.');
	}
	
	public function slideshowEdit($id){
		
		$slideshow = Slideshow::findOrFail($id);
		return view('admin.slideshowEdit',compact('slideshow'));
    }
	
	public function slideshowUpdate(Request $request, $id){
		$validator = \Validator::make($request->all(),
			[
				 "name"=>"required|min:5",
				 'status' => "required",
			]
		);
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
			
			$slideshow = Slideshow::findOrFail($id);
			$slideshow->name = $request['name'];
			$slideshow->status = $request['status'];
			$slideshow->save();
			return redirect()->route('admin::adminSlideshows')->with('success_message', 'Slideshow edited successfully.');
		}
    }
	
	public function slideshowAddSlide($id){
		$id = $id;
    	return view("admin.slideAdd",compact('id'));
    }
	
	public function slideshowStoreSlide(Request $request, $id){
		$validator = \Validator::make($request->all(),
            [
                "slide"=>"required|image"
            ]
        );
         if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput()
                ->with('tabactive', 'active');
        }else{
			$destinationPath = 'assets/slides'; // upload path
			$file = $request->file('slide');
			$extension = $file->getClientOriginalExtension();
			$fileName = "slideshow_".$id."_".time().'.'.$extension; // renameing image
			$file->move(public_path($destinationPath), $fileName);
		
			$slide = new Slide;
			$slide->slideshow_id = $id;
			$slide->title = $request['title'];
			$slide->description = $request['description'];
			$slide->path = $destinationPath.'/'.$fileName;
			$slide->save();
			return redirect()->route('admin::adminSlideshows')->with('success_message', 'Slide added successfully.');
		}
    	
    }
	
	public function slideshowSlidesDataTable($id){
		$slides = Slide::latest()->where("slideshow_id","=",$id)->orderBy('id', 'desc');
		return Datatables::of($slides)
            ->addColumn('action', function ($slide) {  
				$action= '<a href="'.route('admin::adminSlideshowEditSlide', $slide->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
				$action.= '<a href="'.route('admin::adminSlideshowDeleteSlide', $slide->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				
				return $action;
            })
			->addColumn('slide', function ($slide) {  
				return url('/').'/'.$slide->path;
            })
			->make(true);
    }
	
	public function slideshowEditSlide($id){
		$slide = Slide::findOrFail($id);
    	return view("admin.slideEdit",compact('slide'));
    }
	
	public function slideshowUpdateSlide(Request $request, $id){
		$slide = Slide::findOrFail($id);
		if($request->hasFile('slide')) {
           	$destinationPath = 'assets/slides'; // upload path
			$file = $request->file('slide');
			$extension = $file->getClientOriginalExtension();
			$fileName = "slideshow_".$id."_".time().'.'.$extension; // renameing image
			$file->move(public_path($destinationPath), $fileName);
			$slide->path = $destinationPath.'/'.$fileName;
        }
		$slide->title = $request['title'];
		$slide->description = $request['description'];
		$slide->save();
		return redirect()->route('admin::adminSlideshows')->with('success_message', 'Slide Edited successfully.');
    }
	
	public function slideshowDestroySlide($id){
		$slide = Slide::findOrFail($id);
		$slide_path = public_path().'/'.$slide->path;
		unlink($slide_path);
		$slide->delete();
		return redirect()->back()->with('success_message', 'Slide deleted successfully.');	
    }
	
	//======================================================================
	// Users Functions
	//======================================================================
	public function users(){
    	return view("admin.users");
    }
	
	public function userStore(Request $request){
    	$validator = \Validator::make($request->all(),
            [
                'name' => "required|max:60",
				'email' => "required|unique:users,email|email|max:100",
				'password' => "min:6|required|max:15",
				'role' => "required|max:30",
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
				->with('tabactive', 'active')
                ->withInput();
        }else{
			//save faq
			$user = new User;
			$user->name = $request->get('name');
			$user->email = $request->get('email');
			$user->password = bcrypt($request->get('password'));
			$user->role = $request->get('role');
			$user->status = 1;
			$user->save();
			return redirect()->back()->with('success_message', 'User added successfully.');
		}
    }
	
	public function usersDataTable(){
		$users = User::latest()->orderBy('id', 'desc');
		return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $action = '<a href="'.route('admin::adminUserEdit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
				$action.= '<a href="'.route('admin::adminUserDelete', $user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				return $action;
            })
			->editColumn('status', function ($user) {
                return ($user->status)? "Active" : "De-Activated";
            })
			->editColumn('payment_status', function ($user) {
                return ($user->payment_status)? "Yes" : "No";
            })
			->make(true);
    }

    public function actorsDataTable(){

        $users = User::where('role','actor')->orderBy('id', 'desc')->get();

        //$users = DB::table('users')->where('role','actor')->orderBy('id', 'desc')->get();
        $index = 0;
        foreach ($users as $user){
            $users[$index]->subscription = $this->subscriptionStatus($user->id);
            $index++;
        }


        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $action = '<a href="'.route('admin::adminUserEdit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $action.= '<a href="'.route('admin::adminUserDelete', $user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $action;
            })
            ->editColumn('status', function ($user) {
                return ($user->status)? "Active" : "De-Activated";
            })
            ->editColumn('payment_status', function ($user) {
                return ($user->payment_status)? "Yes" : "No";
            })
            ->make(true);


    }

    public function subscriptionStatus($id){
        $status = 'Expired';

        $subsciption_expiry = Membership::where('user_id',$id)->get();
        if(count($subsciption_expiry)){
            $subsciption_expiry = MembershipPeriod::where('id',$subsciption_expiry[0]['membership_period_id'])->get();
            $subsciption_expiry = $subsciption_expiry[0]['end_date'];
            if($subsciption_expiry > date('Y-m-d')){
                $status = 'Active';
            }
        } else {
            $status = 'None';
        }

        return $status;
    }

    public function staffDataTable()
    {
        //$users = DB::table('users')->where('role','staff')->orderBy('id', 'desc')->get();
        $users = User::where('role','actor')->orderBy('id', 'desc')->get();

        $index = 0;
        foreach ($users as $user){
            $users[$index]->subscription = $this->subscriptionStatus($user->id);
            $index++;
        }

        return Datatables::of($users)->addColumn('action', function($user){
            $action = '<a href="'.route('admin::adminUserEdit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action.= '<a href="'.route('admin::adminUserDelete', $user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            return $action;
        })->editColumn('status', function ($user) {
            return ($user->status)? "Active" : "De-Activated";
        })->make(true);
    }

    public function theaterDataTable()
    {
        //$users = DB::table('users')->where('role','theater')->orderBy('id', 'desc')->get();
        $users = User::where('role','actor')->orderBy('id', 'desc')->get();

        $index = 0;

        foreach ($users as $user){
            $users[$index]->subscription = $this->subscriptionStatus($user->id);

            $index++;
        }

        return Datatables::of($users)->addColumn('action', function($user){
            $action = '<a href="'.route('admin::adminUserEdit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action.= '<a href="'.route('admin::adminUserDelete', $user->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            return $action;
        })->editColumn('status', function ($user) {
            return ($user->status)? "Active" : "De-Activated";
        })->make(true);
    }

	public function userDestroy($id){
    	$user = User::find($id);
		$user->delete();
		return redirect()->back()->with('success_message', 'User deleted successfully.');
	}
	
	public function userEdit($id){
		for ($i=1; $i <= 100 ; $i++) { 
            $age[$i] = $i;
        }
        for ($i=75; $i <= 400 ; $i++) { 
            $weight[$i] = $i .' lbs';
        }
		
		$user = User::findOrFail($id);

		$subsciption_expiry = Membership::where('user_id',$id)->get();
		if(count($subsciption_expiry)){
            $subsciption_expiry = MembershipPeriod::where('id',$subsciption_expiry[0]['membership_period_id'])->get();
            $subsciption_expiry = $subsciption_expiry[0]['end_date'];
        } else {
		    $subsciption_expiry = '';
        }

		if($user->role == 'actor'){
			//\Stripe\Stripe::setApiKey("sk_test_qAom6u4p21fG4a6GMn0JrRd3");
//			return \Stripe\Charge::all(array("customer"=>"cus_BATTZrHSA1uhHo"));
			return view('admin.actorEdit')->with([
			    'actor' => $user->actor,
                'weight' => $weight,
                'age' => $age,
                'id' => $id,
                'user' => $user,

            ]);
		}
		return view('admin.userEdit',compact('user'))->with('subsciption_expiry',$subsciption_expiry);
    }
	
	public function userPaymentDatatable($id){
		DB::statement(DB::raw('set @rownum=0'));
		$invoices = Payment::where("user_id","=",$id)->selectRaw("@rownum  := @rownum  + 1 AS id,sum(price) as total_price,transaction_id")->groupBy('transaction_id');
		return Datatables::of($invoices)
			->addColumn('details_url', function($invoice) {
            	return route('admin::adminUserTransactionDetails',$invoice->transaction_id);
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
	
	public function userUpdate(Request $request, $id){
		$validator = \Validator::make($request->all(),
            [
                "name"=>"required|min:5",
				'role' => "required",
				'payment_status' => "required",
				'status' => "required"
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
			$user = User::findOrFail($id);
			$user->name = $request['name'];
			$user->role = $request['role'];
			$user->payment_status = $request['payment_status'];
			$user->status = $request['status'];
			$user->save();
			return redirect()->route('admin::adminUsers')->with('success_message', 'User edited successfully.');
		}
    }
	
	public function actorUpdate(Request $request,$id){
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
            $actor = \App\Actor::where('user_id',$id)->first();
        }else{
            $actor = new \App\Actor;
        }
        	
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
                return redirect()->back()->with('success_message', 'Actor Data Successfully Updated');
            }
        }else{
           if($actor->save()){
                 return redirect()->back()->with('success_message', 'Actor Data Successfully Created');
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
	
	public function actorPhotoUpdate(Request $request,$id){
       
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
		
		$user = User::findOrFail($id);
        $actor = $user->actor;
		
		
		if($user->actor){
            $actor = \App\Actor::where('user_id',$id)->first();
        }else{
            $actor = new \App\Actor;
        }
        
        $destinationPath = 'assets/photos'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = $user->name.rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);


        $actor->precrop_path = $destinationPath.'/'.$fileName; 
        $actor->precrop_url = $destinationPath.'/'.$fileName; 
		
		if($user->actor){
            if($actor->update()){
				return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
			}else{
				return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
			}
        }else{
			$actor->user_id = $id;
            if($actor->save()){
				return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
			}else{
				return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
			}
        }
        
        
           
    }
	
	public function actorPhotoDelete($id){
        $actor = \App\Actor::where('user_id', $id)->first(); 
        unlink(public_path().'/'.$actor->precrop_path);
        $actor->precrop_url = null;
        $actor->precrop_path = null;
    
        if($actor->update()){
            return redirect()->back()->with('success_message', 'Picture successfully deleted.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not deleted. Try again!');
        }
    }
	
	public function postCropPhotoUpdate(Request $request, $id){
        $targ_w = $targ_h = 230;
        $jpeg_quality = 90;
		$user = User::findOrFail($id);
        $actor = $user->actor; 
        $src = $actor->precrop_url;
 
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
        
        $destinationPath = 'assets/photos'; // upload path
      
        $fileName = $user->name.rand(11111,99999).'.jpg'; // renameing image
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
	
	//======================================================================
	// Content Pages Functions
	//======================================================================
	
	public function contentPages(){
    	return view("admin.content_pages");
    }
	
    public function contentPagesDataTable(){
            // Using Eloquent
            //return Datatables::eloquent(Faq::query())->make(true);
            $contentPages = StaticPage::latest()->orderBy('id', 'desc');
            return Datatables::of($contentPages)
                ->addColumn('action', function ($contentPage) {
                    $action = '<a href="'.route('admin::staticPageEdit', $contentPage->slug).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                    return $action;
                })->make(true);

    }

	
	public function contentPageEdit($id){
		$contentPage = ContentPage::with('slideshow')->findOrFail($id);
		$slideShows = Slideshow::get();
		//return $slideShows;
    	return view("admin.content_pagesEdit",compact('contentPage','slideShows'));
    }
	
	public function contentPageUpdate(Request $request, $id){
    	$validator = \Validator::make($request->all(),
            [
                "title"=>"required|min:5",
				'description' => "required|min:20",
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
			$contentPage = ContentPage::findOrFail($id);
			$contentPage->title = $request['title'];
			$contentPage->description = $request['description'];
			if(isset($request['slideshow_id'])){
				$contentPage->slideshow_id = $request['slideshow_id'];
			}
			$contentPage->save();
			return redirect()->route('admin::adminContentPages')->with('success_message', 'Page content updated successfully.');
		}
    }
	
	//======================================================================
	// subscriptions Functions
	//======================================================================
	
	public function subscriptions(){
		return view("admin.subscription");
    }
	
	public function subscriptionsDataTable(){
		$membershipPeriods = MembershipPeriod::latest()->orderBy('id', 'desc');
		return Datatables::of($membershipPeriods)
            ->addColumn('status', function ($membershipPeriod) {
                $status = ($membershipPeriod->status)?"Active":"De-Activated";
				return $status;
            })
			->addColumn('action', function ($membershipPeriod) {
                $action = '<a href="'.route('admin::adminSubscriptionEdit', $membershipPeriod->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
				return $action;
            })
			->make(true);
    }
		
	public function subscriptionStorePlan(Request $request){
		//return $request->all();
		$validator = \Validator::make($request->all(),
            [
                "price"=>"required",
				'start_date' => "required",
				'end_date' => "required",
                'type' => "required",
				'name' => "required",
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
			
			$membershipPeriod = new MembershipPeriod;
			$membershipPeriod->name = $request->get('name');
			$membershipPeriod->price = $request->get('price');
            $membershipPeriod->type = $request->get('type');
			$membershipPeriod->start_date = date("Y-m-d",strtotime($request->get('start_date')));
			$membershipPeriod->end_date = date("Y-m-d",strtotime($request->get('end_date')));
			$membershipPeriod->save();
			return redirect()->back()->with('success_message', 'Product added successfully.');
			
			
		}
		
	}//end function
	
	public function subscriptionEdit($id){
		
		$membershipPeriod = MembershipPeriod::findOrFail($id);
		$membershipPeriod->start_date = date("d/m/Y",strtotime($membershipPeriod->start_date));
		$membershipPeriod->end_date = date("d/m/Y",strtotime($membershipPeriod->end_date));
		return view('admin.subscriptionEdit',compact('membershipPeriod'));
    }
	
	public function subscriptionUpdate(Request $request, $id){
		$validator = \Validator::make($request->all(),
            [
                "price"=>"required",
				'start_date' => "required",
				'end_date' => "required",
				'name' => "required",
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
			$membershipPeriod = MembershipPeriod::findOrFail($id);
			$membershipPeriod->name = $request->get('name');
			$membershipPeriod->price = $request->get('price');
			$membershipPeriod->start_date = date("Y-m-d",strtotime($request->get('start_date')));
			$membershipPeriod->end_date = date("Y-m-d",strtotime($request->get('end_date')));
			$membershipPeriod->status = $request->get('status');
			$membershipPeriod->save();
			return redirect()->route('admin::adminSubscriptions')->with('success_message', 'Plan edited successfully.');
		}
    }
	
	public function products(){
		return view("admin.products");
    }
	
	public function productsDataTable(){
		$products = Product::latest()->orderBy('id', 'desc');
		return Datatables::of($products)
            ->addColumn('status', function ($product) {
                $status = ($product->status)?"Active":"De-Activated";
				return $status;
            })
			->addColumn('action', function ($product) {
                $action = '<a href="'.route('admin::adminProductEdit', $product->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
				 $action.= '<a href="'.route('admin::adminProductDelete', $product->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				return $action;
            })
			->make(true);
		
    }
	
	public function productStore(Request $request){
		$validator = \Validator::make($request->all(),
            [
                "name"=>"required|min:5",
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
				->back()
                ->withErrors($validator->errors())
				->with('tabactive', 'active')
                ->withInput();
        }else{
            $prod = new Product;
            $prod->name = $request->name;
            $prod->price = "0";
            $prod->description = $request->description;
            $prod->save();

            foreach($request->varient as $val)
            {
                $new = new ProductVariant;
                $new->product_id = $prod->id;
                $new->product_variant = $val['name'];
                $new->price = $val['price'];
                $new->save();
            }


			return redirect()->back()->with('success_message', 'Product added successfully.');
		}
    }
	
	public function productEdit($id){
		
		$product = Product::findOrFail($id);
		$variant = $product->product_variant;
		return view('admin.productEdit')->with([
		    'product' => $product,
            'variant' => $variant
        ]);
    }
	
	public function productUpdate(Request $request, $id){

    	$validator = \Validator::make($request->all(),
            [
                "name"=>"required|min:5",
				//'price' => "required",
            ]
        );
		
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
			$product = Product::findOrFail($id);
			$product->name = $request['name'];
			$product->price = "0";
			$product->description = $request['description'];
			$product->status = $request['status'];
			$product->save();

			$iddetect = [];
			$prod = ProductVariant::where('product_id',$id)->get();
			$product_old = [];
            foreach($prod as $val)
            {
                $product_old[] = $val['id'];
            }

			if($request->varient) {
                foreach ($request->varient as $val) {
                    if (!empty($val['id'])) {
                        $iddetect[] = $val['id'];
                        $prod = ProductVariant::findorFail($val['id']);
                        $prod->product_variant = $val['name'];
                        $prod->price = $val['price'];
                        $prod->save();
                    } else {
                        $product_new = new ProductVariant;
                        $product_new->product_variant = $val['name'];
                        $product_new->price = $val['price'];
                        $product_new->product_id = $id;
                        $product_new->save();
                    }
                }
                $collection = collect($product_old);
                $diff = $collection->diff($iddetect);

                $del = $diff->all();
                ProductVariant::wherein('id',$del)->where('product_id',$id)->delete();
            }



			return redirect()->route('admin::adminProducts')->with('success_message', 'Product updated successfully.');
		}
    }

    public function hardcopy($id, Request $request)
    {
        $actors = Actor::select('id')->where('user_id', $id)->get();
        $actor_id = $actors[0]['id'];
        $act_upd = Actor::findorfail($actor_id);
        $act_upd->hardcopy_status = $request->hardcopy;
        $act_upd->save();
        return redirect()->back()->with('success_message', 'Updated Successfully');
    }

	public function productDestroy($id){
		$product = Product::findOrFail($id);
		$product->delete();
		return redirect()->back()->with('success_message', 'Product deleted successfully.');	
    }

    public function audition()
    {

        return view('admin.audition');
    }
    public function auditionDataTable()
    {
        $users = "SELECT c.name,c.email,c.id FROM users as c
        join actors as a ON c.id = a.user_id
                              WHERE c.payment_status = 1 AND c.verified = 1 AND a.hardcopy_status = 2
                              ORDER BY c.id DESC
                              ";
        $actors = DB::table( DB::raw("($users) as actors") )->get();

           //$actors = Actor::where('hardcopy_status',2)->orderBy('id','desc');
        return Datatables::of($actors)
            ->addColumn('action', function ($actor) {
                $action = '<a href="'.route('admin::auditionStatus',$actor->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                return $action;
            })
            ->make(true);

    }

    public function auditionedit($id)
    {
        $auditionEdit = User::findorfail($id);
        $start_time = Carbon::createFromTime(06,00,00)->toTimeString();
        $tt = Carbon::parse($start_time)->addHour()->toTimeString();

        $end_time = Carbon::createFromTime(22,00,00)->toTimeString();

        $ar = [];
        for ($i=$start_time; $i<=$end_time; $i = Carbon::parse($i)->addHour()->toTimeString()){
          $ar[$i] = $i;
        }
        return view('admin.auditionedit',compact('auditionEdit'))->with([
            'hour' => $ar
        ]);
    }

    public function auditionupdate($id,Request $request)
    {
        $actor_audition_update = Actor::findorfail($id);
        $actor_audition_update->audition_status = $request->audition_status;
        $actor_audition_update->audition_hour = $request->audition_hour;
        $actor_audition_update->save();
        return redirect()->back()->with('success_message', 'Successfully set audition details for actor');

    }
}
