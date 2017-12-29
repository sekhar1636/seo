@extends('common.layout')
@section('title', 'Forgot Password')
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
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form form-validate-auto"  method="post">
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
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
                <div class="form-group" {{ $errors->has("mail") ? "has-error":"" }}'>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        {!! Form::text('mail', '', ['class' => 'form-control', 'placeholder' => ' Email', 'required'=>'required', 'email'=>'true']) !!}
                    </div>
                    <span class="help-block"> {{ $errors->first("mail") }} </span>
                </div>
                <div class="form-actions">
                    <a href="{{route('getLogin')}}"><button type="button" id="back-btn" class="btn grey-salsa btn-outline"> Back </button></a>
                    <button type="submit" class="btn btn-primary pull-right"> Submit </button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
        </div>
@endsection