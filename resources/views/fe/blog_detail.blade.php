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

{{-- <section id="services-18" class="bg-color-01 wide-60 services-section division" style="margin-top: 100px">
    
</section> --}}
<!-- PAGE HERO
    ============================================= -->	
    
<div class="inner-page-wrapper">




    <!-- SINGLE POST
    ============================================= -->
    <section id="single-post" class="bg-color-01 wide-90 blog-page-section division">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="section-title mb-60 text-center">
            
                            <!-- Transparent Header -->
                            <h2 class="tra-header txt-color-02">BLOG</h2>
            
                            <!-- Title 	-->
                            <h3 class="h3-xl txt-color-01">{{$blog->judul}}</h3>
            
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="row">
                <div class="col-md-12">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{!! \Session::get('success') !!}</li>
                            </ul>
                        </div>
                    @endif
                    @if (\Session::has('info'))
                        <div class="alert alert-info">
                            <ul>
                                <li>{!! \Session::get('info') !!}</li>
                            </ul>
                        </div>
                    @endif
                </div>

                 <!-- POST CONTENT -->
                 <div class="col-lg-8">
                     <div class="single-blog-post pr-30">

                         <!-- BLOG POST IMAGE -->
                         <div class="blog-post-img">
                            <img class="img-fluid" src="{{asset('img_blog/'.$blog->img_thumbnail)}}" alt="blog-post-image" />	
                        </div>

                        <!-- SINGLE POST TITLE -->
                        <div class="single-post-title">

                            <!-- Post Data -->
                            <span class="txt-color-06">{{$blog->jenis->name}}</span>

                            <!-- Post Title -->
                            <h5 class="h5-xl txt-color-01">{{$blog->judul}}</h5>

                            <!-- Post Author -->
                            <p class="post-author txt-color-01">{{$blog->created_at}}</p>	

                        </div>

                        <!-- POST TEXT -->
                        <div class="single-post-txt" style="text-align: justify">
                            <p class="txt-color-05">
                                {!!$blog->deskripsi!!}
                            </p>
                        </div>	<!-- END POST TEXT -->
                        <hr>

                        <!-- OTHER POSTS -->
                        @if ($relate_post->count() > 0)
                        <div class="other-posts">
                            <!-- Title -->	
                            <h5 class="h5-lg txt-color-01 text-uppercase">Blog Serupa</h5>	
                            <div class="row">
                                @foreach ($relate_post as $item)
                                <div class="col-md-6">
                                    <div class="blog-post">
                                        <!-- Image -->
                                        <img class="img-fluid" src="{{asset('img_blog/'.$item->img_thumbnail)}}" alt="video-preview">

                                        <!-- Text -->
                                        <div class="blog-post-txt">

                                            <!-- Post Data -->
                                            <span class="txt-color-06">{{$item->jenis->name}}</span>

                                            <h6 class="h6-md txt-color-01">
                                                <a href="/blog/{{$item->slug}}">{{$item->judul}}</a>
                                            </h6>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                                <!-- BLOG POST #1 -->
                            </div>
                        </div>	<!-- END OTHER POSTS -->
                        @endif

                        <!-- POST COMMENTS -->
                        <div class="post-comments">
                            <!-- Title -->
                            <h5 class="h5-lg txt-color-01">Comments ({{$blog->komen->count()}})</h5>	
                            @foreach ($komen as $item)
                            <div class="media">

                                <div class="media-body">
                                    <!-- Comment-1 Meta -->
                                    <div class="comment-meta">
                                        <h6 class="h6-md mt-0 txt-color-01">{{$item->name}}</h6>						
                                          <span class="comment-date txt-color-03">{{$item->created_at->diffForHumans()}} </span>
                                          @auth
                                          <span class="btn-reply"><a href="/hapus-komen/{{$item->id}}" class="internal-link text-danger"><i class="fas fa-reply"></i> Hapus</a></span>
                                          @endauth
                                   </div>
                                   
                                   <!-- Comment-1 Text -->	
                                      <p class="txt-color-05 mb-40">{!!$item->deskripsi!!}
                                      </p>

                                      <hr />

                                 </div>
                           </div>	
                            @endforeach
                           

                        </div>	<!--END POST COMMENTS -->


                        <!-- COMMENT FORM -->
                        <div id="leave-comment">
                            
                            <!-- Title -->
                            <h5 class="h5-lg txt-color-01">Leave a Comment</h5>
                            
                            <!-- Text -->
                            <p class="txt-color-05">Your email address will not be published. Required fields are marked *</p>

                            <form action="{{route('submit_komen')}}" method="POST" class="row">@csrf

                                <div class="col-md-12 input-message" style="margin-bottom: 10px">
                                    <p class="txt-color-01">Add Comment *</p>
                                    <textarea class="form-control message" name="deskripsi" rows="6" placeholder="Enter Your Comment Here* ..." required></textarea>
                                </div> 
                                                    
                                <div class="col-md-12" style="margin-bottom: 10px">
                                    <p class="txt-color-01">Name*</p>
                                    <input type="text" name="name" class="form-control name" placeholder="Enter Your Name*" required> 
                                </div>
                                        
                                <div class="col-md-12" style="margin-bottom: 10px">
                                    <p class="txt-color-01">Email*</p>
                                    <input type="email" name="email" class="form-control email" placeholder="Enter Your Email*" required> 
                                </div>

                                <input type="hidden" name="blog_id" value="{{$blog->id}}" required>
                                                 
                                <!-- Contact Form Button -->
                                <div class="col-lg-12 form-btn" style="margin-bottom: 10px"> 						                 
                                    <button type="submit" class="btn btn-md btn-primary">Post Comment</button> 
                                </div>                
                            </form>										
                        
                        </div>	<!-- END COMMENT FORM -->


                     </div>
                 </div>	<!-- END POST CONTENT -->


                 <!-- SIDEBAR -->
                <aside id="sidebar" class="col-lg-4">

                    <!-- POPULAR POSTS -->
                    <div class="popular-posts sidebar-div mb-50">
                            
                        <!-- Title -->
                        <h5 class="h5-sm txt-color-01 text-uppercase">Blog Serupa</h5>

                        <ul class="popular-posts">
                            @if ($list_blog->count() == 0)
                                <p class="text-danger text-uppercase">Belum ada blog serupa</p>
                            @endif
                            @foreach ($list_blog as $item)
                                <!-- Popular post #1 -->
                                <li class="clearfix d-flex align-items-center">

                                    <!-- Image -->
                                    <img style="max-width: 200px; height: auto;" src="{{asset('img_blog/'.$item->img_thumbnail)}}" alt="blog-post-preview" />

                                    <!-- Text -->
                                    <div class="post-summary">
                                        <a href="/blog/{{$item->slug}}" class="txt-color-05">{{$item->judul}}</a>
                                        <p class="txt-color-03">{{$item->komen->count()}} Comments</p>
                                    </div>

                                </li>
                            @endforeach

                        </ul>

                    </div>

<hr>
                    <!-- TAGS CLOUD -->
                    <div class="tags-cloud sidebar-div mb-50">
                            
                        <!-- Title -->
                        <h5 class="h5-sm txt-color-01 text-uppercase">Kategori</h5>
                       
                        @foreach ($kategori as $item)
                        <span class="badge"><a href="#{{$item->name}}">{{$item->name}}</a></span>
                        @endforeach
                    </div>
                </aside>	<!-- END SIDEBAR -->


             </div>	<!-- End row -->	
         </div>	 <!-- End container -->
    </section>	<!-- END SINGLE POST -->




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




</div>	<!-- END INNER PAGE WRAPPER -->
@endsection
