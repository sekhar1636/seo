<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Strawhat | @yield('title')</title>
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

        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

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
                                <div class="page-logo">
                                    <a href="index.html">
                                        <img src="{{asset('assets/layouts/layout3/img/logo-default.jpg')}}" alt="logo" class="logo-default">
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
                                        <button type="button" class="btn btn-default">{{Auth::user()->name}}</button>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            @if(Auth::user()->role == "actor")
                                                <li>
                                                    <a href="{{route('actor::actorProfile')}}"> My Profile </a>
                                                </li>
                                            @elseif(Auth::user()->role == "theater")
                                                <li>
                                                    <a href="{{route('theater::theaterProfile')}}"> My Profile </a>
                                                </li>
                                            @elseif(Auth::user()->role =="staff")
                                                <li>
                                                    <a href="{{route('staff::staffProfile')}}"> My Profile </a>
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
                                <!-- BEGIN HEADER SEARCH BOX -->
                                <form class="search-form" method="GET">
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
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">
                                        <li class="active">
                                            <a href="{{route('getIndex')}}">
                                                <i class="icon-home"></i> Home
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('getActors')}}">
                                                <i class="icon-users"></i> Actors
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('getStaffs')}}">
                                                <i class="icon-user-following"></i> Staff
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('getTheaters')}}">
                                                <i class=" icon-disc"></i> Theater
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('getContents')}}">
                                                <i class="icon-briefcase"></i> Premium content
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('getFaq')}}">
                                                <i class="icon-question"></i> FAQ
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('getYounger')}}">
                                                <i class="icon-info"></i> Younger
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('getContact')}}">
                                                <i class="icon-envelope"></i> Contact
                                                <span class="arrow"></span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                                <!-- END MEGA MENU -->
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
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                             <div class="page-content">
                                <div class="container-fluid">
                                    <!-- BEGIN PAGE BREADCRUMBS -->
                                    <ul class="page-breadcrumb breadcrumb">
                                        <li>
                                            <a href="{{route('getIndex')}}">Home</a>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>@yield('title')</span>
                                        </li>
                                    </ul>
                                
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
                                <div class="col-md-4 col-sm-6 col-xs-12 footer-block">
                                    <h2>About</h2>
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore. </p>
                                </div>
                               
                                <div class="col-md-4 col-sm-6 col-xs-12 footer-block">
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
                                <div class="col-md-4 col-sm-6 col-xs-12 footer-block">
                                    <h2>Contacts</h2>
                                    <address class="margin-bottom-40"> Phone: 800 123 3456
                                        <br> Email:
                                        <a href="mailto:info@metronic.com">xyz@abc.com</a>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PRE-FOOTER -->
                    <!-- BEGIN INNER FOOTER -->
                    <div class="page-footer">
                        <div class="container-fluid"> {{ date('Y') }} &copy;
                            <a target="_blank" href="http://keenthemes.com">Arkotech Solution Pvt Ltd</a>
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
        <script type="text/javascript">
             Metronic.init(); // init metronic core componets
        </script>

        @yield('js')
    
    </body>

</html>