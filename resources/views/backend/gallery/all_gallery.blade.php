@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Gallery</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Gallery Photo</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{ route('add.gallery')}}"><button type="button" class="btn btn-outline-primary px-5 radius-30">Add Gallery Photo</button>
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Gallery</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">

				<form method="post" action="{{ route('delete.gallery.multiple') }}">
								@csrf
							
							<table class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th width="50px">Select</th>
										<th width="50px">Sl</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($gallery as $key=> $item)
									<tr>
			<td>
				<input type="checkbox" name="selectItem[]" value="{{ $item->id }}">
			</td>
										<td>{{ $key+1}}</td>
										<td><img src="{{ asset($item->photo_name) }}" alt="team" style="width:40px; height: 50px;"></td>
										<td>
						
						<a href="{{ route('delete.gallery.image',$item->id)}}" id="delete" class="btn btn-danger px-3 radius-30">Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<button type="submit" class="btn btn-danger">Delete Selected</button>
			</form>
						</div>
					</div>
				</div>
				<hr/>
			</div>



@endsection