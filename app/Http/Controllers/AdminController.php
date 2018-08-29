<?php

namespace App\Http\Controllers;

use App\Actor;
use App\AuditionExtra;
use App\Homepage;
use App\Membership;
use App\ProductVariant;
use App\Theater;
use App\Staff;
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
use App\ActorRole;
use PDF;
use Mail;
use App\SpecialPayment;
use Auth;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index")->with('homeactive','active');
    }//end function
    
    //======================================================================
    // FAQ Functions
    //======================================================================
    public function faq(){
        return view("admin.faq")->with('faqactive','active');
    }
    
    public function faqStore(Request $request){
        $validator = \Validator::make($request->all(),
            [
                "question"=>"required|min:3",
                '_type' => "required",
                'answer' => "required|min:5"
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
        return view("admin.slideshows")->with('slideshowactive','active');
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
            $tes = Slideshow::orderBy('id')->get();
            foreach($tes as $item)
            {
                if($item->name == "Contact" || $item->name == "Younger")
                {
                    //
                }
                else{
                    $item->status = "0";
                    $item->save();
                }
            }
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
            if($request->status == 1)
            {
                $not_in_id = Slideshow::OrderBy('id')->get();
                foreach($not_in_id as $item)
                {
                    if($item->name == "Contact" || $item->name == "Younger")
                    {
                        //
                    }
                    else
                    {
                        $item->status = "0";
                        $item->save();
                    }
                }
            }
        }
            $slideshow = Slideshow::findOrFail($id);
            $slideshow->name = $request['name'];
            $slideshow->status = $request['status'];
            $slideshow->save();

            return redirect()->route('admin::adminSlideshows')->with('success_message', 'Slideshow edited successfully.');

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
        return view("admin.users")->with('useractive','active');
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
            })
            ->editColumn('status', function ($user) {
                return ($user->status==1)? "Active" : "De-Activated";
            })
            ->editColumn('payment_status', function ($user) {
                return ($user->payment_status)? "Yes" : "No";
            })
            ->make(true);
    }

    public function sendPaymentEmail(Request $request)
    {
        if(isset($request['user_id']) && $request['user_id'] != "") {
            $user          = User::where('id',$request['user_id'])->first();
            $payment_token = 'SP'.$request['user_id'].date('Ymds');
            $paymentUrl = env('APP_URL').'special-payment?d='.base64_encode($user->id.'|'.$payment_token);
            try {
                Mail::send('email.payment', ['paymentUrl'=> $paymentUrl,'name'=>$user->username ], function ($m) use ($user) {
                    $m->to($user->email)->subject('Payment');
                });

                $special_payment                 = new SpecialPayment;
                $special_payment->user_id        = $request->user_id;
                $special_payment->transaction_id = '';
                $special_payment->price          = '0.00';
                $special_payment->varient_id     = '0';
                $special_payment->status         = '1';
                $special_payment->payment_token  = $payment_token;
                $special_payment->save();

                return redirect()->back()->with('success_message', 'Please check email for payment link');
            } catch (Exception $e) {
                return redirect()->back()->with('error_message', 'Unable to send forgot email please wait.');
            }
        }
    }

    public function specialPayment(Request $request)
    {
        if(isset(Auth::user()->role) && Auth::user()->role != "") {
            if(isset($request['d']) && $request['d'] != "") {
                $userInfo = explode('|',base64_decode($request['d']));
                
                if(isset($userInfo[0]) && Auth::user()->id == $userInfo[0]) {
                    $paymentinfo = base64_encode("s|".$userInfo[0].'|'.$userInfo[1]);
                    if(Auth::user()->role == "actor") {
                        return redirect('/actor/payment?t='.$paymentinfo);
                    } else if(Auth::user()->role == 'theater') {
                        return redirect('/theater/payment?t='.$paymentinfo);
                    } else if(Auth::user()->role == 'staff') {
                        return redirect('/staff/payment?t='.$paymentinfo);
                    }
                } else {
                    if(Auth::user()->role == "actor") {
                        return redirect()->route('actor::actorProfile');
                    } else if(Auth::user()->role == 'theater'){
                        return redirect()->route('theater::theaterProfile');
                    } else if(Auth::user()->role == 'staff'){
                        return redirect()->route('staff::staffProfile');
                    } else {
                        return redirect()->route('admin::adminDashboard');
                    }
                }
            }
        } else {
            return redirect('/login?d='.$request['d']);
        }
    }

    public function sendPaymentEmail(Request $request)
    {
        if(isset($request['user_id']) && $request['user_id'] != "") {
            $user          = User::where('id',$request['user_id'])->first();
            $payment_token = 'SP'.$request['user_id'].date('Ymds');
            $paymentUrl = env('APP_URL').'special-payment?d='.base64_encode($user->id.'|'.$payment_token);
            try {
                Mail::send('email.payment', ['paymentUrl'=> $paymentUrl,'name'=>$user->username ], function ($m) use ($user) {
                    $m->to($user->email)->subject('Payment');
                });

                $special_payment                 = new SpecialPayment;
                $special_payment->user_id        = $request->user_id;
                $special_payment->transaction_id = '';
                $special_payment->price          = '0.00';
                $special_payment->varient_id     = '0';
                $special_payment->status         = '1';
                $special_payment->payment_token  = $payment_token;
                $special_payment->save();

                return redirect()->back()->with('success_message', 'Please check email for payment link');
            } catch (Exception $e) {
                return redirect()->back()->with('error_message', 'Unable to send forgot email please wait.');
            }
        }
    }

    public function specialPayment(Request $request)
    {
        if(isset(Auth::user()->role) && Auth::user()->role != "") {
            if(isset($request['d']) && $request['d'] != "") {
                $userInfo = explode('|',base64_decode($request['d']));
                
                if(isset($userInfo[0]) && Auth::user()->id == $userInfo[0]) {
                    $paymentinfo = base64_encode("s|".$userInfo[0].'|'.$userInfo[1]);
                    if(Auth::user()->role == "actor") {
                        return redirect('/actor/payment?t='.$paymentinfo);
                    } else if(Auth::user()->role == 'theater') {
                        return redirect('/theater/payment?t='.$paymentinfo);
                    } else if(Auth::user()->role == 'staff') {
                        return redirect('/staff/payment?t='.$paymentinfo);
                    }
                } else {
                    if(Auth::user()->role == "actor") {
                        return redirect()->route('actor::actorProfile');
                    } else if(Auth::user()->role == 'theater'){
                        return redirect()->route('theater::theaterProfile');
                    } else if(Auth::user()->role == 'staff'){
                        return redirect()->route('staff::staffProfile');
                    } else {
                        return redirect()->route('admin::adminDashboard');
                    }
                }
            }
        } else {
            return redirect('/login?d='.$request['d']);
        }
    }

    public function actorsDataTable(){

        $users = DB::table('users')->where('role','actor')->orderBy('id', 'desc')->get();
        $index = 0;
        foreach ($users as $user){
            $users[$index]->subscription = $this->subscriptionStatus($user->id);
            $index++;
        }


        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $action = '<a href="'.route('admin::adminUserEdit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $action.= '<a href="'.route('admin::adminUserDelete', $user->id).'" class="btn btn-xs btn-danger del" onclick="return confirm(\'You are about to delete this record -- do you want to continue?\')" ><i class="glyphicon glyphicon-trash del"></i> Delete</a>';
                $action.= '<a ref="'.$user->id.'" class="btn btn-xs btn-success special_payment"><i class="fa fa-money" aria-hidden="true"></i> Special Payment</a>';
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
        $users = DB::table('users')->where('role','staff')->orderBy('id', 'desc')->get();
        $index = 0;
        foreach ($users as $user){
            $users[$index]->subscription = $this->subscriptionStatus($user->id);
            $index++;
        }

        return Datatables::of($users)->addColumn('action', function($user){
            $action = '<a href="'.route('admin::adminUserEdit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action.= '<a href="'.route('admin::adminUserDelete', $user->id).'" class="btn btn-xs btn-danger"  onclick="return confirm(\'You are about to delete this record -- do you want to continue?\')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $action.= '<a ref="'.$user->id.'" class="btn btn-xs btn-success special_payment"><i class="fa fa-money" aria-hidden="true"></i> Special Payment</a>';
            return $action;
        })->editColumn('status', function ($user) {
            return ($user->status)? "Active" : "De-Activated";
        })->make(true);
    }

    public function theaterDataTable()
    {
        $users = DB::table('users')->where('role','theater')->orderBy('id', 'desc')->get();

        $index = 0;

        foreach ($users as $user){
            $users[$index]->subscription = $this->subscriptionStatus($user->id);

            $index++;
        }

        return Datatables::of($users)->addColumn('action', function($user){
            $action = '<a href="'.route('admin::adminUserEdit', $user->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            $action.= '<a href="'.route('admin::adminUserDelete', $user->id).'" class="btn btn-xs btn-danger" onclick="return confirm(\'You are about to delete this record -- do you want to continue?\')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $action.= '<a ref="'.$user->id.'" class="btn btn-xs btn-success special_payment"><i class="fa fa-money" aria-hidden="true"></i> Special Payment</a>';
            return $action;
        })->editColumn('status', function ($user) {
            return ($user->status)? "Active" : "De-Activated";
        })->make(true);
    }

    public function delete($file1,$file2,$file3,$file4,$file5){
        if(file_exists(public_path().'/'.$file1)){
            unlink(public_path().'/'.$file1);
        }
        if(file_exists(public_path(public_path().'/'.$file2))){
            unlink(public_path().'/'.$file2);
        }
        if(file_exists(public_path().'/'.$file3)){
            unlink(public_path().'/'.$file3);
        }
        if(file_exists(public_path().'/'.$file4)){
            unlink(public_path().'/'.$file4);
        }
        if(file_exists(public_path().'/'.$file5)){
            unlink(public_path().'/'.$file5);
        }
    }
    public function userDestroy($id){
        $user = User::findorfail($id);
        // delete related actor
        if(count($user) > 0){
        if(count($user->actor) > 0){
            $actor = $user->actor;
            if($actor->photo_path != "" || $actor->precrop_path != "" || $actor->photo_url != "" || $actor->precrop_url != "" || $actor->resume_path != ""){
                $this->delete($actor->photo_path,$actor->precrop_path,$actor->photo_url,$actor->precrop_url,$actor->resume_path);
            }
            if(count($user->audition_extra) > 0){
                //$user->audition_extra->delete();
                $aE = AuditionExtra::where('user_id',$user->id)->delete();
            }
            if(count($user->actors_role) > 0){
                $aR = ActorRole::where('user_id',$user->id)->delete();
            }
            $aD = Actor::where('user_id',$user->id)->delete();

        }
        /*theater related files and theater profile deletion**/
        if(count($user->theater) > 0){
            $theater = $user->theater;
            if($theater->photo_path != "" || $theater->precrop_path != "" || $theater->photo_url != "" || $theater->precrop_url != "" || $theater->resume_path != ""){
                $this->delete($theater->photo_path,$theater->precrop_path,$theater->photo_url,$theater->precrop_url,$theater->resume_path);
            }
           $tD = Theater::where('user_id',$user->id)->delete();

        }
        /*staff related files and staff profile deletion**/
        if(count($user->staff) > 0){
            $staff = $user->staff;
            if($staff->photo_path != "" || $staff->precrop_path != "" || $staff->photo_url != "" || $staff->precrop_url != "" || $staff->resume_path != ""){
                $this->delete($staff->photo_path,$staff->precrop_path,$staff->photo_url,$staff->precrop_url,$staff->resume_path);
            }
            $sD = Staff::where('user_id',$user->id)->delete();
           }
           /**payment and memberships delete**/
        if(count($user->payments) > 0){
            //$user->payments->delete();
            Payment::where('user_id',$user->id)->delete();
        }
        if(count($user->memberships) > 0){
            //$user->memberships->delete();
            Membership::where('user_id',$user->id)->delete();
        }

        $u = User::where('id',$user->id)->delete();
        return redirect()->back()->with('success_message', 'User deleted successfully.');


        }else{
            return redirect()->back()->with('error_message', 'User Dosnt exist');
        }
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

        $ae = AuditionExtra::updateorcreate(['user_id'=>$id],['user_id',$id]);
        $audition_extra = AuditionExtra::where('user_id',$id)->get();
        if(count($audition_extra)){
           $ax = $audition_extra[0];
        } else {
            $ax = '';
        }
        $time= [];
        $minutes = [];
        for($i=1;$i<=12;$i++){
            $time[strlen($i)==1 ? '0'.$i : $i] = strlen($i)==1 ? '0'.$i : $i;
        }
        for($i=0;$i<60;$i++)
        $minutes[strlen($i)==1 ? '0'.$i : $i] = strlen($i)==1 ? '0'.$i : $i;

        for($k=1;$k<=24;$k++){
            $standBy['fri-'.$k] = 'Friday Stand By - '.$k;
            if($k==24){
                for($j=1;$j<=24;$j++)
                    $standBy['sat-'.$j] = 'Saturday Stand By - '.$j;
                for($l=1;$l<=20;$l++)
                    $standBy['sun-' . $l] = 'Sunday Stand By - ' . $l;
            }

        }
        if($user->role == 'actor'){
            $ht = [];
            $ampm = "";
            if(!is_null($user->actor['adminAudition_time']))
            {
                $ht = explode(':',$user->actor['adminAudition_time']);
                if($ht[0] > 12){
                    $hours = $ht[0]-12;
                    $ampm = "PM";
                }else{
                    $hours = $ht[0];
                    $ampm = "AM";
                }
                if(!empty($ht[1])){
                    $ht_1 = $ht[1];
                }else{
                    $ht_1 = '00';
                }
            }else{
                $hours = "";
                $ampm = ""; 
                $ht_1 = "";  
            }
            
            return view('admin.actorEdit')->with([
                'actor' => $user->actor,
                'weight' => $weight,
                'age' => $age,
                'id' => $id,
                'user' => $user,
                'ax' => $ax,
                'hours' => $time,
                'minutes' => $minutes,
                'standby' => $standBy,
                'audhour' => $hours,
                'audmin' => $ht_1,
                'ampm' => $ampm
            ]);
        }
        if($user->role=='theater')
        {
            return view('admin.theaterEdit')->with([
               'theater' => $user->theater,
                'user' => $user,
                'id' => $id
            ]);
        }
        if($user->role =='staff')
        {
            return view('admin.staff')->with([
               'staff' => $user->staff,
               'user' => $user,
               'id' => $id
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
                    if($payment->varient_id != NULL){
                        $vr = ProductVariant::findorfail($payment->varient_id);
                        $name = $vr->product_variant;
                        return "$name";
                    }
                    else
                    {
                        $pr = Product::findorfail($payment->product_id);
                        $name = $pr->name;
                        return "$name";
                    }

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
        if($request->get('method') == "PUT"){
            $actor = \App\Actor::where('user_id',$id)->first();
        }else{
            $actor = new \App\Actor;
        }
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
        $actor->from = $request->get('from');
        $actor->to = $request->get('to');
        $actor->auditionType = $request->get('auditionType');
        $actor->vocalRange = $request->get('vocalRange');
        $actor->jobType = $request->get('jobType') ? implode(',', $request->get('jobType')) : '';
        $actor->technical = $request->get('technical') ? implode(',', $request->get('technical')) : '';
        $actor->ethnicity = $request->get('ethnicity') ? implode(',', $request->get('ethnicity')) : '';
        $actor->dance = $request->get('dance') ? implode(',', $request->get('dance')) : '';
        $actor->instrument = $request->get('instrument') ? implode(',', $request->get('instrument')) : '';
        $actor->misc = $request->get('misc') ? implode(',', $request->get('misc')) : '';
        $actor->website_url = $request->website_url;
        $actor->pro_name = $request->pro_name;
        $actor->pro_mail = $request->pro_mail;
        $actor->state = $request->state[0];
        $actor->phone_number = $request->phone_number;
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

    public function theaterUpdate(Request $request,$id){
        $validator = \Validator::make($request->all(),
            [
                'company_name' => 'min:3|max:56'
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        if($request->m == "PUT"){
            $theater = Theater::where('user_id',$id)->first();
        }else{
            $theater = new Theater;
        }
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
        if($request->m == "PUT"){
            if($theater->update()){
                return redirect()->back()->with('success_message', 'Theater Data Successfully Updated');
            }
        }else{
            if($theater->save()){
                return redirect()->back()->with('success_message', 'Theater Data Successfully Created');
            }
        }

    }

    public function staffupdate(Request $request,$id){
        if($request->m == "PUT"){
            $staff = Staff::where('user_id',$id)->first();
        }
        else
        {
            $staff = new Staff;
        }

        $from_date = Carbon::createFromFormat('d/m/Y', $request->from)->toDateString();
        $to_date = Carbon::createFromFormat('d/m/Y', $request->to)->toDateString();
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
        if($request->m == "PUT"){
            if($staff->update()){
                return redirect()->back()->with('success_message', 'Profile Data Successfully Updated');
            }
        }else{
            if($staff->save()){
                return redirect()->route('staff::staffProfile')->with('success_message', 'Profile Data Successfully Created');
            }
        }
    }

    public function portfolioupdate($id, Request $request)
    {
        $staff = Staff::where('user_id', $id)->first();

        $staff->portfolio = $request->portfolio;
        $staff->update();
        return redirect()->back()->with('success_message', 'Portfolio Successfully Updated');
    }

    public function uploadResume($actor,$file, $name){
        $destinationPath = 'assets/files/resumes/actor'; // upload path
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
        
        $destinationPath = 'assets/photos/actor'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = trim($user->name).rand(11111,99999).'.'.$extension; // renameing image
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
    public function theaterPhotoUpdate(Request $request,$id){

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
        $theater = $user->theater;


        if($user->theater){
            $theater = Theater::where('user_id',$id)->first();
        }else{
            $theater = new Theater;
        }

        $destinationPath = 'assets/photos/theater'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = trim($user->name).rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);


        $theater->precrop_path = $destinationPath.'/'.$fileName;
        $theater->precrop_url = $destinationPath.'/'.$fileName;

        if($user->theater){
            if($theater->update()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }
        }else{
            $theater->user_id = $id;
            if($theater->save()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }
        }



    }
    public function staffPhotoUpdate(Request $request,$id){

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
        $staff = $user->staff;


        if($user->staff){
            $staff = Staff::where('user_id',$id)->first();
        }else{
            $staff = new Staff;
        }

        $destinationPath = 'assets/photos/staff'; // upload path
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        $fileName = trim($user->name).rand(11111,99999).'.'.$extension; // renameing image
        $file->move(public_path($destinationPath), $fileName);


        $staff->precrop_path = $destinationPath.'/'.$fileName;
        $staff->precrop_url = $destinationPath.'/'.$fileName;

        if($staff->theater){
            if($staff->update()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }
        }else{
            $staff->user_id = $id;
            if($staff->save()){
                return redirect()->back()->with('success_message', 'Image Uploaded! Please crop the image to make it active on your profile')->with('tabactive','active');
            }else{
                return redirect()->back()->with('success_message', 'Picture not uploaded. Try again!');
            }
        }



    }
    
    public function actorPhotoDelete($id){
        $actor = \App\Actor::where('user_id', $id)->first();
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
    public function theaterPhotoDelete($id){
        $theater = Theater::where('user_id', $id)->first();
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
    public function staffPhotoDelete($id){
        $staff = Staff::where('user_id', $id)->first();
        unlink(public_path().'/'.$staff->precrop_path);
        unlink(public_path().'/'.$staff->photo_path);
        $staff->precrop_url = null;
        $staff->precrop_path = null;
        $staff->photo_url = null;
        $staff->photo_path = null;
        if($staff->update()){
            return redirect()->back()->with('success_message', 'Picture successfully deleted.')->with('tabactive','active');
        }else{
            return redirect()->back()->with('error_message', 'Picture not deleted. Try again!');
        }
    }
    
    public function actorAuditionList(){
        
        /*Get All Actors with Auditions*/
        $actors = Actor::where('adminAudition_time')->get();
        foreach($actors as $actor){

            $actor_roles = ActorRole::where('user_id', $actor->id)->orderBy('id', 'asc')->get();
            $actorList = [
                'actor'       => $actor,
                'actor_roles' => $actor_roles,
            ];
        }

        return view('admin.actorAuditionList')->with($actorList);
    }
        
    public function adminAuditions(Request $request, $id){

        /*Initialize*/
        $subRequirementFAIL = FALSE;
        $hours = '';

        /*Core Validator*/
        $validator = \Validator::make($request->all(),
            [
                'adminAudition_day'   => 'required',
            ]
        );
        
        /*Logic Check*/
        if(!is_null($request->adminAudition_hours)){
            if((!is_numeric($request->adminAudition_minutes))||(empty($request->adminAudition_am))){
                $subRequirementFAIL = TRUE;
            }
        }else{
            $time = NULL;
        }
        
        /*Validator Check - With Error Handling*/
        if (($validator->fails())||($subRequirementFAIL == TRUE)) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput()
                ->with('error_message', 'Admin Audition Information Not Stored. Try again!');
        }

        /*Query User*/
        $user = User::findorfail($id);

        /*AM/PM processing*/
        if($request->adminAudition_am == "AM") {
            $hours = $request->adminAudition_hours;
            if($hours == 12){
                $hours = '00';
            }
            $time = $hours.':'.$request->adminAudition_minutes.':00';
        }elseif($request->adminAudition_am == "PM"){
            $hours = $request->adminAudition_hours;
            if($hours == 12){
                $hours = $request->adminAudition_hours;
            }else{
                $hours = 12+$request->adminAudition_hours;
             }
            $time = $hours.':'.$request->adminAudition_minutes.':00';
        }
        
        /*Define Save Class*/
        $actor = $user->actor; 
        $actor->adminAudition_time = $time;
        $actor->adminAudition_day = $request->adminAudition_day;
        $actor->adminAudition_standby = $request->adminAudition_standBy;
        $actor->save();

        return redirect()->back()->with('success_message', 'Actor ADMIN AUDITIONS Successfully Updated');
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
      
        $fileName = trim($user->name).rand(11111,99999).'.jpg'; // renameing image
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
    public function posttheaterCropPhotoUpdate(Request $request, $id){

        $targ_w = $targ_h = 230;
        $jpeg_quality = 90;
        $user = User::findOrFail($id);
        $theater = $user->theater;
        $src = $theater->precrop_url;

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

        $destinationPath = 'assets/photos/theater'; // upload path

        $fileName = trim($user->name).rand(11111,99999).'.jpg'; // renameing image
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

    public function poststaffCropPhotoUpdate(Request $request, $id){
        $targ_w = $targ_h = 230;
        $jpeg_quality = 90;
        $user = User::findOrFail($id);
        $staff = $user->staff;
        $src = $staff->precrop_url;

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

        $destinationPath = 'assets/photos/staff'; // upload path

        $fileName = trim($user->name).rand(11111,99999).'.jpg'; // renameing image
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



    //======================================================================
    // Content Pages Functions
    //======================================================================
    
    public function contentPages(){
        return view("admin.content_pages")->with('contentactive','active');
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
                'description' => "required|min:5",
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
        return view("admin.subscription")->with('subscriptionactive','active');
    }
    
    public function subscriptionsDataTable(){
        $membershipPeriods = MembershipPeriod::latest()->orderBy('id', 'desc');
        return Datatables::of($membershipPeriods)
            ->editColumn('start_date',function($membershipPeriod){
                $start = Carbon::parse($membershipPeriod->start_date);
                $start_date = $start->format('m/d/Y');
                return $start_date;
            })
            ->editColumn('end_date',function($membershipPeriod){
                $end = Carbon::parse($membershipPeriod->end_date);
                $end_date = $end->format('m/d/Y');
                return $end_date;
            })
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
<<<<<<< HEAD
                'start_date'        => "required",
                'end_date'          => "required",
                'type'              => "required",
                'name'              => "required",
=======
				'start_date'        => "required",
				'end_date'          => "required",
                'type'              => "required",
				'name'              => "required",
>>>>>>> 1011e5ee4b4202b46b70963a658fc7ddd94158cb
                'subscription_type' => 'required',
            ]
        );
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
<<<<<<< HEAD
            
            $membershipPeriod                    = new MembershipPeriod;
            $membershipPeriod->name              = $request->get('name');
            $membershipPeriod->price             = $request->get('price');
            $membershipPeriod->type              = $request->get('type');
            $membershipPeriod->subscription_type = $request->get('subscription_type');
            $membershipPeriod->start_date        = date("Y-m-d",strtotime($request->get('start_date')));
            $membershipPeriod->end_date          = date("Y-m-d",strtotime($request->get('end_date')));
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
                'start_date'        => "required",
                'end_date'          => "required",
                'name'              => "required",
=======
			
			$membershipPeriod                    = new MembershipPeriod;
			$membershipPeriod->name              = $request->get('name');
			$membershipPeriod->price             = $request->get('price');
            $membershipPeriod->type              = $request->get('type');
            $membershipPeriod->subscription_type = $request->get('subscription_type');
			$membershipPeriod->start_date        = date("Y-m-d",strtotime($request->get('start_date')));
			$membershipPeriod->end_date          = date("Y-m-d",strtotime($request->get('end_date')));
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
				'start_date'        => "required",
				'end_date'          => "required",
				'name'              => "required",
>>>>>>> 1011e5ee4b4202b46b70963a658fc7ddd94158cb
                'subscription_type' => "required",
            ]
        );
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
<<<<<<< HEAD
            $membershipPeriod                    = MembershipPeriod::findOrFail($id);
            $membershipPeriod->name              = $request->get('name');
            $membershipPeriod->price             = $request->get('price');
            $membershipPeriod->type              = $request->get('type')!=Null ? $request->get('type') : $membershipPeriod->type;
            $membershipPeriod->start_date        = date("Y-m-d",strtotime($request->get('start_date')));
            $membershipPeriod->end_date          = date("Y-m-d",strtotime($request->get('end_date')));
            $membershipPeriod->subscription_type = $request->get('subscription_type')!=Null ? $request->get('subscription_type') : $membershipPeriod->subscription_type;
            $membershipPeriod->status            = $request->get('status');
            $membershipPeriod->save();
            return redirect()->route('admin::adminSubscriptions')->with('success_message', 'Plan edited successfully.');
        }
    }
    
    public function products(){
        return view("admin.products")->with('productactive','active');
    }
    
    public function productsDataTable(){
        $products = Product::latest()->orderBy('id', 'desc');
        return Datatables::of($products)
=======
			$membershipPeriod                    = MembershipPeriod::findOrFail($id);
			$membershipPeriod->name              = $request->get('name');
			$membershipPeriod->price             = $request->get('price');
			$membershipPeriod->type              = $request->get('type')!=Null ? $request->get('type') : $membershipPeriod->type;
			$membershipPeriod->start_date        = date("Y-m-d",strtotime($request->get('start_date')));
			$membershipPeriod->end_date          = date("Y-m-d",strtotime($request->get('end_date')));
            $membershipPeriod->subscription_type = $request->get('subscription_type')!=Null ? $request->get('subscription_type') : $membershipPeriod->subscription_type;
			$membershipPeriod->status            = $request->get('status');
			$membershipPeriod->save();
			return redirect()->route('admin::adminSubscriptions')->with('success_message', 'Plan edited successfully.');
		}
    }
	
	public function products(){
		return view("admin.products")->with('productactive','active');
    }
	
	public function productsDataTable(){
		$products = Product::latest()->orderBy('id', 'desc');
		return Datatables::of($products)
>>>>>>> 1011e5ee4b4202b46b70963a658fc7ddd94158cb
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
                "name"         => "required|min:5",
                "product_type" => "required",
            ]
        );
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->with('tabactive', 'active')
                ->withInput();
        }else{
            $prod               = new Product;
            $prod->name         = $request->name;
            $prod->price        = "0";
            $prod->description  = $request->description;
            $prod->product_type = $request->product_type;
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
                "name"         => "required|min:5",
<<<<<<< HEAD
                'product_type' => "required",
=======
				'product_type' => "required",
>>>>>>> 1011e5ee4b4202b46b70963a658fc7ddd94158cb
            ]
        );
        
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput();
        }else{
<<<<<<< HEAD
            $product               = Product::findOrFail($id);
            $product->name         = $request['name'];
            $product->price        = "0";
            $product->description  = $request['description'];
            $product->status       = $request['status'];
            $product->product_type = $request['product_type'];
            $product->save();

            $iddetect = [];
            $prod = ProductVariant::where('product_id',$id)->get();
            $product_old = [];
=======
			$product               = Product::findOrFail($id);
			$product->name         = $request['name'];
			$product->price        = "0";
			$product->description  = $request['description'];
			$product->status       = $request['status'];
            $product->product_type = $request['product_type'];
			$product->save();

			$iddetect = [];
			$prod = ProductVariant::where('product_id',$id)->get();
			$product_old = [];
>>>>>>> 1011e5ee4b4202b46b70963a658fc7ddd94158cb
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

    public function static_create(Request $request){
        $static_page = new StaticPage;
        $static_page->slug = $request->slug;
        $static_page->page_description = $request->description;
        $static_page->status = $request->status;
        $static_page->page_title = $request->title;
        $static_page->save();

        return redirect()->back()->with('success_message', 'Page Created Successfully');
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

    public function adminextra($id, Request $request)
    {
        $data = AuditionExtra::updateorcreate(
            [
                'user_id' => $id
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

    public function homepageedit()
    {
        $slideshow = Slideshow::orderBy('id','created_at')->get();
        $content = Homepage::select('content')->where('id',1)->get();
        $slid_select = Homepage::select('slide_id')->where('id',1)->get();
        $cont = $content[0]['content'];
        return view('admin.homepageedit')->with(['content' => $cont,'edit'=>'active','slideshow'=>$slideshow,'slide'=>$slid_select[0]['slide_id']]);
    }

    protected function homepageupdate(Request $request)
    {
        $cont_upd = Homepage::findorFail(1);
        $cont_upd->content = $request->content;
        $cont_upd->slide_id = $request->slideshow;
        $cont_upd->save();
        return redirect()->back()->with('success_message','Content Updated');
    }

    protected function postEditPassword($id,Request $request){
            $validator = \Validator::make($request->all(),
                [
                    //'password' => "required|max:15|min:6",
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
            $user = User::findorfail($id);
                $user->password = bcrypt($request->get('new_password'));
                $user->update();
        return redirect()->back()->with('success_message', 'Password successfully updated.');
        }
        protected function getCount($total){
            if($total>450){
                return 10;
            }
            if($total>400 && $total<450){
                return 9;
            }
            if($total>350 && $total<400){
                return 8;
            }
            if($total>300 && $total<350){
                return 7;
            }
            if($total>250 && $total<300){
                return 6;
            }
            if($total>200 && $total<250){
                return 4;
            }
            if($total>150 && $total<200){
                return 4;
            }
            if($total>100 && $total<150){
                return 3;
            }
            if($total>50 && $total<100){
                return 2;
            }
            if($total>0 && $total<50){
                return 1;
            }
        }
        /*function for audition pdf*/
        protected function auditionPdf(){
            $actorDay = Actor::where('adminAudition_day','Friday')
                ->whereNull('adminAudition_standby')
                ->orderBy('adminAudition_time','asc')
                ->get();
            $standby = Actor::where('adminAudition_standby','LIKE', '%fri-%')
                ->orderByRaw('CHAR_LENGTH(adminAudition_standby)','asc')
                ->orderBy('adminAudition_standby','asc')
                ->get();
            $actorSaturday = Actor::where('adminAudition_day','Saturday')
                ->whereNull('adminAudition_standby')
                ->orderBy('adminAudition_time','asc')
                ->get();
            $standbySaturday = Actor::where('adminAudition_standby','LIKE', '%sat-%')
                ->orderByRaw('CHAR_LENGTH(adminAudition_standby)','asc')
                ->orderBy('adminAudition_standby','asc')
                ->get();
            $actorSunday = Actor::where('adminAudition_day','Sunday')
                ->whereNull('adminAudition_standby')
                ->orderBy('adminAudition_time','asc')
                ->get();
            $standbySunday = Actor::where('adminAudition_standby','LIKE', '%sun-%')
                ->orderByRaw('CHAR_LENGTH(adminAudition_standby)','asc')
                ->orderBy('adminAudition_standby','asc')
                ->get();
                $total = count($actorDay);
                $count = AdminController::getCount($total);
                $half = ceil($actorDay->count() / $count);
                $chunks = $actorDay->chunk($half);
                $standbys = "";
                    $totalStandy = count($standby);
                    $countStandby = AdminController::getCount($totalStandy);
                $standbyhalf = ceil($standby->count()/$countStandby);
                $standbys = $standby->chunk($standbyhalf);
                /**for saturday**/
            $totalSaturday = count($actorSaturday);
            $countSaturday = AdminController::getCount($totalSaturday);
            $halfSaturday = ceil($actorSaturday->count() / $countSaturday);
            $chunksSaturday = $actorSaturday->chunk($halfSaturday);
            $standbysaturday = "";
            $totalStandySat = count($standbySaturday);
            $countStandbySat = AdminController::getCount($totalStandySat);
            $standbyhalfsat = ceil($standbySaturday->count()/$countStandbySat);
            $standbysat = $standbySaturday->chunk($standbyhalfsat);

                /**for sunday**/
            $totalSunday = count($actorSunday);
            $countSunday = AdminController::getCount($totalSunday);
            $halfSunday = ceil($actorDay->count() / $countSunday);
            $chunkSunday = $actorSunday->chunk($halfSunday);
            $standby_sunday = "";
            $totalStandSunday = count($standbySunday);
            $countStandSunday = AdminController::getCount($totalStandSunday);
            $standbyhalfSunday = ceil($standbySunday->count()/$countStandSunday);
            $standbysunday = $standbySunday->chunk($standbyhalfSunday);
                return view('admin.admidoc')->with([
                    'b' => $chunks,
                    'c' => $chunksSaturday,
                    'd' => $chunkSunday,
                    'standbys' => $standbys != "" ? $standbys : $standby,
                    'standbysat' => $standbysat != "" ? $standbysat : $standbySaturday,
                    'standbysun' => $standbysunday != "" ? $standbysunday : $standbySunday
                ]);
        }
        protected function dompdf($day,Request $request){
            $actor = $request->actor;
            $id = $request->id;
            $actorDay = json_decode($actor, true);
            $roles = [];
            $email = [];
            foreach($actorDay as $role){
                $roles[$role['user_id']] = ActorRole::where('user_id',$role['user_id'])->get();
                $email[$role['user_id']] = User::select('email')->where('id',$role['user_id'])->get();
            }
            $pdf = PDF::loadView('pdf.actorslist',['actorDay' => $actorDay,'roles'=>$roles,'email' => $email]);
            return $pdf->download('ActorList_'.$day.'_'.$id.'.pdf');
        }
        protected function domstandbypdf($day,Request $request){
            $actor = $request->actor;
            $id = $request->id;
            $actorDay = json_decode($actor, true);
            $roles = [];
            foreach($actorDay as $role){
                $roles[$role['user_id']] = ActorRole::where('user_id',$role['user_id'])->get();
                $email[$role['user_id']] = User::select('email')->where('id',$role['user_id'])->get();
            }
            $pdf = PDF::loadView('pdf.actorstandbylist',['standbyactor' => $actorDay,'roles'=>$roles,'email'=>$email]);
            return $pdf->download('Standby_Actor_'.$day.'_'.$id.' .pdf');
        }
}