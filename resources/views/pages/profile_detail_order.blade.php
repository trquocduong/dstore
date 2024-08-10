@extends('layout')
@section('title', 'Hóa đơn')
@section('content')

<div class="container my-5">
    <div class="row">
        <h2 class="mb-3">Hóa đơn #{{ $order->id }}</h2>
        <div class="col-md-6 mb-4">
            
            <div class="card p-3">
                <h5 class="card-title">Thông tin người đặt</h5>
                <p class="card-text"><strong>Người đặt:</strong> {{ $order->nguoidat_ten }}</p>
                <p class="card-text"><strong>Email người đặt:</strong> {{ $order->nguoidat_email }}</p>
                <p class="card-text"><strong>Số điện thoại người đặt:</strong> {{ $order->nguoidat_tl }}</p>
                <p class="card-text"><strong>Địa chỉ người đặt:</strong> {{ $order->nguoidat_diachi }}</p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card p-3">
                <h5 class="card-title">Thông tin người nhận</h5>
                <p class="card-text"><strong>Người nhận:</strong> {{ $order->nguoinhan_ten }}</p>
                <p class="card-text"><strong>Địa chỉ người nhận:</strong> {{ $order->nguoinhan_diachi }}</p>
                <p class="card-text"><strong>Số điện thoại người nhận:</strong> {{ $order->nguoinhan_tel }}</p>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="card-title">Tổng hợp chi phí</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tổng tiền
                        <span>{{ number_format($order->total) }} VND</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Phí ship
                        <span>{{ number_format($order->ship) }} VND</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Voucher
                        <span>{{ number_format($order->voucher) }} VND</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tổng thanh toán
                        <span class="text-danger">{{ number_format($order->tongthanhtoan) }} VND</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="card-title">Phương thức thanh toán</h5>
                <p class="card-text">{{ $order->pttt == 0 ? 'Thanh toán khi nhận hàng' : 'Thanh toán online' }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card p-3">
                <h5 class="card-title">Chi tiết đơn hàng</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $orderItem)
                        <tr>
                            <td>
                                <img src="{{ asset($orderItem->product->img) }}" alt="{{ $orderItem->product->name }}" class="img-fluid" style="max-width: 100px;">
                            </td>
                            <td>{{ $orderItem->product->name }}</td>
                            <td>{{ number_format($orderItem->price) }} VND</td>
                            <td>{{ $orderItem->quantity }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 mb-5">
        <a href="{{ route('home') }}" class="btn btn-primary">Quay lại trang chủ</a>
        <br>
    </div>
</div>

@endsection
