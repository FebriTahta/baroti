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
            {{-- @if ($profile !== null)
                <div class="wsmobileheader clearfix">
                    <span class="smllogo"><img src="{{ asset('img_profile/' . $profile->image_header) }}"
                            width="170" height="50" alt="mobile-logo" /></span>
                    <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
                </div>
            @endif --}}

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

                            <!-- SIMPLE NAVIGATION LINK -->
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('newfe_content')
    

    <!-- TEAM-1
                ============================================= -->
    <section id="team-1" class="bg-color-01 wide-60 team-section division" style="margin-top: 100px">
        <div class="container">
            <!-- SECTION TITLE -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="section-title mb-60 text-center">

                        <!-- Transparent Header -->
                        <h2 class="tra-header txt-color-02">Our Team</h2>

                        <!-- Title 	-->
                        <h3 class="h3-xl txt-color-01">Relax, You're In Good Hands</h3>

                    </div>
                </div>
            </div>


            <!-- TEAM MEMBERS WRAPPER -->
            <div class="tm-wrapper">
                <div class="row">

                    @if ($team->count() > 0)
                        @foreach ($team as $item)
                            <div class="col-md-6 col-lg-3">
                                <div class="team-member">

                                    <!-- Team Member Photo -->
                                    <div class="team-member-photo">
                                        <div class="hover-overlay">

                                            <img class="img-fluid" src="{{ asset('img_team/' . $item->img) }}"
                                                alt="team-member-foto">

                                            <!-- Social Icons -->
                                            {{-- <div class="tm-social clearfix">
                                        <ul class="text-center clearfix">
                                            <li><a href="#" class="ico-facebook"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li><a href="#" class="ico-twitter"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="ico-linkedin"><i class="fab fa-linkedin-in"></i></a>
                                            </li>
                                        </ul>
                                    </div> --}}

                                        </div>
                                    </div>

                                    <!-- Team Member Meta -->
                                    <div class="tm-meta">
                                        <h6 class="h6-lg txt-color-01"><a href="#" data-jabatan="{{$item->jabatan}}" data-img="{{asset('img_team/'. $item->img)}}" data-deskripsi="{!!$item->deskripsi!!}" data-nama="{{$item->nama}}" data-toggle="modal" data-target="#modalshow">{{ $item->nama }}</a></h6>
                                        <span class="txt-color-06">{{ $item->jabatan }}</span>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12 text-center">
                            <h2>BELUM ADA TEAM</h2>
                        </div>
                    @endif


                </div> <!-- End row -->
            </div> <!-- END TEAM MEMBERS WRAPPER -->
        </div> <!-- End container -->

        <div class="modal fade" id="modalshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header text-center" style="background-color: pink">
                  <h5 class="modal-title text-capitalize text-white" id="nama">Modal title </h5> <i id="jabatan" class="text-white"> </i>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <img id="img" style="max-width: 100%" alt="">
                </div>
                <hr>
                <div class="modal-body">
                  <p id="deskripsi"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </section> <!-- END TEAM-1 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script>
    <script>
        $('#modalshow').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var nama = button.data('nama')
            var deskripsi = button.data('deskripsi')
            var img = button.data('img')
            var jabatan = button.data('jabatan')
            var modal = $(this)
            modal.find('.modal-header #nama').html(nama);
            modal.find('.modal-header #jabatan').html(' ( '+jabatan+' )');
            if (deskripsi == null) {
                modal.find('.modal-body #deskripsi').html('null');
                console.log('null');    
            }else{
                modal.find('.modal-body #deskripsi').html(deskripsi);
                console.log(deskripsi);
            }
            document.getElementById('img').src = img;
            console.log(nama);
            
        })
    </script>
@endsection
