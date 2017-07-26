<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

use App\Faq;
use App\User;
use App\Slideshow;
use App\Slide;

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
		// Using Eloquent
		//return Datatables::eloquent(Faq::query())->make(true);
		$slideshows = Slideshow::latest()->orderBy('id', 'desc');
		return Datatables::of($slideshows)
            ->addColumn('action', function ($slideshow) {
                $action = '<a href="'.route('admin::adminSlideshowEdit', $slideshow->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
				$action.= '<a href="'.route('admin::adminSlideshowDelete', $slideshow->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
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
			$destinationPath = 'slides'; // upload path
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
				$action= '<a href="'.route('admin::adminSlideshowDeleteSlide', $slide->id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				
				return $action;
            })
			->addColumn('slide', function ($slide) {  
				return url('/').'/'.$slide->path;
            })
			->make(true);
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
	
	public function userDestroy($id){
    	$user = User::find($id);
		$user->delete();
		return redirect()->back()->with('success_message', 'User deleted successfully.');
	}
	
	public function userEdit($id){
		
		$user = User::findOrFail($id);
		return view('admin.userEdit',compact('user'));
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
}
