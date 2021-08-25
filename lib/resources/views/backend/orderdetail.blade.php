@extends('backend.master')
@section('title', 'Liệt Kê Chi Tiết Đơn Hàng')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_five');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Order's Category</h4>
					<!-- <a href="{{asset('admin/slider/add')}}" class="btn btn-primary">Add Slider</a> -->
				</div>
				<div class="card-body">
					<div>
						<table class="table table-bordered">
							<thead class="text-primary bg-transparent">
								<th class="text-center">
									STT
								</th>
								<th class="text-center">
									Email
								</th>
								<th class="text-center">
									Name
								</th>
								<th class="text-center">
                                    Amount
								</th>
								<th class="text-center">
                                    Price
								</th>
								<th class="text-center">
                                    Profit
								</th>
								<th class="text-center">
                                    Address
								</th>
								<th class="text-center">
                                    Date
								</th>
								<th class="text-center">
                                    Image
								</th>
							</thead>
							<tbody>
								<h6>Total Order: {{$total_order}}</h6>
								@foreach($order_list_detail as $order)
									<tr>
										<td class="text-center">{{$loop->index + 1}}</td>
										<td class="text-center">{{$order->order_mail_client}}</td>
										<td class="text-center">{{$order->order_name_product}}</td>
										<td class="text-center">{{$order->order_qty_product}}</td>
										<td class="text-center">{{number_format((float)$order->order_price_product,0,',','.')}}</td>
										<td class="text-center">{{number_format((float)$order->order_prod_profit,0,',','.')}}</td>
										<td class="text-center">{{$order->order_address_client}}</td>
										<td class="text-center">{{$order->created_at}}</td>
										<td class="text-center">
											<img width="200px" src="{{asset('lib/storage/app/image/'.$order->order_img_product)}}" class="thumbnail">
										</td>
									</tr>
								@endforeach
									<tr class="text-center d-flex justify-content-center">
										<a href="{{URL::previous()}}" class="btn btn-danger">Back Orders</a>
									</tr>
							</tbody>
						</table>
					</div>
					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
