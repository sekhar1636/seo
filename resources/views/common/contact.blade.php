@extends('common.layout')

@section('title', 'Contact Us')

@section('style')
	<link href="{{asset('assets/pages/css/contact.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/pages/css/skdslider.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .c-content-contact-1>.row .c-body{
            margin:0;
        }
    </style>
@endsection

@section('js')
   
	
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/additional-methods.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/skdslider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/skdslider.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#skdSlIder').skdslider({delay:5000, animationSpeed: 2000,showNextPrev:true,showPlayButton:true,autoSlide:true,animationType:'fading'});
			
		});
</script>
<!--  <script src="{{asset('assets/pages/scripts/contact.js')}}" type="text/javascript"></script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPDYloTScp0aDYyniEhynWLrbDM2HDkVQ&callback=initMap"
  type="text/javascript"></script> -->

       
@endsection
@section('content')
 <!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    @if($slides->count())
<div class="row" style="padding:30px 15px;;">
<ul id="skdSlIder" class="slides" >
@foreach($slides as $slide)
<li> <img src="{{$slide->path}}" /> 
      <!--Slider Description example-->
      <div class="slide-desc">
        <h2>{{$slide->title}}</h2>
        <p>{{$slide->description}}</p>
      </div>
    </li>
@endforeach
  </ul>
</div>
@endif
    <div class="c-content-feedback-1 c-option-1">
        <div class="row">
        <div class="col-md-7">
                <div class="c-contact">
                    <div class="c-content-title-1">
                        <h3 class="uppercase">Keep in touch</h3>
                        <div class="c-line-left bg-dark"></div>
                        <p class="c-font-lowercase">Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email from the form below and we will get back to you as soon as we can.</p>
                    </div>
                    <form class="form-validate-auto" method="post">
                        <div class="alert alert-danger {{{ Session::has('error_message')? '' : 'display-hide' }}}">
                        {{csrf_field()}}
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
                        <div class="form-group" {{ $errors->has("username") ? "has-error":"" }}'>
                                {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => ' Name', 'required'=>'required','minlength'=>'3','maxlength'=>50]) !!}
                            <span class="help-block"> {{ $errors->first("username") }} </span>
                        </div>

                         <div class="form-group" {{ $errors->has("mail") ? "has-error":"" }}'>
                                {!! Form::text('mail', '', ['class' => 'form-control', 'placeholder' => 'Your Email', 'required'=>'required', 'email'=>'true']) !!}
                            <span class="help-block"> {{ $errors->first("mail") }} </span>
                        </div>
        
                        <div class="form-group">
                            <div class="form-group" {{ $errors->has("description") ? "has-error":"" }}'>
                                    {!! Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description', 'required'=>'required', 'maxlength'=>'600']) !!}
                                <span class="help-block"> {{ $errors->first("description") }} </span>
                            </div>
                           
                        </div>
                        <button type="submit" class="btn btn-lg green">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-5">
            	
                <div class="c-container bg-green">
                    <div class="c-content-title-1 c-inverse">
                        <h3 class="uppercase">Need to know more?</h3>
                        <div class="c-line-left"></div>
                        <p class="c-font-lowercase">Try visiting our FAQ page to learn more about our greatest ever expanding theme, Metronic.</p>
                        <a style="margin-top: 10px;" href="{{route('getFaq')}}"><button class="btn grey-cararra font-dark">Visit Now</button></a>
                    </div>
                </div>

                <div class="c-content-contact-1 c-opt-1" style="margin:0;">
                    <div class="row" data-auto-height=".c-height" style="margin:0;">
                       
                     
                            <div class="c-body">
                                <div class="c-section">
                                    <h3>StrawHat</h3>
                                </div>
                                <div class="c-section">
                                    <div class="c-content-label uppercase bg-blue">Address</div>
                                    <p>StrawHat Auditions, #315, 1771  
                                        <br/>Post Road East,
                                        <br/>Westport, CT 06880</p>
                                </div>
                                <div class="c-section">
                                    <div class="c-content-label uppercase bg-blue">Contacts</div>
                                    <p>
                                         203-254-8572
                                        <br/>
                                        
                                </div>
                                <div class="c-section">
                                    <div class="c-content-label uppercase bg-blue">Email</div>
                                    <p>
                                         info@strawhat-auditions.com
                                        <br/>
                                </div>
                                <div class="c-section">
                                    <div class="c-content-label uppercase bg-blue">Social</div>
                                    <br/>
                                    <ul class="c-content-iconlist-1 ">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-youtube-play"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        
                    </div>
       <!--  <div id="gmapbg" class="c-content-contact-1-gmap" style="height: 615px;"></div> -->
    </div>
                
            </div>
            
        </div>
    </div>
</div>
<!-- END PAGE CONTENT INNER -->
@endsection