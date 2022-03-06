@extends('layouts.master')

@section('head')
@endsection

@section('content')
    <div class="page-title-cont page-title-large page-title-img grey-dark-bg pt-250"
        style="background-image: url({{ asset('images/R.jpg') }})">
        <div class="relative container align-left">
            <div class="row">
                <div class="col-md-12">
                    .
                </div>
                <div class="col-md-8">
                    <h1 class="page-title">LIST PRODUCTS</h1>
                    <div class="page-sub-title">
                        CATALOG PRODUCT KAMI
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="breadcrumbs">
                        <a href="index.html">Home</a><span class="slash-divider">/</span><a href="#">LIST PRODUCTS</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="page-section p-140-cont">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-3">

                    <!-- SEARCH -->
                    {{-- <div class="widget">
                        <form class="form-search widget-search-form" action="page-search-results.html" method="get">
                            <input type="text" name="q" class="input-search-widget" placeholder="Search">
                            <button class="" type="submit" title="Start Search">
                                <span aria-hidden="true" class="icon_search"></span>
                            </button>
                        </form>
                    </div> --}}

                    <!-- WIDGET -->
                    <div class="widget" style="margin-top: 70px">
                        <h5 class="widget-title">Categories</h5>
                        <div class="widget-body">
                            <ul class="clearlist widget-menu">
                                @foreach ($kategori as $item)
                                    <li>
                                        @if ($item->product->count() > 0)
                                            <a href="#" title="" class="text-capitalize">{{ $item->name }}</a><small><span
                                                    class="slash-divider">/</span> {{ $item->product->count() }}</small>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <!-- WIDGET -->
                    <div class="widget">
                        <h5 class="widget-title">Tags</h5>
                        <div class="widget-body">
                            <div class="tags">
                                @foreach ($tag as $item)
                                    @if ($item->product->count() > 0)
                                        <a href="#">{{ $item->name }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
                <!-- CONTENT -->
                <div class="col-sm-9">
                    <div class="clearfix mb-70">
                        <div class="left font-12">
                        </div>
                        {{-- <div class="right">
                            <form method="post" action="#" class="form">
                                <select class="select-md">
                                    <option>Sort by</option>
                                    <option>Price: low to high</option>
                                    <option>Price: high to low</option>
                                </select>
                            </form>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div id="data-wrapper">
                            <!-- Results -->
                            @include('fe.data')
                        </div>
                        <!-- Data Loader -->
                        <div class="auto-load text-center">
                            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                                enable-background="new 0 0 0 0" xml:space="preserve">
                                <path fill="#000"
                                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- SIDEBAR -->


            </div>
        </div>
    </div>
    
@endsection

@section('script')
    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax({
                    url: '/daftar-product?page=' + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })
                .done(function(data) {
                    if (data.html == '') {
                        return $('.auto-load').html("No more product");

                    } else {
                        $('.auto-load').hide();
                        $("#data-wrapper").append(data.html);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('server not responding...');
                });
        }

        $('.button').click(function() {
            var buttonId = $(this).attr('id');
            $('#modal-container').removeAttr('class').addClass(buttonId);
            $('body').addClass('modal-active');
        })

        $('#modal-container').click(function() {
            $(this).addClass('out');
            $('body').removeClass('modal-active');
        });
    </script>
@endsection
