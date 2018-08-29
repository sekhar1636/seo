@extends('admin.layout')
@section('title', 'Subscriptions')
@section('style')
  <link href="{{asset('assets/css/datatables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
<script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('.input-daterange input').each(function() {
    $(this).datepicker({
  });
});
  $('#staff_price').hide();
    $('#staff_select').on('change', function(){
        var find = $('#staff_select').val();
        if(find == 'Staff'){
            $('#staff_price').hide();
            $('#price').val("0");
        }
        else {
            $('#staff_price').show();
        }
    });
    $('#but').click(function(){
        var find = $('#staff_select').val();
        if(find == 'Staff'){
            $('#price').val("0");
        }
    });
});
</script> 
@endsection
@section('content')
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
        <button class="close" data-close="alert"></button>
        <span> {!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!} </span> </div>
      <div class="alert alert-success {{{ Session::has('success_message') ? '' : 'display-hide' }}}">
        <button class="close" data-close="alert"></button>
        <span> {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!} </span> </div>
      <!-- BEGIN CONTENT -->
      <div class="profile-content">
        <div class="row">
          <div class="col-md-12">
            <div class="portlet light ">
              <div class="portlet-title tabbable-line">
                <ul class="nav nav-tabs">
                  <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit Plan</a> </li>
                </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
                  <!--TAB -->
                  <div class="tab-pane active" id="tab_1_2"> 
                  {{ Form::model($membershipPeriod, ['method' => 'PATCH','route' => ['admin::adminSubscriptionUpdate',$membershipPeriod->id], 'class' => 'form-horizontal']) }}
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) }}
                      <div class="col-lg-10"> {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Plan Name','required'=>'required',  'minlength'=>'3', $membershipPeriod->status ? '' : 'readonly']) }}
                        <p class="help-block">{{ $errors->first('name', ':message') }}</p>
                      </div>
                    </div>
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}"  id="staff_price"> {{ Form::label('price', 'Price', ['class' => 'col-lg-2 control-label']) }}
                      <div class="col-lg-10"> {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter Price','required'=>'required', 'id' => 'price', $membershipPeriod->status ? '' : 'readonly']) }}
                        <p class="help-block">{{ $errors->first('price', ':message') }}</p>
                      </div>
                    </div>
                  @if($membershipPeriod->status == 1)
                      <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                      {{ Form::label('type_lab', 'Type', ['class' => 'col-lg-2 control-label'] )  }}
                      <div class="col-lg-10">
                        {{  Form::select('type', ['Actor'=>'Actor', 'Theater'=>'Theater', 'Staff' => 'Staff'],null, array('class' => 'form-control', 'id' => 'staff_select', 'placeholder'=>'Select Type', 'required'=>'required')) }}
                        <p class="help-block">{{ $errors->first('type', ':message') }}</p>
                      </div>
                    </div>
                    @endif
                    <div class="form-group{{ ($errors->has('start_date')||$errors->has('end_date')) ? ' has-error' : '' }}"> {{ Form::label('from', 'Date', ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                    <div class="input-group input-large date-picker {{ $membershipPeriod->status ? 'input-daterange' : '' }}" data-date="2012/11/10" data-date-format="yyyy-mm-dd">
                    {!! Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'From', 'required'=>'required', 'readonly']) !!}
                    <span class="input-group-addon"> to </span> 
                    {!! Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'To', 'required'=>'required', 'readonly']) !!}
                    </div>
                    <p class="help-block">{{ $errors->first('start_date', ':message') }}</p>
                      </div>
                    </div>
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {{ Form::label('status', 'Status', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('status', ['De-Activate','Activate'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                        </div>
                    </div>
                    <!-- NEW SUBSCRIPTION -->
                    <div class="form-group{{ ($errors->has('subscription_type')) ? ' has-error' : '' }}" >
                        {{ Form::label('subscription_type', 'Subscription Type', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10" style="top: 8px;">
                            <input type="radio" name="subscription_type" id="subscription_default" value="default" @if($membershipPeriod->subscription_type == 'default') checked="checked" @else checked="checked" @endif style="vertical-align: text-top;"> Default
                            <input type="radio" name="subscription_type" id="subscription_Special" value="special" @if($membershipPeriod->subscription_type == 'special') checked="checked" @endif style="vertical-align: text-top; margin-left: 15px;"> Special
                            <p class="help-block">{{ $errors->first('subscription_type', ':message') }}</p>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2"> {{ Form::submit('Update Plan', ['class' => 'btn btn-lg btn-info pull-right', 'id' => 'but'] ) }} </div>
                    </div>
                    {{ Form::close() }} </div>
                  <!-- END TAB -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ENd CONTENT -->
    </div>
  </div>
</div>
<!-- END PAGE CONTENT INNER -->
@endsection