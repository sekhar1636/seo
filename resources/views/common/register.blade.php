@extends('common.layout')
@section('title', 'Register Now')
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
<div class="content box-setting">
    <div class="row">
        {!! $cp !!}
      <div class="col-md-6">
            <!-- BEGIN LOGIN FORM -->
            <form method="post" class="login-form form-validate-auto">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title" style="font-weight: 300;color:#697882; padding:0px 0px 10px 0px;">Register your account</h3>
                <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
					<button class="close" data-close="alert"></button>
					<span>
						{!! Session::has('error_message') ? Session::pull('error_message') : 'Please correct your fields.' !!}
					</span>
				</div>
				<div class="alert alert-success {{{ Session::has('recover_message') ? '' : 'display-hide' }}}">
					<button class="close" data-close="alert"></button>
					<span>
						{!! Session::has('recover_message') ? Session::pull('recover_message') : 'Please correct your fields.' !!}
					</span>
				</div>
                  <div class="form-group" {{ $errors->has("name") ? "has-error":"" }}'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                       {!! Form::text('name', '', ['class' => 'form-control placeholder-no-fix', 'placeholder' => ' Name', 'required'=>'required', 'maxlength' => '60',]) !!}
                    </div>
                    <span class="help-block"> {{ $errors->first("name") }} </span>
                </div>
                <div class="form-group" {{ $errors->has("user") ? "has-error":"" }}'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                       {!! Form::text('user', '', ['class' => 'form-control placeholder-no-fix', 'placeholder' => ' Email', 'required'=>'required', 'maxlength' => '100', 'email'=>'true']) !!}
                    </div>
                    <span class="help-block"> {{ $errors->first("user") }} </span>
                </div>
                 <div class="form-group" {{ $errors->has("password") ? "has-error":"" }}'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        {!! Form::password('password', ['class' => 'form-control placeholder-no-fix', 'placeholder' => 'Password', 'required'=>'required','maxlength' => '15','minlength'=>'6']) !!}
                    </div>
                     <span class="help-block"> {{ $errors->first("password") }} </span>
                </div>
                 <div class="form-group" {{ $errors->has("role") ? "has-error":"" }}'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                       {!! Form::select('role',['' => 'Select User Type'] +App\Misc::$accountTypes, '', ['in' => 'App\Misc::$accountTypes',  'required' => 'required', 'maxlength' => '30', 'class' => 'form-control  account-type-select']) !!}
                    </div>
                    <span class="help-block"> {{ $errors->first("role") }} </span>
                </div>
                <div class="form-actions">
                    <a href="{{route('getLogin')}}"><button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Back </button></a>
                    <button type="submit" class="btn btn-primary pull-right"> Register </button>
                </div>
            </form>
</div>
</div>
            <!-- END LOGIN FORM -->
        </div>
@endsection