<!DOCTYPE html>
<!-- Spa Magic - Spa & Beauty Salon Landing Page Template design design by Jthemes (http://www.jthemes.net) -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">



<head>

    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Jthemes" />
    <meta name="description" content="Bantal Aroma Terapi" />
    <meta name="keywords"
        content=" Bantal Aroma Terapy yang menggunakan bahan-bahan
        alami sebagai base pembuatannya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      property="og:image"
      content="{{asset('images/baroti_thumbnail.png')}}"
    /> --}}
    <?php
    $profile = App\Models\Profile::first();
    $about = App\Models\About::first();
    ?>
    @if ($profile !== null && $about !== null)
        
        <meta name="author" content="BaRoTi">
        {{-- <title>Registrasi - Tilawati</title> --}}
        <meta property="og:title" content="BaRoTi"/>
        <meta property="og:description" content="{{$about->deskirpsi}}"/>
        <meta property="og:image" itemprop="image" content="https://baroti.uac-id.com/img_thumbnail/{{$profile->thumbnail_home}}">
        {{-- @if ($profile->img_thumbnail !== null)
            
        @else
            <meta property="og:image" itemprop="image" content="{{ asset('images/tumbreg.jpeg') }}">
        @endif --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <meta property="og:site_name" content="BaRoTi">
        <meta property="og:title" content="Bantal Aroma Terapi" />
        <meta property="og:description" content="{{ $about->deskripsi }}" />
        <meta property="og:image" itemprop="image" content="{{ asset('img_thumbnail/' . $profile->img_thumbnail) }}">
        <meta property="og:type" content="website" />
        <meta property="og:updated_time" content="{{ $profile->created_at }}" /> --}}
    @endif

    <!-- SITE TITLE -->
    <title>Ba Ro Ti</title>

    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('images/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('images/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('images/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('images/apple-touch-icon.png') }}" type="image/x-icon">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Lustria&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="{{ 'css/bootstrap.min.css' }}" rel="stylesheet">

    <!-- FONT ICONS -->
    {{-- <link href="https://use.fontawesome.com/releases/v5.11.0/css/all.css" rel="stylesheet" crossorigin="anonymous"> --}}
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">

    <!-- PLUGINS STYLESHEET -->
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link id="effect" href="{{ 'css/dropdown-effects/fade-down.css' }}" media="all" rel="stylesheet">
    <link href="{{ asset('css/tweenmax.css') }}" rel="stylesheet">
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" rel="stylesheet">

    <!-- TEMPLATE CSS -->
    <!-- <link href="css/gold-theme.css" rel="stylesheet"> -->
    <link href="{{ asset('css/pink-theme.css') }}" rel="stylesheet">
    <!-- <link href="css/rose-theme.css" rel="stylesheet"> -->
    <!-- <link href="css/silk-theme.css" rel="stylesheet"> -->

    <!-- RESPONSIVE CSS -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

</head>




<body>




    <!-- PRELOADER SPINNER
  ============================================= -->
    {{-- <div id="loader-wrapper">
        <div id="loading">
            <div class="cssload-loader">
                <div class="fancy-spinner">
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="dot"></div>
                </div>
            </div>
        </div>
    </div> --}}




    <!-- PAGE CONTENT
  ============================================= -->
    <div id="page" class="page">

        @if ($profile !== null)
            {{-- @section('logo')
                <div class="wsmobileheader clearfix">
                    <span class="smllogo"><img src="{{ asset('img_thumbnail/'.$profile->th) }}" width="170" height="50"
                            alt="mobile-logo" /></span>
                    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                </div>
            @endsection

            @section('logo2')
                <div class="desktoplogo"><a href="#hero-7" class="logo-black"><img
                            src="{{ asset('img_thumbnail/'.$profile->img_thumbnail) }}" width="170" height="50" alt="header-logo"></a>
                </div>
                <div class="desktoplogo"><a href="#hero-7" class="logo-white"><img
                            src="{{ asset('img_thumbnail/'.$profile->img_thumbnail) }}" width="170" height="50" alt="header-logo"></a>
                </div>
            @endsection --}}
        @else
            {{-- @section('logo')
                <div class="wsmobileheader clearfix">
                    <span class="smllogo"><img src="{{ asset('images/baroti_black.png') }}" width="170" height="50"
                            alt="mobile-logo" /></span>
                    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                </div>
            @endsection

            @section('logo2')
                <div class="desktoplogo"><a href="#hero-7" class="logo-black"><img
                            src="{{ asset('images/baroti_black.png') }}" width="170" height="50" alt="header-logo"></a>
                </div>
                <div class="desktoplogo"><a href="#hero-7" class="logo-white"><img
                            src="{{ asset('images/baroti_white.png') }}" width="170" height="50" alt="header-logo"></a>
                </div>
            @endsection --}}
        @endif


        @yield('menu')
        <!-- HEADER
   ============================================= -->
