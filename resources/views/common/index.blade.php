
@extends('common.layout')

@section('title', 'Home')

@section('style')
<link href="{{asset('assets/pages/css/about.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('js')

@endsection
@section('content')
 <!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <!-- BEGIN CONTENT HEADER -->
    <div class="row margin-bottom-40 about-header">
        <div class="col-md-12">
            <h1>About StrawHat</h1>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                            <h3 style="color:#fff;">Actors, Singers, Dancers, Musicians, Staff, Tech, Design... All 3 Days! 
                Actor Registrations for the 2017 Auditions are closed.</h3>
                </div>
            </div>
        </div>
    </div>
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