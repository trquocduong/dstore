@extends('layout')

@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <h1>Thanh toán qua Thẻ Ngân Hàng</h1>
        </div>

        <div class="payment_info">
            <h2>Quét mã QR để thanh toán</h2>
            <p>Vui lòng quét mã QR bên dưới bằng ứng dụng quét mã QR hoặc ngân hàng của bạn để hoàn tất thanh toán.</p>
            <p>Vui lòng nhập mã giao dịch vào thông tin giao dịch khi chuyển khoản <strong>{{$transactionId}}</strong></p>

            <div class="qr_code">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ $transactionId }}" alt="Mã QR" class="img-fluid">
            </div>

            <form action="{{ route('home') }}" method="GET">
                <button type="submit" class="btn btn-primary mt-3">Tiếp tục</button>
            </form>
        </div>
    </div>
</main>
@endsection
