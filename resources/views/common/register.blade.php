
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
        <div class="col-md-6 hidden-md hidden-lg">
            <p style="font-weight:bold">Terms And Conditions</p>
            <p>By creating a profile on the StrawHat Auditions website, I certify that I have read the registration and application instructions fully and that the information in this application is truthful and correct. <span style="font-weight: bold;">I understand that payment of the registration fee does not guarantee that I will be scheduled for an audition, only that I will receive consideration for same, and that this registration fee is non-refundable.</span> I understand that StrawHat Auditions is not to be held responsible for any errors of omissions in the publication or reproduction of the materials I have supplied, nor are they liable for any damages arising out of or connected to the use or inability to use their web site, www.strawhat-auditions.com. I understand that StrawHat Auditions is not a licensed booking agent or manager, nor is it engaged in any way in the operation of a talent or employment agency. I do not expect StrawHat to obtain employment for me, but only to make the physical arrangements to facilitate my audition for potential theatrical employers. Any employment related transactions are solely between me and a theatrical employer with no commission or management fee due or payable to <i>StrawHat Auditions.</i></p>
        </div>

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
<div class="col-md-6 hidden-sm hidden-xs">
    <p style="font-weight:bold">Terms And Conditions</p>
    <p>By creating a profile on the StrawHat Auditions website, I certify that I have read the registration and application instructions fully and that the information in this application is truthful and correct. <span style="font-weight: bold;">I understand that payment of the registration fee does not guarantee that I will be scheduled for an audition, only that I will receive consideration for same, and that this registration fee is non-refundable.</span> I understand that StrawHat Auditions is not to be held responsible for any errors of omissions in the publication or reproduction of the materials I have supplied, nor are they liable for any damages arising out of or connected to the use or inability to use their web site, www.strawhat-auditions.com. I understand that StrawHat Auditions is not a licensed booking agent or manager, nor is it engaged in any way in the operation of a talent or employment agency. I do not expect StrawHat to obtain employment for me, but only to make the physical arrangements to facilitate my audition for potential theatrical employers. Any employment related transactions are solely between me and a theatrical employer with no commission or management fee due or payable to <i>StrawHat Auditions.</i></p>
</div>
</div>
            <!-- END LOGIN FORM -->
        </div>

@endsection