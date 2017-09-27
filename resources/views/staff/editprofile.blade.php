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

    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/additional-methods.min.js')}}"></script>



    <script type="text/javascript">



        $(function(){
            $('#cropbox').Jcrop({
                onSelect: updateCoords,
                setSelect: [0, 160, 160, 0],// you have set proper proper x and y coordinates here
                minSize:[75,75],
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

                            <img src="{{isset($staff[0]['photo_url']) ? asset($staff[0]['photo_url']) : asset('assets/images/photos/default-medium.jpg')}}" class="img-responsive" alt=""> </div>

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

                                        <span class="caption-subject font-blue-madison bold uppercase">Staff Profile</span>

                                    </div>

                                    <ul class="nav nav-tabs">

                                        <li {{ (Session::has('tabactive') ? '' : 'class=active') }} >

                                            <a href="#tab_1_1" data-toggle="tab">Personal Information</a>

                                        </li>

                                        <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>

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

                                        <div class="tab-pane {{  (Session::has('tabactive') ? '' : 'active') }}" id="tab_1_1">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form method="POST" class="form-horizontal form-validate-auto"  enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-body">
                                                        <h3 class="form-section">Personal Information</h3>
                                                        @if(count($staff))
                                                            <input type="hidden" name="tes" value="PUT"/>
                                                        @else
                                                            <input type="hidden" name="tes" value="POST"/>
                                                        @endif
                                                    </div>
                                                    <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" {{ $errors->has("email") ? "has-error":"" }}'>
                                                    <label class="control-label col-md-3">Email</label>
                                                    <div class="col-md-9">
                                                        {!! Form::text('email',isset($staff[0]['email']) ? $staff[0]['email'] : null, ['class' => 'form-control', 'placeholder' => ' Email', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}
                                                        <span class="help-block"> {{ $errors->first("email") }} </span>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
            </div>


            <!--/row-->


    <!--/span-->

    <!--/row-->


    <!--/span-->

    <!--/row-->

    <!--/row-->

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
                                    </div>


    <!-- END FORM-->



    <!-- END PERSONAL INFO TAB -->

    <!-- CHANGE AVATAR TAB -->

    <div class="tab-pane {{  (Session::has('tabactive') ? 'active' : '') }}" id="tab_1_2">





        @if(isset($staff[0]['precrop_url']))

            <img src="{{asset($staff[0]['precrop_url'])}}" width="500" height="500" id="cropbox" />



            <!-- This is the form that our event handler fills -->

            <form style="margin-top: 30px;" action="{{route('staff::postCropPhotoUpdate')}}" method="post" onsubmit="return checkCoords();">

                {{csrf_field()}}

                <input type="hidden" id="x" name="x" />

                <input type="hidden" id="y" name="y" />

                <input type="hidden" id="w" name="w" />

                <input type="hidden" id="h" name="h" />

                <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />

                <a href="{{route('staff::getDeletePhoto')}}" class="btn btn-large btn-danger" >Delete Picture</a>

            </form>

        @else

            <form action="{{route('staff::postPhotoUpdate')}}" enctype="multipart/form-data" role="form" method="POST">

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

    <!-- CHANGE PASSWORD TAB -->

    <div class="tab-pane" id="tab_1_3">

        <form action="{{route('staff::postEditPassword')}}" class="form-validate-auto" method="POST">

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