@extends('backend.master')
@section('title', 'Danh Sách Role')
@section('main')	

@section('javascript')
	var bar = document.getElementById('bar_eight');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row ">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<div class="card border border-success">
				<div class="card-header">
					<h4 class="card-title">Add Role</h4>
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
									<input required type="text" name="name" class="form-control" placeholder="Tên Role...">
								</div>
								<div class="form-group">
									<label>Tên Role hiển thị:</label>
                                    <input required type="text" name="display_name" class="form-control" placeholder="Tên Role hiển thị...">
								</div>
								<div class="form-group">
									<label class="d-block">Danh sách các quyền:</label>
                                    @foreach($permission as $per)
                                    <div class="custom-checkbox">
                                        <input type="checkbox" name="permission[]" value="{{$per->id}}">
                                        <label class="">{{$per->display_name}}</label>
                                    </div>
                                    @endforeach
								</div>
                                
								<div class="form-group">
									<input type="submit" name="submit" value="Thêm Mới" class="btn bg-success text-white">
								</div>
								{{csrf_field()}}
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
			
			<div class="col-xs-12 col-md-8 col-lg-8">
				<div class="card border border-success">
					<div class="card-header">
						<h4 class="card-title">Roles</h4>
					</div>
					<div class="card-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
								<thead>
									<tr class="text-center bg-success text-white">
										<th class="border-right">STT</th>
										<th class="border-right">Name</th>
										<th class="border-right">Display Name</th>
										<th class="border-right">Option</th>
									</tr>
								</thead>
								<tbody>
								@foreach($roles as $role)
								<tr class="text-center">
									<td>{{$loop->index + 1}}</td>
									<td>{{$role->name}}</td>
									<td>{{$role->display_name}}</td>
									<td>
										<a href="{{asset('admin/role/edit/'.$role->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
										<a href="{{asset('admin/role/delete/'.$role->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger m-2"><span class="glyphicon glyphicon-trash"></span> Delete</a>
									</td>
								</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						<div id="pagination" class="text-center text-primary">
							<div class="pagination-wrap">
								{{$roles->links('vendor.pagination.bootstrap-4')}}
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
