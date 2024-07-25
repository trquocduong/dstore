@extends('layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                {{-- <li><a href="#">Category</a></li> --}}
                <li>Sản Phẩm yêu thích</li>
            </ul>
        </div>
        <h1>Sản Phẩm yêu thích</h1>
    </div>
    <!-- /page_header -->
    <table class="table table-striped cart-list">
                        <thead>
                            <tr>
                                <th>
                                    Thực hiện
                                </th>
                                <th>
                                    Hình ảnh
                                </th>
                                <th>
                                    Tên
                                </th>

                                <th>
                                   Giá
                                </th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($favorites as $favorite)
                            <tr>
                                <td>
                                    <a href="{{ route('heart.remove', $favorite->product_id) }}" class="btn btn-danger btn-sm">Xóa</a>
                                </td>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ $favorite->product->img}}"  alt="Image" width="150" height="100px">
                                    </div>
                                   
                                </td>
                                <td>
                                    <span class="item_cart">{{ $favorite->product->name }}</span>
                                </td>
                                <td>
                                    <strong>{{ number_format($favorite->product->price) }} Đ</strong>
                                </td>
                               
                             
                              
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-end">
                        <button type="button" class="btn_1 gray">Xoá tất cả sản phẩm </button>
                    </div>

                </div>
                <!-- /cart_actions -->

    </div>
    <!-- /container -->
    
    
</main>
@endsection