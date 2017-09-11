<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductVariant;
use Stripe\Stripe as Stripe;
use \Stripe\Plan as StripePlan;
use App\User;
use App\Membership;
use App\MembershipPeriod;
use App\Payment;


class TheaterController extends Controller
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
        $products = Product::latest()->orderBy('id', 'desc')->get();
        return view("theater.products",compact('products'));
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
            return redirect()->route('theater::theaterProfile')->with('success_message', 'Successfully bought products.');
        }

    }

    public function edit(){

        dd(\Auth::user()->theater);
            return view('theater.editProfile')->with('theater',\Auth::user()->theater);



    }

}
