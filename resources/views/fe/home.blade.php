@extends('layouts.master')

@section('content')
    <div class="indent-header">
        <div class="slider-1 clearfix">

            <div class="flex-container">
                <div class="flexslider loading">
                    <ul class="slides">
                        @if ($slider->count() > 0)
                            @foreach ($slider as $item)
                                <!-- SLIDE 1 -->
                                <li>
                                    {{-- style="background:url() no-repeat;background-position:50% 0" --}}
                                    <img src="{{ asset('img_slider/' . $item->img_slider) }}" alt="">
                                    <div class="container">
                                        <div class="contain">
                                            {{-- <h2 data-toptitle="35%" class="light-100 flex-top-bot">2020</h2>
                              <p data-bottomtext="35%" class="light-100 flex-bot-top"><span class="bold">LOOKBOOK</span></p> --}}
                                        </div>
                                    </div>
                                </li><!-- End item -->
                            @endforeach
                        @else
                            <li
                                style="background:url({{ asset('images/flexslider/shop1.jpg') }}) no-repeat;background-position:50% 0">
                                <div class="container">
                                    <div class="contain">
                                        <!-- <h2 data-toptitle="35%" class="light-100 flex-top-bot">2020</h2>
                                  <p data-bottomtext="35%" class="light-100 flex-bot-top"><span class="bold">LOOKBOOK</span></p> -->
                                    </div>
                                </div>
                            </li><!-- End item -->
                        @endif


                    </ul>
                </div>
            </div>

        </div><!-- End slider -->
    </div>

    <div class="page-section grey-light-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="shop-ad-height">
                        <div class="text-middle block-center-x-767">
                            <h3 class="light-34 m-0">NEW <br><span class="bold">COLLECTION</span></h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="page-section pt-110-b-30-cont">
        <div class="container">

            <div class="mb-50">
                <h2 class="section-title pr-0">OUR <span class="bold">PRODUCTS</span><a href="/daftar-product"
                        class="section-more right">MORE</a>
                </h2>
            </div>

            <div class="row">

                @foreach ($product as $item)
                    <div class="col-sm-6 col-6 col-md-3 col-lg-3 col-6 wow fadeIn pb-70">
                        <div class="post-prev-img">
                            <a href="shop-single.html"><img src="{{ asset('images/shop/items/1.jpg') }}" alt="img"></a>
                        </div>
                        <div class="sale-label-cont">
                            <span class="sale-label label-danger bg-red">NEW</span>
                        </div>
                        <div class="post-prev-title mb-5">
                            <h3><a class="font-norm a-inv" href="shop-single.html">{{$item->name}}</a></h3>
                        </div>

                        <div class="shop-price-cont">
                            <strong>{{$item->harga}}</strong>
                        </div>

                        <div class="post-prev-more-cont clearfix">
                            <div class="shop-add-btn-cont">
                                <a class="button medium gray-light shop-add-btn" href="#">SEE DETAIL</a>
                            </div>
                            <div class="shop-sub-btn-cont">
                                <!-- <a href="#" class="post-prev-count"><span aria-hidden="true" class="icon_heart_alt"></span></a> -->
                                <a href="#" class="post-prev-count dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <span aria-hidden="true" class="icon_cart"></span>
                                </a>
                                <ul class="social-menu dropdown-menu dropdown-menu-right" role="menu">
                                    {{-- <li><a href="#"><span aria-hidden="true" class="social_facebook"></span></a>
                                    </li>
                                    <li><a href="#"><span aria-hidden="true" class="social_twitter"></span></a></li>
                                    <li><a href="#"><span aria-hidden="true" class="social_dribbble"></span></a></li> --}}
                                    @if ($item->link_tokped !== null)
                                    <li><a href="{{$item->link_tokped}}" target="_blank">Tokopedia</a></li>
                                    @endif
                                    @if ($item->link_shopee !== null)
                                    <li><a href="{{$item->link_shopee}}" target="_blank">Shopee</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
