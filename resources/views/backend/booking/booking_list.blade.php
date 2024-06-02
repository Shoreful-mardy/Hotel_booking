@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Booking</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Booking</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{ route('add.team')}}"><button type="button" class="btn btn-outline-primary px-5 radius-30">Add Booking</button>
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Booking No</th>
										<th>Booking date</th>
										<th>Customer</th>
										<th>Room</th>
										<th>Check In/Out </th>
										<th>Total Room</th>
										<th>Guest</th>
										<th>Payment</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($alldata as $key=> $item)
									<tr>
										<td>{{ $key+1}}</td>
										<td> {{ $item->code}}</td>
										<td>{{ $item->created_at->format('d/m/y')}}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item['room']['type']['name'] }}</td>
										<td><span class="badge bg-primary">{{ $item->check_in}}</span>  /<br><span class="badge bg-warning text-dark"> {{ $item->check_out}}</span>  </td>
										<td>{{ $item->number_of_room}}</td>
										<td>{{ $item->person}}</td>
										<td>
											@if($item->payment_status == '1')
											<span class="text-success">Complete</span>
											@else
											<span class="text-danger">Pending</span>
											@endif
										</td>
										<td>
											@if($item->status == '1')
											<span class="text-success">Active</span>
											@else
											<span class="text-danger">Pending</span>
											@endif
										</td>
										<td>
						<a href="{{ route('edit_booking',$item->id)}}" class="badge rounded-pill bg-warning text-dark p-2">Edit</a>
						<a href="{{ route('delete.team',$item->id)}}" id="delete" class="badge rounded-pill bg-danger">Delete</a>
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