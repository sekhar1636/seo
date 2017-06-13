
@extends('common.layout')

@section('title', 'Forgot Password')

@section('style')
<link href="{{asset('assets/pages/css/login-3.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/additional-methods.min.js')}}"></script>
<script src="{{asset('js/main.js')}}" type="text/javascript"></script>

@endsection
@section('content')
<div class="content col-md-4 col-md-offset-4 box-setting">
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form form-validate-auto"  method="post">
                <h3>Reset your password</h3>
          
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

                <div class='form-group {{ $errors->has("password") ? "has-error":"" }}'>
					<label class="control-label visible-ie8 visible-ie9">Password</label>
					<div class="input-icon">
						<i class="fa fa-lock"></i>
						{!! Form::password('password', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password','required'=>'required','maxlength' => '15','minlength'=>'6', 'id'=>'userPassword']) !!}
						<span class="help-block"> {{ $errors->first("password") }} </span>
					</div>
				</div>
				<div class='form-group {{ $errors->has("password_confirmation") ? "has-error":"" }}'>
					<label class="control-label visible-ie8 visible-ie9">Password confirmation</label>
					<div class="input-icon">
						<i class="fa fa-lock"></i>
						{!! Form::password('password_confirmation', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password confirmation',  'required'=>'required','maxlength' => '15','minlength'=>'6', 'equalTo'=>'#userPassword']) !!}
						<span class="help-block"> {{ $errors->first("password_confirmation") }} </span>
					</div>
				</div>
                <div class="form-actions">
                    <a href="{{route('getLogin')}}"><button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Back </button></a>
                    <button type="submit" class="btn btn-primary pull-right"> Submit </button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
         
        </div>
@endsection

