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
    <section id="contacts-3" class="bg-color-01 wide-60 contacts-section division" style="margin-top: 100px">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">

                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">Contact Us</h2>

                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">Have Any Questions?</h3>

                        {{-- <!-- Text -->	
                    <p class="p-lg txt-color-05">Aliquam a augue suscipit, luctus neque purus ipsum neque undo dolor 
                       primis libero tempus, blandit a cursus varius at magna tempor
                    </p> --}}

                    </div>
                </div>
            </div>

            <!-- GOOGLE MAP -->
            <div class="row">
                <div class="col-md-12">
                    <div class="google-map mb-80" style="max-width: 100%">

                        <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
                        {{-- <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8393924898796!2d144.9536363151022!3d-37.817230742014345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d4e793770d3%3A0x9e44d6ad0d76ba7c!2zMTIxIEtpbmcgU3QsIE1lbGJvdXJuZSBWSUMgMzAwMCwg0JDQstGB0YLRgNCw0LvQuNGP!5e0!3m2!1sru!2sua!4v1469002590349"
                            width="600" height="450"></iframe> --}}
                        {{-- <iframe src="{{$data->map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}
                        {{-- {!! $contact->map !!} --}}
                        <iframe src="{{$contact->map}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div> <!-- END GOOGLE MAP -->


            <div class="row">

                <div class="col-md-12">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>
                <!-- CONTACT FORM -->
                <div class="col-md-7 col-lg-8">

                    <!-- Title -->
                    <h4 class="h4-xs txt-color-01">Tinggalkan Pesan</h4>

                    <!-- Text -->
                    <p class="txt-color-05">Anda dapat meninggalkan pesan kepada kami jika ada hal yang ingin ditanyakan
                    </p>

                    <!-- Form -->
                    <div class="form-holder">
                        <form action="/submit-pesan" method="POST" class="row">@csrf

                            <!-- Form Input -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control name" placeholder="Your Name*">
                                </div>
                            </div>

                            <!-- Form Input -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control email" placeholder="Email Address*"
                                        required>
                                </div>
                            </div>

                            <!-- Form Input -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="number" name="telp" class="form-control" placeholder="08xxxxxxxxxx"
                                        required>
                                </div>
                            </div>

                            <!-- Form Textarea -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea name="pesantext" class="form-control message" rows="6" placeholder="Your Message ..." required></textarea>
                                </div>
                            </div>

                            <!-- Form Button -->
                            <div class="col-md-12 mt-5 text-right">
                                {{-- <button type="submit" class="btn btn-md btn-color-02 tra-02-hover submit">Send
                                    Message</button> --}}
                                <input type="submit" value="SUBMIT MESSAGE" class="btn btn-md btn-color-02 tra-02-hover">
                            </div>
                        </form>

                    </div>
                </div> <!-- END CONTACT FORM -->


                <!-- CONTACTS INFO -->
                <div class="col-md-5 col-lg-4">
                    <div class="contacts-info mb-40">

                        <!-- Title -->
                        <h4 class="h4-xs txt-color-01">Contact Details</h4>

                        <div class="cbox-1 mt-25 mb-25">
                            <h5 class="h5-xs txt-color-01">Our Location</h5>
                            <p class="txt-color-05">{!! $contact->alamat !!}</p>
                        </div>

                        <!-- PHONES -->
                        <div class="cbox-1 mb-25">
                            <h5 class="h5-xs txt-color-01">Contact Info</h5>
                            <p class="txt-color-05"><span>Phone :</span> {{ $contact->telp }}</p>
                            <p class="txt-color-05"><span>Email :</span> <a
                                    href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                <- Click </p>

                        </div>
                        <div class="cbox-1">
                            <h5 class="h5-xs txt-color-01">Hari Operasional</h5>
                            <p class="txt-color-05"><span></span> {{ $contact->haribuka }}</p>
                        </div>
                        <!-- WORKING HOURS -->
                        <div class="cbox-1">
                            <h5 class="h5-xs txt-color-01">Jam Operasional</h5>
                            <p class="txt-color-05"><span></span> {{ $contact->jambuka . ' - ' . $contact->jamtutup }}
                            </p>
                        </div>

                    </div>
                </div> <!-- END CONTACTS INFO -->


            </div> <!-- End row -->


        </div> <!-- End container -->
    </section> <!-- END CONTACTS-3 -->
@endsection
