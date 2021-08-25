@extends('backend.master')
@section('title','Thêm sản phẩm')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_two');
	bar.classList.add('active');
@endsection
<!-- <script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>		 -->
<div class="content">
	<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Add Product</h4>
					</div>
					<div class="card-body">
						<div class="panel panel-primary">
							<div class="panel-body">
								@include('errors.note')
								<form method="post" enctype="multipart/form-data">
									<div class="row" style="margin-bottom:40px">
										<div class="col-xs-8">
											<div class="form-group" >
												<label>Tên sản phẩm</label>
												<input required type="text" placeholder="Nhập tên sản phẩm" name="name" class="form-control">
											</div>
											<div class="form-group" >
												<label>Giá sản phẩm</label>
												<input required type="number" placeholder="Nhập giá sản phẩm" name="price" class="form-control" value="1000"> 
											</div>
											<div class="form-group" >
												<label>Lợi nhuận</label>
												<input required type="number" placeholder="Nhập lợi nhuận sản phẩm" name="profit" class="form-control" value="500"> 
											</div>
											<div class="form-group" >
												<label>Ảnh sản phẩm</label>
												<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
												<img id="avatar" class="thumbnail d-block" width="300px" src="img/click.png">
											</div>
											<div class="form-group" >
												<label>Phụ kiện</label>
												<input required type="text" placeholder="Nhập phụ kiện kèm theo sản phẩm" name="accessories" class="form-control" value="cap, sac">
											</div>
											<div class="form-group" >
												<label>Bảo hành</label>
												<input required type="text" placeholder="Nhập thời gian bảo hành sản phẩm" name="warranty" class="form-control" value="12 thang">
											</div>
											<div class="form-group" >
												<label>Khuyến mãi</label>
												<input required type="text" placeholder="Nhập khuyến mãi kèm theo" name="promotion" class="form-control" value="op lung">
											</div>
											<div class="form-group" >
												<label>Tình trạng</label>
												<input required type="text" placeholder="Nhập tình trạng sản phẩm" name="condition" class="form-control" value="moi 100">
											</div>
											<div class="form-group" >
												<label>Trạng thái</label>
												<select required name="status" class="form-control">
													<option value="1">Còn hàng</option>
													<option value="0">Hết hàng</option>
												</select>
											</div>
											<div class="form-group" >
												<label>Miêu tả</label>
												<textarea required class="ckeditor" name="description"></textarea>
											</div>
											<div class="form-group" >
												<label>Danh mục</label>
												<select required name="cate" class="form-control">
													@foreach($catelist as $cate)
													<option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group" >
												<label>Sản phẩm nổi bật</label><br>
												Mới: <input type="radio" name="featured" value="2">
												Có: <input type="radio" name="featured" value="1">
												Không: <input type="radio" checked name="featured" value="0">
											</div>
											<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
											<a href="{{asset('admin/product')}}" class="btn btn-danger">Hủy bỏ</a>
										</div>
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