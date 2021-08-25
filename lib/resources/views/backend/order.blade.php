@extends('backend.master')
@section('title', 'Danh Sách Đơn Hàng Chờ Xác Nhận')
@section('main')

@section('javascript')
var bar = document.getElementById('bar_five');
bar.classList.add('active');
@endsection

@section('jquery')
Morris.Donut({
element: 'pie-chart',
colors: ['#fcc468','#0095ff', '#6bd098', '#f7452e'],
data: [
{label: "Waiting Confirm", value: {{$orderwaitingconfirm}}},
{label: "Confirmed", value: {{$orderconfirmed}}},
{label: "Successed", value: {{$ordersuccessed}}},
{label: "Trouble", value: {{$ordertrouble}}}
]
});
@endsection

@section('css')
<style>
	.main-panel > .content {
		min-height: 100vh;
	}
</style>
@endsection
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center">
					<a href="{{asset('admin/order/waiting_confirm')}}" class="btn btn-light" style="background-color: #fcc468">Order Waiting Confirm</a>
					<a href="{{asset('admin/order/confirmed')}}" class="btn btn-primary" style="background-color: #0095ff">Order Confirmed</a>
					<a href="{{asset('admin/order/successed')}}" class="btn btn-success" style="background-color: #6bd098">Order Successed</a>
					<a href="{{asset('admin/order/trouble')}}" class="btn btn-danger" style="background-color: #f7452e">Order Trouble</a>
					@if (session('status'))
					<div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
					</div>
					@endif
				</div>
				<div class="card-body">
					<div id="pie-chart"></div>

					<div>
						<h4 style="text-align: center;" class="mb-2">Top 10 Đơn Hàng Có Doanh Thu Cao Nhất</h4>
						<table class="table table-bordered">
							<thead class="text-primary bg-transparent">
								<th class="text-center">
									STT
								</th>
								<th class="text-center">
									ID Order
								</th>
								<th class="text-center">
									Total Value
								</th>
								<th class="text-center">
									Profit
								</th>
								<th class="text-center">
									Status
								</th>
							</thead>
							<tbody>
								@foreach($highest_value as $order)
								<tr>
									<td class="text-center">{{$loop->index + 1}}</td>
									<td class="text-center" style="color: #000; font-weight: 600;">{{$order->order_id}}</td>
									<td class="text-center" style="color: #0095ff; font-weight: 600;">{{number_format((float)$order->order_total,0,',','.')}}</td>
									<td class="text-center" style="color: #50ff24; font-weight: 600;">{{number_format((float)$order->order_total_profit,0,',','.')}}</td>
									<td class="text-center">{{$order->order_status}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>

					<div>
						<h4 style="text-align: center;" class="mb-2">Chi tiết doanh thu</h4> 
						<div class="col-sm-12 d-flex justify-content-around align-items-center mb-2">
							<h4 class="m-0" id="total"></h4>
							<h4 class="m-0" id="profit"></h4>
						</div>
						<form action="" method="post" class="text-center">
							<input type="month" id="get_month" style="padding: 5px 10px; cursor: pointer;">
							<input type="button" class="btn btn-primary m-0" value="Lọc kết quả" id="result">
							<a href="{{asset('admin/order')}}" class="btn btn-warning m-0">Clear</a>
						</form>

						<div id="show_result" class="mt-2">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@section('jquery1')
<script>
	$(document).ready(function() {
		$('#result').click(function(event) {
			var _token = $('input[name="_token"]').val();
			var month = $('#get_month').val();
			// alert(month);
			$.ajax({
				url:"{{url('/admin/order/get_date')}}",
				method: "POST",
				data: {_token: _token, month: month},
				success: function(response) {
					var total = 0, profit = 0;
					var table = '<table class="table table-bordered text-center"> <thead class="text-primary bg-transparent"> <th class="text-center"> STT </th> <th class="text-center"> ID Order </th> <th class="text-center"> Total Value </th> <th class="text-center"> Profit </th> <th class="text-center"> Date </th> </thead> <tbody>';
					for(var i = 0; i < response.length; i++) {
						var tt = response[i].order_total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
						var pf = response[i].order_total_profit.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
						table += '<tr><td>'+ (i+1) +'</td><td>'+ response[i].order_id +'</td><td>'+ tt +'</td><td>'+ pf +'</td><td>'+ response[i].order_date +'</td></tr>';
						total += response[i].order_total;
						profit += response[i].order_total_profit;
					}

					table += '</tbody></table>';

					$('#show_result').html(table);
					$('#total').html("Doanh thu: " + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + " VND");
					$('#profit').html("Lợi nhuận: " + profit.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") + " VND");
					console.log(response);
				}
			})
		});
	});
</script>
@endsection
@stop
