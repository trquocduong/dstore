@extends('layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')

<main>
    <div class="container margin_30">
        <div class="countdown_inner">{{$products->bestseller}}% 
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            <!-- Hiển thị hình ảnh chính -->
                            <img src="{{ asset($products->img) }}" alt="" class="main-image" width="100%" height="450px">
            
                            @php
                                $galleryImages = json_decode($products->gallery);
                            @endphp
            
                            @if(is_array($galleryImages) && !empty($galleryImages))
                                @foreach($galleryImages as $image)
                                
                                    <div style="background-image: url('{{ asset('uploads/'.$image) }}');" class="item-box"></div>
                                @endforeach
                            @else
                                <p>No images available</p>
                            @endif
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            @if(is_array($galleryImages) && !empty($galleryImages))
                                @foreach($galleryImages as $image)
                                    <div style="background-image: url('{{ asset('uploads/'.$image) }}');" class="item"></div>
                                @endforeach
                            @else
                                <p>No images available</p>
                            @endif
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="col-md-6">
                <form action="{{ route('cart',['id'=>$products->id]) }}" method="POST">
                    @csrf
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{route('home')}}">Trang chủ</a></li>
                    </ul>
                </div>
                <div class="prod_info">
                    <h1>{{$products->name}}</h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>{{$products->view}}lượt xem </em></span>
                    <div class="prod_options">
                        <div class="row">
                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong><a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="custom-select-form">
                                    <select class="wide" name="size">
                                        <option value="S" selected>Nhỏ (S)</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Số lượng</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="number" value="1" id="quantity_1" class="qty2" name="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main"><span class="new_price">{{$products->price}}</span><span class="percentage">{{$products->bestseller}}%</span> <span class="old_price">{{$products->price}}</span></div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart"><a href="#0" class="btn_1">Mua ngay</a></div>
                        </div>
                    </div>
                </div>
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Thêm vào yêu thích</span></a>
                        </li>
                        <li>
                          
                             
                                <input type="hidden" name="name" value="{{ $products->name }}">
                                <input type="hidden" name="img" value="{{ $products->img }}">
                                 <input type="hidden" name="price" value="{{ $products->price }}">
                                <button type="submit" class="btn_1">Thêm vào giỏ hàng</button>
                         
                        </li>
                    </ul>
                </div>
            </form>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Mô tả</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Bình luận</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                               Mô tả
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <h3>{{$products->name}}</h3>
                                    <p>{{$products->mota}}</p>
                                </div>
                                <div class="col-lg-5">
                                    <h3>Chi tiết sản phẩm</h3>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Màu</strong></td>
                                                    <td>Trắng</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Size</strong></td>
                                                    <td>150x100x100</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Cân nặng</strong></td>
                                                    <td>0.6kg</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td><strong>Manifacturer</strong></td>
                                                    <td>Manifacturer</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Bình luận
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 54 minutes ago</em>
                                        </div>
                                        <h4>"Commpletely satisfied"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
                                            <em>Published 1 day ago</em>
                                        </div>
                                        <h4>"Always the best"</h4>
                                        <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
                                            <em>Published 3 days ago</em>
                                        </div>
                                        <h4>"Outstanding"</h4>
                                        <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="review_content">
                                        <div class="clearfix add_bottom_10">
                                            <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                            <em>Published 4 days ago</em>
                                        </div>
                                        <h4>"Excellent"</h4>
                                        <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <p class="text-end"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Sản phẩm tương tự</h2>
            <span>Sản phẩm</span>
            <p>Một số sản phẩm chung thể loại, bạn có thể xem xét.</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach($pro_duct as $pro)
            <div class="item">
                <div class="grid_item">
                    <figure>
                        {{-- <span class="ribbon off"></span> --}}
                        <a href="product-detail-1.html">
                            <img class="" src="{{asset($pro->img)}}" alt=""  width="100%" height="300px">
                        </a>
                        <div class="rating">
                            <i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i>
                        </div>
                        {{-- <div data-countdown="2019/05/15" class="countdown"></div> --}}
                    </figure>
                    <a href="product-detail-1.html">
                        <h3>{{$pro->name}}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">{{$pro->price}}</span>
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
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-gift"></i>
                        <div class="justify-content-center">
                            <h3>Miễn phí vận chuyển</h3>
                            <p>Cho tất cả đơn hàng 500k</p>
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
    <!--/feat-->

</main>
@endsection