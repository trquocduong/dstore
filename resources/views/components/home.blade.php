@extends('layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')
<main>
    <div class="header-video">
        <div id="hero_video">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6">
                            <div class="slide-text white">
                                <h3>Giày thể thao Nam<br>Giảm 20% </h3>
                                <p>Số lượng mặt hàng có sẵn ở mức giá này</p>
                                <a class="btn_1" href="#0" role="button">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <video class="header-video--media" width="1920" height="960" autoplay loop muted>
            <source src="assets/img/banner.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <!-- /header-video -->

    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-gift"></i>
                        <div class="justify-content-center">
                            <h3>Miễn phí vận chuyển</h3>
                            <p>
            
                                Cho tất cả các đơn hàng 500.000đ</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-wallet"></i>
                        <div class="justify-content-center">
                            <h3>Thanh toán an toàn</h3>
                            <p>Thanh toán an toàn 100%</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-headphone-alt"></i>
                        <div class="justify-content-center">
                            <h3>Hỗ trợ 24/7</h3>
                            <p>Hỗ trợ trực tuyến hàng đầu</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
<div class="container margin_60_35">
    <div class="row small-gutters categories_grid">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-md-3">
                <a href="{{ route('detail_category', ['id' => $category->id]) }}">
                    <img src="{{$category->img}}"  alt="{{ $category->name }}" class="img-fluid lazy" width="100%">
                    <div class="wrapper">
                        <h2>{{ $category->name }}</h2>
                        <p>{{ $category->product_count }} Sản phẩm</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <!--/categories_grid-->
</div>
    <hr class="mb-0">
    
    <div class="container margin_60_35">
        <div class="main_title mb-4">
            <h2>Hàng Mới Về </h2>
            <span>Sản Phẩm</span>
            <p>1 số sản phẩm đã được nhập vào 2 tháng gần đây </p>
        </div>
        <div class="isotope_filter">
            <ul>
                <li><a href="#0" id="all" data-filter="*">Tất cả </a></li>
                <li><a href="#0" id="popular" data-filter=".popular">Mới Nhất</a></li>
                <li><a href="#0" id="sale" data-filter=".sale">Giảm giá</a></li>
            </ul>
        </div>
        <div class="isotope-wrapper">
            <div class="row small-gutters">
                @foreach ($sale as $sale_row)
                <div class="col-6 col-md-4 col-xl-3 isotope-item sale">
                    <div class="grid_item">
                        <span class="ribbon off">-{{$sale_row->bestseller}}%</span>
                        <figure>
                            <a href="{{route('detail_product',['id'=>$sale_row->id])}}">
                                <img class="" src="{{ $sale_row->img }}"  width="100%" height="300px">
                                <img class="" src="{{ $sale_row->img }}"  width="100%" height="300px">
                            </a>
                        </figure>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
                        </div>
                        <a href="product-detail-1.html">
                            <h3>{{ $sale_row->name }}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">{{ $sale_row->price }}</span>
                        </div>
                        <ul>
                            <li>
                                @auth
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                        document.getElementById('heart.addsale_{{ $sale_row->id }}').submit();">
                                        <i class="ti-heart"></i>
                                    </a>
                                    <form id="heart.addsale_{{ $sale_row->id }}" action="{{ route('add.favorite', ['id' => $sale_row->id]) }}"
                                        method="POST">
                                        @csrf
                                    </form>
                                @else
                                    <a href="{{ route('home') }}" onclick="alert('Bạn cần đăng nhập để thực hiện chức năng này.');">
                                        <i class="ti-heart"></i>
                                    </a>
                                @endauth
                            </li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li>
                                @auth
                                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                        document.getElementById('cart_{{ $sale_row->id }}').submit();">
                                       <i class="ti-shopping-cart"></i>
                                    </a>
                                    <form id="cart_{{ $sale_row->id }}" action="{{ route('cart', ['id' => $sale_row->id]) }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ $sale_row->name }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="img" value="{{ $sale_row->img }}">
                                         <input type="hidden" name="price" value="{{ $sale_row->price }}">
                                    </form>
                                @else
                                    <a href="{{ route('home') }}" onclick="alert('Bạn cần đăng nhập để thực hiện chức năng này.');">
                                        <i class="ti-shopping-cart"></i>
                                    </a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
                @foreach ($news as $new)
                <div class="col-6 col-md-4 col-xl-3 isotope-item popular">
                    <div class="grid_item">
                        <span class="ribbon new">New</span>
                        <figure>
                            <a href="{{route('detail_product',['id'=>$new->id])}}">
                                <img class="" src="{{ $new->img }}"  width="100%" height="300px">
                                <img class="" src="{{ $new->img }}"  width="100%" height="300px">
                            </a>
                        </figure>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
                        </div>
                        <a href="product-detail-1.html">
                            <h3>{{ $new->name }}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">{{ $new->price }}</span>
                        </div>
                        <ul>
                            <li>
                                @auth
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                        document.getElementById('heart.add_{{ $new->id }}').submit();">
                                    <i class="ti-heart"></i>
                                </a>
                                <form id="heart.add_{{ $new->id }}" action="{{ route('add.favorite', ['id' => $new->id]) }}"
                                    method="POST">
                                    @csrf
                                    {{-- Bổ sung các trường form bổ sung nếu cần --}}
                                </form>
                                @else
                                <a href="{{ route('home') }}" onclick="alert('Bạn cần đăng nhập để thực hiện chức năng này.');">
                                    <i class="ti-heart"></i>
                                </a>
                            @endauth
                            </li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach
            </div>
            <!-- /row -->
        </div>
        <!-- /isotope-wrapper -->
    </div>
    <!-- /container -->
    
    <div class="featured lazy" data-bg="url(img/nen.png)">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
            <div class="container margin_60">
                <div class="row justify-content-center justify-content-md-start">
                    <div class="col-lg-6 wow" data-wow-offset="150">
                        <h3>Giày thể thao <br>Air Color 720</h3>
                        <p>
                            Đệm nhẹ và hỗ trợ bền bỉ với đế giữa Phylon</p>
                        <div class="feat_text_block">
                            <div class="price_box">
                                <span class="new_price">900000</span>
                                <span class="old_price">1000000</span>
                            </div>
                            <a class="btn_1" href="listing-grid-1-full.html" role="button">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /featured -->
    
    <div class="bg_gray">
        <div class="container margin_30">
            <div id="brands" class="owl-carousel owl-theme">
                <div class="item">
                    <a href="#0"><img src="img/brand1.png"  alt="" class="owl-lazy" width="200px" height="100px"></a>
                </div><!-- /item -->
                <div class="item">
                    <a href="#0"><img src="img/brand2.png"  alt="" class="owl-lazy" width="200px" height="100px"></a>
                </div><!-- /item -->
                <div class="item">
                    <a href="#0"><img src="img/brand3.png"  alt="" class="owl-lazy" width="200px" height="100px"></a>
                </div><!-- /item -->
                <div class="item">
                    <a href="#0"><img src="img/brand4.png"  alt="" class="owl-lazy" width="200px" height="100px"></a>
                </div><!-- /item -->
                <div class="item">
                    <a href="#0"><img src="img/brand5.png"  alt="" class="owl-lazy" width="200px" height="100px"></a>
                </div><!-- /item -->
                <div class="item">
                    <a href="#0"><img src="img/brand6.png"  alt="" class="owl-lazy" width="200px" height="100px"></a>
                </div><!-- /item --> 
            </div><!-- /carousel -->
        </div><!-- /container -->
    </div>
    <!-- /bg_gray -->
    
    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Tin tức mới </h2>
            <span>Tin Tức</span>
            <p>Tổng hợp tin tức và các mẹo để giày bạn xinh hơn nè</p>
        </div>
        <div class="row">
            @foreach ($blog as $blogs)
            <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure>
                        <img src="{{$blogs->img}}"  alt="" width="400" height="266" class="lazy">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>Được viết vào</li>
                        <li>{{$blogs->created_at}}</li>
                    </ul>
                    <h4>{{$blogs->title}}</h4>
                    <p>{{ Str::limit($blogs->mota, 105)}}</p>
                </a>
            </div>
            @endforeach
           
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
</main>
@endsection