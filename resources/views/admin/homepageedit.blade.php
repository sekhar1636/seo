@extends('admin.layout')
@section('title', 'Edit Home Page')
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
                                        <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit Home Page</a> </li>
                                    </ul>
                                </div>
                                <div class="portlet-body">
                                    <div class="tab-content">
                                        <!--TAB -->
                                        <div class="tab-pane active" id="tab_1_2">
                                        <form action="{{ route('admin::adminHomepageupdate') }}" method="post" class="form-horizontal">
{{ Form::token() }}
                                            <!-- Text Area -->
                                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                {{ Form::label('content', 'Content', ['class' => 'col-lg-2 control-label']) }}
                                                <div class="col-lg-10">
                                                    {{ Form::textarea('content', $content, ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Enter Content Here', 'required'=>'required', 'minlength'=>'20']) }}
                                                    <p class="help-block">{{ $errors->first('description', ':message') }}</p>
                                                </div>
                                            </div>
<div class="form-group">
    {{ Form::label('slide','SlideShow',['class'=>'col-lg-2 control-label']) }}
    <div class="col-md-3">
        <select name="slideshow" class="form-control  account-type-select">
            @foreach(@$slideshow as $slidesho)
                <option value="{{ $slidesho['id'] }}" @if(@$slide == $slidesho['id']) selected @endif>{{ $slidesho['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>
    <!-- Submit Button -->
                                            <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-2">
                                                    {{ Form::submit('Save Page', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
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
                <!-- END CONTENT -->
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
@endsection