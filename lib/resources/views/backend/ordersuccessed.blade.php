@extends('backend.master')
@section('title', 'Danh Sách Đơn Hàng Đã Thành Công')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_five');
	bar.classList.add('active');
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
					<div class="row">
						<div class="col-sm-12">
							<a href="{{asset('admin/order')}}" class="btn" style="background-color: #cc1eba">Order</a>
						</div>
					</div>
					@if (session('status'))
					<div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
						<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
					</div>
					@endif
				</div>
				<div class="card-body">
					<!-- Giao hàng thành công -->
					<div>
						<h4 style="text-align: center;" class="mb-2">Đơn Hàng Thành Công</h4>
						<table class="table table-bordered">
							<thead class="text-primary bg-transparent">
								<th class="text-center">
									STT
								</th>
								<th class="text-center">
									ID Order
								</th>
								<th class="text-center">
									Name
								</th>
								<th class="text-center">
									Phone
								</th>
								<th class="text-center">
                                    Total
								</th>
								<th class="text-center">
                                    Profit
								</th>
								<th class="text-center">
                                    Note
								</th>
								<th class="text-center">
                                    Status
								</th>
								<th class="text-center">
                                    Option
								</th>
							</thead>
							<tbody>
								@foreach($successed as $order)
									@if($order->order_status == 3) 	
									<tr>
										<td class="text-center">{{$loop->index + 1}}</td>
										<td class="text-center" style="color: #000; font-weight: 600;">{{$order->order_id}}</td>
										<td class="text-center">{{$order->order_name_client}}</td>
										<td class="text-center">{{$order->order_phone_client}}</td>
										<td class="text-center" style="color: #0095ff; font-weight: 600;">{{number_format((float)$order->order_total,0,',','.')}}</td>
										<td class="text-center" style="color: #50ff24; font-weight: 600;">{{number_format((float)$order->order_total_profit,0,',','.')}}</td>
										<td class="text-center">{{$order->order_desc_client}}</td>
										<td class="text-center">{{$order->order_status}}</td>
                                        <td class="text-center">
											<a href="{{asset('admin/order/detail/'.$order->order_id)}}" class="btn btn-warning"> Detail</a>
											<a href="{{asset('admin/order/edit/'.$order->order_id)}}" class="btn btn-danger" style="padding: 11px 30px;"> Edit</a>
										</td>
									</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
					<div id="pagination" class="text-center text-primary">
						<div class="pagination-wrap">
							{{$successed->appends(['successed' => $successed->currentPage()])->links('vendor.pagination.bootstrap-4')}}
						</div>
					</div>
                    <div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
