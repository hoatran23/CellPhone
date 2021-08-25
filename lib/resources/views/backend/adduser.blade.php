@extends('backend.master')
@section('title','Thêm nguoi dung')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_seven');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Add User</h4>
					</div>
					<div class="card-body">
						<div class="panel panel-primary">
							<div class="panel-body">
								@include('errors.note')
								<form method="post" enctype="multipart/form-data">
									<div class="row" style="margin-bottom:40px">
										<div class="col-xs-8">
											<div class="form-group" >
												<label>Ho Tên</label>
												<input required type="text" placeholder="Nhập Ho Tên" name="name" class="form-control">
											</div>
											<div class="form-group" >
												<label>Email</label>
												<input required type="email" placeholder="Nhập Email" name="email" class="form-control"> 
											</div>
											<div class="form-group" >
												<label>Mật khẩu</label>
												<input required type="password" placeholder="Nhập mật khẩu" name="password" class="form-control"> 
											</div>
											<div class="form-group" >
												<label>Nhập lại mật khẩu</label>
												<input required type="password" placeholder="Nhập lại mật khẩu" name="re-password" class="form-control"> 
											</div>
											<div class="form-group">
                                                <label class="d-block" for="person">Vai trò: </label>

                                                <select id="person" multiple size="5" style="width: 100%;" name="roles[]">
                                                    @foreach($roles as $role)
                                                        <option style=" padding: 10px; border-bottom: 1px solid #3333331c; cursor: pointer;" value="{{$role->id}}">{{$role->display_name}}</option>
                                                    @endforeach
                                                </select>
											</div>
											
											<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
											<a href="{{asset('admin/permission')}}" class="btn btn-danger">Hủy bỏ</a>
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