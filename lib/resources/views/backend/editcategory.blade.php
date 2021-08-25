@extends('backend.master')
@section('title', 'Sửa Danh Mục Sản Phẩm')
@section('main')
	
@section('javascript')
	var bar = document.getElementById('bar_three');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<div class="card border">
				<div class="card-header text-center">
					<h4 class="card-title">Edit Category</h4>
				</div>

				<div class="card-body col-lg-8 offset-lg-2">
					@include('errors.note')
					<form method="post">
						<div class="form-group">
							<label>Tên danh mục:</label>
							<input type="text" name="name" class="form-control" placeholder="Tên danh mục..." value="{{$cate->cate_name}}">
						</div>
						<div class="form-group">
							<label>Mô tả danh mục:</label>
							<textarea class="form-control" name="desc" id="" cols="30" rows="10" placeholder="Mô tả danh mục..."></textarea>
						</div>
						<div class="form-group">
							<label>Tình trạng danh mục:</label>
							<select class="form-control" name="status" id="">
								<option selected value="1" @if($cate->cate_status==1) checked @endif>Show</option>
								<option value="0" @if($cate->cate_status==0) checked @endif>Hidden</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Edit" class="form-control btn bg-success text-white">
						</div>
						<div class="form-group">
							<a href="{{asset('admin/category')}}" class="form-control btn bg-warning text-white">Cancel</a>
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>	<!--/.main-->
@stop