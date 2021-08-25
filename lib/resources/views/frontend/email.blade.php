@extends('frontend.master')
@section('title','Thông báo đơn hàng')
@section('content')

<section>
    <div class="container">
		<div class="user row bg-white mt-3 mb-3">
			<div class="col-sm-8 offset-2">
				<div class="user-info mt-3">
                    <h1 class="">Thông tin khách hàng</h1>
                    <div class="info">
						<strong>Khách hàng: </strong>
						{{$info['name']}}
					</div>
					<div class="info">
						<strong>Email: </strong>
						{{$info['email']}}
					</div>
					<div class="info">
						<strong>Điện thoại: </strong>
						{{$info['phone']}}
					</div>
					<div class="info">
						<strong>Địa chỉ: </strong>
						{{$info['add']}}
					</div>
                </div>	
               
                <div class="user-cart" style="padding: 20px 0;">
					<h1>Hóa đơn mua hàng</h1>							
					<table class="table">
						<tr style="font-weight: bold;">
							<td width="30%">Tên sản phẩm</td>
							<td width="25%">Giá</td>
							<td width="10%">Số lượng</td>
							<td width="20%">Thành tiền</td>
						</tr>
						@foreach($cart as $item)
						<tr>
							<td>{{$item->name}}</td>
							<td class="price">{{number_format($item->price)}} VNĐ</td>
							<td class="price">{{$item->qty}}</td>
							<td class="price">{{number_format($item->price*$item->qty,0,',','.')}} VNĐ</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="4">Tổng tiền:</td>
							<td class="total-price">{{$total}} VNĐ</td>
						</tr>
					</table>
				</div>
				<div class="mb-4">
                    <h2>Quý khách đã đặt hàng thành công!</h2>
                    <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br/>
                    • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.</p>
                    <h3>Cám ơn quý khách đã sử dụng sản phẩm của công ty chúng tôi!</h3>
				</div>				
			</div>
		</div>
    </div>
</section>

@stop