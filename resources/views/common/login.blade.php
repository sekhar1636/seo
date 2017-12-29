@extends('common.layout')
@section('title', 'Login')
@section('style')
<link href="{{asset('assets/pages/css/login-3.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/additional-methods.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).keypress(function (e) {
  if (e.which == 13) {
    $('.login-form').submit();
  }
});
</script>
@endsection
@section('content')
<div class="content col-md-4 col-md-offset-4 box-setting">
            <!-- BEGIN LOGIN FORM -->
            <form method="post" class="login-form form-validate-auto">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title" style="font-weight: 300;color:#697882; padding:0px 0px 10px 0px;">Login to your account</h3>
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
                <div class="form-group" {{ $errors->has("username") ? "has-error":"" }}'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => ' Email', 'required'=>'required', 'email'=>'true']) !!}
                    </div>
                    <span class="help-block"> {{ $errors->first("username") }} </span>
                </div>
                 <div class="form-group" {{ $errors->has("password") ? "has-error":"" }}'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required'=>'required']) !!}
                       
                    </div>
                     <span class="help-block"> {{ $errors->first("password") }} </span>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary pull-right"> Login </button>
                </div>
              	<div class="clearfix"></div>
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p> no worries, click
                        <a href="{{route('getForgot')}}" id="forget-password"> here </a> to reset your password. </p>
                </div>
                <div class="create-account">
                    <p> Don't have an account yet ?&nbsp;
                        <a href="{{route('getSignup')}}" id="register-btn"> Create an account </a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
@endsection