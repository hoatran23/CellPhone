@extends('backend.master')
@section('title', 'Liet ke slider')
@section('main')

@section('javascript')
	var bar = document.getElementById('bar_four');
	bar.classList.add('active');
@endsection
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Slider's Category</h4>
					<a href="{{asset('admin/slider/add')}}" class="btn btn-primary">Add Slider</a>
					@if (session('status'))
						<div class="alert alert-success text-center" style="font-weight: 500; font-size: 16px">
							<a href="#" class="close" data-dismiss="alert" aria-label="close" style="margin-top: 10px">&times;</a> {{session('status')}}
						</div>
					@endif
				</div>
				<div class="card-body">
					<div>
						<table class="table table-bordered">
							<thead class="text-primary bg-transparent">
								<th class="text-center">
									ID
								</th>
								<th class="text-center">
									Name
								</th>
								<th class="text-center">
									Images
								</th>
								<th class="text-center">
									Description
								</th>
								<th class="text-center">
									Status
								</th>
								<th class="text-center">
									Options
								</th>
							</thead>
							<tbody>
								@foreach($sliderlist as $slider)
									<tr>
										<td class="text-center">{{$slider->slider_id}}</td>
										<td class="text-center">{{$slider->slider_name}}</td>
										<td class="text-center">
											<img width="200px" src="{{asset('lib/storage/app/slider/'.$slider->slider_image)}}" class="thumbnail">
										</td>
                                        <td class="text-center">{{($slider->slider_desc)}}</td>
										<td class="text-center">{{($slider->slider_status)}}</td>
										<td class="text-center">
											<a href="{{asset('admin/slider/edit/'.$slider->slider_id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
											<a href="{{asset('admin/slider/delete/'.$slider->slider_id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger m-2"><span class="glyphicon glyphicon-trash"></span> Delete</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div id="pagination" class="text-center text-primary">
						<div class="pagination-wrap">
							{{$sliderlist->links('vendor.pagination.bootstrap-4')}}
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
