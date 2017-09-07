 @extends('admin.layout')



@section('title', 'Edit Slide')



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
              <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit Slide</a> </li>
              </ul>
              </div>
              <div class="portlet-body">
                <div class="tab-content"> 
              <!--TAB -->
                  <div class="tab-pane active" id="tab_1_2"> 
                    {{ Form::model($slide, ['method' => 'PATCH','route' => ['admin::adminSlideshowUpdateSlide',$slide->id], 'files' => true, 'class' => 'form-horizontal']) }}
                    
                    <!-- input Area -->
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {{ Form::label('title', 'Slide Title', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter slide title']) }}
                        <p class="help-block">{{ $errors->first('title', ':message') }}</p>
                        </div>
                    </div>
                    
                     <!-- Text Area -->
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        {{ Form::label('description', 'Description', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('description', $value = null, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Enter description']) }}
                            <p class="help-block">{{ $errors->first('description', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- file field -->
                    <div class="form-group{{ $errors->has('slide') ? ' has-error' : '' }}">
                        {{ Form::label('slide', 'Slide', ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::file('slide', ['class' => 'form-control']) }}
                            <p class="help-block">{{ $errors->first('slide', ':message') }}</p>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {{ Form::submit('Edit Slide', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
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