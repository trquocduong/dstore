@extends('layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')
<main>
    <div class="top_banner">
        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
            <div class="container">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Danh mục</a></li>
                        {{-- <li>Page active</li> --}}
                    </ul>
                </div>
                <h1>Sản phẩm trong danh mục</h1>
            </div>
        </div>
        <img src="{{asset($banner->img)}}" class="img-fluid" alt="">
    </div>
    <!-- /top_banner -->
    
        <div id="stick_here"></div>		
        {{-- <div class="toolbox elemento_stick">
            <div class="container">
            <ul class="clearfix">
                <li>
                    <div class="sort_select">
                        <select name="sort" id="sort">
                                <option value="popularity" selected="selected">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to 
                        </select>
                    </div>
                </li>
                <li>
                    <a href="#0"><i class="ti-view-grid"></i></a>
                    <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="collapse" href="#filters" role="button" aria-expanded="false" aria-controls="filters">
                        <i class="ti-filter"></i><span>Filters</span>
                    </a>
                </li>
            </ul>
            <div class="collapse" id="filters"><div class="row small-gutters filters_listing_1">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="drop">Categories</a>
                    <div class="dropdown-menu">
                        <div class="filter_type">
                                <ul>
                                    <li>
                                        <label class="container_check">Men <small>12</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Women <small>24</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Running <small>23</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Training <small>11</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                                <a href="#0" class="apply_filter">Apply</a>
                            </div>
                    </div>
                </div>
                <!-- /dropdown -->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="drop">Color</a>
                    <div class="dropdown-menu">
                        <div class="filter_type">
                                <ul>
                                    <li>
                                        <label class="container_check">Blue <small>06</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Red <small>12</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Orange <small>17</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Black <small>43</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                                <a href="#0" class="apply_filter">Apply</a>
                            </div>
                    </div>
                </div>
                <!-- /dropdown -->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="drop">Brand</a>
                    <div class="dropdown-menu">
                        <div class="filter_type">
                                <ul>
                                    <li>
                                        <label class="container_check">Adidas <small>11</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Nike <small>08</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Vans <small>05</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Puma <small>18</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                                <a href="#0" class="apply_filter">Apply</a>
                            </div>
                    </div>
                </div>
                <!-- /dropdown -->
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="drop">Price</a>
                    <div class="dropdown-menu">
                        <div class="filter_type">
                                <ul>
                                    <li>
                                        <label class="container_check">$0 — $50<small>11</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$50 — $100<small>08</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$100 — $150<small>05</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="container_check">$150 — $200<small>18</small>
                                          <input type="checkbox">
                                          <span class="checkmark"></span>
                                        </label>
                                    </li>
                                </ul>
                                <a href="#0" class="apply_filter">Apply</a>
                            </div>
                    </div>
                </div>
                <!-- /dropdown -->
        
            </div></div></div>
            </div>
        </div> --}}
        <!-- /toolbox -->

        <div class="container margin_30">
        <div class="row small-gutters">
            @foreach($products as $product)
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <figure>
                        {{-- <span class="ribbon off"></span> --}}
                        <a href="product-detail-1.html">
                            <img class="" src="{{asset($product->img)}}" alt=""  width="100%" height="300px">
                        </a>
                        {{-- <div data-countdown="2019/05/15" class="countdown"></div> --}}
                    </figure>
                    <a href="product-detail-1.html">
                        <h3>{{$product->name}}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">$48.00</span>
                        {{-- <span class="old_price">$60.00</span> --}}
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>	
            @endforeach		
        </div>
        <!-- /row -->
            
        {{-- <div class="pagination__wrapper">
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
        </div> --}}
            
    </div>
    <!-- /container -->
</main>
@endsection