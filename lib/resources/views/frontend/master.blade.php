<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{asset('public/asset/frontend')}}/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HNL Store - @yield('title')</title>
    <link rel="icon" type="image/png" href="./HNLfavicon.png"/>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

     <!-- Fancy Box -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="./css/header-footer.css">
    @yield('css')
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark header p-0">
            <div class="container">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse row" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <div class="col-sm-2 text-center d-inline-block">
                            <a class="navbar-brand brand" href="{{asset('/')}}"><img src="./HNLlogo.PNG" alt="HNL Mobile Store"></a>
                        </div>

                        <div class="col-sm-7 d-flex align-items-center flex-column">
                            <form method="get" role="search" action="{{asset('search/')}}" class="form-inline my-2 my-lg-0 d-flex w-75 m-auto">
                              <input name="result" class="form-control mr-sm-2 input-search shadow-none border-white" type="search" placeholder="Bạn cần tìm gì?" aria-label="Search" id="key_search">
                              <button class="btn my-2 my-sm-0 btn-search shadow-none" name="submit" type="submit" id="search"><i class="fas fa-search"></i></button>
                              {{csrf_field()}}
                            </form>
                            <div id="box" class="position-relative" style="width: 75%"></div>
                        </div>

                        <div class="col-sm-3">
                            <ul class="navbar-nav d-flex align-items-center justify-content-center">
                              <li class="nav-item active d-flex align-items-center">
                                <a href="#" class="nav-link d-flex align-items-center">
                                    <i class="fas fa-phone p-2"></i>
                                    <div class="navbar-decription">
                                        <p>Gọi mua hàng</p>
                                        <p>1800.2070</p>
                                    </div>
                                </a>
                              </li>
                             
                              <li class="nav-item">
                                <a href="{{asset('cart/show')}}" class="nav-link d-flex align-items-center">
                                    <span style="position: absolute; top: 25px; right: 258px; font-size: 13px; color: #fff;" class="amount">{{Cart::count()}}</span>
                                    <i style="font-size: 28px;" class="fas fa-shopping-bag p-2"></i>
                                    <div class="navbar-decription">
                                        <p>Giỏ hàng</p>
                                    </div>
                                </a>
                              </li>
                            </ul>
                        </div>
                    </div>
              </div>
          </div>
        </nav>
    </header>
    @yield('content')

    <footer>
        <div class="end">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="end-box">
                            <h3>SẢN PHẨM</h3>
                            <ul>
                                <li><a href="category.html">Sản phẩm nổi bật</a></li>
                                <li><a href="#">IPHONE</a></li>
                                <li><a href="#">SAMSUNG</a></li>
                                <li><a href="#">SONY</a></li>
                                <li><a href="#">VSMART</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="end-box">
                            <h3>KHÁCH HÀNG</h3>
                            <ul>
                                <li><a href="cart.html">Giỏ hàng</a></li>
                                <li><a href="#">Yêu thích</a></li>
                                <li><a href="#">Thanh toán</a></li>
                                <li><a href="#">Phản hồi</a></li>
                                <li><a href="user.html">Thông tin khách hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="end-box">
                            <h3>THÔNG TIN LIÊN HỆ</h3>
                            <ul>
                                <li>
                                    <a href=""><i class="fas fa-map-marker-alt"></i>
                                    Đại học Công Nghệ Thông Tin ĐHQG TP.HCM</a>
                                </li>
                                <li>
                                    <a href=""><i class="fas fa-envelope"></i>
                                    19521734@gm.uit.edu.vn - Bùi Đức Lâm</a>
                                </li>
                                <li>
                                    <a href=""><i class="fas fa-envelope"></i>
                                    19521521@gm.uit.edu.vn - Trần Tuy Hòa</a>
                                </li>
                                <li>
                                    <a href=""><i class="fas fa-envelope"></i>
                                    19521870@gm.uit.edu.vn - Nguyễn Đỗ Trung Nam</a>
                                </li>
                                <li>
                                    <ul class="facebook">
                                        <li><a href="https://www.facebook.com/buiduclamm/"><i
                                                    class="fab fa-facebook-square"></i>
                                                Bùi Đức Lâm</a></li>
                                        <li><a href="https://www.facebook.com/hoa.trantuy"><i
                                                    class="fab fa-facebook-square"></i>
                                                Trần Tuy Hòa</a></li>
                                        <li><a href="https://www.facebook.com/trungnam07day"><i
                                                    class="fab fa-facebook-square"></i>
                                                Nguyễn Đỗ Trung Nam</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="zalo-contact">
                <div class="zalo-chat-widget" data-oaid="4402747950085589343" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>

                <script src="https://sp.zalo.me/plugins/sdk.js"></script>
            </div>
        </div>
        <div class="angle-up">
            <i class="fas fa-angle-up angle-up__icon d-none"></i>
        </div>
    </footer>
    <div class="over-sreen"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
     <!-- Fancy Box -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <!--  -->
    <script>
        $(document).ready(function() {
            $(document).click(function (e) {
                $(".dropdown-menu").hide();

                if ($(e.target).is("#key_search") === false) {
                  $(".over-sreen").removeClass("active");
                }
            })

            $('#key_search').keyup(function(event) {
              var query = $(this).val();
              // alert(query); 
              // console.log(query);
              if (query != '' || query == 0) {
                  var _token = $('input[name="_token"]').val();

                  $.ajax({    
                      url:"{{url('auto_search')}}",
                      method: "POST",
                      // dataType: "JSON",
                      data: {_token: _token, query: query},
                      success: function(response) {
                          console.log(response);
                          if (response != '<ul class="dropdown-menu" style="display: block; margin: 0; border-radius: 0; background: #fff; width: 100%; padding: 3px 12px;"></ul>') {
                              $('#box').fadeIn();
                              $('#box').html(response);
                          } else {
                              $('#box').fadeIn();
                              $('#box').html('<ul class="dropdown-menu" style="display: block; width: 100%; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px; transform: translateY(-1px);"><li class="li_search" style="padding: 4px 10px; font-weight: 400;">Không tìm thấy sản phẩm</li></ul>');
                          }
                      }
                  })
              }
            });

            $('#key_search').click(function(event) {
                $('.over-sreen').addClass('active');
            });


            @yield('jquery')
        });
        
        @yield('javascript')
    </script>
</body>

</html>