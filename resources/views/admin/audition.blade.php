@extends('admin.layout')
@section('title', 'Audition')
@section('style')
    <link href="{{asset('assets/css/datatables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.bootstrap.js')}}"></script>
    <script type="text/javascript">
        $('#audition-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{route("admin::auditions")}}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
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
                                        <li {{  (Session::has('tabactive') ? '' : 'class=active') }}> <a href="#tab_1_1" data-toggle="tab">Auditions</a> </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!--TAB -->
                                        <div class="tab-pane {{  (Session::has('tabactive') ? '' : 'active') }}" id="tab_1_1">
                                            <table id="audition-table" class="table">
                                                <thead>
                                                <tr>
                                                    <td>ID</td>
                                                    <td>Name</td>
                                                    <td>Email</td>
                                                    <td>Action</td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <!-- END TAB -->
                                        <!--TAB -->
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