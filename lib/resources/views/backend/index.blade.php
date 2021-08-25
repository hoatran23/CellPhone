@extends('backend.master')
@section('title', 'Trang Chủ')
@section('main')	

@section('javascript')
var bar = document.getElementById('bar_one');
bar.classList.add('active');
@endsection
<div class="content">
	<!-- Count -->
	<div class="row">
		<!-- Count Product -->
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-globe text-warning"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Product</p>
								<p class="card-title">{{$product_count}}<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Updated
					</div>
				</div>
			</div>
		</div>
		<!-- Count Comment -->
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-money-coins text-success"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Comment</p>
								<p class="card-title">{{$comment_count}}<p>
							</div>
						</div>
					</div>
				</div>	
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-calendar-o"></i>
						Last day
					</div>
				</div>
			</div>
		</div>
		<!-- Count User -->
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-vector text-danger"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">User</p>
								<p class="card-title">{{$user_count}}<p>
							</div>
						</div>
					</div>
				</div>	
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-clock-o"></i>
						In the last hour
					</div>
				</div>
			</div>
		</div>
		<!-- Count Category -->	
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="nc-icon nc-favourite-28 text-primary"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Category</p>
								<p class="card-title">{{$category_count}}<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Updated
					</div>
				</div>
			</div>
		</div>
		<!-- Count Order -->	
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="fas fa-receipt text-success"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Order</p>
								<p class="card-title">{{$order_count}}<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Updated
					</div>
				</div>
			</div>
		</div>
		<!-- Count Rating -->	
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="far fa-star text-danger"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Rating</p>
								<p class="card-title">{{$product_rating}}<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Updated
					</div>
				</div>
			</div>
		</div>
		<!-- Count Image -->	
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="far fa-images text-info"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Product Image</p>
								<p class="card-title">{{$product_image}}<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Updated
					</div>
				</div>
			</div>
		</div>
		<!-- Count Role -->	
		<div class="col-lg-3 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-body ">
					<div class="row">
						<div class="col-5 col-md-4">
							<div class="icon-big text-center icon-warning">
								<i class="fas fa-users text-warning"></i>
							</div>
						</div>
						<div class="col-7 col-md-8">
							<div class="numbers">
								<p class="card-category">Role User</p>
								<p class="card-title">{{$role_user}}<p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer ">
					<hr>
					<div class="stats">
						<i class="fa fa-refresh"></i>
						Updated
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Count -->

	<!-- Thống kê tổng quát -->
	<div class="row" style="margin-top: 20px;">
		<div class="col-sm-12 d-flex justify-content-center mb-3">
			<div class="col-sm-6 col-sm-offset-3 text-center">
				<h4 style="text-align: center;">Thống Kê Tổng Quát</h4>
				<div id="pie-chart"></div>
			</div>
		</div>
	</div>
	<!-- Thống kê doanh số -->
	<div class="row" style="margin-left: 1px; margin-top: 20px;">
		<div class="col-sm-12">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title text-center">Thống kê doanh số</h4>
				</div>
				<div class="card-body">
					<div class="bootstrap-table">
						<form action="" method="post" autocomplete="off">
							@csrf
							<div class="d-flex justify-content-center">
								<div class="form-group col-sm-3">
									<label for="">Từ ngày:</label>
									<input type="text" id="datepicker" class="form-control" placeholder="Input Date" name="from_date">
								</div>
								<div class="form-group col-sm-3">
									<label for="">Đến ngày:</label>
									<input type="text" id="datepicker2" class="form-control" placeholder="Input Date" name="to_date">
								</div>
								<div class="form-group col-sm-2">
									<label for="" class="d-block">Theo: </label>
									<select name="time" id="select_val" class="select_val form-control">
										<option value="">-- Chọn</option>
										<option value="tuanqua">Tuần qua</option>
										<option value="thangtruoc">Tháng trước</option>
										<option value="thangnay">Tháng này</option>
										<option value="365ngayqua">365 ngày qua</option>
									</select>
								</div>
								<div class="form-group col-sm-2	">
									<label for=""></label>
									<input class="form-control" id="btn-dashboard" type="button" name="submit" value="Lọc kết quả">
								</div>
							</div>
						</form>
						<div id="myfirstchart" style="height: 250px;"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Thống kê bình luận-->
	<div class="row" style="margin-left: 1px; margin-top: 20px;">
		<div class="col-sm-12">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title text-center">Thống kê bình luận</h4>
				</div>
				<div class="card-body">
					<div class="bootstrap-table">
						<table class="table table-bordered">
							<thead>
								<tr class="text-center bg-success text-white">
									<th class="border-right">STT</th>
									<th class="border-right">Email</th>
									<th class="border-right" style="width: 100%;">Nội dung</th>
								</tr>
							</thead>
							<tbody>
								@foreach($comment as $com)
								<tr class="text-center">
									<td>{{$loop->index + 1}}</td>
									<td >{{$com->com_email}}</td>
									@foreach($product as $pro) 
									@if($pro->prod_id == $com->com_product)
									<td><a href="{{asset('detail/'.$com->com_product.'/'.$pro->prod_slug.'.html')}}">{{$com->com_content}}</a></td>
									@endif
									@endforeach
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div id="pagination" class="text-center text-primary">
						<div class="pagination-wrap">
							{{$comment->appends(['product_rate' => $product_rate->currentPage()])->links('vendor.pagination.bootstrap-4')}}
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Thống kê đánh giá-->
	<div class="row" style="margin-left: 1px; margin-top: 20px;">
		<div class="col-sm-12">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title text-center">Thống kê đánh giá</h4>
				</div>
				<div class="card-body">
					<div class="bootstrap-table">
						<table class="table table-bordered">
							<thead>
								<tr class="text-center bg-success text-white">
									<th class="border-right">STT</th>
									<th class="border-right">Tên sản phẩm</th>
									<th class="border-right">Số sao trung bình</th>
									<th class="border-right">Lượt đánh giá</th>
								</tr>
							</thead>
							<tbody>
								@foreach($product_rate as $pro)
								<tr class="text-center">
									<td>{{$loop->index + 1}}</td>
									<td>
										<a href="{{asset('detail/'.$pro->prod_id.'/'.$pro->prod_slug.'.html')}}">{{$pro->prod_name}}</a>
									</td>
									<td>
										@for($i = 0; $i < 5; $i++)
										@if($i < $pro->prod_rating)
										<i class="fas fa-star" style="color: orange; font-size: 15px"></i>
										@else
										<i class="fas fa-star" style="color: #ccc; font-size: 15px"></i>
										@endif
										@endfor
									</td>
									<td>{{$pro->prod_vote_amount}} đánh giá</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div id="pagination" class="text-center text-primary">
						<div class="pagination-wrap">
							{{$product_rate->appends(['comment' => $comment->currentPage()])->links('vendor.pagination.bootstrap-4')}}
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>

@section('jquery')
<!-- $(document).ready(function() { -->

$( function() {
	$( "#datepicker" ).datepicker({
		prevText: 'Month Previous',
		nextText: 'Month After',
		dateFormat: "yy-mm-dd"
	});
});

$( function() {
	$( "#datepicker2" ).datepicker({
		prevText: 'Month Previous',
		nextText: 'Month After',
		dateFormat: "yy-mm-dd"
	});
});

Morris.Donut({
	element: 'pie-chart',
	colors: ['#fcc468','#6bd098', '#f7452e', '#52cbce', '#a8adb3'],
	data: [
		{label: "Product", value: {{$product_count}}},
		{label: "Comment", value: {{$comment_count}}},
		{label: "User", value: {{$user_count}}},
		{label: "Category", value: {{$category_count}}},
		{label: "Order", value: {{$order_count}}},
		{label: "Rating", value: {{$product_rating}}},
		{label: "Product Image", value: {{$product_image}}},
		{label: "Role User", value: {{$role_user}}},
	]
});

chart30daysorder();
	var chart = new Morris.Area({
	element: 'myfirstchart',
	lineColors:['#fcc468','#6bd098'],
	labels: ['Total Income', 'Total Profit'],
	hideHover: 'auto',
	parseTime: false,
	fillOpacity: 0.6,
	behaveLikeLine: true,
	resize: true,
	pointFillColors:['#ffffff'],
	pointStrokeColors: ['black'],
	xkey: 'date',
	ykeys: ['total', 'profit'],
});

function chart30daysorder() {
	var _token = $('input[name="_token"]').val();

	$.ajax({
		url:"{{url('/admin/order_date')}}",
		method: "POST",
		dataType: "JSON",
		data: {_token: _token},
		success: function(data) {
			chart.setData(data);
		},error:function(){ 
			alert("error!!!!");
		}
	})
}

$('#btn-dashboard').click(function(){
	var _token = $('input[name="_token"]').val();
	var from_date = $('#datepicker').val();
	var to_date = $('#datepicker2').val();

	$.ajax({
		url:"{{url('/admin/fillter')}}",
		method: "POST",
		dataType: "JSON",
		data: {from_date: from_date, to_date: to_date, _token: _token},
		success: function(data) {
			chart.setData(data);
		},error:function(){ 
			console.log("error!!!!");
		}
	})
});

$('.select_val').change(function() {
	var btn_value = $(this).val();
	var _token = $('input[name="_token"]').val();

	$.ajax({
		url:"{{url('/admin/fillter_select')}}",
		method: "POST",
		dataType: "JSON",
		data: {btn_value: btn_value, _token: _token},
		success: function(data) {
			chart.setData(data);
		}
	})
});
<!-- }) -->
@endsection
@stop