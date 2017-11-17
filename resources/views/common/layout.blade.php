<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>StrawHat | @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content=" " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
       
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('assets/layouts/layout3/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">

        @yield('style')

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <style type="text/css">
        .page-header .page-header-top .top-menu {
            margin: 21px 0 0;
        }
    </style>

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        <div class="page-header-top">
                            <div class="container-fluid">
                                <!-- BEGIN LOGO -->
                                <div class="page-logo" style="width:330px;">
                                    <a href="{{route('getIndex')}}" style="font-size: 20px; text-transform: uppercase;text-decoration: none;">
                                        <img src="{{asset('assets/images/straw99.gif')}}" alt="StrawHat Auditions" style="width: 81px;
                                        margin-top: 5px; " class="logo-default"> StrawHat Auditions
                                    </a>
                                </div>
                                <!-- END LOGO -->
                                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                                <a href="javascript:;" class="menu-toggler"></a>
                                <!-- END RESPONSIVE MENU TOGGLER -->
                                <!-- BEGIN TOP NAVIGATION MENU -->
                                @if(Auth::check())
                                  
                                    <!-- END TOP NAVIGATION MENU -->
                                <div class="top-menu  pull-right">
                                    <div class="btn-group">
                                        
                                    @if(Auth::user()->role=="actor")
                                    <a href="{{route('actor::actorProfile')}}" class="btn btn-default"><i class="icon-user" style="color: #D91E18;"></i>
                                        @if(Auth::user()->actor)
                                        	{{Auth::user()->actor->first_name}} {{Auth::user()->actor->last_name}}
                                        @else
                                        	{{Auth::user()->name}}
                                        @endif
                                    </a> 
                                    @elseif(Auth::user()->role == "theater")
                                    <a href="{{route('theater::theaterProfile')}}" class="btn btn-default"><i class="icon-user" style="color: #D91E18;"></i>
                                        @if(Auth::user()->role=="theater")
                                        	{{Auth::user()->name}}
                                        @else
                                        	{{Auth::user()->name}}
                                        @endif
                                    </a> 
                                    @elseif(Auth::user()->role =="staff")
                                    <a href="{{route('staff::staffProfile')}}" class="btn btn-default"><i class="icon-user" style="color: #D91E18;"></i>
                                        @if(Auth::user()->role="staff")
                                        	{{Auth::user()->name}}
                                        @else
                                        	{{Auth::user()->name}}
                                        @endif
                                    </a> 
                                    @endif
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            @if(Auth::user()->role == "actor")
                                                <li>
                                                    <a href="{{route('actor::actorProfile')}}"> Dashboard </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('actor::getEditProfile')}}"> My Profile </a>
                                                </li>
                                            @elseif(Auth::user()->role == "theater")
                                                <li>
                                                    <a href="{{route('theater::getEditProfile')}}"> My Profile </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('theater::theaterProfile')}}"> Dashboard </a>
                                                </li>
                                            @elseif(Auth::user()->role =="staff")
                                                <li>
                                                    <a href="{{route('staff::getEditProfile')}}"> My Profile </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('staff::staffProfile')}}"> Dashboard </a>
                                                </li>
                                            @endif
                                           
                                            <li>
                                                <a href="{{route('logout')}}"> Logout </a>
                                            </li>
                                        </ul>
                                    </div>
                                    </div>
                                @else
                                    <div class="top-menu  pull-right">
                                        <a href="{{route('getLogin')}}" class="btn btn-default"> Login </a>
                                        <a href="{{route('getSignup')}}" class="btn btn-primary"> Register </a>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        <div class="page-header-menu">
                            <div class="container-fluid">
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <div class="hor-menu col-md-9">
                                    <ul class="nav navbar-nav">
                                        <li class="{{ @$homeactive ? 'active' : '' }}">
                                            <a href="{{route('getIndex')}}">
                                                <i class="icon-home"></i> Home
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class="menu-dropdown {{ @$actoractive ? 'active' : @$staticactive=='actoractive' ? 'active' : '' }}">
                                            @if(Auth::check())
                                                @if(\Auth::user()->payment_status==1)
                                            <a href="{{ route('getActors') }}">
                                                @else
                                                    <a href="{{route('theater::theaterProfile')}}">
                                                @endif
                                            @else
                                                  <a href="{{route('getStaticPage',['slug'=>'actor'])}}">
                                            @endif
                                                <i class="icon-users"></i> Actors
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <li>
                                                    <a href="{{route('getStaticPage',['slug'=>'howitworks'])}}">How it Works</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('getStaticPage',['slug'=>'instructions'])}}">Instructions</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('getStaticPage',['slug'=>'auditiontypes'])}}">Audition Types</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('getStaticPage',['slug'=>'criteria'])}}">Criteria</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('getSignup')}}">Register</a>
                                                </li>
                                            </ul>
                                        <li class="{{ @$staffactive ? 'active' : @$staticactive=='staffactive' ? 'active' : '' }}">
                                            @if(Auth::check())
                                                @if(\Auth::user()->payment_status==1)
                                                    <a href="{{ route('getStaffs') }}">
                                                        @else
                                                            <a href="{{route('staff::staffProfile')}}">
                                                                @endif
                                                                @else
                                                                    <a href="{{route('getStaticPage',['slug'=>'staff'])}}">
                                                                        @endif
                                                                        <i class="icon-note"></i> Staff/Tech
                                                                        <span class="arrow"></span>
                                                                    </a>

                                       <li class="menu-dropdown {{ @$theateractive ? 'active' : @$staticactive=='theateractive' ? 'active' : '' }}">
                                           @if(Auth::check())
                                               @if(\Auth::user()->payment_status==1)
                                                   <a href="{{ route('getTheaters') }}">
                                                       @else
                                                           <a href="{{route('theater::theaterProfile')}}">
                                                               @endif
                                                               @else
                                                                   <a href="{{route('getStaticPage',['slug'=>'theater'])}}">
                                                                       @endif
                                                                       <i class="icon-star"></i> Theaters
                                                                       <span class="arrow"></span>
                                                                   </a>
                                           <ul class="dropdown-menu pull-left">
                                               <li>
                                                   <a href="{{route('getStaticPage',['slug'=>'theaterintro'])}}">Theater Intro</a>
                                               </li>
                                               <li>
                                                   <a href="{{route('getStaticPage',['slug'=>'auditionschedule'])}}">Audition Schedule</a>
                                               </li>

                                               <li>
                                                   <a href="{{route('getStaticPage',['slug'=>'theaterregistrationfees'])}}">Registration Fees</a>
                                               </li>

                                               <li>
                                                   <a href="{{route('getStaticPage',['slug'=>'theatercompanies'])}}">Past Companies</a>
                                               </li>
                                           </ul>
                                       </li>

                                        <li class="{{ @$faqactive ? 'active' : '' }}">
                                            <a href="{{route('getFaq')}}">
                                                <i class="icon-question"></i> FAQ
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class="{{ @$youngeractive ? 'active' : '' }}">
                                            <a href="{{route('getYounger')}}">
                                                <i class="icon-info"></i> Younger
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li class="menu-dropdown {{ @$staticactive=='moreactive' ? 'active' : '' }}">
                                            <a href="javascript:;">
                                                <i class="icon-briefcase"></i> More
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                    <li>
                                                        <a href="{{ route('getStaticPage',['slug'=>'aboutstrawhat']) }}">Our Company</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('getStaticPage',['slug'=>'kirstijaybios']) }}">Who We Are</a>
                                                    </li>
                                            </ul>
                                        </li>
                                        <li class="{{ @$contactactive ? 'active' : '' }}">
                                            <a href="{{route('getContact')}}">
                                                <i class="icon-envelope"></i> Contact
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        @if(\Auth::check())
                                            @if(\Auth::user()->payment_status==1)
                                                <li class="menu-dropdown {{ @$staticactive=='resactive' ? 'active' : '' }}"><a><i class="icon-envelope"></i> Premium content</a>

                                        <ul class="dropdown-menu pull-left">
                                        <li>
                                            <a href="{{route('getStaticPage',['slug'=>'headshot'])}}">Headshot Advice</a>
                                        </li>
                                        <li>
                                            <a href="{{route('getStaticPage',['slug'=>'resumeadvice'])}}">Resume Advice</a>
                                        </li>

                                        </ul>
                                        </li>
                                        @else
                                                <li><a href="{{ route('getStaticPage',['slug'=>'premcont']) }}"><i class="icon-envelope"></i> Premium Content</a></li>
                                        @endif
                                        @else
                                            <li><a href="{{ route('getStaticPage',['slug'=>'premcont']) }}"><i class="icon-envelope"></i> Premium Content</a></li>
@endif

                                    </ul>
                                </div>
                                <!-- END MEGA MENU -->
                                <!-- BEGIN HEADER SEARCH BOX -->
                                <form class="search-form col-md-3" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="query">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <!-- END HEADER SEARCH BOX -->
                            </div>
                        </div>
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            
                            @if(\Route::getCurrentRoute()->uri != '/')
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>@yield('title')</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                </div>
                            </div>
                            @endif
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                             <div class="page-content">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE BREADCRUMBS -->
@if ($__env->yieldContent('title') == "Home")

@else
                                        <ul class="page-breadcrumb breadcrumb">
                                            <li>
                                                <a href="{{route('getIndex')}}">StrawHat</a>
                                                <i class="fa fa-circle"></i>
                                            </li>
                                            <li>
                                                <span>@yield('title')</span>
                                            </li>
                                        </ul>
@endif

@yield('content')

</div>
</div>
<!-- END PAGE CONTENT BODY -->
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
</div>
</div>
<div class="page-wrapper-row">
<div class="page-wrapper-bottom">
<!-- BEGIN FOOTER -->
<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter">
<div class="container-fluid">
<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
<h2>About</h2>
<p> StrawHat Auditions is New York City’s premiere combined audition service. </p>
</div>
<div class="col-md-3 col-sm-6 col-xs12 footer-block">
<h2>Subscribe Email</h2>
<div class="subscribe-form">
    <form action="javascript:;">
        <div class="input-group">
            <input type="text" placeholder="mail@email.com" class="form-control">
            <span class="input-group-btn">
                <button class="btn" type="submit">Submit</button>
            </span>
        </div>
    </form>
</div>
</div>

<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
<h2>Follow Us On</h2>
<ul class="social-icons">

    <li>
        <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
    </li>
    <li>
        <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
    </li>
    <li>
        <a href="javascript:;" data-original-title="youtube" class="youtube"></a>
    </li>

</ul>
</div>
<!--<div class="col-md-3 col-sm-6 col-xs-12 footer-block">
<h2>Contacts</h2>
<address class="margin-bottom-40"> Phone: 800 123 3456
    <br> Email:
    <a href="mailto:info@metronic.com">xyz@abc.com</a>
</address>
</div>-->
</div>
</div>
</div>
<!-- END PRE-FOOTER -->
<!-- BEGIN INNER FOOTER -->
<div class="page-footer">
<div class="container-fluid"> {{ date('Y') }} &copy;
<a target="_blank" href="http://keenthemes.com">StrawHat-Auditions</a>
</div>
</div>
<div class="scroll-to-top">
<i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->
<!-- END FOOTER -->
</div>
</div>
</div>

<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset('assets/layouts/layout3/scripts/layout.min.js')}}" type="text/javascript"></script>
<!--<script src="{{asset('assets/layouts/layout3/scripts/demo.min.js')}}" type="text/javascript"></script> -->
<script src="http://nicpakistan.dev/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{asset('assets/js/list.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
Metronic.init(); // init metronic core componets
</script>

@yield('js')

</body>

</html>