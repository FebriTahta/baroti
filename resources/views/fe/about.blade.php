@extends('layouts.new_fe.master')

@section('menu')
    <!-- HEADER
               ============================================= -->
    <header id="header" class="header white-menu navbar-dark">
        <div class="header-wrapper">


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

    <section id="about-2" style="margin-top: -100px" class="bg-color-01 wide-70 about-section division">
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

    <section id="about-3" class="bg-color-01 wide-60 about-section " style="margin-top: -120px">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">
                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">Bidang</h2>
                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">Jasa & Produk Kesehatan</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-">
        <div class="container">
            <p>
                Tercetusnya ide pembuatan bantal aromaterapi karena beberapa orang mengeluh insomnia
                berkepanjangan sehingga mengalami gelisah dan menyebabkan jam tidur mereka kurang dari
                seharusnya, membuat aktivitas pada siang hari terganggu.
            </p>

            <p>
                Maka dari itu pembuatan bantal aromaterapi menjadi solusi untuk orang-orang dengan gangguan
                tidur, terlebih bantal yang diberi aromaterapi kayu manis dengan manfaat untuk kekebalan tubuh,
                membantu kerja otak untuk mengurangi jumlah racun yang terdapat pada neural cell, mencegah
                pertumbuhan sel kanker.
            </p>

            <p>
                Sedangkan penggunaan lavender dipercaya dapat menenangkan dan membuat tidur lebih
                nyenyak/meringankan insomnia, meredakan gangguan pernapasan, meningkatkan kekebalan tubuh,
                meringankan sakit kepala, dll.
            </p>

            <p>
                Penggunaan sabut kelapa sebagai bahan utama adalah karena melihat banyaknya limbah sabut kelapa
                yang tidak dimanfaatkan dengan baik, kebanyakan sabut kelapa yang belum terolah dibakar sehingga
                menyebabkan polusi udara bagi lingkungan sekitar, penggunaan sabut kelapa agar sirkulasi udara
                lebih tinggi dan kelembaban lebih rendah daripada penggunaan kapuk/kapas, mengusir
                mikroorganisme/kutu.
            </p>
        </div>
    </section>

    <!-- TEAM-1
    ============================================= -->
    <section id="team-1" class="bg-color-01 wide-60 team-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">

                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">Our Team</h2>

                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">Relax, You're In Good Hands</h3>

                        <!-- Text -->
                        <p class="p-lg txt-color-05">Aliquam a augue suscipit, luctus neque purus ipsum neque undo
                            dolor
                            primis libero tempus, blandit a cursus varius at magna tempor
                        </p>

                    </div>
                </div>
            </div>


            <!-- TEAM MEMBERS WRAPPER -->
            <div class="tm-wrapper">
                <div class="row">


                    <!-- TEAM MEMBER #1 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="team-member">

                            <!-- Team Member Photo -->
                            <div class="team-member-photo">
                                <div class="hover-overlay">

                                    <img class="img-fluid" src="images/team-1.jpg" alt="team-member-foto">

                                    <!-- Social Icons -->
                                    <div class="tm-social clearfix">
                                        <ul class="text-center clearfix">
                                            <li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <!-- Team Member Meta -->
                            <div class="tm-meta">
                                <h6 class="h6-lg txt-color-01">Nikita Tiara, AMd.Keb</h6>
                                <span class="txt-color-06">Krtua Group</span>
                            </div>

                        </div>
                    </div>


                    <!-- TEAM MEMBER #2 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="team-member">

                            <!-- Team Member Photo -->
                            <div class="team-member-photo">
                                <div class="hover-overlay">

                                    <img class="img-fluid" src="images/team-2.jpg" alt="team-member-foto">

                                    <!-- Social Icons -->
                                    <div class="tm-social clearfix">
                                        <ul class="text-center clearfix">
                                            <li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="ico-instagram"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <!-- Team Member Meta -->
                            <div class="tm-meta">
                                <h6 class="h6-lg txt-color-01">Jennifer Harper</h6>
                                <span class="txt-color-06">SPA Master</span>
                            </div>

                        </div>
                    </div>


                    <!-- TEAM MEMBER #3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="team-member">

                            <!-- Team Member Photo -->
                            <div class="team-member-photo">
                                <div class="hover-overlay">

                                    <img class="img-fluid" src="images/team-3.jpg" alt="team-member-foto">

                                    <!-- Social Icons -->
                                    <div class="tm-social clearfix">
                                        <ul class="text-center clearfix">
                                            <li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <!-- Team Member Meta -->
                            <div class="tm-meta">
                                <h6 class="h6-lg txt-color-01">Rodney Stratton</h6>
                                <span class="txt-color-06">Beautician</span>
                            </div>

                        </div>
                    </div>


                    <!-- TEAM MEMBER #4 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="team-member">

                            <!-- Team Member Photo -->
                            <div class="team-member-photo">
                                <div class="hover-overlay">

                                    <img class="img-fluid" src="images/team-4.jpg" alt="team-member-foto">

                                    <!-- Social Icons -->
                                    <div class="tm-social clearfix">
                                        <ul class="text-center clearfix">
                                            <li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="ico-instagram"><i class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>

                            <!-- Team Member Meta -->
                            <div class="tm-meta">
                                <h6 class="h6-lg txt-color-01">Jane Smith</h6>
                                <span class="txt-color-06">Beauty Therapist</span>
                            </div>

                        </div>
                    </div>


                </div> <!-- End row -->
            </div> <!-- END TEAM MEMBERS WRAPPER -->
        </div> <!-- End container -->
    </section> <!-- END TEAM-1 -->
@endsection
