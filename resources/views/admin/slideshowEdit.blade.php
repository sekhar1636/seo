@extends('admin.layout')
@section('title', 'Edit Slideshow')
@section('style')
@endsection
@section('js')
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
              <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit Slideshow</a> </li>
              </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
              <!--TAB -->
                  <div class="tab-pane active" id="tab_1_2"> 
                    {{ Form::model($slideshow, ['method' => 'PATCH','route' => ['admin::adminSlideshowUpdate',$slideshow->id], 'class' => 'form-horizontal']) }}
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        {{ Form::label('name', 'name', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter slideshow name','required'=>'required',  'minlength'=>'3']) }}
                        <p class="help-block">{{ $errors->first('name', ':message') }}</p>
                        </div>
                    </div>
                     <!-- Select With One Default -->
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        {{ Form::label('status', 'status', ['class' => 'col-lg-2 control-label'] )  }}
                        <div class="col-lg-10">
                            {{  Form::select('status', ['1'=>'Activate', '0'=>'De-Activate'], null, array('class' => 'form-control', 'required'=>'required')) }}
                            <p class="help-block">{{ $errors->first('status', ':message') }}</p>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Edit Slideshow', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
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