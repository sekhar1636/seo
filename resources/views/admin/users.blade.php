 @extends('admin.layout')



@section('title', 'Users')



@section('style')
<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection



@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script type="text/javascript">
$('#faq-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("admin::adminUsersDataTable")}}',
        columns: [
            {data: 'id'},
            {data: 'name'},
            {data: 'email'},
            {data: 'role'},
			{data: 'payment_status'},
			{data: 'status'},
			{data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

$('#actor-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route("admin::adminActorDataTable")}}',
    columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'email'},
        {data: 'subscription'},
        {data: 'payment_status'},
        {data: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
});
$('#theater-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route("admin::adminTheaterDataTable")}}',
    columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'email'},
        {data: 'subscription'},
        {data: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
});

$('#staff-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{route("admin::adminStaffDataTable")}}',
    columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'email'},
        {data: 'subscription'},
        {data: 'status'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
});

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
        <span> {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!} </span> </div>
      
      <!-- BEGIN CONTENT -->
      
      <div class="profile-content">
        <div class="row">
          <div class="col-md-12">
            <div class="portlet light ">
              <div class="portlet-title tabbable-line">
                <ul class="nav nav-tabs">
                  <li {{{  (Session::has('tabactive') ? '' : 'class=active') }}}> <a href="#tab_1_1" data-toggle="tab">Users List</a> </li>
                  <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_2" data-toggle="tab">Create New User</a> </li>
                    <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_3" data-toggle="tab">Actors List</a> </li>
                    <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_4" data-toggle="tab">Theaters List</a> </li>
                    <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_5" data-toggle="tab">Staff List</a> </li>
                </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">
                  <table id="faq-table" class="table">
                  <thead>
                  <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Role</td>
                  <td>Payment</td>
                  <td>Account</td>
                  <td>Action</td>
                  </tr>
                  </thead>
                  </table>
                   </div>
                  
                  <!-- END TAB --> 
                  
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2"> 
                  	{{ Form::open(['route' => 'admin::adminUserStore', 'class' => 'form-horizontal']) }}
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('name', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
                        {{ Form::label('email', 'Email', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email','required'=>'required']) }}
                        <p class="help-block">{{ $errors->first('email', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        {{ Form::label('password', 'Password', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Enter temporary password','required'=>'required']) }}
                        <p class="help-block">{{ $errors->first('password', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                        {{ Form::label('role', 'Select Role', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('role', ['actor'=>'Actor', 'staff'=>'Staff', 'theater'=>'Theater'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('role', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Create User', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                  </div>
                  <!-- END TAB -->
                    <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_3">
                        <table id="actor-table" class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Subscription</td>
                                <td>Payment/Status</td>
                                <td>Audition</td>
                                <td>Active</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_4">
                        <table id="theater-table" class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Company Name</td>
                                <td>Email</td>
                                <td>Subscription</td>
                                <td>Active</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_5">
                        <table id="staff-table" class="table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Subscription</td>
                                <td>Active</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
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