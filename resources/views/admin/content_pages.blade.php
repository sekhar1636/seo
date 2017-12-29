@extends('admin.layout')
@section('title', 'Content Pages')
@section('style')
    <link href="{{asset('assets/css/datatables.bootstrap.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection
@section('js')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
<script type="text/javascript">
$('#content-page-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("admin::adminContentPagesDataTable")}}',
        columns: [
            {data: 'id'},
            {data: 'page_title'},
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
                  <li {{{  (Session::has('tabactive') ? '' : 'class=active') }}}> <a href="#tab_1_1" data-toggle="tab">Content Pages</a> </li>
                  <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_2" data-toggle="tab">Add New Page</a> </li>
                </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">
                  <table id="content-page-table" class="table">
                  <thead>
                  <tr>
                  <td>id</td>
                  <td>Title</td>
                 <td>Action</td>
                  </tr>
                  </thead>
                  </table>
                   </div>
                  <!-- END TAB -->
                <!--  <!--TAB-->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2">
                     <form method="post" class="form-horizontal" action="{{ route('admin::createStaticPage') }}">
{{ csrf_field() }}
                      <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                          {{ Form::label('title_lab', 'Title', ['class' => 'col-lg-2 control-label']) }}
                          <div class="col-lg-10">
                              {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Page Title','required'=>'required']) }}
                              <p class="help-block">{{ $errors->first('title', ':message') }}</p>
                          </div>
                      </div>
                      <!-- Text Area -->
                      <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                          {{ Form::label('description_lab', 'Description', ['class' => 'col-lg-2 control-label']) }}
                          <div class="col-lg-10">
                              {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Enter Page Content', 'required'=>'required']) }}
                              <p class="help-block">{{ $errors->first('description', ':message') }}</p>
                          </div>
                      </div>
                      <!-- Select With One Default -->
                      <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                          {{ Form::label('slug_lab', 'Friendly URL', ['class' => 'col-lg-2 control-label'] )  }}
                          <div class="col-lg-10">
                              {{ Form::text('slug', '', ['class' => 'form-control', 'placeholder' => 'Enter Friendly Url or Slug','required'=>'required',  'minlength'=>'3']) }}
                              <p class="help-block">{{ $errors->first('slug', ':message') }}</p>
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                          {{ Form::label('status_lab', 'STATUS', ['class' => 'col-lg-2 control-label'] )  }}
                          <div class="col-lg-10">
                              {{  Form::select('status', ['0'=>'Inactive', '1'=>'Active'], null, array('class' => 'form-control', 'required'=>'required')) }}
                              <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                          </div>
                      </div>
                      <!-- Submit Button -->
                      <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                              {{ Form::submit('Create Page', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
                          </div>
                      </div>
                     </form>
                  </div>
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