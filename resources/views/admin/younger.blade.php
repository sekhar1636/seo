@extends('admin.layout')
@section('title', 'Users')
@section('style')
    <link href="{{asset('assets/css/datatables.bootstrap.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.bootstrap.js')}}"></script>
<script type="text/javascript">
    $('#lis-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("admin::youngData")}}',
        columns: [
            {data: 'id'},
            {data: 'business'},
            {data: 'link'},
            {data: 'button_text'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
    $.fn.dataTable.ext.errMode = 'throw';
    $(document).ready(function() {
        $('#editor').summernote({
            code : "{{ $errors->first('answer', ':message') }}",
            height:200,
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
                    <span> {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!} </span>
                </div>
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <h4><a href="{{route('admin::staticPageEdit','younger')}}">Click Here</a> for edit the above section in Younger <Page class=""></Page></h4>
                                    <ul class="nav nav-tabs">
                                        <li {{{  (Session::has('tabactive') ?  '' : 'class=active') }}}> <a href="#tab_1_1" data-toggle="tab">Available Business/Locations</a> </li>
                                        <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_2" data-toggle="tab">Create Business/Locations</a> </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!--TAB -->
                                        <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">
                                            <table id="lis-table" class="table">
                                                <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>Location/Business</td>
                                                    <td>Link</td>
                                                    <td>Button Text</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>

                                        <!-- END TAB -->
                                        <!--TAB -->
                                        <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2">
                                            {{ Form::open(['route'=>['admin::youngAdd'],'class' => 'form-horizontal','method' => 'post', 'files' => true]) }}
                                            <div class="form-group{{ $errors->has('business') ? ' has-error' : '' }}">
                                                {{ Form::label('businesstitle', 'Business/Locations', ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-10">
                                                    {{ Form::text('business', null, ['class' => 'form-control', 'placeholder' => 'Enter Business/Locations']) }}
                                                    <p class="help-block">{{ $errors->first('business', ':message') }}</p>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                                {{ Form::label('linktitle', 'Link to Redirect', ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-10">
                                                    {{ Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Enter Link to redirect']) }}
                                                    <p class="help-block">{{ $errors->first('link', ':message') }}</p>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('button_text') ? ' has-error' : '' }}">
                                                {{ Form::label('btntext', 'Text to appear on Button', ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-10">
                                                    {{ Form::text('button_text', null, ['class' => 'form-control', 'placeholder' => 'Enter Text to appear on button']) }}
                                                    <p class="help-block">{{ $errors->first('link', ':message') }}</p>
                                                </div>
                                            </div>
                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-2">
                                                    {{ Form::submit('Add Slide', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
                                                </div>
                                            </div>
                                            {{ Form::close() }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
