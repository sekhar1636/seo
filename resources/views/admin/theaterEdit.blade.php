

@extends('admin.layout')



@section('title', 'Edit Theater Profile')



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

        $(document).ready(function(){
            $('.dancers_show').hide();
            $('.radio_show').hide();
            $('.dancers_show_s').hide();
            $('.dancers_show_n').hide();
            $('.non_musical_certain_s').hide();
            $('.non_musical_certain_n').hide();
            $('.dancers_click_s').click(function(){
                $('.dancers_show').show();
                $('.dancers_show_s').show();
                $('.dancers_show_n').show();
            });
            $('#non_click_s').click(function(){
                $('.radio_show').show();
                $('.non_musical_certain_s').show();
                $('.non_musical_certain_n').show();
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

                            <img src="{{isset($theater->photo_url) ? asset($theater->photo_url) : asset('assets/images/photos/default-medium.jpg')}}" class="img-responsive" alt=""> </div>

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

                                        <i class="icon-key"></i> Theater Invoices </a>

                                </li>

                                <li>
                                    <a href="#tab_1_4" data-toggle="tab">
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

                                        <span class="caption-subject font-blue-madison bold uppercase">Theater Profile</span>

                                    </div>

                                    <ul class="nav nav-tabs">

                                        <li {{  (Session::has('tabactive') ? '' : 'class=active'  ) }}>

                                            <a href="#tab_1_1" data-toggle="tab">Personal Information</a>

                                        </li>

                                        <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>

                                            <a href="#tab_1_2" data-toggle="tab">Change Profile Picture</a>

                                        </li>

                                        <li {{  (Session::has('tabactive') ? 'class=active' : '') }}>

                                            <a href="#tab_1_3" data-toggle="tab">Theater Invoices</a>

                                        </li>

                                        <li {{ (Session::has('tabactive') ? 'class=active' : '') }}>
                                            <a href="#tab_1_4" data-toggle="tab">Change Password</a>
                                        </li>
                                    </ul>

                                </div>

                                <div class="portlet-body">

                                    <div class="tab-content">

                                        <!-- PERSONAL INFO TAB -->

                                        <div class="tab-pane {{  (Session::has('tabactive') ? '' : 'active') }}" id="tab_1_1">

                                            <div class="portlet-body form">

                                                <!-- BEGIN FORM-->

                                                <form method="POST" action="{{route('admin::adminTheaterUpdate',$id)}}" class="form-horizontal form-validate-auto"  enctype="multipart/form-data">

                                                    {{csrf_field()}}

                                                    <div class="form-body">

                                                        <h3 class="form-section">Personal Information</h3>

                                                        <div class="row">





                                                        </div>

                                                        @if(isset($theater))

                                                            <input type="hidden" name="m" value="PUT"/>

                                                        @else

                                                            <input type="hidden" name="m" value="POST"/>

                                                        @endif

                                                        <div class="row">

                                                            <div class="col-md-6">

                                                                <div class="form-group" {{ $errors->has("company_name") ? "has-error":"" }}'>

                                                                <label class="control-label col-md-3">Company Name</label>

                                                                <div class="col-md-9">

                                                                    {!! Form::text('company_name',isset($theater->company_name) ? $theater->company_name : null , ['class' => 'form-control', 'placeholder' => 'Company Name', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'65']) !!}

                                                                    <span class="help-block"> {{ $errors->first("company_name") }} </span>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6">

                                                            <div class="form-group" {{ $errors->has("contact_number") ? "has-error":"" }}'>

                                                            <label class="control-label col-md-3">Contact Number</label>

                                                            <div class="col-md-9">

                                                                {!! Form::text('contact_number',isset($theater->contact_number) ? $theater->contact_number : null , ['class' => 'form-control', 'placeholder' => 'Contact Number', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}

                                                                <span class="help-block"> {{ $errors->first("contact_number") }} </span>

                                                            </div>

                                                        </div>
                                                    </div>


                                            </div>



                                            <div class="row">

                                                <div class="col-md-6">

                                                    <div class="form-group" {{ $errors->has("email") ? "has-error":"" }}'>

                                                    <label class="control-label col-md-3">Email</label>

                                                    <div class="col-md-9">

                                                        {!! Form::text('email',isset($theater->email) ? $theater->email : null, ['class' => 'form-control', 'placeholder' => ' Email', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'150']) !!}

                                                        <span class="help-block"> {{ $errors->first("email") }} </span>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" {{ $errors->has("website") ? "has-error":"" }}'>

                                                <label class="control-label col-md-3">Website</label>

                                                <div class="col-md-9">

                                                    {!! Form::text('website',isset($theater->website) ? $theater->website : null , ['class' => 'form-control', 'placeholder' => 'Website', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'150']) !!}

                                                    <span class="help-block"> {{ $errors->first("website") }} </span>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group" {{ $errors->has("mailing") ? "has-error":"" }}'>

                                            <label class="control-label col-md-3">Mailing</label>

                                            <div class="col-md-9">

                                                {!! Form::text('mailing',isset($theater->mailing) ? $theater->mailing : null, ['class' => 'form-control', 'placeholder' => 'Mailing', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'100']) !!}

                                                <span class="help-block"> {{ $errors->first("email") }} </span>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" {{ $errors->has("telephone") ? "has-error":"" }}'>

                                        <label class="control-label col-md-3">Telephone</label>

                                        <div class="col-md-9">

                                            {!! Form::text('telephone',isset($theater->telephone) ? $theater->telephone : null , ['class' => 'form-control', 'placeholder' => 'Telephone', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}

                                            <span class="help-block"> {{ $errors->first("zipcode") }} </span>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group" {{ $errors->has("fax") ? "has-error":"" }}'>

                                    <label class="control-label col-md-3">Fax</label>

                                    <div class="col-md-9">

                                        {!! Form::text('fax',isset($theater->fax) ? $theater->fax : null, ['class' => 'form-control', 'placeholder' => 'Fax', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}

                                        <span class="help-block"> {{ $errors->first("fax") }} </span>

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group" {{ $errors->has("zipcode") ? "has-error":"" }}'>

                                <label class="control-label col-md-3">Zipcode</label>

                                <div class="col-md-9">

                                    {!! Form::text('zipcode',isset($theater->zipcode) ? $theater->zipcode : null , ['class' => 'form-control', 'placeholder' => 'Zipcode', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'20']) !!}

                                    <span class="help-block"> {{ $errors->first("zipcode") }} </span>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" {{ $errors->has("non_musical_performers") ? "has-error":"" }}'>

                                            <label class="control-label col-md-6">Are You Casting Non Musical Performers this Season?</label>

                                            <div class="col-md-6">
                                                {!! Form::radio('non_musical_yes',1,@$theater->non_musical_yes==1 ? true : null) !!}
                                                <label>Yes</label>
                                                {!! Form::radio('non_musical_yes',2,@$theater->non_musical_yes==2 ? true : null) !!}
                                                <label>No</label>
                                                {!! Form::radio('non_musical_yes',3,@$theater->non_musical_yes==3 ? true : null) !!}
                                                <label>Not Certain</label>
                                                <span class="help-block"> {{ $errors->first("non_musical_performers") }} </span>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" {{ $errors->has("dancers") ? "has-error":"" }}'>

                                        <label class="control-label col-md-6">Are You Casting Dancers this Season?</label>

                                        <div class="col-md-6">

                                            {!! Form::radio('dancers_yes',1,@$theater->dancers_yes==1 ? true : null) !!}
                                            <label>Yes</label>
                                            {!! Form::radio('dancers_yes',2,@$theater->dancers_yes==2 ? true : null) !!}
                                            <label>No</label>
                                            {!! Form::radio('dancers_yes',3,@$theater->dancers_yes==3 ? true : null) !!}
                                            <label>Not Certain</label>
                                            <span class="help-block"> {{ $errors->first("dancers") }} </span>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" {{ $errors->has("days") ? "has-error":"" }}'>

                                    <label class="control-label col-md-6">Which Days do you plan to attend?</label>

                                    <div class="col-md-6">


                                        {!! Form::checkbox('friday',1,@$theater->friday ? true : null) !!}
                                        <label>Friday</label>
                                        {!! Form::checkbox('saturday',1,@$theater->saturday ? true : null) !!}
                                        <label>Saturday</label>
                                        {!! Form::checkbox('sunday',1,@$theater->sunday ? true : null) !!}
                                        <label>Sunday</label>
                                        <span class="help-block"> {{ $errors->first("days") }} </span>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-12">Representatives who will attend StrawHat: (List more on reverse side if necessary)</label>
                            <div class="col-md-12">
                                <table class="col-md-12">
                                    <th>
                                        <tr><td>Name</td><td>Title</td></tr>
                                    </th>
                                    <tbody>
                                    <tr><td>{!! Form::text('name_table_1',@$theater->name_table_1 ? $theater->name_table_1 : null,['class' => 'form-control', 'placeholder' => ' Name', 'minlength'=>'3', 'maxlength'=>'20']) !!}</td><td>{!! Form::text('title_table_1',@$theater->title_table_1 ? $theater->title_table_1 : null,['class' => 'form-control', 'placeholder' => 'Title', 'minlength'=>'3', 'maxlength'=>'20']) !!}</td></tr>
                                    <tr><td>{!! Form::text('name_table_2',@$theater->name_table_2 ? $theater->name_table_2 : null,['class' => 'form-control', 'placeholder' => ' Name', 'minlength'=>'3', 'maxlength'=>'20']) !!}</td><td>{!! Form::text('title_table_2',@$theater->title_table_2 ? $theater->title_table_2 : null,['class' => 'form-control', 'placeholder' => 'Title', 'minlength'=>'3', 'maxlength'=>'20']) !!}</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" {{ $errors->has("dancers") ? "has-error":"" }}'>

                                <label class="control-label col-md-6">Do You accept Video Auditions?</label>

                                <div class="col-md-6">

                                    {!! Form::radio('dancers_no',1,@$theater->dancers_no==1 ? true : null,['class'=>'dancers_click_s']) !!}
                                    <label>Yes</label>
                                    {!! Form::radio('dancers_no',2,@$theater->dancers_no==2 ? true : null) !!}
                                    <label>No</label>
                                    {!! Form::radio('dancers_not_certain',1,@$theater->dancers_not_certain==1 ? true : null,['class'=>'dancers_show','id'=>'dancers_s']) !!}
                                    <label class="dancers_show_s">Yes</label>
                                    {!! Form::radio('dancers_not_certain',2,@$theater->dancers_not_certain==2 ? true : null,['class'=>'dancers_show','id'=>'dancers_n']) !!}
                                    <label class="dancers_show_n">No</label>
                                    <span class="help-block"> {{ $errors->first("dancers") }} </span>

                                </div>

                            </div>
                        </div>
                    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" {{ $errors->has("dancers") ? "has-error":"" }}'>
            <label class="control-label col-md-6"><strong>Email to send the videos</strong></label>
            <div class="col-md-6">
                {!! Form::text('email_videos',isset($theater->email_videos) ? $theater->email_videos : null , ['class' => 'form-control', 'placeholder' => 'Email to send Videos', 'required'=>'required', 'minlength'=>'3', 'maxlength'=>'250']) !!}
            </div>
            </div>
    </div>
    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" {{ $errors->has("dancers") ? "has-error":"" }}'>

                            <label class="control-label col-md-6">Do you operate on a AEA contract?</label>

                            <div class="col-md-6">

                                {!! Form::radio('non_musical_no',1,@$theater->non_musical_no==1 ? true : null,['class'=>'radio_s','id'=>'non_click_s']) !!}
                                <label>Yes</label>
                                {!! Form::radio('non_musical_no',2,@$theater->non_musical_no==2 ? true : null) !!}
                                <label>No</label>
                                {!! Form::radio('non_musical_certain',1,@$theater->non_musical_certain==1 ? true : null,['class'=>'radio_show','id'=>'non_s']) !!}
                                <label class="non_musical_certain_s">Yes</label>
                                {!! Form::radio('non_musical_certain',2,@$theater->dancers_not_certain==2 ? true : null,['class'=>'radio_show','id'=>'non_n']) !!}
                                <label class="non_musical_certain_n">No</label>
                                <span class="help-block"> {{ $errors->first("dancers") }} </span>

                            </div>

                        </div>
                    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" {{ $errors->has("dancers") ? "has-error":"" }}'>

            <label class="control-label col-md-6">Do you offer EMC points?</label>

            <div class="col-md-6">
                {!! Form::radio('non_musical_not_certain',1,@$theater->non_musical_not_certain==1 ? true : null) !!}
                <label>Yes</label>
                {!! Form::radio('non_musical_not_certain',2,@$theater->non_musical_not_certain==2 ? true : null) !!}
                <label>No</label>
            </div>
        </div>
    </div>
                </div>
    <div class="row">
        <div class="col-md-12">
            <label for="Roles" class="control-label col-md-3"><strong>Aea Contract</strong></label>

            <div class="col-md-9">

                {!! Form::select('aea_contract',\App\Misc::$aea, (@$theater->aea_contract) ? @$theater->aea_contract : null, [  'required' => 'required',  'class' => 'form-control  account-type-select']) !!}

                <span class="help-block"> {{ $errors->first("roles_chosen") }} </span>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group" {{ $errors->has("dancers") ? "has-error":"" }}'>

            <label class="control-label col-md-2"><strong>Available Positions:</strong></label>

            <div class="col-md-3">
                {!! Form::checkbox('accompanist',1,@$theater->accompanist==1 ? true : null) !!}
                <label>Accompanist</label><br>
                {!! Form::checkbox('administration',2,@$theater->administration==2 ? true : null) !!}
                <label>Administration</label><br>
                {!! Form::checkbox('box_office',3,@$theater->box_office==3 ? true : null) !!}
                <label>Box Office</label><br>
                {!! Form::checkbox('carpentry',4,@$theater->carpentry==4 ? true : null) !!}
                <label>Carpentry</label><br>
                {!! Form::checkbox('choreographer',5,@$theater->choreographer==5 ? true : null) !!}
                <label>Administration</label><br>
                {!! Form::checkbox('costume_design',6,@$theater->costume_design==6 ? true : null) !!}
                <label>Costume Design</label><br>
                {!! Form::checkbox('director',7,@$theater->director==7 ? true : null) !!}
                <label>Director</label><br>
                {!! Form::checkbox('electrics',8,@$theater->electrics==8 ? true : null) !!}
                <label>Electrics</label><br>
                {!! Form::checkbox('graphics',9,@$theater->graphics==9 ? true : null) !!}
                <label>Graphics</label><br>
                {!! Form::checkbox('house',10,@$theater->house==10 ? true : null) !!}
                <label>House</label><br>
                {!! Form::checkbox('light_ops',11,@$theater->light_ops==11 ? true : null) !!}
                <label>Light Ops</label><br>
                {!! Form::checkbox('makeup_wig_design',12,@$theater->makeup_wig_design==12 ? true : null) !!}
                <label>Make-Up & Wig Design</label><br>
                {!! Form::checkbox('music_director',13,@$theater->music_director==13 ? true : null) !!}
                <label>Music Director</label><br>
                {!! Form::checkbox('paint_charge',14,@$theater->paint_charge==14 ? true : null) !!}
                <label>Paint Charge</label><br>
                {!! Form::checkbox('photography',15,@$theater->photography==15 ? true : null) !!}
                <label>Photography</label><br>
                {!! Form::checkbox('pit_musician',16,@$theater->pit_musician==16 ? true : null) !!}
                <label>Pit Musician</label><br>
                {!! Form::checkbox('properties',17,@$theater->properties==17 ? true : null) !!}
                <label>Properties</label><br>
                {!! Form::checkbox('publicity',18,@$theater->publicity==18 ? true : null) !!}
                <label>Publicity</label><br>
                {!! Form::checkbox('running_crew',19,@$theater->running_crew==19 ? true : null) !!}
                <label>Running Crew</label><br>
                {!! Form::checkbox('scenic_artist',20,@$theater->scenic_artist==20 ? true : null) !!}
                <label>Scenic Artist</label><br>
                {!! Form::checkbox('set_design',21,@$theater->set_design==21 ? true : null) !!}
                <label>Set Design</label><br>
                {!! Form::checkbox('sewing_wardrobe',22,@$theater->sewing_wardrobe==22 ? true : null) !!}
                <label>Sewing/Wardrobe</label><br>
                {!! Form::checkbox('sound',23,@$theater->sound==23 ? true : null) !!}
                <label>Sound</label><br>
                {!! Form::checkbox('state_management',24,@$theater->state_management==24 ? true : null) !!}
                <label>State Management</label><br>
                {!! Form::checkbox('technical_direction',25,@$theater->technical_direction==25 ? true : null) !!}
                <label>Technical Direction</label><br>
                {!! Form::checkbox('video',26,@$theater->video==26 ? true : null) !!}
                <label>Video</label><br>

                <span class="help-block"> {{ $errors->first("dancers") }} </span>

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

                <!-- END FORM-->

            </div>

                                        </div>



</div>

    <!-- CHANGE AVATAR TAB -->

    <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2">





        @if(isset($theater->precrop_url))

            <img src="{{asset($theater->precrop_url)}}" width="500" height="500" id="cropbox" />



            <!-- This is the form that our event handler fills -->

            <form style="margin-top: 30px;" action="{{route('admin::theaterCropPhoto',$id)}}" method="put" onsubmit="return checkCoords();">

                {{csrf_field()}}

                <input type="hidden" id="x" name="x" />

                <input type="hidden" id="y" name="y" />

                <input type="hidden" id="w" name="w" />

                <input type="hidden" id="h" name="h" />

                <input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />

                <a href="{{route('admin::theaterPhotoDelete',$id)}}" class="btn btn-large btn-danger" >Delete Picture</a>

            </form>

        @else

            <form action="{{route('admin::theaterPhotoUpdate',$id)}}" enctype="multipart/form-data" role="form" method="POST">

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
    <div class="tab-pane" id="tab_1_4">
        <form action="{{route('admin::postEditPassword',$id)}}"
              class="form-validate-auto" method="POST">
            {{csrf_field()}}
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