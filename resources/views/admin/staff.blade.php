@extends('admin.layout')



@section('title', 'Edit Staff Profile')



@section('style')
    <link href="{{asset('assets/css/datatables.bootstrap.css')}}" rel="stylesheet">

    <link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#editor').summernote({
                code : "{{ $errors->first('answer', ':message') }}",
                height:200,
            });
        });

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
            }

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

                            <img src="{{isset($staff->photo_url) ? asset($staff->photo_url) : asset('assets/images/photos/default-medium.jpg')}}" class="img-responsive" alt=""> </div>

                        <!-- END SIDEBAR USERPIC -->

                        <!-- SIDEBAR USER TITLE -->

                        <div class="profile-usertitle">

                            <div class="profile-usertitle-name"> {{$user->name}}</div>
                            <div class="profile-usertitle-name"><a href="mailto:marco@webmdt.com"> {{$user->email}}</a></div>

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

                                        <i class="icon-key"></i> Staff Invoices </a>

                                </li>
                                <li>

                                    <a href="#tab_1_4" data-toggle="tab">

                                        <i class="icon-user"></i> Portfolio </a>

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

                                        <li {{  (Session::has('tabactive') ? '' : 'class=active'  ) }}>

                                            <a href="#tab_1_1" data-toggle="tab">Personal Information</a>

                                        </li>

                                        <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>

                                            <a href="#tab_1_2" data-toggle="tab">Change Profile Picture</a>

                                        </li>

                                        <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>

                                            <a href="#tab_1_3" data-toggle="tab">Staff Invoices</a>

                                        </li>

                                        <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>

                                            <a href="#tab_1_4" data-toggle="tab">PORTFOLIO</a>

                                        </li>

                                    </ul>

                                </div>

                                <div class="portlet-body">

                                    <div class="tab-content">

                                        <!-- PERSONAL INFO TAB -->

                                        <div class="tab-pane {{  (Session::has('tabactive') ? '' : 'active') }}" id="tab_1_1">

                                            <div class="portlet-body form">

                                                <!-- BEGIN FORM-->

                                                <form method="POST" action="{{route('admin::adminStaffUpdate',$id)}}" class="form-horizontal form-validate-auto"  enctype="multipart/form-data">

                                                    {{csrf_field()}}

                                                    <div class="form-body">

                                                        <h3 class="form-section">Personal Information</h3>

                                                        <div class="row">





                                                        </div>

                                                        @if(isset($staff))

                                                            <input type="hidden" name="m" value="PUT"/>

                                                        @else

                                                            <input type="hidden" name="m" value="POST"/>

                                                        @endif

                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group" {{ $errors->has("email") ? "has-error":"" }}'>

                                                                <label class="control-label col-md-3">Email</label>

                                                                <div class="col-md-9">

                                                                    {!! Form::text('email',isset($staff->email) ? $staff->email : null , ['class' => 'form-control', 'placeholder' => 'E-Mail', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}

                                                                    <span class="help-block"> {{ $errors->first("email") }} </span>

                                                                </div>

                                                            </div>


                                                            </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group">

                                                                <label class="control-label col-md-3">Availability</label>

                                                                <div class="col-md-9">

                                                                    <div class="input-group input-large date-picker input-daterange" data-date="2012/11/10" data-date-format="yyyy/mm/dd">

                                                                        {!! Form::text('from', \Carbon\Carbon::parse(@$staff->from)->format('d/m/Y'), ['class' => 'form-control', 'placeholder' => 'From', 'required'=>'required','readonly']) !!}



                                                                        <span class="input-group-addon"> to </span>

                                                                        {!! Form::text('to', \Carbon\Carbon::parse(@$staff->to)->format('d/m/Y'), ['class' => 'form-control', 'placeholder' => 'To', 'required'=>'required','readonly']) !!} </div>

                                                                    <!-- /input-group -->

                                                                    <span class="help-block"> {{ $errors->first("from") }} {{ $errors->first("to") }} </span>

                                                                </div>

                                                            </div>
                                                    </div>


                                            </div>



                                            <div class="row">

                                                <div class="col-md-6">

                                                    <label for="Roles" class="control-label col-md-3">Primary Sought</label>

                                                    <div class="col-md-9">

                                                        {!! Form::select('primary_sought',['' => 'Select', 1 => 'Accompanist', 2 => 'Administration',3 => 'Box Office', 4 => 'Carpentry', 5 => 'Choreography', 6 => 'Costume Design', 7 => 'Sewing', 8 => 'Technical Director', 9 => 'Graphics', 10 => 'House Management', 11 => 'Lighting Design', 12 => 'Electrics', 13 => 'Director', 14 => 'Musical Director', 15 => 'Photography', 16 => 'Video', 17 => 'Props',18=>'Publicity',19=>'Running Crew',20=>'Scenic Artist',21=>'Set Design',22=>'Sound',23=>'State Management',24=>'Company Management'], @$staff->primary_sought ? $staff->primary_sought : '', ['required' => 'required',  'class' => 'form-control', 'id' => "primary_sought"]) !!}

                                                        <span class="help-block"> {{ $errors->first("roles_chosen") }} </span>

                                                    </div>

                                            </div>
                                            <div class="col-md-6">
                                                <label for="Roles" class="control-label col-md-3">Secondary Sought</label>

                                                <div class="col-md-9">

                                                    {!! Form::select('secondary_sought',['' => 'Select', 1 => 'Accompanist', 2 => 'Administration',3 => 'Box Office', 4 => 'Carpentry', 5 => 'Choreography', 6 => 'Costume Design', 7 => 'Sewing', 8 => 'Technical Director', 9 => 'Graphics', 10 => 'House Management', 11 => 'Lighting Design', 12 => 'Electrics', 13 => 'Director', 14 => 'Musical Director', 15 => 'Photography', 16 => 'Video', 17 => 'Props',18=>'Publicity',19=>'Running Crew',20=>'Scenic Artist',21=>'Set Design',22=>'Sound',23=>'State Management',24=>'Company Management'], @$staff->secondary_sought ? $staff->secondary_sought : '', ['required' => 'required',  'class' => 'form-control', 'id' => "secondary_sought"]) !!}

                                                    <span class="help-block"> {{ $errors->first("roles_chosen") }} </span>

                                                </div>
                                    </div>
                                                </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group" {{ $errors->has("age_twenty_one") ? "has-error":"" }}'>

                                                            <label class="control-label col-md-3">Age if Under 21?</label>

                                                            <div class="col-md-3">

                                                                {!! Form::text('age_twenty_one', @$staff->age_twenty_one ? $staff->age_twenty_one : null, ['class' => 'form-control', 'placeholder' => 'Age Under 21', 'maxlength'=>'20']) !!}

                                                                <span class="help-block"> {{ $errors->first("age_twenty_one") }} </span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label col-md-3">Would You Job In?</label>

                                                        <div class="col-md-9">

                                                            {!! Form::select('job_in',[0=>'No',1=>'Yes'],@$staff->job_in ? $staff->job_in : null) !!}

                                                            <span class="help-block"> {{ $errors->first("last_audition_year") }} </span>

                                                        </div>
                                                    </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4">
                                                    {!! Form::checkbox('accompanist',1,@$staff->accompanist ? true : null) !!}
                                                    <label>Accompanist</label><br>
                                                    {!! Form::checkbox('administration',1,$staff->administration ? true:null) !!}
                                                    <label>Administration</label><br>
                                                    {!! Form::checkbox('box_office',1,@$staff->box_office ? true:null) !!}
                                                    <label>Box Office</label><br>
                                                    {!! Form::checkbox('carpentry',1,@$staff->carpentry ? true:null) !!}
                                                    <label>Carpentry</label><br>
                                                    {!! Form::checkbox('choreography',1,@$staff->choreography ? true:null) !!}
                                                    <label>Choreography</label><br>

                                                    {!! Form::checkbox('costume_design',1,@$staff->costume_design ? true:null) !!}
                                                    <label>Costume Design</label><br>
                                                    {!! Form::checkbox('sewing',1,@$staff->sewing ? true:null) !!}
                                                    <label>Sewing</label><br>
                                                    {!! Form::checkbox('technical_director',1,@$staff->technical_director ? true:null) !!}
                                                    <label>Tecnical Director</label><br>
                                                </div>
                                                <div class="col-md-4">
                                                    {!! Form::checkbox('graphics',1,@$staff->graphics ? true : null) !!}
                                                    <label>Graphics</label><br>
                                                    {!! Form::checkbox('house_management',1,@$staff->house_management ? true:null) !!}
                                                    <label>House Management</label><br>
                                                    {!! Form::checkbox('lighting_design',1,@$staff->lighting_design ? true:null) !!}
                                                    <label>Lighting Design</label><br>
                                                    {!! Form::checkbox('electrics',1,@$staff->electrics ? true:null) !!}
                                                    <label>Electrics</label><br>
                                                    {!! Form::checkbox('director',1,@$staff->director ? true:null) !!}
                                                    <label>Director</label><br>

                                                    {!! Form::checkbox('musical_director',1,@$staff->musical_director ? true:null) !!}
                                                    <label>Musical Director</label><br>
                                                    {!! Form::checkbox('photography',1,@$staff->photography ? true:null) !!}
                                                    <label>Photography</label><br>
                                                    {!! Form::checkbox('video',1,@$staff->video ? true:null) !!}
                                                    <label>Video</label><br>
                                                </div>
                                                <div class="col-md-4">
                                                    {!! Form::checkbox('props',1,@$staff->props ? true:null) !!}
                                                    <label>Props</label><br>
                                                    {!! Form::checkbox('publicity',1,@$staff->publicity ? true:null) !!}
                                                    <label>Publicity</label><br>
                                                    {!! Form::checkbox('running_crew',1,@$staff->running_crew ? true:null) !!}
                                                    <label>Running Crew</label><br>
                                                    {!! Form::checkbox('scenic_artist',1,@$staff->scenic_artist ? true:null) !!}
                                                    <label>Scenic Artist</label><br>

                                                    {!! Form::checkbox('set_design',1,@$staff->set_design ? true:null) !!}
                                                    <label>Set Design</label><br>
                                                    {!! Form::checkbox('sound',1,@$staff->sound ? true:null) !!}
                                                    <label>Sound</label><br>
                                                    {!! Form::checkbox('state_management',1,@$staff->state_management ? true:null) !!}
                                                    <label>State Management</label><br>
                                                    {!! Form::checkbox('company_management',1,@$staff->company_management ? true:null) !!}
                                                    <label>Company Management</label><br>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label class="control-label col-md-3">Resume</label>

                                                        <div class="col-md-3">

                                                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                                                <div class="input-group input-large">

                                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">

                                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;



                                                                        <span class="fileinput-filename"> {{isset($staff->resume_path) ? 'Resume exist' : ''}}</span>

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
                                                <div class="col-md-6">

                                                    <div class="form-group" {{ $errors->has("phone_number") ? "has-error":"" }}'>

                                                    <label class="control-label col-md-3">Phone Number</label>

                                                    <div class="col-md-6">

                                                        {!! Form::text('phone_number', @$staff->phone_number ? $staff->phone_number : null, ['class' => 'form-control', 'placeholder' => 'Phone Number', 'maxlength'=>'20']) !!}

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



    </div>

    <!-- CHANGE AVATAR TAB -->

    <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2">





        @if(isset($staff->precrop_url))

            <img src="{{asset($staff->precrop_url)}}" width="500" height="500" id="cropbox" />



            <!-- This is the form that our event handler fills -->

            <form style="margin-top: 30px;" action="{{route('admin::staffCropPhoto',$id)}}" method="post" onsubmit="return checkCoords();">

                {{csrf_field()}}

                <input type="hidden" id="x" name="x" />

                <input type="hidden" id="y" name="y" />

                <input type="hidden" id="w" name="w" />

                <input type="hidden" id="h" name="h" />

                <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />

                <a href="{{route('admin::staffPhotoDelete',$id)}}" class="btn btn-large btn-danger" >Delete Picture</a>

            </form>

        @else

            <form action="{{route('admin::staffPhotoUpdate',$id)}}" enctype="multipart/form-data" role="form" method="POST">

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
                                <form action="{{route('admin::adminStaffUpdate',$id)}}" class="form" method="POST">
                                    {{ Form::token() }}

                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                        {{ Form::label('port', 'Portfolio', ['class' => 'col-lg-2 control-label']) }}
                                        <div class="col-lg-10">
                                            {{ Form::textarea('portfolio', @($staff->portfolio) ?  $staff->portfolio : null, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor']) }}
                                            <p class="help-block">{{ $errors->first('portfolio', ':message') }}</p>
                                        </div>
                                    </div>

                                    <div class="margin-top-10">

                                        <button type="submit" class="btn green"> Submit </button>



                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="tab_1_5">

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