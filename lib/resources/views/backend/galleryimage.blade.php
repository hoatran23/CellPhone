@extends('backend.master')
@section('title', 'Danh Mục Ảnh Sản Phẩm')
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
					<h4 class="card-title">Add Image</h4>
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
							<form method="post" enctype="multipart/form-data">
								<div class="file-field">
								    <div class="btn btn-success btn-sm float-left w-100">
								      <span class="d-block pt-2">Chọn ảnh cần thêm...</span>
								      <input class="d-block pt-2 pb-1" id="file" name="file[]" type="file" accept="image/*" multiple>
								    </div>
								    <input type="submit" name="submit" value="Add New" class="btn bg-success text-white">
								    <a href="{{asset('/admin/product/')}}" class="btn btn-danger">Cancel</a>
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
						<h4 class="card-title">Product's Image</h4>
					</div>
					<div class="card-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
								<thead>
									<tr class="text-center bg-success text-white">
										<th class="border-right">STT</th>
										<th class="border-right">Image</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
									@foreach($listImage as $img)
										<tr>
											<td class="text-center">{{$loop->index + 1}}</td>
											<td class="text-center">
												<img width="200px" src="{{asset('lib/storage/app/image_detail/'.$img->prod_sub_img)}}" class="thumbnail">
											</td>
											<td class="text-center">
												<a href="{{asset('admin/product/delete_sub_image/'.$img->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger m-2"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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
