@extends('layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')
<main>
    <div class="top_banner">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
            <div class="container">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <h1>Shoes - Grid listing</h1>
            </div>
        </div>
        <img src="{{$banner->img}}" class="img-fluid" alt="">
    </div>
    <!-- /top_banner -->
        <div id="stick_here"></div>		

        <!-- /toolbox -->
        
        <div class="container margin_30">
        
        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <div class="filter_col">
                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                    <div class="filter_type version_2">
                        <h5><a href="#filter_1" data-bs-toggle="collapse" class="opened">Danh mục</a></h5>
                        <div class="collapse show" id="filter_1">
                         
                            <ul>
                                @foreach ($categories as $category)
                                <li class="nav-item">
                                    <form action="{{ route('fillterview') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="iddm" value="{{ $category->id }}">
                                      
                                        <button type="submit" class="nav-link d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ request()->iddm == $category->id ? 'active' : '' }}" style="background: none; border: none; cursor: pointer;">
                                            <i class="fa fa-hamburger fa-2x text-primary"></i>
                                            <label class="container_check">
                                                {{ $category->name }} <small>12</small>
                                                <input type="checkbox" name="category_id" value="{{ $category->id }}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                        <!-- /filter_type -->
                    </div>
                
                    
                </div>
            </aside>
            <!-- /col -->
            <div class="col-lg-9">
                <div class="row small-gutters">
                    @foreach ($views as $item)
                    <div class="col-6 col-md-4">
                        <div class="grid_item">
                            {{-- <span class="ribbon off">-30%</span> --}}
                            <figure>
                                <a href="product-detail-1.html">
                                    <img class="" src="{{$item->img}}" data-src="{{$item->name}}" alt="" width="100%" height="350px">
                                </a>
                                {{-- <div data-countdown="2019/05/15" class="countdown"></div> --}}
                            </figure>
                            <a href="product-detail-1.html">
                                <h3>{{$item->name}}</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">{{$item->price}}</span>
                                {{-- <span class="old_price">{{$item->price}}</span> --}}
                            </div>
                            <ul>
                                <li>
                                        <form action="{{ route('add.favorite', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites">
                                                <i class="ti-heart"></i><span>Add to favorites</span>
                                            </button>
                                        </form>
                                </li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                    </div>
                    @endforeach
                    <!-- /col -->

                    <!-- /col -->		
                    
                </div>
                <!-- /row -->
              
                
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->			
            
    </div>
    <!-- /container -->
</main>
@endsection