@extends('layouts.new_fe.master')

{{-- @section('logo')
    @if ($profile !== null)
        <div class="wsmobileheader clearfix">
            <span class="smllogo"><img src="{{ asset('img_profile/' . $profile->image_header) }}" width="170"
                    height="50" alt="mobile-logo" /></span>
            <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
        </div>
    @endif
@endsection

@section('logo2')
    <div class="desktoplogo"><a href="#hero-7" class="logo-black"><img
                src="{{ asset('img_profile/' . $profile->image_header) }}" width="170" height="50" alt="header-logo"></a>
    </div>
    <div class="desktoplogo"><a href="#hero-7" class="logo-white"><img
                src="{{ asset('img_profile/' . $profile->image_header) }}" width="170" height="50" alt="header-logo"></a>
    </div>
@endsection --}}


@section('menu')
    <header id="header" class="header tra-menu navbar-light">
        <div class="header-wrapper">


            <!-- MOBILE HEADER -->


            {{-- @yield('logo') --}}
            @if ($profile !== null)
                <div class="wsmobileheader clearfix">
                    <span class="smllogo"><img src="{{ asset('img_profile/' . $profile->image_header) }}"
                            width="170" height="50" alt="mobile-logo" /></span>
                    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                </div>
            @endif



            <!-- NAVIGATION MENU -->
            <div class="wsmainfull menu clearfix">
                <div class="wsmainwp clearfix">


                    <!-- LOGO IMAGE -->
                    <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 340 x 100 pixels) -->

                    {{-- @yield('logo2') --}}
                    <div class="desktoplogo"><a href="#hero-7" class="logo-black"><img
                                src="{{ asset('img_profile/' . $profile->image_header) }}" width="170" height="50"
                                alt="header-logo"></a>
                    </div>
                    <div class="desktoplogo"><a href="#hero-7" class="logo-white"><img
                                src="{{ asset('img_profile/' . $profile->image_header) }}" width="170" height="50"
                                alt="header-logo"></a>
                    </div>

                    <!-- MAIN MENU -->
                    <nav class="wsmenu clearfix">
                        <ul class="wsmenu-list">


                            <!-- DROPDOWN MENU -->
                            <li aria-haspopup="true"><a href="/">Home</a>
                            </li> <!-- END DROPDOWN MENU -->


                            <!-- SIMPLE NAVIGATION LINK -->
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('fe.about') }}">About Us</a>
                            </li>


                            <!-- MEGAMENU -->
                            <li aria-haspopup="true"><a href="{{ route('fe.product') }}">Product</a>
                            </li> <!-- END MEGAMENU -->

                            

                            {{-- <!-- DROPDOWN MENU -->
                        <li><a href="#">Gallery</a>
                        </li> <!-- END DROPDOWN MENU --> --}}


                            <!-- SIMPLE NAVIGATION LINK -->
                            <li class="nl-simple" aria-haspopup="true"><a
                                    href="{{ route('fe.contact') }}">Contacts</a>
                            </li>

                            <!-- MEGAMENU -->
                            <li aria-haspopup="true"><a href="{{ route('fe.blog') }}">Blog</a>
                            </li> <!-- END MEGAMENU -->

                            @auth
                                <li class="nl-simple" aria-haspopup="true">
                                    <a class="" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="nl-simple" aria-haspopup="true"><a href="{{ route('login') }}">Login</a>
                                </li>
                            @endauth

                        </ul>
                    </nav> <!-- END MAIN MENU -->

                </div>
            </div> <!-- END NAVIGATION MENU -->


        </div> <!-- End header-wrapper -->
    </header> <!-- END HEADER -->
@endsection

@section('newfe_content')
    <div id="loader-wrapper">
        <div id="loading">
            <div class="cssload-loader">
                <div class="fancy-spinner">
                    <div class="ring"></div>
                    <div class="ring"></div>
                    <div class="dot"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- HERO-7
                                       ============================================= -->
    <section id="hero-7" class="hero-section division">


        <!-- SLIDER -->
        <div class="slider">
            <ul class="slides">
                @if ($slider->count() > 0)
                    @foreach ($slider as $item)
                        <li id="slide-1">

                            <!-- Background Image -->
                            <img src="{{ asset('img_slider/' . $item->img_slider) }}" alt="slide-background">

                            <!-- Image Caption -->
                            <div class="caption d-flex align-items-center center-align">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="caption-txt white-color">

                                                <!-- Title -->
                                                <h3 class="h3-md">{{ $item->judul }}</h3>
                                                <h2>{{ $item->deskripsi }}</h2>

                                                @if ($item->linkbutton->count() > 0)
                                                    @foreach ($item->linkbutton as $bt)
                                                        <!-- Button -->
                                                        <a href="{{ $bt->link }}" target="_blank" style="margin: 10px"
                                                            class="btn btn-md btn-color-02 tra-white-hover">{{ $bt->name }}</a>
                                                    @endforeach
                                                @endif


                                            </div>
                                        </div>
                                    </div> <!-- End row -->
                                </div> <!-- End container -->
                            </div> <!-- End Image Caption -->

                        </li> <!-- END SLIDE #1 -->
                    @endforeach
                @else
                    <li id="slide-1">

                        <!-- Background Image -->
                        <img src="images/slider/slide-11.jpg" alt="slide-background">

                        <!-- Image Caption -->
                        <div class="caption d-flex align-items-center center-align">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="caption-txt white-color">

                                            <!-- Title -->
                                            <h3 class="h3-md">Welcome to BaRoTi</h3>
                                            <h2>Bantal Aroma Terapi</h2>

                                            <!-- Button -->
                                            <a href="booking.html" class="btn btn-md btn-color-02 tra-white-hover">Purchase
                                                Now</a>

                                        </div>
                                    </div>
                                </div> <!-- End row -->
                            </div> <!-- End container -->
                        </div> <!-- End Image Caption -->

                    </li> <!-- END SLIDE #1 -->
                @endif

            </ul>
        </div> <!-- END SLIDER -->


    </section> <!-- END HERO-7 -->




    <!-- ABOUT-2
                                    ============================================= -->

    @if ($about == null)
        {{-- <section id="about-2" class="bg-color-01 wide-70 about-section division">
            <div class="container">
                <div class="row d-flex align-items-center m-row">


                    <!-- TEXT BLOCK -->
                    <div class="col-md-7 col-lg-6 m-bottom">
                        <div class="txt-block left-column pc-15 mb-40">

                            <!-- Section ID -->
                            <h2 class="section-id txt-color-02">About Us</h2>

                            <!-- Title -->
                            <h3 class="h3-md txt-color-01">Apa Itu BaRoTi</h3>

                            <!-- Text -->
                            <p class="txt-color-05">BaRoTi adalah Bantal Aroma Terapy yang menggunakan bahan-bahan
                                alami sebagai base pembuatannya. Sabut kelapa yang dipakai di proses sedemikian rupa
                                agar nyaman untuk di pakai serta memiliki aroma yang menenangkan.
                            </p>

                        </div>
                    </div> <!-- END TEXT BLOCK -->


                    <!-- IMAGE BLOCK -->
                    <div class="col-md-5 col-lg-6 m-top">
                        <div class="img-block right-column pc-15 mb-40">
                            <img class="img-fluid" src="images/image-02.png" alt="about-image">
                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- END ABOUT-2 --> --}}
    @else
        <section id="about-2" class="bg-color-01 wide-70 about-section division">
            <div class="container">
                <div class="row d-flex align-items-center m-row">


                    <!-- TEXT BLOCK -->
                    <div class="col-md-7 col-lg-6 m-bottom">
                        <div class="txt-block left-column pc-15 mb-40">

                            <!-- Section ID -->
                            <h2 class="section-id txt-color-02">About Us</h2>

                            <!-- Title -->
                            <h3 class="h3-md txt-color-01">{{ $about->judul }}</h3>

                            <!-- Text -->
                            <p class="txt-color-05">{{ $about->deskirpsi }}
                            </p>

                        </div>
                    </div> <!-- END TEXT BLOCK -->


                    <!-- IMAGE BLOCK -->
                    <div class="col-md-5 col-lg-6 m-top">
                        <div class="img-block right-column pc-15 mb-40">
                            <img class="img-fluid" src="{{ asset('img_about/' . $about->img) }}" alt="about-image">
                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- END ABOUT-2 -->
    @endif





    <!-- SERVICES-13
                                    ============================================= -->
    @if ($keunggulan !== null)
        <section id="services-13" class="bg-color-01 services-section division">
            <div class="container">


                <!-- SECTION TITLE -->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title mb-60 text-center">

                            <!-- Transparent Header -->
                            <h2 class="tra-header txt-color-02">Keunggulan</h2>

                            <!-- Title 	-->
                            <h3 class="h3-xl txt-color-01">Kenapa harus BaRoTi</h3>

                            <!-- Text -->
                            {{-- <p class="p-lg txt-color-05">Aliquam a augue suscipit, luctus neque purus ipsum neque undo
                                            dolor
                                            primis libero tempus, blandit a cursus varius at magna tempor
                                        </p> --}}

                        </div>
                    </div>
                </div>


                <!-- SERVICES-13 WRAPPER -->
                <div class="sbox-13-wrapper">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div id="s13-3" class="sbox-13 bg-fixed bg-color-02">
                                <div class="sbox-13-txt">

                                    <!-- Title -->
                                    <h5 class="h5-xl txt-color-01">{{$keunggulan->judul}}</h5>

                                    <!-- Text -->
                                    <p class="txt-color-05">{!!$keunggulan->deskripsi!!}
                                    </p>

                                    <!-- Button -->
                                    {{-- <a href="#" class="btn btn-color-02 tra-02-hover">Purchase Now</a> --}}

                                </div>
                            </div>
                        </div> <!-- END SERVICE BOX #3 -->
                        <div class="col-md-1"></div>

                    </div> <!-- End row -->
                </div> <!-- END SERVICES-13 WRAPPER -->


            </div> <!-- End container -->
        </section> <!-- END SERVICES-13 -->
    @endif




    <!-- SERVICES-1
                                    ============================================= -->
    @if ($bahan->count() > 0)
        <section id="services-1" class="bg-color-01 wide-60 services-section division">
            <div class="container">


                <!-- SECTION TITLE -->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title mb-60 text-center">

                            <!-- Transparent Header -->
                            <h2 class="tra-header txt-color-02">Bahan Dasar</h2>

                            <!-- Title 	-->
                            <h3 class="h3-xl txt-color-01">Aroma Terapi</h3>

                            <!-- Text -->
                            {{-- <p class="p-lg txt-color-05">Aliquam a augue suscipit, luctus neque purus ipsum neque undo
                                        dolor
                                        primis libero tempus, blandit a cursus varius at magna tempor
                                    </p> --}}

                        </div>
                    </div>
                </div>


                <!-- SERVICES-1 WRAPPER -->
                <div class="sbox-1-wrapper">
                    <div class="row">

                        @foreach ($bahan as $item)
                            <!-- SERVICE BOX #1 -->
                            <div class="col-md-4">
                                <div class="sbox-1">

                                    <!-- Image -->
                                    <img class="img-fluid" src="{{asset('img_bahan/'.$item->img)}}" alt="service-image" />

                                    <!-- Title -->
                                    <h5 class="h5-md txt-color-01">{{ $item->name }}</h5>

                                    <!-- Text -->
                                    <p class="txt-color-05">{{ $item->deskripsi }}
                                    </p>

                                </div>
                            </div>
                        @endforeach

                    </div> <!-- End row -->
                </div> <!-- END SERVICES-1 WRAPPER -->


            </div> <!-- End container -->
        </section> <!-- END SERVICES-1 -->
    @endif




    <!-- BANNER-5
                                    ============================================= -->
    @if ($ajakan !== null)
        <section id="banner-5" class="bg-fixed bg-image banner-section division">
            <div class="container">
                <div class="row d-flex align-items-center">


                    <!-- TEXT BLOCK -->
                    <div class="col-lg-6 offset-lg-3">
                        <div class="banner-5-txt text-center">

                            <!-- Title -->
                            <h2 class="h2-xl txt-color-05">{{ $ajakan->judul }}</h2>
                            <h3 class="h3-xs txt-color-01">{{ $ajakan->heading }}</h3>

                            <!-- Text -->
                            <p class="p-md txt-color-05">
                                {{ $ajakan->deskripsi }}
                            </p>

                            {{-- @if ($ajakan->linkbutton->count() > 0) --}}
                            @foreach ($ajakan->linkbutton as $item)
                                <a href="{{ $item->link }}" target="_blank"
                                    class="btn btn-md btn-color-02 color-01-hover">{{ $item->name }}</a>
                            @endforeach
                            {{-- @foreach ($ajakan->linkbutton as $item)
                                {{$item}}
                            @endforeach --}}
                            {{-- @endif --}}

                        </div>
                    </div> <!-- END TEXT BLOCK -->

                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- END BANNER-5 -->
    @endif





    <!-- TESTIMONIALS-1
                                    ============================================= -->
    <section id="reviews-1" class="bg-color-02 wide-100 reviews-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">

                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">Testimonials</h2>

                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">What Our Clients Say</h3>

                        <!-- Text -->
                        {{-- <p class="p-lg txt-color-05">Aliquam a augue suscipit, luctus neque purus ipsum neque undo
                        dolor
                        primis libero tempus, blandit a cursus varius at magna tempor
                    </p> --}}

                    </div>
                </div>
            </div>

            @if ($testi->count() < 3)
                {{-- <div class="col-md-12" style="text-align: center">
                <h5 style="color: red"> (minimal 3)</h5>
            </div> --}}
            @endif
            <!-- TESTIMONIALS CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme reviews-wrapper">
                        @foreach ($testi as $item)
                            <div class="review-1">

                                <!-- Testimonial Author Avatar -->
                                <div class="testimonial-avatar">
                                    <img src="{{ asset('img_testi/' . $item->img) }}" alt="testimonial-avatar">
                                </div>

                                <!-- Testimonial Author -->
                                <div class="author-data txt-color-01">
                                    <h6 class="h6-sm">{{ $item->name }}</h6>
                                    {{-- <p>Designer</p> --}}
                                </div>

                                <!-- Testimonial Text -->
                                <div class="review-1-txt txt-color-05">
                                    <p>{{ $item->deskripsi }}
                                    </p>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- END TESTIMONIALS CONTENT -->


        </div> <!-- End container -->
    </section> <!-- END TESTIMONIALS-1 -->
@endsection
