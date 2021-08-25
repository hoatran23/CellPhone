@extends('backend.master')
@section('title', 'Danh Sách Sản Phẩm')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_two');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Product's Category</h4>
					<a href="{{asset('admin/product/add')}}" class="btn btn-primary">Add Product</a>
					@if (session('status'))
						<div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
							<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
						</div>
					@endif
				</div>
				<div class="card-body">
					<div>
						<table class="table table-bordered">
							<thead class="text-primary bg-transparent">
								<th class="text-center">
									ID
								</th>
								<th class="text-center">
									Product's Name
								</th>
								<th class="text-center">
									Price
								</th>
								<th class="text-center">
									Profit
								</th>
								<th class="text-center">
									Images
								</th>
								<th class="text-center">
									Gallery Images
								</th>
								<th class="text-center">
									Specific
								</th>
								<th class="text-center">
									Category
								</th>
								<th class="text-center">
									Status
								</th>
								<th class="text-center">
									Product Type
								</th>
								<th class="text-center">
									Option
								</th>
							</thead>
							<tbody>
								@foreach($productlist as $product)
									<tr>
										<td class="text-center">{{$product->prod_id}}</td>
										<td class="text-center">{{$product->prod_name}}</td>
										<td class="text-center">{{number_format($product->prod_price,0,',','.')}}</td>
										<td class="text-center">{{number_format($product->prod_profit,0,',','.')}}</td>
										<td class="text-center">
											<img width="200px" src="{{asset('lib/storage/app/image/'.$product->prod_img)}}" class="thumbnail">
										</td>
										<td class="text-center">
											<a href="{{asset('/admin/product/sub_image/'.$product->prod_id)}}" class="btn btn-outline-info">List Image</a>									
										</td>
										<td>
											<a href="{{asset('/admin/product/add_specific/'.$product->prod_id)}}" class="btn btn-outline-success" style="font-size: 10px">List Specific</a>			
										</td>
										<td class="text-center">{{($product->cate_name)}}</td>
										<td class="text-center">
											@if($product->prod_status == 1)
		                                    Đang kinh doanh
		                                    @else
		                                   	Tạm dừng
		                                    @endif
										</td>
										<td class="text-center">
											@if ($product->prod_featured == 1)
		                                    Hot
		                                    @elseif ($product->prod_featured == 2)
		                                   	New
		                                   	@elseif ($product->prod_featured == 0)
		                                   	Normal
		                                    @endif
										</td>
										<td class="text-center">
											<a href="{{asset('admin/product/edit/'.$product->prod_id)}}" class="btn btn-warning" style="padding: 11px 32px">Edit</a>
											<a href="{{asset('admin/product/delete/'.$product->prod_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"> Delete</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div id="pagination" class="text-center text-primary">
						<div class="pagination-wrap">
							{{$productlist->links('vendor.pagination.bootstrap-4')}}
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
