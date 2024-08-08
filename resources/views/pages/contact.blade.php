@extends('layout')
@section('content')
	
<main class="bg_gray">
	
    <div class="container margin_60">
        <div class="main_title">
            <h2>Liên hệ với chúng tôi </h2>
            <p>Liên hệ ngay với chúng tôi nếu như bạn có vấn đề gì</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-support"></i>
                    <h2>Liên hệ qua Gmail</h2>
                    <a href="#0">+94 423-23-221</a> - <a href="#0">dstore@gmail.com</a>
                    <small>Làm việc 24/7</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-map-alt"></i>
                    <h2>Địa chỉ</h2>
                    <div>Quận 12 , Tp.Hồ Chí Minh</div>
                    <small>Làm việc 24/7</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box_contacts">
                    <i class="ti-package"></i>
                    <h2>Đơn hàng</h2>
                    <a href="#0">+94 423-23-221</a> - <a href="#0">dstore@gmail.com</a>
                    <small>Làm việc 24/7</small>
                </div>
            </div>
        </div>
        <!-- /row -->				
    </div>
    <!-- /container -->
<div class="bg_white">
    <div class="container margin_60_35">
        <h4 class="pb-3">Liên hệ </h4>
        <div class="row">
            <div class="col-lg-4 col-md-6 add_bottom_25">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Tên của bạn">
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email ">
                </div>
                <div class="form-group">
                    <textarea class="form-control" style="height: 150px;" placeholder="Mô tả vấn đề của bạn"></textarea>
                </div>
                <div class="form-group">
                    <input class="btn_1 full-width" type="submit" value="Gửi">
                </div>
            </div>
            <div class="col-lg-8 col-md-6 add_bottom_25">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62693.50865471333!2d106.61949810774028!3d10.861396708754675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529d0eabab26d%3A0x720f8ac0f2582e45!2sDistrict%2012%2C%20Ho%20Chi%20Minh%20City%2C%20Vietnam!5e0!3m2!1sen!2s!4v1722326039589!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /bg_white -->
</main>
@endsection