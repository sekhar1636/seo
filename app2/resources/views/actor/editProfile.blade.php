

@extends('common.layout')



@section('title', 'Edit Profile')



@section('style')

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

<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/additional-methods.min.js')}}"></script>



<script type="text/javascript">

 

  $(function(){
    $('#cropbox').Jcrop({ 
        onSelect: updateCoords,
        setSelect: [0, 160, 160, 0],// you have set proper proper x and y coordinates here
        minSize:[300,300],
        maxSize:[300,300],
        aspectRatio: 1
    });
  });

 

  function updateCoords(c)

  {

    $('#x').val(c.x);

    $('#y').val(c.y);

    $('#w').val(c.w);

    $('#h').val(c.h);

  };

 

  function checkCoords()

  {

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



<script src="{{asset('js/main.js')}}" type="text/javascript"></script>

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

                        <img src="{{isset($actor->photo_url) ? $actor->photo_url : asset('images/photos/default-medium.jpg')}}" class="img-responsive" alt=""> </div>

                    <!-- END SIDEBAR USERPIC -->

                    <!-- SIDEBAR USER TITLE -->

                    <div class="profile-usertitle">

                        <div class="profile-usertitle-name"> {{\Auth::user()->name}}</div>

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

                                    <i class="icon-key"></i> Change Password </a>

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

                                    <li >

                                        <a href="#tab_1_1" data-toggle="tab">Personal Information</a>

                                    </li>

                                    <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}>

                                        <a href="#tab_1_2" data-toggle="tab">Change Profile Picture</a>

                                    </li>

                                    <li>

                                        <a href="#tab_1_3" data-toggle="tab">Change Password</a>

                                    </li>

                                 

                                </ul>

                            </div>

                            <div class="portlet-body">

                                <div class="tab-content">

                                    <!-- PERSONAL INFO TAB -->

                                    <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">

                                         <div class="portlet-body form">

				        <!-- BEGIN FORM-->

				        <form method="POST" class="form-horizontal form-validate-auto"  enctype="multipart/form-data">

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

				                        <div class="form-group" {{ $errors->has("first_name") ? "has-error":"" }}'>

				                                <label class="control-label col-md-3">First Name</label>

				                                <div class="col-md-9">

				                                {!! Form::text('first_name',@$actor->first_name, ['class' => 'form-control', 'placeholder' => ' First Name', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}

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

				                                {!! Form::text('last_name',@$actor->last_name, ['class' => 'form-control', 'placeholder' => ' Last Name', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}

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

				                                {!! Form::select('ethnicity[]',App\Misc::$ethnicity, isset($actor->ethnicity) ? explode(',', $actor->ethnicity): '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}

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

				                                {!! Form::text('school', @$actor->school, ['class' => 'form-control', 'placeholder' => 'School', 'required'=>'required','maxlength'=>'150', 'minlength'=>'3']) !!}

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

				                               {!! Form::select('auditionType',['' => 'Select Audition Type'] +App\Misc::$auditionType, @$actor->auditionType, ['in' => 'App\Misc::$auditionType',  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}

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

				                            <label for="multiple" class="control-label col-md-3" >Job Types</label>

				                            <div class="col-md-9">

				                                {!! Form::select('jobType[]',App\Misc::$jobTypes, isset($actor->jobType) ? explode(',', $actor->jobType): '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}

				                                <span class="help-block"> {{ $errors->first("jobType") }} </span>

				                            </div>

				                        </div>

				                    </div>

				                    <!--/span-->

				                     <div class="col-md-6">

				                         <div class="form-group" {{ $errors->has("dance") ? "has-error":"" }}'>

				                            <label for="multiple" class="control-label col-md-3">Dances</label>

				                            <div class="col-md-9">

				                                {!! Form::select('dance[]',App\Misc::$dance, isset($actor->dance) ? explode(',', $actor->dance): '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}

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

				                                {!! Form::select('technical[]',App\Misc::$technical, isset($actor->technical) ? explode(',', $actor->technical): '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}

				                                <span class="help-block"> {{ $errors->first("technical") }} </span>

				                            </div>

				                        </div>

				                    </div>

				                    <!--/span-->

				                    <div class="col-md-6">

				                         <div class="form-group" {{ $errors->has("instrument") ? "has-error":"" }}'>

				                            <label for="multiple" class="control-label col-md-3" >Instruments</label>

				                            <div class="col-md-9">

				                                {!! Form::select('instrument[]',App\Misc::$instrument, isset($actor->instrument) ? explode(',', $actor->instrument): '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}

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

				                                {!! Form::select('misc[]',App\Misc::$misc, isset($actor->misc) ? explode(',', $actor->misc): '', ['required' => 'required',  'class' => 'form-control select2-multiple', 'multiple', 'id' => "multiple"]) !!}

				                                <span class="help-block"> {{ $errors->first("misc") }} </span>

				                            </div>

				                        </div>

				                    </div>

				                    <!--/span-->

				                    <div class="col-md-6">

				                	<div class="form-group">

	                                    <label class="control-label col-md-3">Employement Availbility</label>

	                                    <div class="col-md-9">

	                                        <div class="input-group input-large date-picker input-daterange" data-date="2012/11/10" data-date-format="yyyy/mm/dd">

	                                        	{!! Form::text('from', @$actor->from, ['class' => 'form-control', 'placeholder' => 'From', 'required'=>'required', 'readonly']) !!}

	                                            

	                                            <span class="input-group-addon"> to </span>

	                                            {!! Form::text('to', @$actor->to, ['class' => 'form-control', 'placeholder' => 'To', 'required'=>'required', 'readonly']) !!} </div>

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

                                        @if(\Auth::user()->Actor)



                                        @if(isset(\Auth::user()->actor->precrop_url))

                                        	<img src="{{\Auth::user()->actor->precrop_url}}" width="500" height="500" id="cropbox" />



											<!-- This is the form that our event handler fills -->

											<form style="margin-top: 30px;" action="{{route('actor::postCropPhotoUpdate')}}" method="post" onsubmit="return checkCoords();">

											{{csrf_field()}}

												<input type="hidden" id="x" name="x" />

												<input type="hidden" id="y" name="y" />

												<input type="hidden" id="w" name="w" />

												<input type="hidden" id="h" name="h" />

												<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />

												<a href="{{route('actor::getDeletePhoto')}}" class="btn btn-large btn-danger" >Delete Picture</a>

											</form>

                                        @else

	                                        <form action="{{route('actor::postPhotoUpdate')}}" enctype="multipart/form-data" role="form" method="POST">

	                                        {{csrf_field()}}

	                                            <div class="form-group clearfix {{ $errors->has('photo') ? 'has-error' : '' }}">

					                           <!--  <label class="control-label col-md-3">Photo</label> -->

					                            <div class="col-md-9">

					                                <div class="fileinput {{ @$slider->photo_url ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">

					                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">

					                                        <img src="{{ isset($slider->photo_url) ? $slider->photo_url : asset('/images/photos/default-medium.jpg') }}" alt="{{ @$slider->name }}" />

					                                    

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

                                        @else

                                        	<h3>Please upload profile info first.</h3>

                                        @endif

                                    </div>

                                    <!-- END CHANGE AVATAR TAB -->

                                    <!-- CHANGE PASSWORD TAB -->

                                    <div class="tab-pane" id="tab_1_3">

                                        <form action="{{route('actor::postEditPassword')}}" class="form-validate-auto" method="POST">

                                         <div class="form-group" {{ $errors->has("password") ? "has-error":"" }}'>

                                             <label class="control-label">Password</label>

						                    <div class="input-group">

						                        <span class="input-group-addon">

						                            <i class="fa fa-key"></i>

						                        </span>

						                        	{{csrf_field()}}

						                        {!! Form::password('password', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password', 'required'=>'required','maxlength' => '15','minlength'=>'6']) !!}

						                       

						                    </div>

						                     <span class="help-block"> {{ $errors->first("password") }} </span>

						                </div>

                                        <div class="form-group" {{ $errors->has("new_password") ? "has-error":"" }}'>

                                             <label class="control-label">New Password</label>

						                    <div class="input-group">

						                        <span class="input-group-addon">

						                            <i class="fa fa-key"></i>

						                        </span>



						                        {!! Form::password('new_password', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password', 'required'=>'required','maxlength' => '15','minlength'=>'6', 'id'=>'PasswordField']) !!}

						                       

						                    </div>

						                     <span class="help-block"> {{ $errors->first("new_password") }} </span>

						                </div>

						                <div class="form-group" {{ $errors->has("re_password") ? "has-error":"" }}'>

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

                                                <button type="submit" class="btn green"> Change Password </button>

                                                

                                            </div>

                                        </form>

                                    </div>

                                    <!-- END CHANGE PASSWORD TAB -->

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