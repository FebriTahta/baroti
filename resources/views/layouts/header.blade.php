<!DOCTYPE html>
<!--

 Theme Name: HASWELL
 Description: HTML/CSS
 Author: ABCgomel
 Designed & Coded by ABCgomel
 
-->

<html lang="en">

<head>
    <title>Haswell - Responsive HTML5 Template</title>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Haswell - Responsive HTML5 Template">
    <meta name="author" content="ABCgomel">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- FAVICONS -->
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon/apple-touch-icon-114x114.png') }}">

    <!-- CSS -->

    <!-- FLEXSLIDER SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flexslider.css') }}">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700%7COpen+Sans:400,300,700' rel='stylesheet'
        type='text/css'>

    <!-- ICONS ELEGANT FONT & FONT AWESOME & LINEA ICONS -->
    <link rel="stylesheet" href="{{ asset('css/icons-fonts.css') }}">

    <!-- CSS THEME -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- ANIMATE -->
    <link rel='stylesheet' href="{{ asset('css/animate.min.css') }}">

    @yield('head')

    <!-- IE Warning CSS -->
    <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie-warning.css" ><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8-fix.css" ><![endif]-->

    <!-- Magnific popup  in style.css	Owl Carousel Assets in style.css -->

    <!-- CSS end -->

    <!-- JS begin some js files in bottom of file-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Modernizr -->
    <!-- <script src="js/modernizr.js"></script> -->

</head>

<body>

    <!-- LOADER -->
    <div id="loader-overflow">
        <div id="loader3">Please enable JS</div>
    </div>

    <div id="wrap" class="boxed ">
        <div class="container-p-75 grey-bg">
            <!-- Grey BG  -->

            <!--[if lte IE 8]>
    <div id="ie-container">
     <div id="ie-cont-close">
      <a href='#' onclick='javascript&#058;this.parentNode.parentNode.style.display="none"; return false;'><img src='images/ie-warn/ie-warning-close.jpg' style='border: none;' alt='Close'></a>
     </div>
     <div id="ie-cont-content" >
      <div id="ie-cont-warning">
       <img src='images/ie-warn/ie-warning.jpg' alt='Warning!'>
      </div>
      <div id="ie-cont-text" >
       <div id="ie-text-bold">
        You are using an outdated browser
       </div>
       <div id="ie-text">
        For a better experience using this site, please upgrade to a modern web browser.
       </div>
      </div>
      <div id="ie-cont-brows" >
       <a href='http://www.firefox.com' target='_blank'><img src='images/ie-warn/ie-warning-firefox.jpg' alt='Download Firefox'></a>
       <a href='http://www.opera.com/download/' target='_blank'><img src='images/ie-warn/ie-warning-opera.jpg' alt='Download Opera'></a>
       <a href='http://www.apple.com/safari/download/' target='_blank'><img src='images/ie-warn/ie-warning-safari.jpg' alt='Download Safari'></a>
       <a href='http://www.google.com/chrome' target='_blank'><img src='images/ie-warn/ie-warning-chrome.jpg' alt='Download Google Chrome'></a>
      </div>
     </div>
    </div>
    <![endif]-->

            <!-- HEADER 1 NO-TRANSPARENT -->
            <header id="nav" class="header header-1 no-transparent affix-on-mobile"> 

                <div class="header-wrapper">
                    <div class="container-m-30 clearfix">
                        <div class="logo-row">

                            <!-- LOGO -->
                            <div class="logo-container-2">
                                <div class="logo-2">
                                    <a href="/" class="clearfix">
                                        <img src="images/logo.png" class="logo-img" alt="Logo">
                                    </a>
                                </div>
                            </div>
                            <!-- BUTTON -->
                            <div class="menu-btn-respons-container">
                                <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse"
                                    data-target="#main-menu .navbar-collapse">
                                    <span aria-hidden="true" class="icon_menu hamb-mob-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- MAIN MENU CONTAINER -->
                    <div class="main-menu-container">

                        <div class="container-m-30 clearfix">

                            <!-- MAIN MENU -->
                            <div id="main-menu">
                                <div class="navbar navbar-default" role="navigation">

                                    <!-- MAIN MENU LIST -->
                                    <nav class="collapse collapsing navbar-collapse right-1024">
                                        <ul class="nav navbar-nav">

                                            <!-- MENU ITEM -->
                                            <li class="parent current">
                                                <a href="/">
                                                    <div class="main-menu-title">HOME</div>
                                                </a>

                                            </li>



                                            <!-- MENU ITEM -->
                                            <li id="menu-contact-info-big" class="parent megamenu">
                                                <a href="#">
                                                    <div class="main-menu-title">ABOUT US</div>
                                                </a>
                                            </li>

                                            <!-- MENU ITEM -->
                                            <li id="menu-cart">
                                                <a href="/daftar-product">
                                                    <div class="main-menu-title"><span aria-hidden="true"
                                                            class="icon_cart"></span>LIST PRODUCT</div>
                                                </a>
                                            </li>

                                            <li id="menu-contact-info-big" class="parent megamenu">
                                                <a href="/login">
                                                    <div class="main-menu-title">LOGIN</div>
                                                </a>
                                            </li>

                                        </ul>

                                    </nav>

                                </div>
                            </div>
                            <!-- END main-menu -->

                        </div>
                        <!-- END container-m-30 -->

                    </div>
                    <!-- END main-menu-container -->

                    <!-- SEARCH READ DOCUMENTATION -->


                </div>
                <!-- END header-wrapper -->

            </header>
