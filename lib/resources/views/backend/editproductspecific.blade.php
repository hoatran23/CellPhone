@extends('backend.master')
@section('title', 'Danh Mục Thông Số Sản Phẩm')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_two');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row ">
		<div class="col-xs-12 col-sm-12">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title">Update Specification</h4>
				</div>
		
				<div class="card-body">
					<div class="card">
						<div class="card-body shadow-sm rounded-3">
							@include('errors.note')
							<form method="post">
								<div class="form-group">
									<label>Kích thước màn hình: </label>
									<input required type="text" name="screen_size" class="form-control" placeholder="Kích thước màn hình...(inches)" value="{{$listInfo->prod_screen}}">
								</div>
								<div class="form-group">
									<label>Công nghệ màn hình: </label>
									<input required type="text" name="screen_tech" class="form-control" placeholder="Công nghệ màn hình......(inches)" value="{{$listInfo->prod_tech}}">
								</div>
								<div class="form-group">
									<label>Camera sau: </label>
									<input required type="text" name="camera_rear" class="form-control" placeholder="Camera sau......" value="{{$listInfo->prod_camera_rear}}">
								</div>
								<div class="form-group">
									<label>Camera trước: </label>
									<input required type="text" name="camera_front" class="form-control" placeholder="Camera trước......" value="{{$listInfo->prod_camera_front}}">
								</div>
								<div class="form-group">
									<label>Chip, vi mạch sử dụng: </label>
									<input required type="text" name="chip" class="form-control" placeholder="Chip, vi mạch sử dụng......" value="{{$listInfo->prod_chip}}">
								</div>
								<div class="form-group">
									<label>Dung lượng Ram: </label>
									<input required type="text" name="ram" class="form-control" placeholder="Dung lượng Ram......" value="{{$listInfo->prod_ram}}">
								</div>
								<div class="form-group">
									<label>Pin: </label>
									<input required type="text" name="pin" class="form-control" placeholder="Pin điện thoại......"  value="{{$listInfo->prod_pin}}">
								</div>

								<div class="form-group">
									<input type="submit" name="submit" value="Update" class="btn bg-success text-white">
									<a href="{{asset('/admin/product/add_specific/'.$listInfo->prod_id)}}" class="btn btn-danger">Hủy bỏ</a>
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@stop
