@extends('frontend.master')
@section('title','Danh mục sản phẩm')
@section('content')

<!-- Khuyến mãi hot nhất -->
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
    <div class="category-list mt-3 mb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs">
                        @foreach($categories as $cate)
                            @if($cate->cate_status)
                                @if($cate->cate_name == $cateName->cate_name)
                                <li class="filter active">
                                    <a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a>
                                </li> 
                                @else 
                                <li class="filter ">
                                    <a href="{{asset('category/'.$cate->cate_id.'/'.$cate->cate_slug.'.html')}}">{{$cate->cate_name}}</a>
                                </li> 
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="category"> 
        <div class="container">
            <div class="row mt-3 mb-3">
                <div class="col-sm-12">
                    <ul>
                        <li class="home">
                                <a href="{{asset('/')}}" title="Go to Home Page" class="text-danger">Home</a>
                                <i class="fa fa-angle-right" style="margin-left: 8px;"></i>
                        </li>
                        <li class="category3">
                                <a href="" title="" class="text-danger">{{$cateName->cate_name}}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col-sm-12">
                    <div class="category-tab">
                        <div class="d-flex flex-wrap product__custom-lists">
                            @foreach($items as $item)
                            <div class="product__custom-list bg-white text-center product-counter">
                                <div class="product__custom bg-white text-center">
                                    <div class="product__custom-content">
                                        <div class="product-img">
                                            <img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}" class="lazy mt-3 mb-3"
                                                alt="iPhone 12 Pro Max 128GB" />
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div id="pagination" class="row text-center">
                 <div class="pagination-wrap col-lg-12 col-md-12">
                    {{$items->links('vendor.pagination.custom')}}
                  </div>
            </div>
        </div>
    </div>
</section>
@stop
 