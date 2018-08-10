@extends('admin.layout')
@section('title', 'Edit Younger Section')
@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#editor').summernote({
                code : "{{ $errors->first('business', ':message') }}",
                height:200,
            });
        });
    </script>
@endsection
@section('content')
    <div class="page-content-inner">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PROFILE SIDEBAR -->
                <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
	                {!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!}
	            </span>
                </div>
                <div class="alert alert-success {{{ Session::has('success_message') ? '' : 'display-hide' }}}">
                    <button class="close" data-close="alert"></button>
                    <span>
	                {!! Session::has('success_message') ? Session::pull('success_message') : 'Please correct your fields.' !!}
	            </span>
                </div>
                <div class="profile-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light ">
                                <div class="portlet-title tabbable-line">
                                    <ul class="nav nav-tabs">
                                        <li class="active"> <a href="#tab_1_2" data-toggle="tab">Edit Younger Section</a> </li>
                                    </ul>
                                </div>

                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!--TAB -->
                                    <div class="tab-pane active" id="tab_1_2">
                                    {{ Form::open(['route'=>['admin::youngUpdate',$young->id],'class' => 'form-horizontal','method' => 'patch', 'files' => true]) }}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has("button_text") ? "has-error":"" }}">
                                            <label class="control-label col-md-3">Button Text</label>
                                            <div class="col-md-9">
                                                {!! Form::text('button_text',$young->button_text ? $young->button_text : null, ['class' => 'form-control', 'placeholder' => 'Enter text to appear on Button']) !!}
                                                <span class="help-block"> {{ $errors->first("button_text") }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has("business") ? "has-error" : " "}}">
                                            <label class="form-control-label col-md-3 text-right">Business/Locations</label>
                                            <div class="col-md-9">
                                            {{ Form::textarea('business', $young->business ? $young->business : '', ['class' => 'form-control', 'rows' => 3,  'id' => 'editor', 'placeholder' => 'Enter Business or locations', 'required'=>'required', 'minlength'=>'20']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has("link") ? "has-error" : " " }}">
                                            <label class="form-control-label col-md-3 text-right">Link</label>
                                            <div class="col-md-9">
                                            {{ Form::text('link',$young->link ? $young->link : "", ['class'=>'form-control', 'placeholder'=>'Enter link to redirect']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        {{ Form::submit('Edit Younger Section', ['class' => 'btn btn-lg btn-info pull-right'] ) }}
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