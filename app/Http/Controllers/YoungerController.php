<?php

namespace App\Http\Controllers;

use App\Slide;
use App\StaticPage;
use App\Younger;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class YoungerController extends Controller
{
    /* Get route map to /younger */
    public function getYounger(){
        $slides = Slide::latest()->where("slideshow_id","=",2)->orderBy('id', 'desc')->get();
        $static = StaticPage::where('slug','younger')->get();
        $sP = $static[0]->page_description;
        $young = Younger::orderBy('id','desc')->get();
        return view('common.younger',compact('slides'))->with(['youngeractive'=>'active','sP' => $sP,'young'=>$young]);
    }

    public function yList(){
        return view('admin.younger');
    }

    public function yCreate(Request $request){
        $younger = new Younger();
        $younger->business = $request->business;
        $younger->link = $request->link;
        $younger->button_text = $request->button_text;
        $younger->save();

        return redirect()->route('admin::youngList')->with('success','Updated Successfully');
    }

    public function yData(){
        $youngers = Younger::latest();
        return Datatables::of($youngers)
            ->addColumn('action', function ($youngers) {
                $action = '<a href="'.route('admin::youngEdit', $youngers->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                $action.= '<a href="'.route('admin::youngDelete', $youngers->id).'" class="btn btn-xs btn-danger" onclick="return confirm(\'You are about to delete this record -- do you want to continue?\')" ><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                return $action;
            })
            ->make(true);
    }

    public function yUpdate(Request $request,$id){
        $young = Younger::findorfail($id);
        $young->business = $request->business;
        $young->button_text = $request->button_text;
        $young->link = $request->link;
        $young->update();
        return redirect()->route('admin::youngList')->with('success','Updated Successfully');
    }

    public function yEdit($id){
        $young = Younger::findorfail($id);
        return view('admin.youngerEdit',['young'=>$young]);
    }

    public function yDelete($id){
        $y = Younger::findorfail($id);
        $y->delete();
        return redirect()->route('admin::youngList')->with('success','Deleted Successfully');
    }
}
