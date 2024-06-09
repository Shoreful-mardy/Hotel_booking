@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Roles Permissions</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Roles Permissions</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{ route('add.role.permission')}}"><button type="button" class="btn btn-outline-primary px-5 radius-30">Add Role has Permission</button>
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Roles</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Role Name</th>
										<th>Permission Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($roles as $key=> $item)
									<tr>
										<td>{{ $key+1}}</td>
										<td>{{ $item->name}}</td>
										<td>
											@foreach($item->permissions as $per)
											<span class="badge bg-danger">{{$per->name}}</span>
											@endforeach
										</td>
										<td>
						<a href="{{ route('edit.role.permission',$item->id)}}" class="btn btn-warning px-3 radius-30">Edit</a>
						<a href="{{ route('delete.role.permission',$item->id)}}" id="delete" class="btn btn-danger px-3 radius-30">Delete</a>
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