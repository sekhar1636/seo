@extends('admin.layout')
@section('title', 'Edit Page Content')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
<script type="text/javascript">
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
      <!-- BEGIN CONTENT -->
      <div class="profile-content">
        <div class="row">
          <div class="col-md-12">
            <div class="portlet light ">
              <div class="portlet-title tabbable-line">
              <ul class="nav nav-tabs">
              <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit FAQ</a> </li>
              </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
              <!--TAB -->
                  <div class="tab-pane active" id="tab_1_2"> 
                    {{ Form::model($contentPage, ['method' => 'PATCH','route' => ['admin::adminContentPageUpdate',$contentPage->id], 'class' => 'form-horizontal']) }}
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ Form::label('title', 'Title', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('title', ':message') }}</p>
                        </div>
                    </div>
                     <!-- Text Area -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('description', $value = null, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Enter Answer', 'required'=>'required', 'minlength'=>'20']) }}
                            <p class="help-block">{{ $errors->first('description', ':message') }}</p>
                        </div>
                    </div>
                    <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('_type') ? ' has-error' : '' }}">
                        {{ Form::label('slideshow_id', 'Select Slideshow', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            <select name="slideshow_id" class="form-control" placeholder="Select Slideshow">
                            <option value="">No SlideShow</option>
                            @foreach($slideShows as $slideShow)
                            <option value="{{$slideShow->id}}" @if($slideShow->id==$contentPage->slideshow_id) selected="selected" @endif>{{$slideShow->name}}</option>
                            @endforeach
                            </select>
                            <p class="help-block">{{ $errors->first('slideshow_id', ':message') }}</p>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Edit Page', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
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