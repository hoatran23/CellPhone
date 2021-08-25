@extends('backend.master')
@section('title', 'Chỉnh Sửa Trạng Thái Đơn Hàng')
@section('main')		

@section('javascript')
	var bar = document.getElementById('bar_two');
	bar.classList.add('active');
@endsection
<script type="text/javascript" src="../../editor/ckeditor/ckeditor.js"></script>		
<div class="content">
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Status Order</h4>
				</div>
				<div class="card-body">
					<div class="panel panel-primary">
						<div class="panel-body">
							<form method="post" enctype="multipart/form-data">
								<div class="row" style="margin-bottom:40px">
									<div class="col-xs-8">
										<div class="form-group" >
											<label>Trạng thái</label>
											<select required name="status" class="form-control">
												<option value="1" @if($order->order_status) checked @endif>Chờ Xác Nhận</option>
												<option value="2" @if($order->order_status) checked @endif>Đã Xác Nhận</option>
												<option value="3" @if($order->order_status) checked @endif>Giao Hàng Thành Công</option>
												<option value="0" @if($order->order_status) checked @endif>Hẹn Ngày Giao Lại</option>
											</select>
										</div>
                                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                                        <a href="{{URL::previous()}}" class="btn btn-danger">Back Orders</a>
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
@stop
