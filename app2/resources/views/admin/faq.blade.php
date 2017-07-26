 @extends('admin.layout')



@section('title', 'FAQ')



@section('style')
<link href="https://datatables.yajrabox.com/css/datatables.bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection



@section('js')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script type="text/javascript">
$('#faq-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{route("admin::adminFaqDataTable")}}',
        columns: [
            {data: 'id'},
            {data: 'question'},
            {data: 'answer'},
            {data: '_type'},
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
                  <li {{{  (Session::has('tabactive') ? '' : 'class=active') }}}> <a href="#tab_1_1" data-toggle="tab">FAQ List</a> </li>
                  <li {{{  (Session::has('tabactive') ? 'class=active' : '') }}}> <a href="#tab_1_2" data-toggle="tab">Add New FAQ</a> </li>
                </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? '' : 'active') }}}" id="tab_1_1">
                  <table id="faq-table" class="table">
                  <thead>
                  <tr>
                  <td>id</td>
                  <td>Question</td>
                  <td>Answer</td>
                  <td>Type</td>
                  <td>Action</td>
                  </tr>
                  </thead>
                  </table>
                   </div>
                  
                  <!-- END TAB --> 
                  
                  <!--TAB -->
                  <div class="tab-pane {{{  (Session::has('tabactive') ? 'active' : '') }}}" id="tab_1_2"> 
                  	{{ Form::open(['route' => 'admin::adminFaqStore', 'class' => 'form-horizontal']) }}
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                        {{ Form::label('question', 'Question', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('question', null, ['class' => 'form-control', 'placeholder' => 'Enter Question','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('question', ':message') }}</p>
                        </div>
                    </div>
                    
                     <!-- Text Area -->
                    <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                        {{ Form::label('answer', 'Answer', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('answer', $value = null, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Enter Answer', 'required'=>'required', 'minlength'=>'20']) }}
                            <p class="help-block">{{ $errors->first('answer', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('_type') ? ' has-error' : '' }}">
                        {{ Form::label('_type', 'Select Type', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('_type', ['Audition'=>'Audition', 'Application'=>'Application', 'Selection'=>'Selection','Members'=>'Members'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('_type', ':message') }}</p>
                        </div>
                    </div>
                    
                    
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Add FAQ', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
                        </div>
                    </div>
                    {{ Form::close() }}
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