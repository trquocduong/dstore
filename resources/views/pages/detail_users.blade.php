@extends('layout')
@section('content')
<div class="container mt-5">
    <h3 class="text-center mb-4 bg-light py-2 rounded">Cài đặt</h3>
    <div class="card shadow-sm p-4">
        <h5 class="p-2">Xin chào: {{ Auth::user()->username }}</h5>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Thông tin cá nhân
                    <a href="{{route('profile')}}" class="btn btn-outline-primary btn-sm">Xem</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Đơn hàng của bạn
                    <a href="{{route('profile.order')}}" class="btn btn-outline-primary btn-sm">Xem</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Đổi mật khẩu
                    <a href="change_password" class="btn btn-outline-primary btn-sm">Thay đổi</a>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Đăng xuất </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
        <div class="card-footer text-center">
            <p class="text-danger mb-0">Mọi thông tin thắc mắc vui lòng liên hệ chúng tôi</p>
        </div>
    </div>
</div>


@endsection