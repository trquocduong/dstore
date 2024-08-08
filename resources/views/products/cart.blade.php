@extends('layout')
@section('title', 'Shop Shose - Giày Nam Nữ ')
@section('content')
@php
$totalPrice = 0; // Khởi tạo biến tổng giá trị đơn hàng
$discount = 0; // Khởi tạo biến giảm giá
@endphp
<main class="bg_gray">
    <div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{asset('home')}}">Trang chủ</a></li>
                <li><a href="#">Giỏ hàng</a></li>
            </ul>
        </div>
        <h1>Giỏ hàng</h1>
    </div>
    <!-- /page_header -->
    <table class="table table-striped cart-list">
                        <thead>
                            <tr>
                               
                                <th>
                                    Hình ảnh
                                </th>
                                <th>
                                    Tên sản phẩm
                                </th>
                                <th>
                                    Giá
                                </th>
                                <th>
                                   Số lượng
                                </th>
                                <th>
                                    Thực hiện
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                             
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ $item->product->img}}"  alt="Image" width="150" height="100px">
                                    </div>
                                   
                                </td>
                                <td>
                                    <span class="item_cart">{{$item->product->name}}</span>
                                </td>
                                <td>
                                    <strong>{{$item->price}}</</strong>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <form method="POST" action="{{ route('updateQuantity', ['id' => $item->id]) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                            <button type="submit" class="btn btn-light">-</button>
                                        </form>
                                    
                                        <span class="mx-2">{{ $item->quantity }}</span>
                                    
                                        <form method="POST" action="{{ route('updateQuantity', ['id' => $item->id]) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                            <button type="submit" class="btn btn-light">+</button>
                                        </form>
                                    </div>
                                    
                                </div>
                                </td>
                                <td>
                                    <form action="{{ route('cart.remove', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="remove-btn">Xóa</button>
                                    </form>
                                </td>
                                @php
                                // Tính tổng giá trị của từng sản phẩm và cộng dồn vào tổng giá trị đơn hàng
                                $totalPrice += $item->quantity * $item->price;
                                @endphp
                               
                              
                            </tr>
                            @endforeach
                         
                        </tbody>
                    </table>

    </div>
    <!-- /container -->
    
    <div class="box_cart">
        <div class="container">
        <table class="table">
            <h5>TỔNG ĐƠN HÀNG</h5>
            <tr>
                <td>Tạm tính</td>
                <td class="totalPrice">{{ number_format($totalPrice, 0, ',', '.') . ' đ' }}</td>
            </tr>
            <tr>
                <td>Giảm Giá</td>
                <td class="sale">{{ number_format($discount, 0, ',', '.') . ' đ' }}</td>
            </tr>
            <tr>
                <td>Tổng cộng</td>
                <td class="totalPrice1"><strong>{{ number_format($totalPrice - $discount, 0, ',', '.') . ' đ' }}</strong></td>
            </tr>
        </table>
        <div class="d-flex justify-content-end">
            <button class="btn bg-danger text-white m-3">
                <a href="{{route('checkout.form')}}" style="color:white;text-decoration: none">
                    Tiếp Tục Thanh toán
                </a>
        </div>
    </div>
</div>

    <!-- /box_cart -->
    
</main>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Lắng nghe sự kiện khi nút tăng số lượng được click
    document.querySelectorAll('.increaseQuantity').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const quantityElement = row.querySelector('.quantity');
            const subtotalElement = row.querySelector('.total-price');
            const totalPriceElement = document.querySelector('.totalPrice');
            const saleElement = document.querySelector('.sale');
            const totalPrice1Element = document.querySelector('.totalPrice1');

            let quantity = parseInt(quantityElement.textContent);
            quantity++;
            quantityElement.textContent = quantity;

            let unitPrice = parseFloat(subtotalElement.getAttribute('data-price'));
            let newSubtotal = unitPrice * quantity;
            subtotalElement.textContent = numberWithCommas(newSubtotal.toFixed(0)) + ' đ';

            let total = parseFloat(totalPriceElement.textContent.replace(/\D/g, '')) || 0;
            total += unitPrice;
            totalPriceElement.textContent = numberWithCommas(total.toFixed(0)) + ' đ';

            // Cập nhật tổng cộng
            let discount = parseFloat(saleElement.textContent.replace(/\D/g, '')) || 0;
            totalPrice1Element.textContent = numberWithCommas((total - discount).toFixed(0)) + ' đ';
        });
    });

    // Lắng nghe sự kiện khi nút giảm số lượng được click
    document.querySelectorAll('.decreaseQuantity').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const quantityElement = row.querySelector('.quantity');
            const subtotalElement = row.querySelector('.total-price');
            const totalPriceElement = document.querySelector('.totalPrice');
            const saleElement = document.querySelector('.sale');
            const totalPrice1Element = document.querySelector('.totalPrice1');

            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantity--;
                quantityElement.textContent = quantity;

                let unitPrice = parseFloat(subtotalElement.getAttribute('data-price'));
                let newSubtotal = unitPrice * quantity;
                subtotalElement.textContent = numberWithCommas(newSubtotal.toFixed(0)) + ' đ';

                let total = parseFloat(totalPriceElement.textContent.replace(/\D/g, '')) || 0;
                total -= unitPrice;
                totalPriceElement.textContent = numberWithCommas(total.toFixed(0)) + ' đ';

                // Cập nhật tổng cộng
                let discount = parseFloat(saleElement.textContent.replace(/\D/g, '')) || 0;
                totalPrice1Element.textContent = numberWithCommas((total - discount).toFixed(0)) + ' đ';
            }
        });
    });

    // Hàm định dạng số có dấu phẩy ngăn cách hàng nghìn
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    
});


</script>
@endsection