@extends('backend.master')
@section('title', 'Danh Sách User')
@section('main')	

@section('javascript')
    var bar = document.getElementById('bar_seven');
    bar.classList.add('active');
@endsection
<div class="content">
	<div class="row ">
        <div class="col-sm-12">
            <div class="card border border-success">
                <div class="card-header">
                    <h4 class="card-title">User List</h4>
                    <a href="{{asset('admin/permission/add_user')}}" class="btn btn-primary">Add User</a>
                    @if (session('status'))
                        <div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="bootstrap-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center bg-success text-white">
                                    <th class="border-right">STT</th>
                                    <th class="border-right">Email</th>
                                    <th class="border-right">Name</th>
                                    <th class="border-right">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $us)
                                <tr class="text-center">
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->name}}</td>
                                    <td>
                                        <a href="{{asset('admin/permission/edit/'.$us->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                        <a href="{{asset('admin/permission/delete/'.$us->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger m-2"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="pagination" class="text-center text-primary">
						<div class="pagination-wrap">
							{{$user->links('vendor.pagination.bootstrap-4')}}
						</div>
					</div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
	</div>	<!--/.row-->
</div> 	<!--/.main-->
@stop
