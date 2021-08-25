@extends('backend.master')
@section('title', 'Danh Mục Thông Số Sản Phẩm')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_two');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row ">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title">Add Specification</h4>
					@if (session('status'))
						<div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
							<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
						</div>
					@endif
				</div>
		
				<div class="card-body">
					<div class="card">
						<div class="card-body shadow-sm rounded-3">
							@include('errors.note')
							<form method="post">
								<div class="form-group">
									<label>Kích thước màn hình: </label>
									<input required type="text" name="screen_size" class="form-control" placeholder="Kích thước màn hình...(inches)">
								</div>
								<div class="form-group">
									<label>Công nghệ màn hình: </label>
									<input required type="text" name="screen_tech" class="form-control" placeholder="Công nghệ màn hình......(inches)">
								</div>
								<div class="form-group">
									<label>Camera sau: </label>
									<input required type="text" name="camera_rear" class="form-control" placeholder="Camera sau......">
								</div>
								<div class="form-group">
									<label>Camera trước: </label>
									<input required type="text" name="camera_front" class="form-control" placeholder="Camera trước......">
								</div>
								<div class="form-group">
									<label>Chip, vi mạch sử dụng: </label>
									<input required type="text" name="chip" class="form-control" placeholder="Chip, vi mạch sử dụng......">
								</div>
								<div class="form-group">
									<label>Dung lượng Ram: </label>
									<input required type="text" name="ram" class="form-control" placeholder="Dung lượng Ram......">
								</div>
								<div class="form-group">
									<label>Pin: </label>
									<input required type="text" name="pin" class="form-control" placeholder="Pin điện thoại......">
								</div>

								<div class="form-group">
									<input type="submit" name="submit" value="Add New" class="btn bg-success text-white">
									<a href="{{asset('/admin/product/')}}" class="btn btn-danger m-2">Cancel</a>
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="col-xs-12 col-md-8 col-lg-8">
				<div class="card border border-success">
					<div class="card-header">
						<h4 class="card-title">Product's Specific</h4>
					</div>
					<div class="card-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
								<thead>
									<tr class="text-center bg-success text-white">
										<th class="border-right">STT</th>
										<th class="border-right">Name</th>
										<th class="border-right">Info</th>
									</tr>
								</thead>
								<tbody>
									@foreach($listInfo as $info)
									<tr>
										<td class="text-center">{{$loop->index + 1}}</td>
										<td class="text-center">Kích thước màn hình</td>
										<td class="text-center">{{$info->prod_screen}}</td>
									</tr>
									<tr>
										<td class="text-center">{{$loop->index + 2}}</td>
										<td class="text-center">Công nghệ màn hình</td>
										<td class="text-center">{{$info->prod_tech}}</td>
									</tr>

									<tr>
										<td class="text-center">{{$loop->index + 3}}</td>
										<td class="text-center">Camera sau</td>
										<td class="text-center">{{$info->prod_camera_rear}}</td>
									</tr>

									<tr>
										<td class="text-center">{{$loop->index + 4}}</td>
										<td class="text-center">Camera trước</td>
										<td class="text-center">{{$info->prod_camera_front}}</td>
									</tr>

									<tr>
										<td class="text-center">{{$loop->index + 5}}</td>
										<td class="text-center">Chip, vi mạch sử dụng</td>
										<td class="text-center">{{$info->prod_chip}}</td>
									</tr>

									<tr>
										<td class="text-center">{{$loop->index + 6}}</td>
										<td class="text-center">Dung lượng Ram</td>
										<td class="text-center">{{$info->prod_ram}}</td>
									</tr>
									
									<tr>
										<td class="text-center">{{$loop->index + 7}}</td>
										<td class="text-center">Pin</td>
										<td class="text-center">{{$info->prod_pin}}</td>
									</tr>
									<tr>
										<td colspan="3">
											<a href="{{asset('/admin/product/delete_specific/'.$info->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger m-2"><span class="glyphicon glyphicon-trash"></span> Delete</a>
											<a href="{{asset('/admin/product/edit_specific/'.$info->id)}}" class="btn btn-primary m-2">Update</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>	
					</div>
				</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop
