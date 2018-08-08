@extends('common.layout')
@section('title', 'Younger Actors')
@section('style')
<link href="{{asset('assets/pages/css/skdslider.css')}}" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.box-section{
			border : 1px solid #eee;
			text-align: center;
			background-color: #fff;
			text-align: center;
			padding : 20px 30px;
		}
	</style>
@endsection
@section('js')
	<script src="{{asset('assets/pages/scripts/skdslider.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/skdslider.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#skdSlIder').skdslider({delay:5000, animationSpeed: 2000,showNextPrev:true,showPlayButton:true,autoSlide:true,animationType:'fading'});
		});
</script>
@endsection
@section('content')
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
{!! $sP !!}
@endsection