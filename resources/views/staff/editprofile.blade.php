@extends('common.layout')

@section('title', 'Edit Profile')

@section('style')

    <link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet"
          type="text/css"/>

    <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet"
          type="text/css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/css/Jcrop.min.css">

    <style type="text/css">

        .form .form-body {

            padding: 0px;

        }

        .form .form-section {

            margin: 15px 0px 25px 0px;

        }

        .newSelect {

            border: 1px solid #c2cad8;

            padding: 4px;

        }

    </style>

@endsection



@section('js')

    <script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"
            type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>

    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/2.0.4/js/Jcrop.min.js"></script>

    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('assets/js/additional-methods.min.js')}}"></script>



    <script type="text/javascript">

        $(document).ready(function () {
            $('.input-daterange input').each(function () {
                $(this).datepicker({});
            });
            $('#editor').summernote({
                code: "{{ $errors->first('answer', ':message') }}",
                height: 200,
            });
        });

        $(function () {
            $('#cropbox').Jcrop({
                onSelect: updateCoords,
                setSelect: [0, 160, 160, 0],// you have set proper proper x and y coordinates here
                minSize: [75, 75],
                aspectRatio: 1
            });
        });


        function updateCoords(c) {

            $('#x').val(c.x);

            $('#y').val(c.y);

            $('#w').val(c.w);

            $('#h').val(c.h);

        };


        function checkCoords() {

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

                            <img src="{{isset($staff[0]['photo_url']) ? asset($staff[0]['photo_url']) : asset('assets/images/photos/default-medium.jpg')}}"
                                 class="img-responsive" alt=""></div>

                        <!-- END SIDEBAR USERPIC -->

                        <!-- SIDEBAR USER TITLE -->

                        <div class="profile-usertitle">

                            <div class="profile-usertitle-name"> {{\Auth::user()->name}}</div>

                        </div>

                        <!-- END SIDEBAR USER TITLE -->

                        <!-- SIDEBAR BUTTONS -->

                        <div class="profile-userbuttons">

                            <a href="#tab_1_2" data-toggle="tab" class="btn btn-circle green btn-sm">Update Profile
                                Picture</a>

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
                                    <a href="#tab_1_4" data-toggle="tab">
                                        <i class="icon-user"></i> Portfolio
                                    </a>
                                </li>

                                <li>
                                    <a href="#tab_1_5" data-toggle="tab">
                                        <i class="icon-key"></i> Roles
                                    </a>
                                </li>

                                <li>

                                    <a href="#tab_1_2" data-toggle="tab">

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

                                        <li>

                                            <a href="#tab_1_1" data-toggle="tab">Personal Information</a>

                                        </li>

                                        <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>

                                            <a href="#tab_1_2" data-toggle="tab">Change Profile Picture</a>

                                        </li>

                                        <li>

                                            <a href="#tab_1_3" data-toggle="tab">Change Password</a>

                                        </li>

                                        <li>

                                            <a href="#tab_1_4" data-toggle="tab">Portfolio</a>

                                        </li>


                                        <li>

                                            <a href="#tab_1_5" data-toggle="tab">Roles</a>

                                        </li>
                                    </ul>

                                </div>

                                <div class="portlet-body">

                                    <div class="tab-content">

                                        <!-- PERSONAL INFO TAB -->

                                        <div class="tab-pane {{  (Session::has('tabactive') ? '' : 'active') }}" id="tab_1_1">
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form method="POST" class="form-horizontal form-validate-auto" enctype="multipart/form-data">
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
                                                            <div class="form-group" {{ $errors->has("email") ? "has-error":"" }}>
                                                                <label class="control-label col-md-3">Email</label>
                                                                <div class="col-md-9">
                                                                    {!! Form::text('email',isset($staff[0]['email']) ? $staff[0]['email'] : null, ['class' => 'form-control', 'placeholder' => ' Email', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}
                                                                    <span class="help-block"> {{ $errors->first("email") }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">

                                                                <label class="control-label col-md-3">Availability</label>

                                                                <div class="col-md-9">

                                                                    <div class="input-group input-large date-picker input-daterange"  data-date-format="dd/mm/yyyy">

                                                                        {!! Form::text('from', \Carbon\Carbon::parse(@$staff[0]['from'])->format('d/m/Y'), ['class' => 'form-control', 'placeholder' => 'From', 'required'=>'required','readonly']) !!}


                                                                        <span class="input-group-addon"> to </span>

                                                                        {!! Form::text('to', \Carbon\Carbon::parse(@$staff[0]['to'])->format('d/m/Y'), ['class' => 'form-control', 'placeholder' => 'To', 'required'=>'required','readonly']) !!}
                                                                    </div>

                                                                    <!-- /input-group -->

                                                                    <span class="help-block"> {{ $errors->first("from") }} {{ $errors->first("to") }} </span>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="Roles" class="control-label col-md-3">Primary
                                                                Sought</label>

                                                            <div class="col-md-9">

                                                                {!! Form::select('primary_sought',['' => 'Select', 1 => 'Accompanist', 2 => 'Administration',3 => 'Box Office', 4 => 'Carpentry', 5 => 'Choreography', 6 => 'Costume Design', 7 => 'Sewing', 8 => 'Technical Director', 9 => 'Graphics', 10 => 'House Management', 11 => 'Lighting Design', 12 => 'Electrics', 13 => 'Director', 14 => 'Musical Director', 15 => 'Photography', 16 => 'Video', 17 => 'Props',18=>'Publicity',19=>'Running Crew',20=>'Scenic Artist',21=>'Set Design',22=>'Sound',23=>'State Management',24=>'Company Management'], @$staff[0]['primary_sought'] ? $staff[0]['primary_sought'] : '', ['required' => 'required',  'class' => 'form-control', 'id' => "primary_sought"]) !!}

                                                                <span class="help-block"> {{ $errors->first("roles_chosen") }} </span>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="Roles" class="control-label col-md-3">Secondary
                                                                Sought</label>

                                                            <div class="col-md-9">

                                                                {!! Form::select('secondary_sought',['' => 'Select', 1 => 'Accompanist', 2 => 'Administration',3 => 'Box Office', 4 => 'Carpentry', 5 => 'Choreography', 6 => 'Costume Design', 7 => 'Sewing', 8 => 'Technical Director', 9 => 'Graphics', 10 => 'House Management', 11 => 'Lighting Design', 12 => 'Electrics', 13 => 'Director', 14 => 'Musical Director', 15 => 'Photography', 16 => 'Video', 17 => 'Props',18=>'Publicity',19=>'Running Crew',20=>'Scenic Artist',21=>'Set Design',22=>'Sound',23=>'State Management',24=>'Company Management'], @$staff[0]['secondary_sought'] ? $staff[0]['secondary_sought'] : '', ['required' => 'required',  'class' => 'form-control', 'id' => "secondary_sought"]) !!}

                                                                <span class="help-block"> {{ $errors->first("roles_chosen") }} </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group" {{ $errors->has("age_twenty_one") ? "has-error":"" }}>

                                                                <label class="control-label col-md-3">Age if Under
                                                                    21?</label>

                                                                <div class="col-md-3">

                                                                    {!! Form::text('age_twenty_one', @$staff[0]['age_twenty_one'] ? $staff[0]['age_twenty_one'] : null, ['class' => 'form-control', 'placeholder' => 'Age Under 21', 'maxlength'=>'20']) !!}

                                                                    <span class="help-block"> {{ $errors->first("age_twenty_one") }} </span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="control-label col-md-3">Would You Job
                                                                In?</label>

                                                            <div class="col-md-9">

                                                                {!! Form::select('job_in',[0=>'No',1=>'Yes'],@$staff[0]['job_in'] ? $staff[0]['job_in'] : null) !!}

                                                                <span class="help-block"> {{ $errors->first("last_audition_year") }} </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-md-12">
                                                            Please check all areas of significant training and related
                                                            experience.
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            {!! Form::checkbox('accompanist',1,@$staff[0]['accompanist'] ? true : null) !!}
                                                            <label>Accompanist</label><br>
                                                            {!! Form::checkbox('administration',1,$staff[0]['administration'] ? true:null) !!}
                                                            <label>Administration</label><br>
                                                            {!! Form::checkbox('box_office',1,@$staff[0]['box_office'] ? true:null) !!}
                                                            <label>Box Office</label><br>
                                                            {!! Form::checkbox('carpentry',1,@$staff[0]['carpentry'] ? true:null) !!}
                                                            <label>Carpentry</label><br>
                                                            {!! Form::checkbox('choreography',1,@$staff[0]['choreography'] ? true:null) !!}
                                                            <label>Choreography</label><br>

                                                            {!! Form::checkbox('costume_design',1,@$staff[0]['costume_design'] ? true:null) !!}
                                                            <label>Costume Design</label><br>
                                                            {!! Form::checkbox('sewing',1,@$staff[0]['sewing'] ? true:null) !!}
                                                            <label>Sewing</label><br>
                                                            {!! Form::checkbox('technical_director',1,@$staff[0]['technical_director'] ? true:null) !!}
                                                            <label>Tecnical Director</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::checkbox('graphics',1,@$staff[0]['graphics'] ? true : null) !!}
                                                            <label>Graphics</label><br>
                                                            {!! Form::checkbox('house_management',1,@$staff[0]['house_management'] ? true:null) !!}
                                                            <label>House Management</label><br>
                                                            {!! Form::checkbox('lighting_design',1,@$staff[0]['lighting_design'] ? true:null) !!}
                                                            <label>Lighting Design</label><br>
                                                            {!! Form::checkbox('electrics',1,@$staff[0]['electrics'] ? true:null) !!}
                                                            <label>Electrics</label><br>
                                                            {!! Form::checkbox('director',1,@$staff[0]['director'] ? true:null) !!}
                                                            <label>Director</label><br>

                                                            {!! Form::checkbox('musical_director',1,@$staff[0]['musical_director'] ? true:null) !!}
                                                            <label>Musical Director</label><br>
                                                            {!! Form::checkbox('photography',1,@$staff[0]['photography'] ? true:null) !!}
                                                            <label>Photography</label><br>
                                                            {!! Form::checkbox('video',1,@$staff[0]['video'] ? true:null) !!}
                                                            <label>Video</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            {!! Form::checkbox('props',1,@$staff[0]['props'] ? true:null) !!}
                                                            <label>Props</label><br>
                                                            {!! Form::checkbox('publicity',1,@$staff[0]['publicity'] ? true:null) !!}
                                                            <label>Publicity</label><br>
                                                            {!! Form::checkbox('running_crew',1,@$staff[0]['running_crew'] ? true:null) !!}
                                                            <label>Running Crew</label><br>
                                                            {!! Form::checkbox('scenic_artist',1,@$staff[0]['scenic_artist'] ? true:null) !!}
                                                            <label>Scenic Artist</label><br>

                                                            {!! Form::checkbox('set_design',1,@$staff[0]['set_design'] ? true:null) !!}
                                                            <label>Set Design</label><br>
                                                            {!! Form::checkbox('sound',1,@$staff[0]['sound'] ? true:null) !!}
                                                            <label>Sound</label><br>
                                                            {!! Form::checkbox('state_management',1,@$staff[0]['state_management'] ? true:null) !!}
                                                            <label>Stage Management</label><br>
                                                            {!! Form::checkbox('company_management',1,@$staff[0]['company_management'] ? true:null) !!}
                                                            <label>Company Management</label><br>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label class="control-label col-md-3">Resume</label>

                                                                <div class="col-md-3">

                                                                    <div class="fileinput fileinput-new"
                                                                         data-provides="fileinput">

                                                                        <div class="input-group input-large">

                                                                            <div class="form-control uneditable-input input-fixed input-medium"
                                                                                 data-trigger="fileinput">

                                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;


                                                                                <span class="fileinput-filename"> {{isset($staff[0]['resume_path']) ? 'Resume exist' : ''}}</span>

                                                                            </div>

                                                                            <span class="input-group-addon btn default btn-file">

                                                        <span class="fileinput-new"> Select file </span>

                                                        <span class="fileinput-exists"> Change </span>

                                                        <input type="file" name="resume"> </span>

                                                                            <a href="javascript:;"
                                                                               class="input-group-addon btn red fileinput-exists"
                                                                               data-dismiss="fileinput"> Remove </a>

                                                                        </div>

                                                                    </div>

                                                                    <span class="help-block"> {{ $errors->first("resume") }} </span>

                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="form-group" {{ $errors->has("phone_number") ? "has-error":"" }}>

                                                                <label class="control-label col-md-3">Phone
                                                                    Number</label>

                                                                <div class="col-md-6">

                                                                    {!! Form::text('phone_number', @$staff[0]['phone_number'] ? $staff[0]['phone_number'] : null, ['class' => 'form-control', 'placeholder' => 'Phone Number', 'maxlength'=>'20']) !!}

                                                                    <span class="help-block"> {{ $errors->first("age_twenty_one") }} </span>

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

                                                                <button type="button" class="btn default">Cancel
                                                                </button>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-md-6"></div>

                                                </div>

                                            </div>
                                            </form>
                                            </div>
                                        </div>


                                        <!-- END FORM-->


                                        <!-- END PERSONAL INFO TAB -->
                                        <div class="tab-pane" id="tab_1_5">
                                            <form action="{{route('staff::updateStaffsRole')}}"
                                                  class="form-validate-auto"
                                                  method="POST">
                                                {{csrf_field()}}
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Roles</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Shows</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Theater</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Dir/Choreo/Others</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[1]',@$roles[0]['roles_chosen'] ? $roles[0]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[1]',@$roles[0]['show'] ? $roles[0]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[1]',@$roles[0]['theater'] ? $roles[0]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[1]',@$roles[0]['dir_chor'] ? $roles[0]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[2]',@$roles[1]['roles_chosen'] ? $roles[1]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[2]',@$roles[1]['show'] ? $roles[1]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[2]',@$roles[1]['theater'] ? $roles[1]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[2]',@$roles[1]['dir_chor'] ? $roles[1]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[3]',@$roles[2]['roles_chosen'] ? $roles[2]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[3]',@$roles[2]['show'] ? $roles[2]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[3]',@$roles[2]['theater'] ? $roles[2]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[3]',@$roles[2]['dir_chor'] ? $roles[2]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[4]',@$roles[3]['roles_chosen'] ? $roles[3]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[4]',@$roles[3]['show'] ? $roles[3]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[4]',@$roles[3]['theater'] ? $roles[3]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[4]',@$roles[3]['dir_chor'] ? $roles[3]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[5]',@$roles[4]['roles_chosen'] ? $roles[4]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[5]',@$roles[4]['show'] ? $roles[4]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[5]',@$roles[4]['theater'] ? $roles[4]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[5]',@$roles[4]['dir_chor'] ? $roles[4]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[6]',@$roles[5]['roles_chosen'] ? $roles[5]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[6]',@$roles[5]['show'] ? $roles[5]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[6]',@$roles[5]['theater'] ? $roles[5]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[6]',@$roles[5]['dir_chor'] ? $roles[5]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[7]',@$roles[6]['roles_chosen'] ? $roles[6]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[7]',@$roles[6]['show'] ? $roles[6]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[7]',@$roles[6]['theater'] ? $roles[6]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[7]',@$roles[6]['dir_chor'] ? $roles[6]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[8]',@$roles[7]['roles_chosen'] ? $roles[7]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[8]',@$roles[7]['show'] ? $roles[7]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[8]',@$roles[7]['theater'] ? $roles[7]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[8]',@$roles[7]['dir_chor'] ? $roles[7]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[9]',@$roles[8]['roles_chosen'] ? $roles[8]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[9]',@$roles[8]['show'] ? @$roles[8]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[9]',@$roles[8]['theater'] ? @$roles[8]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[9]',@$roles[8]['dir_chor'] ? $roles[8]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        {!! Form::text('roles_chosen[10]',@$roles[9]['roles_chosen'] ? $roles[9]['roles_chosen'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your role']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('show[10]',@$roles[9]['show'] ? $roles[9]['show'] : null,['class'=>'form-control','placeholder'=>'Please Enter Your show']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('theater[10]',@$roles[9]['theater'] ? $roles[9]['theater'] : null,['class'=>'form-control','placeholder'=>'Please Enter Theater']) !!}
                                                    </div>
                                                    <div class="col-md-3">
                                                        {!! Form::text('dir_chor[10]',@$roles[9]['dir_chor'] ? $roles[9]['dir_chor'] : null,['class'=>'form-control','placeholder'=>'Director/Choreo/Other']) !!}
                                                    </div>
                                                </div>
                                                <div class="margin-top-20">

                                                    <button type="submit" class="btn green"> Submit</button>


                                                </div>
                                            </form>
                                            <br>
                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        <i class="fa fa-briefcase"></i> Role
                                                    </th>
                                                    <th class="hidden-xs">
                                                        <i class="fa fa-question"></i> Show
                                                    </th>
                                                    <th>
                                                        <i class="fa fa-home"></i> Theater
                                                    </th>
                                                    <th>
                                                        <i class="fa fa-user"></i> Dir/Choreo/Other
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($roles as $val)
                                                    <tr>
                                                        <td>
                                                            {{ $val['roles_chosen'] }}
                                                        </td>
                                                        <td class="hidden-xs">  {{ $val['show'] }} </td>
                                                        <td> {{ $val['theater'] }}

                                                        </td>
                                                        <td>
                                                            {{ $val['dir_chor'] }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>


                                        <!-- END CHANGE AVATAR TAB -->
                                        <div class="tab-pane" id="tab_1_4">
                                            <form action="{{route('staff::postPortfolio')}}" class="form" method="POST">
                                                {{ Form::token() }}
                                                @if(count($staff))
                                                    <input type="hidden" name="port_staff" value="PUT"/>
                                                @else
                                                    <input type="hidden" name="port_staff" value="POST"/>
                                                @endif
                                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                    {{ Form::label('port', 'Portfolio', ['class' => 'col-lg-2 control-label']) }}
                                                    <div class="col-lg-10">
                                                        {{ Form::textarea('portfolio', @($staff[0]['portfolio']) ? $staff[0]['portfolio'] : null, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor']) }}
                                                        <p class="help-block">{{ $errors->first('portfolio', ':message') }}</p>
                                                    </div>
                                                </div>

                                                <div class="margin-top-10">

                                                    <button type="submit" class="btn green"> Submit</button>


                                                </div>
                                            </form>
                                        </div>
                                        <!-- CHANGE PASSWORD TAB -->

                                        <div class="tab-pane" id="tab_1_3">

                                            <form action="{{route('staff::postEditPassword')}}"
                                                  class="form-validate-auto"
                                                  method="POST">

                                                <div class="form-group" {{ $errors->has("password") ? "has-error":"" }}>

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

                                                <div class="form-group" {{ $errors->has("new_password") ? "has-error":"" }}>

                                                    <label class="control-label">New Password</label>

                                                    <div class="input-group">

						                        <span class="input-group-addon">

						                            <i class="fa fa-key"></i>

						                        </span>


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

                                        <!-- END CHANGE PASSWORD TAB -->


                                        <!-- CHANGE AVATAR TAB -->

                                        <div class="tab-pane {{  (Session::has('tabactive') ? 'active' : '') }}" id="tab_1_2">

                                        @if(isset($staff[0]['precrop_url']))

                                            <!-- This is the form that our event handler fills -->

                                                <form style="margin-top: 30px;"
                                                      action="{{route('staff::postCropPhotoUpdate')}}" method="post"
                                                      onsubmit="return checkCoords();">

                                                    {{csrf_field()}}
                                                    <div class="form-group clearfix {{ $errors->has('photo') ? 'has-error' : '' }}">

                                                        <!--  <label class="control-label col-md-3">Photo</label> -->

                                                        <div class="col-md-9">

                                                            <div class="fileinput {{ @$slider->photo_url ? 'fileinput-exists' : 'fileinput-new' }}"
                                                                 data-provides="fileinput">

                                                                <div class="fileinput-preview thumbnail"
                                                                     data-trigger="fileinput"></div>
                                                                    <img src="{{asset($staff[0]['precrop_url'])}}"
                                                                         width="500" height="500"
                                                                         id="cropbox"/>
                                                                </div>

                                                                <input type="hidden" id="x" name="x"/>

                                                                <input type="hidden" id="y" name="y"/>

                                                                <input type="hidden" id="w" name="w"/>

                                                                <input type="hidden" id="h" name="h"/>
                                                                <div class="fileinput-buttons">

                                                                    <input type="submit" value="Crop Image"
                                                                           class="btn btn-large btn-inverse"/>

                                                                    <a href="{{route('staff::getDeletePhoto')}}"
                                                                       class="btn btn-large btn-danger">Delete
                                                                        Picture</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>


                                            @else

                                                <form action="{{route('staff::postPhotoUpdate')}}"
                                                      enctype="multipart/form-data" role="form"
                                                      method="post">

                                                    {{csrf_field()}}

                                                    <div class="form-group clearfix {{ $errors->has('photo') ? 'has-error' : '' }}">

                                                        <!--  <label class="control-label col-md-3">Photo</label> -->

                                                        <div class="col-md-9">

                                                            <div class="fileinput {{ @$slider->photo_url ? 'fileinput-exists' : 'fileinput-new' }}"
                                                                 data-provides="fileinput">

                                                                <div class="fileinput-preview thumbnail"
                                                                     data-trigger="fileinput"
                                                                     style="width: 200px; height: 150px;">

                                                                    <img src="{{ isset($slider->photo_url) ? $slider->photo_url : asset('assets/images/photos/default-medium.jpg') }}"
                                                                         alt="{{ @$slider->name }}"/>


                                                                </div>

                                                                <div class="fileinput-buttons">

					                                        <span class="btn default btn-file">

					                                        <span class="fileinput-new">Select image </span>

					                                        <span class="fileinput-exists">Change </span>

					                                        <input type="hidden" value="" name="...">

					                                        <input type="file" name="photo"/>

					                                        </span>

                                                                    <a href="javascript:;"
                                                                       class="btn red fileinput-exists hidden"
                                                                       data-dismiss="fileinput">

                                                                        Remove </a>

                                                                    <div class="help-block"> {{ $errors->first("photo") }} </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="margin-top-10">

                                                        <button type="submit" class="btn green"> Submit</button>

                                                        <a href="javascript:;" class="btn default"> Cancel </a>

                                                    </div>

                                                </form>

                                            @endif
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