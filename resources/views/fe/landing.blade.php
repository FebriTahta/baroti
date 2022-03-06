@extends('layouts.new_fe.master')

@section('menu')
    <header id="header" class="header tra-menu navbar-light">
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


                    <!-- LOGO IMAGE -->
                    <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 340 x 100 pixels) -->

                    @yield('logo2')
                    <div class="desktoplogo"><a href="#hero-7" class="logo-black"><img
                                src="{{ asset('images/baroti_black.png') }}" width="170" height="50" alt="header-logo"></a>
                    </div>
                    <div class="desktoplogo"><a href="#hero-7" class="logo-white"><img
                                src="{{ asset('images/baroti_black.png') }}" width="170" height="50" alt="header-logo"></a>
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
    <!-- HERO-7
       ============================================= -->
    <section id="hero-7" class="hero-section division">


        <!-- SLIDER -->
        <div class="slider">
            <ul class="slides">


                <!-- SLIDE #1 -->
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

            </ul>
        </div> <!-- END SLIDER -->


    </section> <!-- END HERO-7 -->




    <!-- ABOUT-2
    ============================================= -->
    <section id="about-2" class="bg-color-01 wide-70 about-section division">
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
    </section> <!-- END ABOUT-2 -->




    <!-- SERVICES-13
    ============================================= -->
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
                                <h5 class="h5-xl txt-color-01">Karena</h5>

                                <!-- Text -->
                                <p class="txt-color-05">Bantal ini menggunakan Lavender Essential Oil yang sudah
                                    dibuktikan keampuhannya sebagai salah satu penenang bagi orang insomnia. Aroma
                                    Lavender sudah teruji secara ilmiah dapat menurunkan tingkat stress seseorang.
                                    Bantal ini sangat cocok
                                </p>

                                <!-- Button -->
                                <a href="#" class="btn btn-color-02 tra-02-hover">Purchase Now</a>

                            </div>
                        </div>
                    </div> <!-- END SERVICE BOX #3 -->
                    <div class="col-md-1"></div>

                </div> <!-- End row -->
            </div> <!-- END SERVICES-13 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END SERVICES-13 -->




    <!-- SERVICES-1
    ============================================= -->
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


                    <!-- SERVICE BOX #1 -->
                    <div class="col-md-4">
                        <div class="sbox-1">

                            <!-- Image -->
                            <img class="img-fluid" src="images/serv-01.png" alt="service-image" />

                            <!-- Title -->
                            <h5 class="h5-md txt-color-01">Lavender Essential Oil</h5>

                            <!-- Text -->
                            <p class="txt-color-05">Bunga Lavender yang telah di ekstrak secara alami menjadi essential
                                oil
                            </p>

                        </div>
                    </div>


                    <!-- SERVICE BOX #2 -->
                    <div class="col-md-4">
                        <div class="sbox-1">

                            <!-- Image -->
                            <img class="img-fluid" src="images/serv-02.png" alt="service-image" />

                            <!-- Title -->
                            <h5 class="h5-md txt-color-01">Kayu Manis</h5>

                            <!-- Text -->
                            <p class="txt-color-05">Ekstrak bubuk kayu manis
                            </p>

                        </div>
                    </div>


                    <!-- SERVICE BOX #3 -->
                    <div class="col-md-4">
                        <div class="sbox-1">

                            <!-- Image -->
                            <img class="img-fluid" src="images/serv-03.png" alt="service-image" />

                            <!-- Title -->
                            <h5 class="h5-md txt-color-01">Serabut Kelapa</h5>

                            <!-- Text -->
                            <p class="txt-color-05">Kelapa pilihan yang diambil bagian serabut dan telah melalui proses
                                double drying
                            </p>

                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- END SERVICES-1 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END SERVICES-1 -->




    <!-- BANNER-5
    ============================================= -->
    <section id="banner-5" class="bg-fixed bg-image banner-section division">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- TEXT BLOCK -->
                <div class="col-lg-6 offset-lg-3">
                    <div class="banner-5-txt text-center">

                        <!-- Title -->
                        <h2 class="h2-xl txt-color-05">Dapatkan</h2>
                        <h3 class="h3-xs txt-color-01">Bantal Aromaterapi Mu Segera!</h3>

                        <!-- Text -->
                        <p class="p-md txt-color-05">
                            Perbaiki Kualitas Tidur untuk Menuju Sehat
                        </p>

                        <!-- Button -->
                        <a href="booking.html" class="btn btn-md btn-color-02 color-01-hover">Tokopedia</a>
                        <a href="booking.html" class="btn btn-md btn-color-02 color-01-hover">Shopee</a>

                    </div>
                </div> <!-- END TEXT BLOCK -->

            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END BANNER-5 -->




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


            <!-- TESTIMONIALS CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme reviews-wrapper">


                        <!-- TESTIMONIAL #1 -->
                        <div class="review-1">

                            <!-- Testimonial Author Avatar -->
                            <div class="testimonial-avatar">
                                <img src="images/review-author-1.jpg" alt="testimonial-avatar">
                            </div>

                            <!-- Testimonial Author -->
                            <div class="author-data txt-color-01">
                                <h6 class="h6-sm">Kelly Walke</h6>
                                <p>Housewife</p>
                            </div>

                            <!-- Testimonial Text -->
                            <div class="review-1-txt txt-color-05">
                                <p>Sagittis congue etiam sapien sem accumsan suscipit egestas lobortis magna,
                                    porttitor
                                    sodales vitae aenean mauris tempor risus lectus
                                </p>
                            </div>

                        </div>


                        <!-- TESTIMONIAL #2 -->
                        <div class="review-1">

                            <!-- Testimonial Author Avatar -->
                            <div class="testimonial-avatar">
                                <img src="images/review-author-2.jpg" alt="testimonial-avatar">
                            </div>

                            <!-- Testimonial Author -->
                            <div class="author-data txt-color-01">
                                <h6 class="h6-sm">Linda Ferell</h6>
                                <p>Designer</p>
                            </div>

                            <!-- Testimonial Text -->
                            <div class="review-1-txt txt-color-05">
                                <p>Sapien sem accumsan vitae purus diam integer congue magna undo. Magna, sodales
                                    vitae
                                    aenean mauris tempor risus lectus aenean magna ipsum vitae purus vitae
                                </p>
                            </div>

                        </div>


                        <!-- TESTIMONIAL #3 -->
                        <div class="review-1">

                            <!-- Testimonial Author Avatar -->
                            <div class="testimonial-avatar">
                                <img src="images/review-author-3.jpg" alt="testimonial-avatar">
                            </div>

                            <!-- Testimonial Author -->
                            <div class="author-data txt-color-01">
                                <h6 class="h6-sm">Evelyn Martinez</h6>
                                <p>Journalist</p>
                            </div>

                            <!-- Testimonial Text -->
                            <div class="review-1-txt txt-color-05">
                                <p>Etiam sapien sem accumsan sagittis congue. Suscipit egestas at lobortis magna,
                                    porttitor
                                    sodales vitae aenean mauris tempor risus lectus aenean diam aenean mauris
                                </p>
                            </div>

                        </div>


                        <!-- TESTIMONIAL #4 -->
                        <div class="review-1">

                            <!-- Testimonial Author Avatar -->
                            <div class="testimonial-avatar">
                                <img src="images/review-author-4.jpg" alt="testimonial-avatar">
                            </div>

                            <!-- Testimonial Author -->
                            <div class="author-data txt-color-01">
                                <h6 class="h6-sm">Laura Merino</h6>
                                <p>Fashion Designer</p>
                            </div>

                            <!-- Testimonial Text -->
                            <div class="review-1-txt txt-color-05">
                                <p>Egestas egestas magna ipsum vitae purus efficitur ipsum primis in cubilia laoreet
                                    augue
                                    congue. An egestas lobortis magna, sodales vitae
                                </p>
                            </div>

                        </div>


                        <!-- TESTIMONIAL #5 -->
                        <div class="review-1">

                            <!-- Testimonial Author Avatar -->
                            <div class="testimonial-avatar">
                                <img src="images/review-author-5.jpg" alt="testimonial-avatar">
                            </div>

                            <!-- Testimonial Author -->
                            <div class="author-data txt-color-01">
                                <h6 class="h6-sm">Elizabeth Ross</h6>
                                <p>Biologist</p>
                            </div>

                            <!-- Testimonial Text -->
                            <div class="review-1-txt txt-color-05">
                                <p>An orci nullam tempor sapien, eget orci gravida donec enim ipsum porta justo
                                    integer and
                                    odio velna auctor. Egestas magna ipsum vitae purus ipsum primis in laoreet augue
                                </p>
                            </div>

                        </div>


                        <!-- TESTIMONIAL #6 -->
                        <div class="review-1">

                            <!-- Testimonial Author Avatar -->
                            <div class="testimonial-avatar">
                                <img src="images/review-author-6.jpg" alt="testimonial-avatar">
                            </div>

                            <!-- Testimonial Author -->
                            <div class="author-data txt-color-01">
                                <h6 class="h6-sm">Carmen M. Garcia</h6>
                                <p>Graphic Designer</p>
                            </div>

                            <!-- Testimonial Text -->
                            <div class="review-1-txt txt-color-05">
                                <p>Mauris donec ociis et magnis sapien an etiam sapien sem sagittis congue augue. An
                                    orci nullam
                                    tempor sapien, eget orci gravida donec porta
                                </p>
                            </div>

                        </div>


                        <!-- TESTIMONIAL #7 -->
                        <div class="review-1">

                            <!-- Testimonial Author Avatar -->
                            <div class="testimonial-avatar">
                                <img src="images/review-author-7.jpg" alt="testimonial-avatar">
                            </div>

                            <!-- Testimonial Author -->
                            <div class="author-data txt-color-01">
                                <h6 class="h6-sm">Penelopa M.</h6>
                                <p>Manager</p>
                            </div>

                            <!-- Testimonial Text -->
                            <div class="review-1-txt txt-color-05">
                                <p>At sagittis congue augue egestas egestas magna ipsum vitae purus ipsum primis in
                                    cubilia
                                    laoreet augue diam ociis nullam tempor
                                </p>
                            </div>

                        </div>


                    </div>
                </div>
            </div> <!-- END TESTIMONIALS CONTENT -->


        </div> <!-- End container -->
    </section> <!-- END TESTIMONIALS-1 -->
@endsection
