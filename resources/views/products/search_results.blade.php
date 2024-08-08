@extends('layout')

@section('content')

<main>
		
    <div class="container margin_30">
        <div class="top_banner version_2">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0)">
                <div class="container">
                    <div class="d-flex justify-content-center">
                   <h3>Kết quả tìm kiếm cho: {{ $keyword }}</h3>
                   @if($products->isEmpty())
                   <p>Không có sản phẩm nào được tìm thấy.</p>
                     @else
                    </div>
                </div>
            </div>
            <img src="{{$banner->img}}" class="img-fluid" alt="">
        </div>
        <!-- /top_banner -->
        <div id="stick_here"></div>
      
        <!-- /toolbox -->
        <div class="row small-gutters mt-3">
            @foreach($products as $product)
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <figure>
                        <span class="ribbon off">-30%</span>
                        <a href="product-detail-1.html">
                            <img class="img-fluid lazy" src="{{ $product->img }}" alt="">
                        </a>
                        <div data-countdown="2019/05/15" class="countdown"></div>
                    </figure>
                    <a href="product-detail-1.html">
                        <h3>{{ $product->name }}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">{{ $product->price }}</span>
                    </div>
                    <ul>
                        <li>
                            @auth
                                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                    document.getElementById('heart.addsale_{{ $product->id }}').submit();">
                                    <i class="ti-heart"></i>
                                </a>
                                <form id="heart.addsale_{{ $product->id }}" action="{{ route('add.favorite', ['id' => $product->id]) }}"
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
                                    document.getElementById('cart_{{ $product->id }}').submit();">
                                   <i class="ti-shopping-cart"></i>
                                </a>
                                <form id="cart_{{ $product->id }}" action="{{ route('cart', ['id' => $product->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                    <input type="hidden" name="img" value="{{ $product->img }}">
                                     <input type="hidden" name="price" value="{{ $product->price }}">
                                </form>
                            @else
                                <a href="{{ route('home') }}" onclick="alert('Bạn cần đăng nhập để thực hiện chức năng này.');">
                                    <i class="ti-heart"></i>
                                </a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            @endforeach
   				
        </div>
        @endif
        <!-- /row -->
            
        <div class="pagination__wrapper">
            <ul class="pagination">
                <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
                <li>
                    <a href="#0" class="active">1</a>
                </li>
                <li>
                    <a href="#0">2</a>
                </li>
                <li>
                    <a href="#0">3</a>
                </li>
                <li>
                    <a href="#0">4</a>
                </li>
                <li><a href="#0" class="next" title="next page">&#10095;</a></li>
            </ul>
        </div>
            
    </div>
    <!-- /container -->
</main>
@endsection
