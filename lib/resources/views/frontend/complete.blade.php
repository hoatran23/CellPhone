@extends('frontend.master')
@section('title','Xác nhận đơn hàng')
@section('content')

<section>
    <div class="cate-head">
        <div class="container">
            <div class="row">
                <div class="product mt-3 mb-3">
                    <div class="swiper-container cate-slide bg-white">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide cate-img">
                                <img src="img/banner/cate_banner.jpg" alt="">
                            </div>

                            <div class="swiper-slide cate-img">
                                <img src="img/banner/cate_banner1.jpg" alt="">
                            </div>

                            <div class="swiper-slide cate-img">
                                <img src="img/banner/cate_banner.jpg" alt="">
                            </div>

                            <div class="swiper-slide cate-img">
                                <img src="img/banner/cate_banner1.jpg" alt="">
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row bg-white mb-3">
            <div class="col-sm-8 offset-2 mt-3 mb-4">
                <div id="wrap-inner">
                    <h5 class="text-right return"><a href="{{asset('/')}}" style="color: #333; font-size: 18px; text-decoration: underline;"><i style="margin-right: 5px;" class="fas fa-angle-left text-dark"></i>Quay lại trang chủ</a></h5>
                    <div id="complete">
                        <p class="info">Quý khách đã đặt hàng thành công!</p>
                        <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
                        <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
                        <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
                        <p>• Trụ sở chính: Đại học Công nghệ thông tin - Đại học Quốc gia TPHCM</p>
                        <p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
                    </div>
                </div>          
            </div>
        </div>
    </div>
</section>

 @stop