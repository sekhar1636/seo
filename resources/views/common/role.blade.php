
@extends('common.layout')

@section('title', 'User Type')

@section('style')
<link href="{{asset('assets/pages/css/login-3.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/additional-methods.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>

@endsection
@section('content')
<div class="content col-md-4 col-md-offset-4 box-setting">
            <!-- BEGIN LOGIN FORM -->
            <form method="post" class="login-form form-validate-auto">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h3 class="form-title" style="font-weight: 300;color:#697882; padding:0px 0px 10px 0px;">Choose your type</h3>
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
                    <button type="submit" class="btn btn-primary pull-right"> Submit </button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
@endsection