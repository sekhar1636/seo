@extends('common.layout')
@section('title', 'Staff Subscription')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/css/formValidation.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/active.css')}}">
@endsection
@section('js')
    <script src="{{asset('assets/js/formValidation.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
@endsection
@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!}
                </span>
                </div>
                <div class="alert alert-success {{{ Session::has('success_message') ? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!}
                </span>
                </div>
                <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-doc font-green"></i> <span class="caption-subject bold font-green uppercase">Subscribed Now</span> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row" style="margin-top: 10px;">
                            <form id="paymentForm" class="form-horizontal" method="post" action="{{route('staff::storeStaffPayment')}}" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label class="col-xs-3 control-label">Subscription Plan</label>
                                    <div class="col-xs-5">
                                        <select name="subscription" class="form-control">
                                            @foreach($membershipPeriods as $key=>$value)
                                                <option value="{{$value->id}}">{{$value->name}} ({{date("m/d/Y",strtotime($value->start_date))}} - {{date("m/d/Y",strtotime($value->end_date))}})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                               <!-- //foreach($products as $product)
                                    <div class="form-group">
                                        <label class="col-xs-3 control-label">//$product->name}}</label>
                                        <div class="col-xs-5">
                                            <select name="products[//$product->id}}][varid]" class="form-control">
                                                //foreach($product->product_variant as $val)
                                                    <option value="// $val['id'] }}">// $val['product_variant'] ? 'Variant: '.$val['product_variant'] : 'No variant'}} // $val['price'] ? 'Price:'.$val['price'] : ' '  }}</option>
                                                //endforeach
                                            </select>
                                            <p class="product-description">//html_entity_decode($product->description)!!}</p>
                                            <span class="button-checkbox">
                                <button type="button" class="btn" data-color="primary">Add to Cart</button>
                                <input type="checkbox" class="hidden" name="products[//$product->id}}][proid]" value="//$product->id" />
                            </span>
                                        </div>
                                    </div>
                                //endforeach --> <div class="form-group">
                                    <div class="col-xs-9 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                                    </div>
                                </div>
                                <input type="hidden" name="token" value="" />
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection