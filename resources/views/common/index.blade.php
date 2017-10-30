
@extends('common.layout')

@section('title', 'Home')

@section('style')
<link href="{{asset('assets/pages/css/about.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')

@endsection
@section('content')
 <!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <!-- BEGIN CONTENT HEADER -->
    @if(@$slideshows)
       @php
       $val = count($slideshows);
       $j = 0;
       @endphp

        <div id="myCarousel" class="margin-bottom-40 carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">

                @for($i = 0; $i < $val; $i++)
                 @if($i == 0)
                     <li data-target="#myCarousel" data-slide-to="{{$i}}" class="active"></li>
                 @else
                     <li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
                 @endif
                @endfor
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
            @foreach($slideshows as $slides)
                @if($j == 0)
               <div class="item hom-caro active">
                    <img src="{{$slides['path']}}" alt="Chania">
                    <div class="carousel-caption">
                            <h1>{{$slides['title']}}</h1>
                            <h3>{{$slides['description']}}</h3>
                    </div>
                </div>
                @else
                <div class="item hom-caro">
                    <img src="{{$slides['path']}}" alt="Chania">
                    <div class="carousel-caption">
                            <h1>{{$slides['title']}}</h1>
                            <h3>{{$slides['description']}}</h3>
                    </div>
                </div>
                @endif
                @php
                    $j++;
                @endphp
             @endforeach
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
         </div>
     @endif
    <!-- END CONTENT HEADER -->
    
    <!-- BEGIN TEXT & VIDEO -->

        {!! $homepage  !!}

    <!-- END TEXT & VIDEO -->
    <!-- BEGIN CARDS -->

    <!-- END CARDS -->
    <!-- BEGIN LINKS BLOCK -->
</div>
<!-- END PAGE CONTENT INNER -->               
@endsection