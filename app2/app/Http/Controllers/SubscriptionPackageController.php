<?php

namespace App\Http\Controllers;

use App\SubscriptionPackage;
use Illuminate\Http\Request;

class SubscriptionPackageController extends Controller
{
    public function __construct()
    {
        //
    }

    protected function index()
    {
        $sub = SubscriptionPackage::orderby('id')->get();
        return view('subscription.subview')->with([
            'subview'=>$sub
        ]);
    }

    protected function create()
    {
        return view('subscription.subcreate')->with(['sub'=>""]);
    }

    protected function store(Request $request)
    {
        $this->validate($request,[
            'subscription_name' => 'required',
            'description' => 'required',
            'number_days' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $subscription = new SubscriptionPackage;
        $subscription->subscription_name = $request->subscription_name;
        $subscription->description = $request->description;
        $subscription->number_days = $request->number_days;
        $subscription->type = $request->type;
        $subscription->status = $request->status;
        $subscription->price = $request->price;
        $subscription->save();

        return redirect()->route('admin::adminDashboard')->with('success_message', 'New Subscription Added.');
    }
    protected function edit($id)
    {
        $edit_sub = SubscriptionPackage::findorfail($id);
        return view('subscription.subedit')->with([
            'edit' => $edit_sub
        ]);
    }

    protected function update($id, Request $request)
    {
        $this->validate($request,[
            'subscription_name' => 'required',
            'description' => 'required',
            'number_days' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $subscription = SubscriptionPackage::findorfail($id);
        $subscription->subscription_name = $request->subscription_name;
        $subscription->description = $request->description;
        $subscription->number_days = $request->number_days;
        $subscription->type = $request->type;
        $subscription->status = $request->status;
        $subscription->price = $request->price;
        $subscription->save();

        return redirect()->route('admin::adminSubView')->with('success_message', 'Subscription Altered');
    }
}
