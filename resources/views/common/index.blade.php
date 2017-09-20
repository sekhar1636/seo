
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
    <div class="row margin-bottom-40">
        <div class="col-lg-6">
            <div class="portlet light about-text">
                <h4>
                    <i class="fa fa-check icon-info"></i> Welcome to The StrawHat Auditions!</h4>
            
                <div class="about-quote">
                    <h3>"With StrawHats taking place in the most artistically prominent city in the country, it's truly 'one-stop shopping' for serious and gifted actors and technicians"</h3>
                    <p class="about-author">Scott LaFeber, Emerson College BFA Musical Theatre Faculty, Director.</p>
                </div>
                <p align="center"><b>Woodstock Playhouse's Fiddler on the Roof</b>
                    <br>
                    <font size="-1">
                    Director:  Andrew Parker Greenwood<br>
                    Photo:  Leslie Dawson<br>
                    Actors:  Noah Mitchell, Landon Sholar*, Julian Sarria, Justin Ables*, Matthew Curiano, Charles O'Connor*, Omar Najmi
                    <br>
                    <i>*Denotes StrawHat performers </i>
                            </font>
                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <iframe src="http://player.vimeo.com/video/22439234" style="width:100%; height:500px;border:0" allowfullscreen> </iframe>
        </div>
    </div>
    <!-- END TEXT & VIDEO -->
    <!-- BEGIN CARDS -->
    <div class="row margin-bottom-20">
        <div class="col-lg-3 col-md-6">
            <div class="portlet light">
                <div class="card-icon">
                    <i class="icon-user-follow font-red-sunglo theme-font"></i>
                </div>
                <div class="card-title">
                    <span> Best User Expierence </span>
                </div>
                <div class="card-desc">
                    <span> The best way to find yourself is
                        <br> to lose yourself in the service of others </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="portlet light">
                <div class="card-icon">
                    <i class="icon-trophy font-green-haze theme-font"></i>
                </div>
                <div class="card-title">
                    <span> Awards Winner </span>
                </div>
                <div class="card-desc">
                    <span> The best way to find yourself is
                        <br> to lose yourself in the service of others </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="portlet light">
                <div class="card-icon">
                    <i class="icon-basket font-purple-wisteria theme-font"></i>
                </div>
                <div class="card-title">
                    <span> eCommerce Components </span>
                </div>
                <div class="card-desc">
                    <span> The best way to find yourself is
                        <br> to lose yourself in the service of others </span>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="portlet light">
                <div class="card-icon">
                    <i class="icon-layers font-blue theme-font"></i>
                </div>
                <div class="card-title">
                    <span> Adaptive Components </span>
                </div>
                <div class="card-desc">
                    <span> The best way to find yourself is
                        <br> to lose yourself in the service of others </span>
                </div>
            </div>
        </div>
    </div>
    <!-- END CARDS -->
    <!-- BEGIN LINKS BLOCK -->
</div>
<!-- END PAGE CONTENT INNER -->               
@endsection