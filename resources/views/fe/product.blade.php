@extends('layouts.new_fe.master')

@section('menu')
    <!-- HEADER
               ============================================= -->
    <header id="header" class="header white-menu navbar-dark">
        <div class="header-wrapper">


            <!-- MOBILE HEADER -->
            @yield('logo')
            <div class="wsmobileheader clearfix">
                <span class="smllogo"><img src="{{ asset('images/baroti_black.png') }}" width="170" height="50"
                        alt="mobile-logo" /></span>
                <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
            </div>

            <!-- NAVIGATION MENU -->
            <div class="wsmainfull menu clearfix">
                <div class="wsmainwp clearfix">


                    @yield('logo2')
                    <div class="desktoplogo"><a href="#hero-7" class="logo-black"><img
                                src="{{ asset('images/baroti_black.png') }}" width="170" height="50"
                                alt="header-logo"></a>
                    </div>
                    <div class="desktoplogo"><a href="#hero-7" class="logo-white"><img
                                src="{{ asset('images/baroti_black.png') }}" width="170" height="50"
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
                            <li class="nl-simple" aria-haspopup="true"><a href="{{ route('fe.contact') }}">Contacts</a>
                            </li>

                        </ul>
                    </nav> <!-- END MAIN MENU -->

                </div>
            </div> <!-- END NAVIGATION MENU -->


        </div> <!-- End header-wrapper -->
    </header> <!-- END HEADER -->
@endsection

@section('newfe_content')
    <section id="services-18" class="bg-color-01 wide-60 services-section division" style="margin-top: 100px">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">

                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">Product</h2>

                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">Our Product</h3>

                    </div>
                </div>
            </div>


            <!-- SERVICES-18 WRAPPER -->
            <div class="sbox-18-wrapper">
                <div class="row">


                    <!-- SERVICE BOX #1 -->
                    <div class="col-md-6 col-lg-12">
                        <div class="sbox-18 bg-white text-center">

                            <!-- Image -->
                            <div class="sbox-10-img">
                                <div class="hover-overlay">
                                    <img class="img-fluid" src="images/serv-13.jpg" alt="service-image" />
                                </div>
                            </div>

                            <!-- Text -->
                            <div class="sbox-18-txt">

                                <!-- Title -->
                                <h5 class="h5-sm txt-color-01">Lavender</h5>

                                <!-- Text -->
                                <p class="p-md txt-color-05">New</p>

                                <!-- Rating -->
                                <div class="txt-block-rating">
                                    <div class="stars-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="txt-color-01">$86.00</span>
                                    </div>
                                </div>

                                <!-- Button -->
                                <a href="#" class="btn p-sm btn-tra-01 color-02-hover mt-20">BELI SEKARANG</a>

                            </div>

                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- END SERVICES-18 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END SERVICES-18 -->
@endsection
