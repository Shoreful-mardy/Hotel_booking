@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Testimonial</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Testimonial</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{ route('add.testimonial')}}"><button type="button" class="btn btn-outline-primary px-5 radius-30">Add Testimonial</button>
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Testimonial</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Name</th>
										<th>City</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($testimonial as $key=> $item)
									<tr>
										<td>{{ $key+1}}</td>
										<td>{{ $item->name}}</td>
										<td>{{ $item->city}}</td>
										<td><img src="{{ asset($item->image) }}" alt="team" style="width:40px; height: 50px;"></td>
										<td>
						<a href="{{ route('edit.testimonial',$item->id)}}" class="btn btn-warning px-3 radius-30">Edit</a>
						<a href="{{ route('delete.testimonial',$item->id)}}" id="delete" class="btn btn-danger px-3 radius-30">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<hr/>
			</div>



@endsection