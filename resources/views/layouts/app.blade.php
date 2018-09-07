<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="{{ url('/')}}/images/favicon.png" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SEO') }}</title>

    <meta property="site_name" content="SEO Reviewer"/>
    <meta name="description" content="SEO Website Reviewer helps to identify your mistakes and optimize your web page contents for a better search engine ranking." />
    <meta name="keywords" content="seo audit tool, better ranking, free seo" />
    <meta name="author" content="Zaigo Infotech" />
    
    <!-- Open Graph -->
    <meta property="og:title" content="SEO Website Reviewer - Analysis Tool" />
    <meta property="og:site_name" content="SEO Reviewer" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="SEO Website Reviewer helps to identify your mistakes and optimize your web page contents for a better search engine ranking." />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />

    <!-- Main style -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Custom Theme style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Font-Awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->    
</head>
<body data-spy="scroll" data-target="#scroll-menu" data-offset="50" id="top">
    <script type="text/javascript">
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '{your-app-id}',
              cookie     : true,
              xfbml      : true,
              version    : '{api-version}'
            });
              
            FB.AppEvents.logPageView();   
              
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "https://connect.facebook.net/en_US/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- mobile-nav -->
    <nav class="mobile-nav">
        <ul class="main-nav">
            <li><a href="{{ url('/home')}}">Home</a></li>
            <li><a href="#">Site vs Site</a></li>
            <li><a href="#">Recent Sites</a></li>
            <li><a href="#">Contact</a></li>
        </ul>        
        <ul class="login-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>                
        <ul class="main-nav">
            <li class="wrapper-submenu">
                <a href="javascript:void(0)">EN <i class="fa fa-angle-down"></i></a>
                <div class="submenu">
                    <ul class="submenu-nav">
                        <li><a href="#">English</a></li>
                        <li><a href="#">Spanish</a></li>
                        <li><a href="#">German</a></li>
                    </ul>
                    <span class="arrow"></span>
                </div>
            </li>
        </ul>        
    </nav>
    <!-- mobile-nav -->

    <div class="main-content">
        <!-- desktop-nav -->
        <div class="wrapper-header navbar-fixed-top">        
            <div class="container main-header" id="header">        
                <a href="{{ url('/') }}">
                    <div class="logo">
                        <span class="themeLogoText"><i class="logo-icon fa fa-envira"></i> SEO Website Reviewer</span>
                    </div>
                </a>            
                <a href="javascript:void(0)" class="start-mobile-nav"><span class="fa fa-bars"></span></a>         
                <nav class="desktop-nav">            
                    <ul class="main-nav">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="#">Site vs Site</a></li>
                        <li><a href="#">Recent Sites</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>                
                    <ul class="login-nav">
                        <li class="dropdown">
                            <a href="javascript:void(0)" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><i class="fa fa-globe fa-lg"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">Spanish</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                        <li class="lang-li"><a>EN</a></li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link signup" href="{{ route('register') }}">Sign Up</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>                
                </nav>            
            </div>      
        </div>
        @yield('content')
        <footer>
        <div class="container">
            <div class="row">    
                <div class="col-md-6 col-sm-12 right-border">
                    <div class="footer-about">
                        <h2 class="footer-title">About Us</h2>
                        <p>Our aim to make search engine optimization (SEO) easy. We provide simple, professional-quality SEO analysis and critical SEO monitoring for websites. By making our tools intuitive and easy to understand, we've helped thousands of small-business owners, webmasters and SEO professionals improve their online presence.</p>
                    </div>
                    <div class="copyright hidden-sm hidden-xs">
                        <p>Copyright &copy; {{ date('Y') }} SEO. All rights reserved.</p>
                    </div>
                </div>        
                <div class="col-md-6 col-sm-12">
                    <div class="col-md-6 col-sm-6">
                        <div class="contact-info">
                            <h2 class="footer-title">Contact Info</h2>            
                            <div class="single">
                                <i class="fa fa-map-marker"></i><p>99 Street Address,<br>Your City, LKG 778569, Country</p>
                            </div>            
                            <div class="single">
                                <i class="fa fa-phone"></i><p>+91-00123987280</p>
                            </div>            
                            <div class="single">
                                <i class="fa fa-envelope"></i><p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="aac3c4ccc5eacfd2cbc7dac6cf84c9c5c7">[email&#160;protected]</a></p>
                            </div>            
                            <div class="social-icon">
                                <ul class="list-inline">
                                    <li><a href="https://facebook.com/" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://plus.google.com" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://linkedin.com" target="_blank" rel="nofollow"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>        
                    <div class="col-md-6 col-sm-6 left-border">
                        <div class="navigation">
                            <h2 class="footer-title">Navigation</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">What's new</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Advertisers</a></li>
                            </ul>
                        </div>
                    </div>        
                    <div class="clearfix"></div>        
                    <div class="copyright visible-sm visible-xs">
                        <p>Copyright &copy; {{ date('Y') }} SEO. All rights reserved.</p>
                    </div>        
                </div>        
            </div>
        </div>
    </footer>
    <!-- Bootstrap -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

    <script type='text/javascript' src="{{ asset('js/particleground.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/sweetalert.min.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <!-- Master JS -->
    <script src="{{ asset('js/master.js') }}" type="text/javascript"></script>

    <!-- XD Box -->
    <div class="modal fade loginme" id="xdBox" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button id="xdClose" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="xdTitle"></h4>
                </div>
                <div class="modal-body" id="xdContent">

                </div>
            </div>
        </div>
    </div>
</body>
</html>