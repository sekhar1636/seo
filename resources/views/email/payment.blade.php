@extends('common.layout')
@section('title', 'Payment')
@section('style')
@endsection
@section('js')
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Payment</div>
                <div class="panel-body">
                    <div>Hello {{ $name }}</div>
                    Click here for <a href="{{ $paymentUrl }}">Payment</a> or Copy and past below payment url in browser
                    <br/> 
                    Payment Url : {{ $paymentUrl }}
                </div>
            </div>
        </div>
    </div>
    </div>