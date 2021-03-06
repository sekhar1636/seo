@extends('layouts.app')
@section('content')
    <section class="headturbo" id="headturbo">
        <div class="headturbo-wrap" id="headturbo-wrap">
            <div class="texture-overlay"></div>
            <div class="container">
                <div class="row">
                    <div style="height: 870px;" class="headturbo-img pull-right hidden-xs"></div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center nopadding">
                        
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 headturbo-content headturbo-login headturbo-registration">                            
                            <h3 class="pulse">Sign up using social network</h3>
                            <div class="form-group connect-with">
                                <a href="#" class="connect facebook" title="Facebook"></a>
                                <a href="#" class="connect google" title="Google"></a>    
                                <a href="#" class="connect twitter" title="Twitter"></a>               
                            </div>
                            <div class="socialLogin">[OR]</div> 
                            <h3 class="pulse">Sign up with your {{ __('E-Mail Address') }}</h3>
                            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-lg-3 col-sm-12 col-xs-12 col-form-label text-md-right"></label>
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 nopadding">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-lg-3 col-sm-12 col-xs-12 col-form-label text-md-right"></label>
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 nopadding">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-3 col-lg-3 col-sm-12 col-xs-12 col-form-label text-md-right"></label>
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 nopadding">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="{{ __('Password') }}" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password_confirm" class="col-md-3 col-lg-3 col-sm-12 col-xs-12 col-form-label text-md-right"></label>
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 nopadding">
                                        <input id="password_confirm" type="password" class="form-control{{ $errors->has('password_confirm') ? ' is-invalid' : '' }}" name="password_confirm"  placeholder="{{ __('Confirm Password') }}" required>
                                        @if ($errors->has('password_confirm'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirm') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Sign Up</button>
                                        
                                    </div>
                                </div>
                            </form>                                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection