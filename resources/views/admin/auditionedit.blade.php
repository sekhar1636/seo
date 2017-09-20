@extends('admin.layout')



@section('title', 'Audition Edit')



@section('style')
    <link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
    <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>

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
                                        <li class="active"> <a href="#tab_1_1" data-toggle="tab">Edit Audition</a> </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!--TAB -->
                                        <div class="tab-pane active" id="tab_1_1">
                                        {{ Form::model($auditionEdit, ['method' => 'PATCH','route' => ['admin::auditionUpdate',$auditionEdit->actor->id], 'class' => 'form-horizontal']) }}



                                            <!-- Select With One Default -->
                                            <div class="form-group{{ $errors->has('auditistatus') ? ' has-error' : '' }}">
                                                {{ Form::label('auditistatus', 'Status', ['class' => 'col-lg-2 control-label'] )  }}
                                                <div class="col-lg-10">
                                                    {{  Form::select('audition_status', [0=>'Pending',1=>'Selected',2=>'Rejected'], $auditionEdit->actor->audition_status, array('class' => 'form-control', 'required'=>'required')) }}
                                                    <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('hour') ? ' has-error' : '' }}">
                                                {{ Form::label('houru', 'Audition Hour', ['class' => 'col-lg-2 control-label'] )  }}
                                                <div class="col-lg-10">
                                                    {{  Form::select('audition_hour', $hour, $auditionEdit->actor->audition_hour, array('class' => 'form-control', 'placeholder' => 'Select Hour', 'required'=>'required')) }}
                                                    <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                                                </div>
                                            </div>


                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-2"> {{ Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) }} </div>
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