@extends('admin.layout')



@section('title', 'Subscriptions')



@section('style')
<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
<link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection



@section('js') 
<script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script> 

<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script> 
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script> 
<script type="text/javascript">
$('#subscription-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("admin::adminSubscriptionsDataTable")}}',
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'price'},
            {data: 'type'},
            {data: 'start_date'},
			{data: 'end_date'},
			{data: 'status'},
			{data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

$(document).ready(function() {
	$('.input-daterange input').each(function() {
    $(this).datepicker({
	});
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
                  <li {{{  (Session::has('tabactive') ? '' : 'class=active') }}}> <a href="#tab_1_1" data-toggle="tab">Subscription Plans</a> </li>
                  <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_2" data-toggle="tab">Add New Plan</a> </li>
                </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">
                    <table id="subscription-table" class="table">
                      <thead>
                        <tr>
                          <td>ID</td>
                          <td>Name</td>
                          <td>Price</td>
                          <td>Type</td>
                          <td>Start Date</td>
                          <td>End Date</td>
                          <td>Status</td>
                          <td>Action</td>
                        </tr>
                      </thead>
                    </table>
                  </div>
                  
                  <!-- END TAB --> 
                  
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2"> {{ Form::open(['route' => 'admin::adminSubscriptionStorePlan', 'class' => 'form-horizontal']) }} 
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) }}
                      <div class="col-lg-10"> {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Plan Name','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('name', ':message') }}</p>
                      </div>
                    </div>
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}"> {{ Form::label('price', 'Price', ['class' => 'col-lg-2 control-label']) }}
                      <div class="col-lg-10"> {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Enter Price','required'=>'required']) }}
                        <p class="help-block">{{ $errors->first('price', ':message') }}</p>
                      </div>
                    </div>

                    <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                      {{ Form::label('type_lab', 'Type', ['class' => 'col-lg-2 control-label'] )  }}
                      <div class="col-lg-10">
                        {{  Form::select('type', ['Actor'=>'Actor', 'Theater'=>'Theater', 'Staff' => 'Staff'],null, array('class' => 'form-control', 'placeholder'=>'Select Type', 'required'=>'required')) }}
                        <p class="help-block">{{ $errors->first('type', ':message') }}</p>
                      </div>
                    </div>
                    
                    
                    <div class="form-group{{ ($errors->has('start_date')||$errors->has('end_date')) ? ' has-error' : '' }}"> {{ Form::label('from', 'Date', ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                    <div class="input-group input-large date-picker input-daterange" data-date="2012/11/10" data-date-format="yyyy-mm-dd"> 
                    {!! Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'From', 'required'=>'required', 'readonly']) !!}
                    <span class="input-group-addon"> to </span> 
                    {!! Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'To', 'required'=>'required', 'readonly']) !!}
                    </div>
                    <p class="help-block">{{ $errors->first('start_date', ':message') }}</p>
                      </div>
                    </div>
                    
                    
                    <!-- Submit Button -->
                    <div class="form-group">
                      <div class="col-lg-10 col-lg-offset-2"> {{ Form::submit('Add Plan', ['class' => 'btn btn-lg btn-info pull-right'] ) }} </div>
                    </div>
                    {{ Form::close() }} </div>
                  <!-- END TAB --> 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- END CONTENT --> 
      
    </div>
  </div>
</div>

<!-- END PAGE CONTENT INNER --> 

@endsection