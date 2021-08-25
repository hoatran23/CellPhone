@extends('frontend.master')
@section('title','Trang chủ')
@section('content')
<!-- Sidebar, slide, banner right -->
<section>
    <div class="banner mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <ul class="list-unstyled bg-white" style="margin-bottom: 0">
                        @foreach($categories as $cate)
                        <li class="menu-item">
                            @if($cate->cate_status)
                            <a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}" class="d-flex align-items-center text-decoration-none">
                                <i class="fas fa-mobile-alt text-dark p-2"></i>
                                <div class="banner-decription">
                                    <p class="m-0 text-dark">{{$cate->cate_name}}</p>
                                </div>
                            </a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-sm-7 p-0 bg-white">
                    <div style="--swiper-navigation-color: #000; --swiper-pagination-color: #fff"
                    class="swiper-container mySwiper2">
                    <div class="swiper-wrapper">
                        @foreach($listSlider as $slide)
                        @if($slide->slider_status == 1)   
                        <div class="swiper-slide header-slide">
                            <img src="{{asset('lib/storage/app/slider/'.$slide->slider_image)}}" />
                        </div>
                        @endif
                        @endforeach
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

                <div thumbsSlider="" class="swiper-container mySwiper p-0">
                    <div class="swiper-wrapper">
                        @foreach($listSlider as $slide)
                        <div class="swiper-slide header-slide-sub">
                            <a href="{{asset('category/1/iphone.html')}}" class="text-dark" style="font-size: 14px;">
                                <!-- <p class="m-0">{{$slide->slider_desc}}</p> -->
                                {!!$slide->slider_desc!!}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <a href="{{asset('category/1/iphone.html')}}">
                    <div class="row banner-item__right">
                        <img src="img/banner/banner_right.webp" alt="">
                    </div>
                </a>

                <a href="{{asset('category/1/iphone.html')}}">
                    <div class="row banner-item__right">
                        <img src="img/banner/banner_right_1.webp" alt="">
                    </div>
                </a>

                <a href="{{asset('category/1/iphone.html')}}">
                    <div class="row banner-item__right">
                        <img src="img/banner/banner_right_2.webp" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- side covid -->
<section>
    <div class="container">
        <div class="col-sm-12">
            <a href="{{asset('category/1/iphone.html')}}">
                <div class="row">
                    <img src="./img/covid.webp" alt="">
                </div>
            </a>
        </div>
    </div>
</section>
<!-- Khuyến mãi hot nhất -->
<section>
    <div class="product mt-3 mb-3">
        <div class="container">
            <div class="product__item">
                <div class="product__item-title">
                    <h3>Khuyến Mãi Hot Nhất</h3>
                </div>

                <div class="swiper-container product-slide">
                    <div class="swiper-wrapper" id="product-hot">
                        @foreach($hot as $item)
                        @if($item->prod_status == 1) 
                        <div class="swiper-slide">
                            <div class="product__custom bg-white text-center">
                                <div class="product__custom-content">
                                    <div class="product-img">
                                        <img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}"
                                        class="lazy mt-3 mb-3" alt="iPhone 12 Pro Max 128GB" />
                                    </div>
                                    <div class="product-btns">
                                        <a href="{{asset('cart/add/'.$item->prod_id)}}" class="btn-cart"> Thêm vào giỏ <br>
                                            <span><i class="fas fa-plus"></i></span>
                                        </a>
                                        <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="btn-buy"> Xem ngay <br>
                                            <span><i class="fas fa-shopping-cart"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}">
                                    <div class="title">
                                        <h3 class="m-0">{{$item->prod_name}}</h3>
                                    </div>
                                    <div class="price">
                                        <b>{{number_format($item->prod_price,0,',','.')}}</b>
                                    </div>
                                </a>
                                <div class="ratingresult">
                                    @for($i = 0; $i < 5; $i++)
                                    @if($item->prod_rating == 0)
                                    <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                                    @else
                                    @if($i < $item->prod_rating)
                                    <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                                    @else
                                    <i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
                                    @endif
                                    @endif
                                    @endfor
                                    <span>{{$item->prod_vote_amount}} đánh giá</span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="swiper-slide">
                            <div class="product__custom bg-white text-center">
                                <div class="product__custom-content">
                                    <div class="product-img">
                                        <img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}"
                                        class="lazy mt-3 mb-3" alt="iPhone 12 Pro Max 128GB" />
                                    </div>
                                    <div class="product-btns">
                                        <a href="{{asset('cart/add/'.$item->prod_id)}}" class="btn-cart"> Thêm vào giỏ <br>
                                            <span><i class="fas fa-plus"></i></span>
                                        </a>
                                        <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="btn-buy"> Xem ngay <br>
                                            <span><i class="fas fa-shopping-cart"></i></span>
                                        </a>
                                    </div>
                                </div>
                                <a href="detail.html">
                                    <div class="title">
                                        <h3 class="m-0">{{$item->prod_name}}</h3>
                                    </div>
                                    <div class="price">
                                        <b>Hết hàng</b>
                                    </div>
                                </a>
                                <div class="ratingresult">
                                    @for($i = 0; $i < 5; $i++)
                                    @if($item->prod_rating == 0)
                                    <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                                    @else
                                    @if($i < $item->prod_rating)
                                    <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                                    @else
                                    <i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
                                    @endif
                                    @endif
                                    @endfor
                                    <span>{{$item->prod_vote_amount}} đánh giá</span>
                                </div>
                            </div>
                        </div>          
                        @endif
                        @endforeach        
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sản phẩm mới về -->
<section>
    <div class="category-tab mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="category-title">
                        <h3>Sản phẩm mới nhất</h3>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap product__custom-lists" id="product-new">
                @foreach($new as $item)
                @if($item->prod_status == 1) 
                <div class="product__custom-list bg-white text-center">
                    <div class="product__custom bg-white text-center">
                        <div class="product__custom-content">
                            <div class="product-img">
                                <img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}"
                                class="lazy mt-3 mb-3" alt="iPhone 12 Pro Max 128GB" />
                            </div>
                            <div class="product-btns">
                                <a href="{{asset('cart/add/'.$item->prod_id)}}" class="btn-cart"> Thêm vào giỏ <br>
                                    <span><i class="fas fa-plus"></i></span>
                                </a>
                                <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="btn-buy"> Xem ngay <br>
                                    <span><i class="fas fa-shopping-cart"></i></span>
                                </a>
                            </div>
                        </div>
                        <a href="detail.html">
                            <div class="title">
                                <h3 class="m-0">{{$item->prod_name}}</h3>
                            </div>
                            <div class="price">
                                <b>{{number_format($item->prod_price,0,',','.')}}</b>
                            </div>
                        </a>
                        <div class="ratingresult">
                            @for($i = 0; $i < 5; $i++)
                            @if($item->prod_rating == 0)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            @if($i < $item->prod_rating)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            <i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
                            @endif
                            @endif
                            @endfor
                            <span>{{$item->prod_vote_amount}} đánh giá</span>
                        </div>
                    </div>
                </div>
                @else 
                <div class="product__custom-list bg-white text-center">
                    <div class="product__custom bg-white text-center">
                        <div class="product__custom-content">
                            <div class="product-img">
                                <img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}"
                                class="lazy mt-3 mb-3" alt="iPhone 12 Pro Max 128GB" />
                            </div>
                            <div class="product-btns">
                                <a href="{{asset('cart/add/'.$item->prod_id)}}" class="btn-cart"> Thêm vào giỏ <br>
                                    <span><i class="fas fa-plus"></i></span>
                                </a>
                                <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="btn-buy"> Xem ngay <br>
                                    <span><i class="fas fa-shopping-cart"></i></span>
                                </a>
                            </div>
                        </div>
                        <a href="detail.html">
                            <div class="title">
                                <h3 class="m-0">{{$item->prod_name}}</h3>
                            </div>
                            <div class="price">
                                <b>Hết hàng</b>
                            </div>
                        </a>
                        <div class="ratingresult">
                            @for($i = 0; $i < 5; $i++)
                            @if($item->prod_rating == 0)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            @if($i < $item->prod_rating)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            <i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
                            @endif
                            @endif
                            @endfor
                            <span>{{$item->prod_vote_amount}} đánh giá</span>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="pagination">
                   <div class="pagination-wrap mb-0">
                    {{$new->appends(['all_product' => $all->currentPage()])->links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Danh mục các loại sản phẩm -->
<section>
    <div class="category-tab mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="category-title">
                        <h3>Danh mục các loại sản phẩm</h3>
                    </div>
                </div>

                <div class="col-sm-8">
                    <ul class="nav nav-tabs nav-category">
                        <li class="filter active"><a href="#">Tất cả sản phẩm</a></li>
                        @foreach($categories as $cate)
                        @if($cate->cate_status)
                        <li class="filter">
                            <a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class=" d-flex flex-wrap product__custom-lists" id="productss">
                @foreach($all as $item)
                @if($item->prod_status == 1) 
                <div class="product__custom-list bg-white text-center">
                    <div class="product__custom bg-white text-center">
                        <div class="product__custom-content">
                            <div class="product-img">
                                <img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}"
                                class="lazy mt-3 mb-3" alt="iPhone 12 Pro Max 128GB" />
                            </div>
                            <div class="product-btns">
                                <a href="{{asset('cart/add/'.$item->prod_id)}}" class="btn-cart"> Thêm vào giỏ <br>
                                    <span><i class="fas fa-plus"></i></span>
                                </a>
                                <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="btn-buy"> Xem ngay <br>
                                    <span><i class="fas fa-shopping-cart"></i></span>
                                </a>
                            </div>
                        </div>
                        <a href="detail.html">
                            <div class="title">
                                <h3 class="m-0">{{$item->prod_name}}</h3>
                            </div>
                            <div class="price">
                                <b>{{number_format($item->prod_price,0,',','.')}}</b>
                            </div>
                        </a>
                        <div class="ratingresult">
                            @for($i = 0; $i < 5; $i++)
                            @if($item->prod_rating == 0)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            @if($i < $item->prod_rating)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            <i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
                            @endif
                            @endif
                            @endfor
                            <span>{{$item->prod_vote_amount}} đánh giá</span>
                        </div>
                    </div>
                </div>
                @else
                <div class="product__custom-list bg-white text-center">
                    <div class="product__custom bg-white text-center">
                        <div class="product__custom-content">
                            <div class="product-img">
                                <img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}"
                                class="lazy mt-3 mb-3" alt="iPhone 12 Pro Max 128GB" />
                            </div>
                            <div class="product-btns">
                                <a href="{{asset('cart/add/'.$item->prod_id)}}" class="btn-cart"> Thêm vào giỏ <br>
                                    <span><i class="fas fa-plus"></i></span>
                                </a>
                                <a href="{{asset('detail/'.$item->prod_id.'/'.$item->prod_slug.'.html')}}" class="btn-buy"> Xem ngay <br>
                                    <span><i class="fas fa-shopping-cart"></i></span>
                                </a>
                            </div>
                        </div>
                        <a href="detail.html">
                            <div class="title">
                                <h3 class="m-0">{{$item->prod_name}}</h3>
                            </div>
                            <div class="price">
                                <b>Hết hàng</b>
                            </div>
                        </a>
                        <div class="ratingresult">
                            @for($i = 0; $i < 5; $i++)
                            @if($item->prod_rating == 0)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            @if($i < $item->prod_rating)
                            <i class="fas fa-star" style="color: orange; font-size: 15px"></i>
                            @else
                            <i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
                            @endif
                            @endif
                            @endfor
                            <span>{{$item->prod_vote_amount}} đánh giá</span>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="pagination">
                   <div class="pagination-wrap mb-0">
                    {{$all->appends(['new_product' => $new->currentPage()])->links('vendor.pagination.custom')}}
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@stop