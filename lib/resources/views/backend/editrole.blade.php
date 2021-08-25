@extends('backend.master')
@section('title','Sửa Role')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_eight');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title">Edit Role</h4>
					@if (session('status'))
						<div class="alert alert-success">
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
									<label>Tên Role:</label>
									<input required type="text" name="name" class="form-control" placeholder="Tên Role..." value="{{$role->name}}">
								</div>
								<div class="form-group">
									<label>Tên Role hiển thị:</label>
                                    <input required type="text" name="display_name" class="form-control" placeholder="Tên Hiển Thị..." value="{{$role->display_name}}">
								</div>
								<div class="form-group">
									<label class="d-block">Danh sách Roles:</label>
                                    @foreach($permission as $per)
                                    <div class="custom-checkbox">
                                        <input {{$listRoleOfRole->contains($per->id) ? 'checked' : ''}} type="checkbox" name="permission[]" value="{{$per->id}}">
                                        <label class="">{{$per->display_name}}</label>
                                    </div>
                                    @endforeach
								</div>
                                
								<div class="form-group">
									<input type="submit" name="submit" value="Cập nhật" class="btn bg-success text-white">
                                    <a href="{{asset('admin/role')}}" class="btn btn-danger">Hủy bỏ</a>
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	<!--/.main-->
</div>	<!--/.main-->
@stop