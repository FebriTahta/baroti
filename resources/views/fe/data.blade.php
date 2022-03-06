
@foreach ($prod as $key=>$value)
<a>
<div class="col-md-3 col-lg-3 col-sm-6 col-6 pb-50">
    <div class="post-prev-img">
        <a href="shop-single.html"><img src="{{asset('img_product/'.$value->image)}}" alt="img"></a>
    </div>
    <div class="sale-label-cont">
        <span class="sale-label label-danger bg-red">SALE</span>
    </div>
    <div class="post-prev-title mb-5">
        @foreach ($value->tag as $items)
        <a href="#'.$items->slug.'" class="button-sm badge">{{$items->name}}</a>
        @endforeach
        <h3><a class="font-norm a-inv" href="#0" data-toggle="modal" data-target="#modaltes">{{$value->name}}</a></h3>
        <span>{{$value->kategori->name}}</span>
    </div>
    <div class="shop-price-cont">
        <?php $rp      = 'Rp '.number_format($value->harga,2,',','.');?>
        <strong>{{$rp}}</strong>
    </div>
    <div class="post-prev-more-cont clearfix">
        <div class="shop-add-btn-cont">
            <a class="button medium gray-light btn-sm shop-add-btn" href="#">DETAIL</a>
        </div>
        <div class="shop-sub-btn-cont">
            <a href="#" class="post-prev-count dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span aria-hidden="true" class="icon_cart"></span>
            </a>
            <ul class="social-menu dropdown-menu dropdown-menu-right" role="menu">
                <li><a href="{{$value->link_tokped}}" target="_blank"><span aria-hidden="true"></span>Tokopedia</a>
                </li>
                <li><a href="{{$value->link_shopee}}" target="_blank"><span aria-hidden="true"></span>Shopee</a></li>
                </li>
            </ul>
        </div>
    </div>
</div>
</a>
@endforeach