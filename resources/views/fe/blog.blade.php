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


            <!-- MOBILE HEADER -->
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
    <section id="services-18" class="bg-color-01 wide-60 services-section division" style="margin-top: 100px">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">

                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">BLOG</h2>

                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">Our Blog</h3>

                    </div>
                </div>
            </div>


            <!-- SERVICES-18 WRAPPER -->
            <section id="blog-1" class="bg-color-01 wide-60 blog-section division">				
                <div class="container">


                    <!-- BLOG POSTS HOLDER -->
                     <div class="row">

                        @if ($blog->count() == 0)
                            <div class="col-md-12">
                                <div class="blog-post text-center text-danger">
                                    <h2>BELUM ADA POST</h2>
                                </div>
                            </div>
                        @endif
                        @foreach ($blog as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="blog-post">

                                <!-- BLOG POST IMAGE -->
                                <div class="blog-post-img">
                                   <img class="img-fluid" src="{{asset('img_blog/'.$item->img_thumbnail)}}" alt="blog-post-image" />	
                               </div>

                                <!-- BLOG POST TITLE -->
                               <div class="blog-post-txt">
                                   <!-- Post Data -->
                                   <span class="txt-color-06">{{$item->jenis->name}}</span>
                                   <!-- Post Title -->
                                   <h5 class="h5-sm txt-color-01">
                                       <a href="/blog/{{$item->slug}}">{{$item->judul}}</a>
                                   </h5>
                                   <!-- Post Text -->
                                   <p class="txt-color-05">
                                       <?php $panjang = strlen($item->deskripsi)?>
                                        @if ($panjang > 280)
                                            {{substr(strip_tags($item->deskripsi),0,280)}} ... 
                                        @else
                                            {{strip_tags($item->deskripsi)}}
                                        @endif
                                   </p>
                                   <!-- Post Author -->
                                   <p class="post-author txt-color-05">{{$item->created_at}}</p>	

                               </div>

                           </div>
                        </div>	<!-- END  BLOG POST #1 -->
                        @endforeach
                         <!-- BLOG POST #1 -->


                    </div>	<!-- END BLOG POSTS HOLDER -->


                </div>	   <!-- End container -->		
            </section>	<!-- END BLOG-1 -->


        </div> <!-- End container -->
    </section> <!-- END SERVICES-18 -->
@endsection
