@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('content')
@section('jquery')
	$('.general_info-image a').fancybox();

	$(function(){
		let listStart = $('.rating-start .fas');

		listRatingText = {
			1 : 'Không thích',
			2 : 'Tạm được',
			3 : 'Bình thường',
			4 : 'Rất tốt',
			5 : 'Tuyệt vời quá'
		}


		listStart.mouseover(function() {
			let $this = $(this);
			let number = $this.attr('data-key');

			listStart.removeClass('rating_active');
			$.each(listStart, function(key, value) {
				if(key + 1 <= number) {
					$(this).addClass('rating_active');
				}
			});

			$('.rating-start_text').text('').text(listRatingText[number]).show();
			<!-- console.log($this.attr('data-key')); -->
		});
	});

	$('#btn-rating').click(function(){
		var _token = $('input[name="_token"]').val();
		var vote = $('input[name="ratings"]:checked').val();
		var comment = $('#comment').val();
		var nickname = $('#nickname').val();
		var numberphone = $('#numberphone').val();
		var email = $('#email').val();
		var prod_id = $('input[name="ratings"]:checked').data('prod-id');
		<!-- alert(vote); -->
		if (nickname && numberphone && email) {
			$.ajax({
				url:"{{url('/insert_rating')}}",
				method: "POST",
				dataType: "JSON",
				data: {vote: vote, comment: comment, nickname: nickname, numberphone: numberphone, email: email, prod_id: prod_id, _token: _token},
				success: function(data) {
					if (data == 'done') {
						alert('Bạn đã đánh giá sản phẩm thành công');
						location.reload();
					}
					else {
						alert('Đánh giá sản phẩm thất bại');
					}
				}
			})
		} else if (vote == undefined) {
			<!-- alert('Vui lòng chọn số sao đánh giá!!!'); -->
			$('.noti').html('<p style="color: #dc3545; font-weight: 500" class="text-center">Vui lòng chọn số sao đánh giá!!!</p>');
		} else {
			$('.noti').html('<p style="color: #dc3545; font-weight: 500" class="text-center">Vui lòng điền đầy đủ vào các trường!!!</p>');
		}
	});

	$(function(){
		$('.rating-form').slideUp(); 

		$('.sentRating').click(function(event) {
			$('.rating-form').slideToggle();
			<!-- $('.sentRating').innerText() -->
			$(".sentRating").fadeOut(function () {
	            $(".sentRating").text(($(".sentRating").text() == 'Gửi đánh giá của bạn') ? 'Đóng' : 'Gửi đánh giá của bạn').fadeIn();
	        })
		});
	})

	$(".toggle_btn_descrip").click(function () {
		$(this).toggleClass("active");
		$(".wrapper_descrip .descrip").toggleClass("active");

		if ($(".toggle_btn_descrip").hasClass("active")) {
			$(".toggle_text").text("Ẩn bớt");
		}
		else {
			$(".toggle_text").text("Xem thêm");
		}
	});
@endsection

@section('css')
<style>
	.wrapper_descrip .toggle_btn_descrip.active .fas {
        transform: rotate(180deg);
    }

    .wrapper_descrip .descrip {
        height: 530px;
        overflow: hidden;
		transition: height 5s;
    }

    .wrapper_descrip .descrip.active {
    	transition: ease-out 0.5s;
        height: auto;
    }

    .wrapper_descrip .descrip p {
        margin-bottom: 5px;
        list-style: none;
        position: relative;
    }

    .wrapper_descrip .descrip p:before {
        content: "";
        position: absolute;
        top: 8px;
        left: -12px;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: #bfbfbf;
    }

    .wrapper_descrip .toggle_btn_descrip {
    	position: relative;
		padding-top: 50px;
        margin-top: -45px;
        font-weight: 700;
        color: #ff406c;
        cursor: pointer;
        font-size: 15px;
		text-align: center;
		background: linear-gradient(to bottom,rgba(255,255,255,0) 0%,rgba(255,255,255,0.91) 50%,#fff 55%);
    }

    .toggle_btn_descrip.active {
    	margin: 0;
    	padding: 18px;
    }
</style>
@endsection

<section class="main bg-white pt-3 pb-3">
	<div class="container">
		<div class="row">
			<h3 class="p-3 border-bottom">{{$item->prod_name}} - 
				@for($i = 0; $i < 5; $i++)
					@if( $rating_round == 0)
						<i class="fas fa-star" style="color: orange; font-size: 15px"></i>
					@else
						@if($i < $rating_round)
							<i class="fas fa-star" style="color: orange; font-size: 15px"></i>
						@else
							<i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
						@endif
					@endif
				@endfor
			<span style="font-size: 15px; color: #d70018">{{$length_rate}} đánh giá</span></h3>
			<div class="col-sm-9">
				<div class="general_info d-flex mb-3">
					<div class="general_info-image d-flex flex-column align-items-center" style="width: 50%;">
						<div class="mb-3" style="width: 100%; border: 1px solid #dee2e6; text-align: center; padding: 20px 0">
							<a data-fancybox="gallery" href="{{asset('lib/storage/app/image/'.$item->prod_img)}}"><img src="{{asset('lib/storage/app/image/'.$item->prod_img)}}" width="380px" class="extra-img" alt=""></a>
						</div>

		            	<div class="swiper-container product_detail_slide shadow-none text-center">
		                    <div class="swiper-wrapper" id="product-detail-image">
		                    	@foreach($listImage as $img)
		                    	<div class="swiper-slide w-0 d-inline-block">
					            	<a data-fancybox="gallery" href="{{asset('lib/storage/app/image_detail/'.$img->prod_sub_img)}}"><img src="{{asset('lib/storage/app/image_detail/'.$img->prod_sub_img)}}" width="110px" class="extra-img" style="border: 1px solid #dee2e6" alt=""></a>
					            </div>
					            @endforeach
		                    </div>
		                    <div class="swiper-button-next"></div>
		                    <div class="swiper-button-prev"></div>
		                </div>
					</div>
					<div class="general_info-content d-flex flex-column justify-content-center" style="width: 50%; margin-left: 30px">
						<p><b>Giá:</b> <span class="price">{{number_format($item->prod_price,0,',','.')}}</span></p>
                        <p><b>Bảo hành:</b>  {{$item->prod_warranty}}</p> 
                        <p><b>Hộp bao gồm:</b> {{$item->prod_accessories}}</p>
                        <p><b>Tình trạng:</b> {{$item->prod_condition}}</p>
                        <p><b>Khuyến mại:</b> {{$item->prod_promotion}}</p>
                        <p><b>Trạng thái:</b> @if ($item->prod_status==1) Còn Hàng @else Hết Hàng @endif</p>
                        <a href="{{asset('cart/add/'.$item->prod_id)}}"><p class="general_info-content-buy text-center">ĐẶT HÀNG ONLINE NGAY</p></a>
					</div>
				</div>

				<div class="introduce_info mt-3 mb-3" style="border-top: 1px solid #eee;">
					<!-- <h3>Chi tiết sản phẩm</h3> -->
					
					<div class="wrapper_descrip m-0 mt-3">
                        <!-- <h3>Chi tiết sản phẩm</h3> -->
                        <div class="text-justify descrip position-relative">{!! $item->prod_desciption !!}</div>
                        <div class="toggle_btn_descrip">
                            <span class="toggle_text">Xem thêm</span> <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </div>
                    </div>
				</div>

				<div class="rating mt-3 mb-3">
					<div class="rating-title mt-3 mb-3">
						<h3>Đánh giá sản phẩm {{$item->prod_name}}</h3>
					</div>
					<div class="row rating-main">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-sm-3 rating-core_avg">
						            <h3>SAO TRUNG BÌNH</h3>
						            <p class="averageRatings" style="margin-bottom: 8px;">{{$rating_round}} <i class="fa fa-star checked" style="font-size:40px"></i>
						            </p>
						            <p style="font-weight: 500;">{{$length_rate}} đánh giá</p>
						        </div>
						        <div class="col-sm-6 rating-statistic">
						            <div class="rating-statistic_row">
						                <div class="side side-left">
						                    <div>5 <i style="color: orange;" class="fa fa-star checked"></i></div>
						                </div>
						                <div class="middle">
						                    <div class="bar-container">
						                        <div class="bar bar-5" style="width: {{$percent_five_star}}%;"></div>
						                    </div>
						                </div>
						                <div class="side side-right">
						                    <div>{{$five_star}} đánh giá</div>
						                </div>
						            </div>

						            <div class="rating-statistic_row">
						                <div class="side side-left">
						                    <div>4 <i style="color: orange;" class="fa fa-star checked"></i></div>
						                </div>
						                <div class="middle">
						                    <div class="bar-container">
						                        <div class="bar bar-4" style="width: {{$percent_four_star}}%;"></div>
						                    </div>
						                </div>
						                <div class="side side-right">
						                    <div>{{$four_star}} đánh giá</div>
						                </div>
						            </div>

						            <div class="rating-statistic_row">
						                <div class="side side-left">
						                    <div>3 <i style="color: orange;" class="fa fa-star checked"></i></div>
						                </div>
						                <div class="middle">
						                    <div class="bar-container">
						                        <div class="bar bar-3" style="width: {{$percent_three_star}}%;"></div>
						                    </div>
						                </div>
						                <div class="side side-right">
						                    <div>{{$three_star}} đánh giá</div>
						                </div>
						            </div>

						            <div class="rating-statistic_row">
						                <div class="side side-left">
						                    <div>2 <i style="color: orange;" class="fa fa-star checked"></i></div>
						                </div>
						                <div class="middle">
						                    <div class="bar-container">
						                        <div class="bar bar-2" style="width: {{$percent_two_star}}%;"></div>
						                    </div>
						                </div>
						                <div class="side side-right">
						                    <div>{{$two_star}} đánh giá</div>
						                </div>
						            </div>

						            <div class="rating-statistic_row">
						                <div class="side side-left">
						                    <div>1 <i style="color: orange;" class="fa fa-star checked"></i></div>
						                </div>
						                <div class="middle">
						                    <div class="bar-container">
						                        <div class="bar bar-1" style="width: {{$percent_one_star}}%;"></div>
						                    </div>
						                </div>
						                <div class="side side-right">
						                    <div>{{$one_star}} đánh giá</div>
						                </div>
						            </div>						            
						        </div>
						        <div class="col-sm-3 rating-show-form">
						            <button class="btn btn-danger sentRating">Gửi đánh giá của bạn</button>
						        </div>
							</div>
						</div>

						<form action="" method="post" class="rating-form">
							@csrf
							<div class="rating-start pt-3 pb-3">
								<span><b>Vui lòng chọn đánh giá: </b></span>
			                    <label class="rate">
			                        <input type="radio" name="ratings"  data-prod-id="{{$prod_id}}" id="star1" value="1">
			                       	<i class="fas fa-star rate-icon" data-key="1"></i>
			                    </label>
			                    <label class="rate">
			                        <input type="radio" name="ratings"  data-prod-id="{{$prod_id}}" id="star2" value="2">
			                       	<i class="fas fa-star rate-icon" data-key="2"></i>
			                    </label>
			                    <label class="rate">
			                        <input type="radio" name="ratings"  data-prod-id="{{$prod_id}}" id="star3" value="3">
		                      		<i class="fas fa-star rate-icon" data-key="3"></i>
			                    </label>
			                    <label class="rate">
			                        <input type="radio" name="ratings"  data-prod-id="{{$prod_id}}" id="star4" value="4">
			                        <i class="fas fa-star rate-icon" data-key="4"></i>
			                    </label>
			                    <label class="rate">
			                        <input type="radio" name="ratings"  data-prod-id="{{$prod_id}}" id="star5" value="5">
			                        <i class="fas fa-star rate-icon" data-key="5"></i>
			                    </label>
			                    <span class="rating-start_text">Tốt</span>
							</div>
							<div class="rating-info mt-3 mb-3">
								<div class="row">
									<div class="col-md-6">
				                        <div class="form-group">
				                            <label class="pb-2 pt-2" style="font-weight: 500;" for="detail">Đánh giá:</label>
				                            <textarea class="form-control" rows="7" id="comment" name="comment"></textarea>
				                        </div>
				                        <div class="noti"></div>
				                    </div>
				                    <div class="col-md-6">
				                        <div class="form-group">
				                            <label class="pb-2 pt-2" style="font-weight: 500;" for="nickname">Họ và tên:</label>
				                            <input required type="text" class="form-control" id="nickname" name="nickname">
				                        </div>
				                        <div class="form-group">
				                            <label class="pb-2 pt-2" style="font-weight: 500;" for="phone">Số điện thoại:</label>
				                            <input required type="text" class="form-control" id="numberphone" name="numberphone">
				                        </div>
				                        <div class="form-group">
				                            <label class="pb-2 pt-2" style="font-weight: 500;" for="phone">Email:</label>
				                            <input required type="text" class="form-control" id="email" name="email">
				                        </div>

				                        <input class="form-control btn btn-danger mt-3" id="btn-rating" type="button" name="submit" value="Gửi đánh giá">
				                    </div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<div class="comment-display">
					@foreach ($comments_rate as $comment)
					<ul>
						<li class="com-title">
							{{$comment->rate_name}}
							<span class="time">{{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>	
						</li>
						<li class="com-details">
							@for($i = 0; $i < 5; $i++)
								@if($i < $comment->rate_vote)
									<i class="fas fa-star" style="color: orange;"></i>
								@else
									<i class="fas fa-star" style="color: #ccc;"></i>
								@endif
							@endfor

							{{$comment->rate_comment}}
							
						</li>
					</ul>
					@endforeach
				</div>

				<div class="comment mt-3 mb-3">
					<div class="comment-form">
						<h3>Hỏi và Đáp</h3>
						<form method="post" class="form-group">
							<div class="form-group">
                                <label style="font-weight: 500; margin: 10px 0;">Họ và tên <span class="text-danger">(*)</span></label><br>
                                <input required class="form-control" type="text" id="name" name="name" placeholder="Nhập vào họ và tên">
                            </div>
                            <div class="form-group">
                                <label style="font-weight: 500; margin: 10px 0;">Số điện thoại <span class="text-danger">(*)</span></label><br>
                                <input required class="form-control" type="text" id="phone" name="phone" placeholder="Nhập vào số điện thoại">
                            </div>
                            <div class="form-group">
                                <label style="font-weight: 500; margin: 10px 0;">Email <span class="text-danger">(*)</span></label><br>
                                <input required class="form-control" type="text" id="email" name="email" placeholder="Nhập vào địa chỉ email">
                            </div>
                            <div class="form-group">
                                <label style="font-weight: 500; margin: 10px 0;">Bình luận <span class="text-danger">(*)</span></label><br>
                                <textarea placeholder="Xin mời để lại câu hỏi, HNL Phones sẽ trả lời trong 1h từ 8h - 22h mỗi ngày." class="form-control" rows="9" cols="70" id="content" name="content"></textarea> 
                            </div>
							<div class="comment-btn_submit form-group">
								<button type="submit" class="btn btn-danger">Gửi</button>
							</div>
							{{csrf_field()}}
						</form>
					</div>

					<div class="comment-display">
						@foreach ($comments as $comment)
						<ul>
							<li class="com-title">
								{{$comment->com_name}}
								<span class="time">{{date('d/m/Y H:i',strtotime($comment->created_at))}}</span>	
							</li>
							<li class="com-details">
								{{$comment->com_content}}
							</li>
                            <div class="divid"></div>
						</ul>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="specify">
					<div>
						<h3>Thông số kỹ thuật</h3>
					</div>
					<div>
						<table class="table">
							<tr class="menu-item">
								<td>Kích thước màn hình</td>		
								<td>6.8 inches</td> 
							</tr>
							<tr class="menu-item">
								<td>Công nghệ màn hình</td>		
								<td>Dynamic AMOLED</td> 
							</tr>
							<tr class="menu-item">
								<td>Camera sau</td>		
								<td>- Ống kính chính góc rộng: 108MP, f/1.8 <br>
									- Ống kính zoom tiềm vọng: 10MP, zoom quang 10x <br>		
									- Cảm biến tele: 10MP, zoom quang 3x <br>
									- Cảm biến siêu rộng: 12MP, f/2.2 <br>
									- Cảm biến Laser AF <br>
								</td> 
							</tr>
							<tr class="menu-item">
								<td>Camera trước</td>		
								<td>40 MP, f/2.2</td>
							</tr>
							<tr class="menu-item">
								<td>Chipset	Exynos</td>		
								<td>2100 8 nhân</td>
							</tr>
							<tr class="menu-item">
								<td>Dung lượng RAM</td>		
								<td>12 GB</td>
							</tr>
							<tr class="menu-item">
								<td>Pin</td>		
								<td>
								- Dung lượng pin 5,000mAh <br>
								- Sạc nhanh có dây 25W <br>
								- Sạc nhanh không dây 15W <br>
								- Sạc ngược không dây 4.5W <br>
								</td> 
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop