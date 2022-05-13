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
    <!-- HEADER
                           ============================================= -->
    <header id="header" class="header white-menu navbar-dark">
        <div class="header-wrapper">


            {{-- @yield('logo')
            <div class="wsmobileheader clearfix">
                <span class="smllogo"><img src="{{ asset('images/baroti_black.png') }}" width="170" height="50"
                        alt="mobile-logo" /></span>
                <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
            </div> --}}
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


                    {{-- @yield('logo2')
                    <div class="desktoplogo"><a href="#hero-7" class="logo-black"><img
                                src="{{ asset('images/baroti_black.png') }}" width="170" height="50"
                                alt="header-logo"></a>
                    </div>
                    <div class="desktoplogo"><a href="#hero-7" class="logo-white"><img
                                src="{{ asset('images/baroti_black.png') }}" width="170" height="50"
                                alt="header-logo"></a>
                    </div> --}}
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

                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('fe.team') }}">Our Team</a>
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
    <section id="about-3" class="bg-color-01 wide-60 about-section " style="margin-top: 50px">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">
                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">Perkenalkan</h2>
                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">BaRoTi</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($about == null)
        <div class="container text-center">
            <h2>BELUM ADA DESKRIPSI</h2>
        </div>
    @else
        <section id="about-2" style="margin-top: -100px" class="bg-color-01 wide-70 about-section division">
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
                            <img class="img-fluid" src="{{asset('img_about/'.$about->img)}}" alt="about-image">
                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- End container -->
        </section> <!-- END ABOUT-2 -->
    @endif

    @if ($bidang !== null)
        <section id="about-3" class="bg-color-01 wide-60 about-section ">
            <div class="container">
                <!-- SECTION TITLE -->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title mb-60 text-center">
                            <!-- Transparent Header -->
                            <h2 class="tra-header txt-color-02">Bidang</h2>
                            <!-- Title 	-->
                            <h3 class="h3-xl txt-color-01">{{ $bidang->judul }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about-">
            <div class="container">

                <p>{!! $bidang->deskripsi !!}</p>

            </div>
        </section>
    @endif
@endsection
