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
                    <span class="rating">
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $products->rating)
                                <i class="icon-star voted"></i>
                            @else
                                <i class="icon-star"></i>
                            @endif
                        @endfor
                        <em>{{$products->view}} lượt xem</em>
                    </span>
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
                            <div class="price_main">
                                <span class="new_price">{{$products->price}}</span>
                                <span class="percentage">{{$products->bestseller}}%</span> 
                                <span class="old_price">{{$products->price}}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="btn_add_to_cart">
                                <button type="submit" class="btn_1">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_actions">
                    <ul>
                        <li><a href="#"><i class="ti-heart"></i><span>Thêm vào yêu thích</span></a></li>
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
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @elseif(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            
                            @if($hasPurchased)
                                <!-- Form bình luận -->
                                <form action="{{ route('addComment', ['id' => $products->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="rating">Đánh giá (1-5)</label>
                                        <input type="number" name="rating" id="rating" min="1" max="5" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Bình luận</label>
                                        <textarea name="comment" id="comment" rows="4" class="form-control" required></textarea>
                                    </div>
                                    <input type="hidden" name="hiden" value="0">
                                    <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                                </form>
                            @else
                                <p>Vui lòng mua sản phẩm trước khi bình luận.</p>
                            @endif
                            <div class="reviews">
                                @foreach($comments as $comment)
                                    <div class="review mb-4 p-3 border rounded">
                                        <div class="d-flex align-items-start">
                                            <!-- Ảnh người dùng -->
                                            <img src="{{ $comment->user->profile_picture ? asset($comment->user->profile_picture) : asset('default-avatar.png') }}" alt="{{ $comment->user->name }}" class="rounded-circle me-3" width="50" height="50">
                            
                                            <div>
                                                <!-- Tên người dùng và ngày bình luận -->
                                                <div class="d-flex justify-content-between align-items-center mb-2">
                                                    <h5 class="mb-0">{{ $comment->user->username }}</h5>
                                                    <small class="text-muted">{{ $comment->created_at->format('d-m-Y H:i') }}</small>
                                                </div>
                            
                                                <!-- Đánh giá -->
                                                <div class="rating mb-2">
                                                    @for ($i = 0; $i < $comment->rating; $i++)
                                                        <i class="icon-star voted text-warning"></i>
                                                    @endfor
                                                    @for ($i = $comment->rating; $i < 5; $i++)
                                                        <i class="icon-star text-muted"></i>
                                                    @endfor
                                                </div>
                            
                                                <!-- Nội dung bình luận -->
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            

                        </div>
                    </div>
                </div>
                <!-- /TAB B -->
            </div>
        </div>
    </div>
</main>

@endsection
