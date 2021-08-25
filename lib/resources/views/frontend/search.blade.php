@extends('frontend.master')
@section('title','Sản phẩm tìm kiếm')
@section('content')

<section>
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
                                <a href="" title="" class="text-danger">Tìm kiếm với từ khóa <span>{{$keyword}}</span></a>
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
                                                <b>{{$item->prod_price}}</b>
                                            </div>
                                        </a>
                                        <div class="ratingresult">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>39 đánh giá</span>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

@section('javascript')
<script src="js/search.js"></script>
@endsection

@stop