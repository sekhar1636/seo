@extends('admin.layout')
@section('title', 'Edit Actor Profile')
@section('style')
<link href="{{asset('assets/css/datatables.bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css">
<style type="text/css">
	.form .form-body{
		padding: 0px;
	}
	.form .form-section{
		margin: 15px 0px 25px 0px;
	}
	.newSelect{
		border: 1px solid #c2cad8;
    	padding: 4px;
	}
</style>
@endsection
@section('js')
<script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
 <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/additional-methods.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatables.bootstrap.js')}}"></script>
<script src="{{asset('assets/js/handlebars.js')}}"></script>
<script type="text/javascript">
$(function(){
	$('#cropbox').Jcrop({
        onSelect: updateCoords,
        setSelect: [0, 160, 160, 0],// you have set proper proper x and y coordinates here
        minSize:[75,75],
        aspectRatio: 1
    });
	var template = Handlebars.compile($("#details-template").html());
	var table =$('#payments-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("admin::adminUserPaymentDataTable",$user->id)}}',
        columns: [
            {data: 'transaction_id'},
            {data: 'total_price'},
			{
                className:      'details-control',
                orderable: false,
                searchable: false,
                data:           null,
                defaultContent: '<button class="btn btn-primary">View Details</button>'
            }
        ]
    });
	// Add event listener for opening and closing details
	$('#payments-table tbody').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = table.row(tr);
		var tableId = 'posts-' + row.data().id;
		if (row.child.isShown()) {
			// This row is already open - close it
			$(this).html('<button class="btn btn-primary">View Details</button>');
			row.child.hide();
			tr.removeClass('shown');
		} else {
			// Open this row
			$(this).html('<button class="btn btn-danger">Hide Details</button>');
			row.child(template(row.data())).show();
			initTable(tableId, row.data());
			tr.addClass('shown');
			tr.next().find('td').addClass('no-padding bg-gray');
		}
	});
	function initTable(tableId, data) {
		$('#' + tableId).DataTable({
				processing: true,
				serverSide: true,
				searching: false,
				paging: false,
				bInfo: false,
				ajax: data.details_url,
				columns: [
					{data: 'id'},
		            {data: 'item'},
					{data: 'price'},
					{data: 'created_at'}
				]
			})
		};
	});
	function updateCoords(c){
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};
	function checkCoords(){
		if (parseInt($('#w').val())) return true;
			alert('Please select a crop region then press submit.');
		return false;
	};
</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 330px;
    height: 330px;
    font-size: 24px;
    display: block;
  }
</style>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
@endsection
@section('content')
 <!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
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
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{isset($actor->photo_url) ? asset($actor->photo_url) : asset('assets/images/photos/default-medium.jpg')}}" class="img-responsive" alt=""> </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$user->name}}</div>
                        <div class="profile-usertitle-name"><a href="mailto:{{$user->email}}"> {{$user->email}}</a></div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                    	<a href="#tab_1_2" data-toggle="tab" class="btn btn-circle green btn-sm">Update Profile Picture</a>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="#tab_1_1" data-toggle="tab">
                                    <i class="icon-user"></i> Personal Information </a>
                            </li>
                            <li>
                                <a href="#tab_1_2"  data-toggle="tab">
                                    <i class="icon-picture"></i> Profile Picture</a>
                            </li>
                            <li>
                                <a href="#tab_1_3" data-toggle="tab">
                                    <i class="icon-key"></i> Actor Invoices </a>
                            </li>
							<li>
								<a href="#tab_1_4" data-toggle="tab">
									<i class="icon-key"></i> Paper Work </a>
							</li>
							<li>
								<a href="#tab_1_5" data-toggle="tab">
									<i class="icon-key"></i> Audition </a>
							</li>
							<li>
								<a href="#tab_actor_audition" data-toggle="tab">
									<i class="icon-key"></i> ADMIN Audition </a>
							</li>
							<li>
								<a href="#tab_1_6" data-toggle="tab">
									<i class="icon-key"></i> Change Password
								</a>
							</li>
						</ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Actor Profile</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li {{  (Session::has('tabactive') ? '' : 'class=active'  ) }}>
                                        <a href="#tab_1_1" data-toggle="tab">Personal Information</a>
                                    </li>
                                    <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>
                                        <a href="#tab_1_2" data-toggle="tab">Change Profile Picture</a>
                                    </li>
                                    <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>
                                        <a href="#tab_1_3" data-toggle="tab">Actor Invoices</a>
                                    </li>
									<li {{  (Session::has('tabactive') ? 'class=active' : '') }}>
										<a href="#tab_1_4" data-toggle="tab">Paper Work</a>
									</li>
									<li {{  (Session::has('tabactive') ? 'class=active' : '') }}>
										<a href="#tab_1_5" data-toggle="tab">Audition</a>
									</li>
									<li {{  (Session::has('tabactive') ? 'class=active' : '') }}>
										<a href="#tab_actor_audition" data-toggle="tab">ADMIN Audition</a>
									</li>
                                 	<li {{ (Session::has('tabactive') ? 'class=active' : '') }}>
										<a href="#tab_1_6" data-toggle="tab">Change Password</a>
									</li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane {{  (Session::has('tabactive') ? '' : 'active') }}" id="tab_1_1">
                                         <div class="portlet-body form">
				        <!-- BEGIN FORM-->
				        <form method="POST" action="{{route('admin::adminActorUpdate',$id)}}" class="form-horizontal form-validate-auto"  enctype="multipart/form-data">
				        {{csrf_field()}}
				            <div class="form-body">
				                <h3 class="form-section">Personal Information</h3>
				                <div class="row">
			                        </div>
			                        @if(isset($actor))
			                        	<input type="hidden" name="method" value="PUT"/>
			                        @else
			                        	<input type="hidden" name="method" value="POST"/>
			                        @endif
								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has("display_name") ? "has-error":"" }}">
											<label class="control-label col-md-3">Display Name</label>
											<div class="col-md-9">
												{!! Form::text('display_name',$user->name ? $user->name : null, ['class' => 'form-control', 'placeholder' => 'Display Name']) !!}
												<span class="help-block"> {{ $errors->first("display_name") }} </span>
											</div>
										</div>
									</div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Website URL</label>
                                            <div class="col-md-9">
                                                {!! Form::text('website_url',@$actor->website_url ? $actor->website_url : null, ['class'=>'form-control','placeholder'=>'Personal Website or YouTube Channel']) !!}
                                            </div>
                                        </div>
                                    </div>
								</div>
				                <div class="row">
				                    <div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("first_name") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">First Name</label>
				                                <div class="col-md-9">
				                                {!! Form::text('first_name',@$actor->first_name, ['class' => 'form-control', 'placeholder' => ' First Name', 'required'=>'required', 'minlength'=>'2', 'maxlength'=>'20']) !!}
				                                <span class="help-block"> {{ $errors->first("first_name") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("age") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">Age</label>
				                                <div class="col-md-9">
				                                {!! Form::select('age',$age, @$actor->age, [  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}
				                                <span class="help-block"> {{ $errors->first("age") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="row">
				                	<div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("last_name") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">Last Name</label>
				                                <div class="col-md-9">
				                                {!! Form::text('last_name',@$actor->last_name, ['class' => 'form-control', 'placeholder' => ' Last Name', 'required'=>'required', 'minlength'=>'2', 'maxlength'=>'20']) !!}
				                                <span class="help-block"> {{ $errors->first("last_name") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("hair") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">Hair</label>
				                                <div class="col-md-9">
				                                {!! Form::select('hair',\App\Misc::$hair, @$actor->hair, [  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}
				                                <span class="help-block"> {{ $errors->first("Hair") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <!--/row-->
				                <div class="row">
				                    <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("gender") ? "has-error":"" }}'>
				                            <label class="control-label col-md-3">Gender</label>
				                            <div class="col-md-9">
				                               {!! Form::select('gender',['' => 'Select Gender'] +App\Misc::$genders, @$actor->gender, ['in' => 'App\Misc::$genders',  'required' => 'required', 'maxlength' => '7', 'class' => 'form-control  account-type-select']) !!}
				                                <span class="help-block"> {{ $errors->first("gender") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                     <div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("eyes") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">Eyes</label>
				                                <div class="col-md-9">
				                                {!! Form::select('eyes',\App\Misc::$eyes, @$actor->eyes, [  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}
				                                <span class="help-block"> {{ $errors->first("eyes") }} </span>
				                            </div>
				                        </div>
				                    </div>
						</div>
				                <!--/row-->
				                <div class="row">
				                	 <div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("feet") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">Height</label>
				                                <div class="col-md-9">
				                                	{!! Form::select('feet',[''=>'Feet']+App\Misc::$feet, @$actor->feet, ['required' => 'required',  'class' => 'newSelect']) !!}
					                                {!! Form::select('inch',[''=>'inch']+App\Misc::$inch, @$actor->inch, ['required' => 'required',  'class' => 'newSelect']) !!}
				                                <span class="help-block"> {{ $errors->first("feet") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                    <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("ethnicity") ? "has-error":"" }}'>
				                            <label for="multiple" class="control-label col-md-3">Ethnicity</label>
				                            <div class="col-md-9">
				                                {!! Form::select('ethnicity[]',App\Misc::$ethnicity, isset($actor->ethnicity) ? explode(',', $actor->ethnicity): '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple']) !!}
				                                <span class="help-block"> {{ $errors->first("ethnicity") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                </div>
				                <div class="row">
				                   <div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("weight") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">Weight</label>
				                                <div class="col-md-9">
				                                {!! Form::select('weight',$weight, @$actor->weight, [  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}
				                                <span class="help-block"> {{ $errors->first("weight") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group" {{ $errors->has("school") ? "has-error":"" }}'>
				                                <label class="control-label col-md-3">School</label>
				                                <div class="col-md-9">
				                                {!! Form::text('school', @$actor->school, ['class' => 'form-control', 'placeholder' => 'School','maxlength'=>'150', 'minlength'=>'3']) !!}
				                                <span class="help-block"> {{ $errors->first("school") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                     				                </div>
				                <h3 class="form-section">Additional Information</h3>
				                <!--/row-->
				                <div class="row">
				                    <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("auditionType") ? "has-error":"" }}'>
				                            <label class="control-label col-md-3">Audition Type</label>
				                            <div class="col-md-9">
				                               {!! Form::select('auditionType',['' => 'Select Audition Type'] +App\Misc::$auditionType, @$actor->auditionType, ['in' => 'App\Misc::$auditionType',  'class' => 'form-control  account-type-select']) !!}
				                                <span class="help-block"> {{ $errors->first("auditionType") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("vocalRange") ? "has-error":"" }}'>
				                            <label class="control-label col-md-3">Vocal Range</label>
				                            <div class="col-md-9">
				                               {!! Form::select('vocalRange',['' => 'Select Vocal Range'] +App\Misc::$vocalRange, @$actor->vocalRange, ['in' => 'App\Misc::$vocalRange',  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}
				                                <span class="help-block"> {{ $errors->first("vocalRange") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="row">
				                    <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("jobType") ? "has-error":"" }}'>
				                            <label for="multiple" class="control-label col-md-3" >Will Consider</label>
				                            <div class="col-md-9">
				                                {!! Form::select('jobType[]',App\Misc::$jobTypes, isset($actor->jobType) ? explode(',', $actor->jobType): '', ['class' => 'form-control select2-multiple', 'multiple']) !!}
				                                <span class="help-block"> {{ $errors->first("jobType") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                     <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("dance") ? "has-error":"" }}'>
				                            <label for="multiple" class="control-label col-md-3">Dance</label>
				                            <div class="col-md-9">
				                                {!! Form::select('dance[]',App\Misc::$dance, isset($actor->dance) ? explode(',', $actor->dance): '', [  'class' => 'form-control select2-multiple', 'multiple']) !!}
				                                <span class="help-block"> {{ $errors->first("dance") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                </div>
				                <!--/row-->
				                <div class="row">
				                    <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("technical") ? "has-error":"" }}'>
				                            <label for="multiple" class="control-label col-md-3" >Technicals</label>
				                            <div class="col-md-9">
				                                {!! Form::select('technical[]',App\Misc::$technical, isset($actor->technical) ? explode(',', $actor->technical): '', ['class' => 'form-control select2-multiple', 'multiple']) !!}
				                                <span class="help-block"> {{ $errors->first("technical") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                    <div class="col-md-6">
				                         <div class="form-group" {{ $errors->has("instrument") ? "has-error":"" }}'>
				                            <label for="multiple" class="control-label col-md-3" >Instruments</label>
				                            <div class="col-md-9">
				                                {!! Form::select('instrument[]',App\Misc::$instrument, isset($actor->instrument) ? explode(',', $actor->instrument): '', ['class' => 'form-control select2-multiple', 'multiple']) !!}
				                                <span class="help-block"> {{ $errors->first("instrument") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                </div>
				                <!--/row-->
				                <div class="row">
				                    				                     <div class="col-md-6">
																			 <div class="form-group" {{ $errors->has("misc") ? "has-error":"" }}'>
				                            <label for="multiple" class="control-label col-md-3">Misc</label>
				                            <div class="col-md-9">
				                                {!! Form::select('misc[]',App\Misc::$misc, isset($actor->misc) ? explode(',', $actor->misc): '', ['class' => 'form-control select2-multiple', 'multiple']) !!}
				                                <span class="help-block"> {{ $errors->first("misc") }} </span>
				                            </div>
				                        </div>
				                    </div>
				                    <!--/span-->
				                    <div class="col-md-6">
				                	<div class="form-group">
	                                    <label class="control-label col-md-3">Employment Availability</label>
	                                    <div class="col-md-9">
	                                        <div class="input-group input-large date-picker input-daterange" data-date="2012/11/10" data-date-format="yyyy/mm/dd">
	                                        	{!! Form::text('from', @$actor->from, ['class' => 'form-control', 'placeholder' => 'From', 'required'=>'required']) !!}
	                                            	                                            <span class="input-group-addon"> to </span>
	                                            {!! Form::text('to', @$actor->to, ['class' => 'form-control', 'placeholder' => 'To', 'required'=>'required']) !!} </div>
	                                        <!-- /input-group -->
	                                        <span class="help-block"> {{ $errors->first("from") }} {{ $errors->first("to") }} </span>
	                                    </div>
	                                </div>
	                                </div>
				                </div>
				                <!--/row-->
				               				                <h3 class="form-section">Resume</h3>
				                 <div class="row">
				                 	<div class="col-md-9">
				                 		<div class="form-group">
                                        <label class="control-label col-md-3">Resume (Optional)</label>
                                        <div class="col-md-3">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="input-group input-large">
                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                        <span class="fileinput-filename"> {{isset($actor->resume_path) ? 'Resume exist' : ''}}</span>
                                                    </div>
                                                    <span class="input-group-addon btn default btn-file">
                                                        <span class="fileinput-new"> Select file </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="resume"> </span>
                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <span class="help-block"> {{ $errors->first("resume") }} </span>
                                        </div>
                                    </div>
				                 	</div>
				                 </div>
							 @if(isset($actor->resume_path))
							 <div class="row">
								 <div class="col-md-9">
									 <div class="form-group">
										 <label class="control-label col-md-3">Actor Resume</label>
										 <div class="col-md-6">
												 <a href="{{ asset($actor->resume_path) }}" target="_blank" class="btn btn-xs btn-primary"><i class="fa fa-download"></i>Download</a>
										 </div>
									 </div>
								 </div>
							 </div>
							@endif
							 <div class="row">
								 <div class="col-md-9">
									 <div class="form-group">
										 <label class="control-label col-md-3">Phone Number</label>
										 <div class="col-md-6">
											 {{ Form::text('phone_number',@$actor->phone_number ? $actor->phone_number : '',['class'=>'form-control','placeholder'=>'Enter Your Phone Number Here']) }}
										 </div>
									 </div>
								 </div>
							 </div>
						</div>
				            <div class="form-actions">
				                <div class="row">
				                    <div class="col-md-6">
				                        <div class="row">
				                            <div class="col-md-offset-3 col-md-9">
				                                <button type="submit" class="btn green">Submit</button>
				                                <button type="button" class="btn default">Cancel</button>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="col-md-6"> </div>
				                </div>
				            </div>
				        </form>
				        <!-- END FORM-->
   					 </div>
                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2">
                                        @if(isset($actor->precrop_url))
                                        	<img src="{{asset($actor->precrop_url)}}" width="500" height="500" id="cropbox" />
											<!-- This is the form that our event handler fills -->
											<form style="margin-top: 30px;" action="{{route('admin::actorCropPhoto',$id)}}" method="post" onsubmit="return checkCoords();">
											{{csrf_field()}}
												<input type="hidden" id="x" name="x" />
												<input type="hidden" id="y" name="y" />
												<input type="hidden" id="w" name="w" />
												<input type="hidden" id="h" name="h" />
												<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
												<a href="{{route('admin::actorPhotoDelete',$id)}}" class="btn btn-large btn-danger" >Delete Picture</a>
											</form>
                                        @else
	                                        <form action="{{route('admin::actorPhotoUpdate',$id)}}" enctype="multipart/form-data" role="form" method="POST">
	                                        {{csrf_field()}}
	                                            <div class="form-group clearfix {{ $errors->has('photo') ? 'has-error' : '' }}">
					                           <!--  <label class="control-label col-md-3">Photo</label> -->
					                            <div class="col-md-9">
					                                <div class="fileinput {{ @$slider->photo_url ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
					                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
					                                        <img src="{{ isset($slider->photo_url) ? $slider->photo_url : asset('assets/images/photos/default-medium.jpg') }}" alt="{{ @$slider->name }}" />
		                                    </div>
					                                    <div class="fileinput-buttons">
					                                        <span class="btn default btn-file">
					                                        <span class="fileinput-new">Select image </span>
					                                        <span class="fileinput-exists">Change </span>
					                                        <input type="hidden" value="" name="...">
					                                        <input type="file" name="photo" />
					                                        </span>
					                                        <a href="javascript:;" class="btn red fileinput-exists hidden" data-dismiss="fileinput">
					                                        Remove </a>
					                                        <div class="help-block"> {{ $errors->first("photo") }} </div>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
	                                            <div class="margin-top-10">
  <button type="submit" class="btn green"> Submit </button>
	                                                <a href="javascript:;" class="btn default"> Cancel </a>
	                                            </div>
	                                        </form>
                                        	@endif
                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
 <div class="tab-pane" id="tab_1_4">
	 <form action="{{route('admin::hardCopyUpdate',$id)}}" enctype="multipart/form-data" role="form" method="POST">
		 {{csrf_field()}}
		 <div class="form-group clearfix {{ $errors->has('photo') ? 'has-error' : '' }}">
			 <!--  <label class="control-label col-md-3">Photo</label> -->
			 <div class="col-md-9">
				 <label for="Roles" class="control-label col-md-3">Paper Work Status</label>
				 <div class="col-md-9">
					 {!! Form::select('hardcopy',['' => 'Pending', 1 => 'Incomplete', 2 => 'Received', 3 => 'Selected for Audition', 4 => 'Not selected for audition'], @$actor->hardcopy_status ? $actor->hardcopy_status : '', ['required' => 'required',  'class' => 'form-control', 'id' => "hardcp"]) !!}
					 <span class="help-block"> {{ $errors->first("roles_chosen") }} </span>
				 </div>
			 </div>
			 <div class="margin-top-20">
				 <button type="submit" class="btn green"> Submit </button>
			 </div>
			 </div>
	 </form>
		 </div>
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <table id="payments-table" class="table">
                                          <thead>
                                          <tr>
                                          <td>Transaction ID</td>
                                          <td>Total Price</td>
                                          <td></td>
                                          </tr>
                                          </thead>
                                          </table>
                                          <script id="details-template" type="text/x-handlebars-template">
											<div class="label label-info">Transaction Details</div>
											<table class="table details-table" id="posts-@{{id}}">
												<thead>
													<tr>
														<th>ID</th>
														<th>Price</th>
														<th>Item</th>
														<th>Date</th>
													</tr>
												</thead>
											</table>
										</script>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
 <div class="tab-pane" id="tab_1_5">
	 <form action="{{route('admin::adminextrafields',$user->id)}}" enctype="multipart/form-data" role="form" method="POST">
		 {{csrf_field()}}
		 <div class="form-group clearfix {{ $errors->has('photo') ? 'has-error' : '' }}">
			 <!--  <label class="control-label col-md-3">Photo</label> -->
			 <div class="row">
		<div class="col-md-4">
			 <div class="form-group" {{ $errors->has("last_audition_year") ? "has-error":"" }}'>
			 <label class="control-label col-md-6">Did You audition at Strawhat last Year?</label>
				 <div class="col-md-4">
				 {!! Form::select('last_audition_year',[0=>'No',1=>'Yes'],(count($ax->last_audition_year)) ? $ax->last_audition_year : null) !!}
				 <span class="help-block"> {{ $errors->first("last_audition_year") }} </span>
			 </div>
		 </div>
				 </div>
			 <div class="col-md-4">
				 <div class="form-group" {{ $errors->has("last_audition_two_year") ? "has-error":"" }}'>
				 <label class="control-label col-md-6">(2) Years ago?</label>
				 <div class="col-md-4">
					 {!! Form::select('last_audition_two',[0=>'No',1=>'Yes'],(count($ax->last_audition_two)) ? $ax->last_audition_two : null) !!}
					 <span class="help-block"> {{ $errors->first("last_audition_two_year") }} </span>
				 </div>
			 </div>
		 </div>
			 <div class="col-md-4">
						 <div class="form-group" {{ $errors->has("last_audition_year") ? "has-error":"" }}'>
						 <label class="control-label col-md-6">Last Audition Year?</label>
						 <div class="col-md-6">
							 {!! Form::text('last_year_year', @$ax->last_year_year ? $ax->last_year_year : null, ['class' => 'form-control', 'placeholder' => 'Year','minlength'=>'3', 'maxlength'=>'20']) !!}
							 <span class="help-block"> {{ $errors->first("last_audition_year") }} </span>
						 </div>
					 </div>
				 </div>
		 </div>
 <div class="row">
	 <div class="col-md-4">
		 <div class="form-group" {{ $errors->has("last_audition_year") ? "has-error":"" }}'>
		 <label class="control-label col-md-6">Did You apply for an audition in last Year?</label>
		 <div class="col-md-4">
			 {!! Form::select('audition_last_apply',[0=>'No',1=>'Yes'],@$ax->audition_last_apply ? $ax->audition_last_apply : null) !!}
			 <span class="help-block"> {{ $errors->first("last_audition_year") }} </span>
		 </div>
	 </div>
 </div>
 <div class="col-md-4">
	 <div class="form-group" {{ $errors->has("last_audition_year") ? "has-error":"" }}'>
	 <label class="control-label col-md-6">Summer Stock Last Year?</label>
	 <div class="col-md-4">
		 {!! Form::select('summer_stock_last_year',[0=>'No',1=>'Yes'],@$ax->summer_stock_last_year ? $ax->summer_stock_last_year : null ) !!}
		 <span class="help-block"> {{ $errors->first("summer_stock_last_year") }} </span>
	 </div>
 </div>
 </div>
 <div class="col-md-4">
	 <div class="form-group" {{ $errors->has("where_place") ? "has-error":"" }}'>
	 <label class="control-label col-md-6">Where?</label>
	 <div class="col-md-6">
		 {!! Form::text('where_place',@$ax->where_place ? $ax->where_place : null, ['class' => 'form-control', 'placeholder' => 'Where', 'minlength'=>'3', 'maxlength'=>'20']) !!}
		 <span class="help-block"> {{ $errors->first("where_place") }} </span>
	 </div>
 </div>
 </div>
 </div>
		 <div class="row">
			 <div class="col-md-12">
				 <div class="form-group" {{ $errors->has("unpaid_apprentice") ? "has-error":"" }}'>
				 <label class="control-label col-md-6">Would you consider accepting an unpaid apprentice position?</label>
				 <div class="col-md-6">
					 {!! Form::select('unpaid_apprentice',[0=>'No',1=>'Yes'],@$ax->unpaid_apprentice ? $ax->unpaid_apprentice : null) !!}
					 <span class="help-block"> {{ $errors->first("unpaid_apprentice") }} </span>
				 </div>
			 </div>
		 </div>
		 </div>
 <div class="row">
	 <div class="col-md-12">
		 <div class="form-group" {{ $errors->has("internship") ? "has-error":"" }}'>
		 <label class="control-label col-md-6">An internship Involving crew works as well as performing?</label>
		 <div class="col-md-6">
			 {!! Form::select('internship',[0=>'No',1=>'Yes'],@$ax->internship ? $ax->internship : null ) !!}
			 <span class="help-block"> {{ $errors->first("internship") }} </span>
		 </div>
	 </div>
 </div>
 </div>
 <div class="row">
	 <div class="col-md-12">
		 <div class="form-group" {{ $errors->has("standby_appointment") ? "has-error":"" }}'>
		 <label class="control-label col-md-6">Will You accept a standby Appointment?</label>
		 <div class="col-md-6">
			 {!! Form::select('standby_appointment',[0=>'No',1=>'Yes'],@$ax->standby_appointment ? $ax->standby_appointment : null ) !!}
			 <span class="help-block"> {{ $errors->first("standby_appointment") }} </span>
		 </div>
	 </div>
 </div>
 </div>
 <div class="row">
	 <div class="col-md-12">
		 <div class="form-group" {{ $errors->has("Union_status") ? "has-error":"" }}'>
		 <label class="control-label col-md-3">Union Status</label>
		 <div class="col-md-9">
			 {!! Form::checkbox('emca',1,@$ax->emca ? true : null) !!}
			 <label>EMC</label>
			 {!! Form::checkbox('sag',1,@$ax->sag ? true:null) !!}
			 <label>SAG</label>
			 {!! Form::checkbox('aftra',1,@$ax->aftra ? true:null) !!}
			 <label>AFTRA</label>
			 {!! Form::checkbox('agva',1,@$ax->agva ? true:null) !!}
			 <label>AGVA</label>
			 {!! Form::checkbox('agma',1,@$ax->agma ? true:null) !!}
			 <label>AGMA</label>
			 <span class="help-block"> {{ $errors->first("standby_appointment") }} </span>
		 </div>
	 </div>
 </div>
 </div>
 <div class="row">
	 <div class="col-md-12">
		 <div class="form-group" {{ $errors->has("DAY") ? "has-error":"" }}'>
		 <label class="control-label col-md-3">Auditions Availability</label>
		 <div class="col-md-9">
			 {!! Form::checkbox('friday_m',1,@$ax->friday_m ? true : null) !!}
			 <label>Friday Morning</label>
			 {!! Form::checkbox('friday_af',1,@$ax->friday_af ? true : null) !!}
			 <label>Friday Afternoon</label>
			 {!! Form::checkbox('saturday_m',1,@$ax->saturday_m ? true :null) !!}
			 <label>Saturday Morning</label>
			 {!! Form::checkbox('saturday_af',1,@$ax->saturday_af ? true :null) !!}
			 <label>Saturday Afternoon</label>
			 {!! Form::checkbox('sunday_m',1,@$ax->sunday__m ? true:null) !!}
			 <label>Sunday Morning</label>
			 {!! Form::checkbox('sunday_af',1,@$ax->sunday_af ? true:null) !!}
			 <label>Sunday Afternoon</label>
			 <span class="help-block"> {{ $errors->first("standby_appointment") }} </span>
		 </div>
	 </div>
 </div>
 </div>
 <div class="margin-top-20">
				 <button type="submit" class="btn green"> Submit </button>
			 </div>
		 </div>
	 </form>
 </div>
 
 <div class="tab-pane" id="tab_actor_audition">
 	<form action="{{route('admin::adminAuditions',$id)}}" enctype="multipart/form-data" role="form" method="POST">
		{{csrf_field()}}
        <div class="row" style="background-color:#EEE; padding:25px;">
        	<div class="col-md-3">
				<div class="form-group" {{ $errors->has("adminAudition_day") ? "has-error":"" }}'>
					<label class="control-label">Audition Day</label>
					<div class="">
					{!! Form::select('adminAudition_day',\App\Misc::$auditionDay, @$actor->adminAudition_day, [  'required' => 'required',  'class' => 'form-control']) !!}
					</div>
				</div>
	        </div>
        	<div class="col-md-3">
                <div class="form-group" {{ $errors->has("adminAudition_hours`") ? "has-error":"" }}'>
                    <label class="control-label">Audition Hours</label>
                    <div class="">
                    {!! Form::select('adminAudition_hours',@['' => '-Select Hours-']+$hours, $audhour ? $audhour : '', ['class' => 'form-control']) !!}
					</div>
                </div>
            </div>
			<div class="col-md-3">
				<div class="form-group" {{ $errors->has("adminAudition_time`") ? "has-error":"" }}'>
					<label class="control-label">Audition Minutes</label>
					<div class="">
						{!! Form::select('adminAudition_minutes',@['' => '-Select Minutes-']+$minutes, $audmin ? $audmin : '', ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>
            <div class="col-md-3">
                <div class="form-group" {{ $errors->has("adminAudition_am`") ? "has-error" : "" }}'>
                    <label class="control-label">AM/PM</label>
	                <div class="">
	                    {!! Form::select('adminAudition_am',[''=>'-AM/PM-','AM'=>'AM','PM'=>'PM'],$ampm ? $ampm : '',['class'=>'form-control']) !!}
	                </div>
                </div>
            </div>
        </div><div class="clearfix"></div>
        <div class="row">
	        <h3 class="text-center">or</h3>
        </div><div class="clearfix"></div>
 		<div class="row" style="background-color:#EEE; padding:25px;">
			<div class="col-md-12">
				<div class="form-group" {{ $errors->has("adminAudition_standby") ? "has-error":"" }}'>
					<label class="control-label col-md-3">Audition StandBy</label>
					<div class="col-md-9">
						{!! Form::select('adminAudition_standBy', ['' => '-Select standby-']+$standby, @$actor->adminAudition_standby ? $actor->adminAudition_standby : '-Select a Standby-', ['class' => 'form-control']) !!}
					</div>
				</div>
			</div>
        </div><div class="clearfix"></div>
        <div class="row" style="background-color:#EEE; padding:25px; margin-top:15px;">
			<div class="col-md-12">
				<button type="submit" class="btn btn-block green"> Update ADMIN AUDITION </button>
			</div>
 		</div>
	 </form>
 </div>

 <div class="tab-pane" id="tab_1_6">
	 <form action="{{route('admin::postEditPassword',$id)}}"
		   class="form-validate-auto" method="POST">
		 <div class="form-group" {{ $errors->has("new_password") ? "has-error":"" }}>
			 <label class="control-label">New Password</label>
			 <div class="input-group">
						                        <span class="input-group-addon">
						                            <i class="fa fa-key"></i>
						                        </span>
				 {{csrf_field()}}
				 {!! Form::password('new_password', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password', 'required'=>'required','maxlength' => '15','minlength'=>'6', 'id'=>'PasswordField']) !!}
			 </div>
			 <span class="help-block"> {{ $errors->first("new_password") }} </span>
		 </div>
		 <div class="form-group" {{ $errors->has("re_password") ? "has-error":"" }}>
			 <label class="control-label">Re-type New Password</label>
			 <div class="input-group">
						                        <span class="input-group-addon">
						                            <i class="fa fa-key"></i>
						                        </span>
				 {!! Form::password('re_password', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password', 'required'=>'required','maxlength' => '15','minlength'=>'6', 'equalTo'=>'#PasswordField']) !!}
			 </div>
			 <span class="help-block"> {{ $errors->first("re_password") }} </span>
		 </div>
		 <div class="margin-top-10">
			 <button type="submit" class="btn green"> Change Password</button>
		 </div>
	 </form>
 </div>
 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->
@endsection