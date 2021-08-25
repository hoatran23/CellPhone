@extends('backend.master')
@section('title', 'Danh Mục Sản Phẩm')
@section('main')	

@section('javascript')
	var bar = document.getElementById('bar_three');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row ">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title">Add Category</h4>
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
									<label>Tên danh mục:</label>
									<input required type="text" name="name" class="form-control" placeholder="Tên danh mục...">
								</div>
								<div class="form-group">
									<label>Mô tả danh mục:</label>
									<textarea class="form-control" name="desc" id="" style="height: 54px;" placeholder="Mô tả danh mục..."></textarea>
								</div>
								<div class="form-group">
									<label>Tình trạng danh mục:</label>
									<select class="form-control" name="status" id="">
										<option value="0">Hidden</option>
										<option selected value="1">Show</option>
									</select>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" value="Thêm Mới" class="btn bg-success text-white">
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
						<h4 class="card-title">Category</h4>
					</div>
					<div class="card-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
								<thead>
									<tr class="text-center bg-success text-white">
										<th class="border-right">ID</th>
										<th class="border-right">Category's Name</th>
										<th class="border-right">Status</th>
										<th class="border-right">Description</th>
										<th>Option</th>
									</tr>
								</thead>
								<tbody>
								@foreach($catelist as $cate)
								<tr class="text-center">
									<td>{{$cate->cate_id}}</td>
									<td>{{$cate->cate_name}}</td>
									<td>{{$cate->cate_status}}</td>
									<td>{{$cate->cate_desc}}</td>
									<td>
										<a href="{{asset('admin/category/edit/'.$cate->cate_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
										<a href="{{asset('admin/category/delete/'.$cate->cate_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger m-2"><span class="glyphicon glyphicon-trash"></span> Delete</a>
									</td>
								</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<div id="pagination" class="text-center text-primary">
							<div class="pagination-wrap">
								{{$catelist->links('vendor.pagination.bootstrap-4')}}
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
</div>
@stop
