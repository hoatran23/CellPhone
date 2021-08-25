@extends('backend.master')
@section('title','Thêm banner')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_four');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Add Slider</h4>
					</div>
					<div class="card-body">
						<div class="panel panel-primary">
							<div class="panel-body">
								@include('errors.note')
								<form method="post" enctype="multipart/form-data">
									<div class="row" style="margin-bottom:40px">
										<div class="col-xs-8">
											<div class="form-group" >
												<label>Tên slider</label>
												<input required type="text" placeholder="Nhập tên slider" name="name" class="form-control" value="{{$sliderlist->slider_name}}">
											</div>
											<div class="form-group" >
												<label class="mb-2">Ảnh sản phẩm</label>
												<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
												<img id="avatar" class="thumbnail d-block" width="300px"  src="{{asset('lib/storage/app/slider/'.$sliderlist->slider_image)}}">
											</div>
											<div class="form-group" >
												<label>Trạng thái</label>
												<select required name="status" class="form-control">
													<option selected value="1">Hiển thị</option>
													<option value="0">Ẩn</option>
												</select>
											</div>
											<div class="form-group" >
												<label>Miêu tả</label>
												<textarea required class="ckeditor" name="desc">{{$sliderlist->slider_desc}}></textarea>	
											</div>
                                            <input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">
											<a href="{{asset('admin/slider')}}" class="btn btn-danger">Hủy bỏ</a>
									</div>
									{{csrf_field()}}
								</form>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
</div>	<!--/.main-->
@stop