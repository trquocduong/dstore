@extends('layout')
@section('content')
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><a href="{{ route('cartadd') }}">Giỏ hàng</a></li>
                </ul>
            </div>
            <h1>Thanh toán</h1>
        </div>

        <form id="checkout-form" action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Contact Information -->
                <div class="col-lg-4 col-md-6">
                    <div class="step first">
                        <h3>Thông tin liên hệ</h3>
                        <div class="tab-content checkout">
                            <div class="mb-3">
                                <label for="nguoidat_ten" class="form-label">Tên người đặt</label>
                                <input type="text" class="form-control" id="nguoidat_ten" name="nguoidat_ten" value="{{ old('nguoidat_ten', $user->username) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nguoidat_email" class="form-label">Email người đặt</label>
                                <input type="email" class="form-control" id="nguoidat_email" name="nguoidat_email" value="{{ old('nguoidat_email', $user->email) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nguoidat_tl" class="form-label">Số điện thoại người đặt</label>
                                <input type="text" class="form-control" id="nguoidat_tl" name="nguoidat_tl" value="{{ old('nguoidat_tl') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nguoidat_diachi" class="form-label">Địa chỉ người đặt</label>
                                <input type="text" class="form-control" id="nguoidat_diachi" name="nguoidat_diachi" value="{{ old('nguoidat_diachi') }}" required>
                            </div>
                            <button type="button" class="btn btn-secondary" id="add-more">Thêm thông tin</button>
                            <!-- Additional Fields -->
                            <div id="additional-fields" class="additional-fields" style="display:none">
                                <div class="mb-3">
                                    <label for="nguoinhan_ten" class="form-label">Tên người nhận</label>
                                    <input type="text" class="form-control" id="nguoinhan_ten" name="nguoinhan_ten" value="{{ old('nguoinhan_ten') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nguoinhan_diachi" class="form-label">Địa chỉ người nhận</label>
                                    <input type="text" class="form-control" id="nguoinhan_diachi" name="nguoinhan_diachi" value="{{ old('nguoinhan_diachi') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nguoinhan_tel" class="form-label">Số điện thoại người nhận</label>
                                    <input type="text" class="form-control" id="nguoinhan_tel" name="nguoinhan_tel" value="{{ old('nguoinhan_tel') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="col-lg-4 col-md-6">
                    <div class="step middle payments">
                        <h3>Phương thức thanh toán</h3>
                        <ul class="list-unstyled">
                            <li>
                                <label class="container_radio">
                                    Thanh toán khi nhận được hàng
                                    <input type="radio" name="payment" value="cod" checked id="cod">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">
                                    Thanh toán qua thẻ ngân hàng
                                    <input type="radio" name="payment" value="card" id="card">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                        <div class="payment_info d-none d-sm-block" id="paymentImageContainer">
                            <figure><img src="img/cards_all.svg" alt="Thẻ ngân hàng" class="img-fluid"></figure>
                            <p>Thanh toán qua thẻ ngân hàng.</p>
                        </div>
                        
                        <h6 class="pb-2">Chọn phương thức giao hàng</h6>
                        <ul class="list-unstyled">
                            <li>
                                <label class="container_radio">
                                    Hoả tốc (+50,000 VND)
                                    <input type="radio" name="shipping" value="express" id="express">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">
                                    Bình thường
                                    <input type="radio" name="shipping" value="standard" checked id="standard">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
         
                    </div>
                </div>
       
                <!-- Order Summary -->
                <div class="col-lg-4 col-md-6">
                    <div class="step last">
                        <h3>Sản phẩm</h3>
                        <div class="box_general summary">
                            <ul>
                                @foreach ($cart as $item)
                                <li class="clearfix"><em>{{ $item->product->name }}</em> <span>{{ number_format($item->price) }} VND</span></li>
                                @endforeach
                            </ul>
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" id="expressShippingFee" name="expressShippingFee" value="50000">
                            <input type="hidden" id="voucher_code" name="voucher_code">
                            <div class="total clearfix">
                                Tổng thanh toán <span id="total">{{ number_format($total) }} VND</span>
                            </div>
                        </form> 
                            <form action="{{ route('apply.voucher') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="1">
                                <input type="hidden" id="expressShippingFee" name="expressShippingFee" value="50000">
                                <div class="mb-3">
                                    <label for="voucher_code" class="form-label">Mã voucher (tuỳ chọn)</label>
                                    <input type="text" id="voucher_code" name="voucher_code" class="form-control" placeholder="Nhập mã voucher" value="{{ old('voucher_code') }}">
                                    @if ($errors->has('voucher_code'))
                                        <div class="text-danger">{{ $errors->first('voucher_code') }}</div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Ap dụng</button>
                            </form>
                           
                      
                        </div>
                    </div>
                </div>
            </div> 
   <div class="text-end">
                <a class="text-end" href="#" onclick="event.preventDefault();
                document.getElementById('checkout-form').submit();"> <button class="btn btn-danger">Thanh toán        </button></a>
            </div>
    </div>
</main>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentRadios = document.querySelectorAll('input[name="payment"]');
    const shippingRadios = document.querySelectorAll('input[name="shipping"]');
    const paymentImageContainer = document.getElementById('paymentImageContainer');
    const totalElement = document.getElementById('total');
    const expressShippingFee = parseInt(document.getElementById('expressShippingFee').value);

    function updatePaymentImage() {
        const selectedPayment = document.querySelector('input[name="payment"]:checked').value;
        if (selectedPayment === 'card') {
            paymentImageContainer.classList.remove('d-none');
        } else {
            paymentImageContainer.classList.add('d-none');
        }
    }

    function updateTotal() {
        const selectedShipping = document.querySelector('input[name="shipping"]:checked').value;
        let newTotal = {{ $total }};
        if (selectedShipping === 'express') {
            newTotal += expressShippingFee;
        }
        totalElement.textContent = new Intl.NumberFormat().format(newTotal);
    }

    function handleCheckout(event) {
        const selectedPayment = document.querySelector('input[name="payment"]:checked').value;
        if (selectedPayment === 'card') {
            event.preventDefault();
            // Chuyển hướng đến trang xử lý thanh toán
            window.location.href = '/payment-page?transaction_id={{ 'DS' . Str::random(5) }}';
        }
    }

    function toggleAdditionalFields() {
        const additionalFields = document.getElementById('additional-fields');
        additionalFields.style.display = additionalFields.style.display === 'none' ? 'block' : 'none';
    }

    // Lắng nghe sự thay đổi trong tùy chọn thanh toán và vận chuyển
    paymentRadios.forEach(radio => {
        radio.addEventListener('change', updatePaymentImage);
    });

    shippingRadios.forEach(radio => {
        radio.addEventListener('change', updateTotal);
    });

    // Đặt trạng thái mặc định
    updatePaymentImage();
    updateTotal();

    // Xử lý việc gửi đơn hàng
    document.getElementById('checkout-button').addEventListener('click', handleCheckout);

    // Xử lý việc nhấp vào nút thêm thông tin
    document.getElementById('add-more').addEventListener('click', toggleAdditionalFields);
});
</script>

@endsection
