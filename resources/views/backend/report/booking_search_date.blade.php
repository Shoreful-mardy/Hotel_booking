@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Bookings</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Bookings</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{ route('booking.report')}}"><button type="button" class="btn btn-outline-primary px-5 radius-30">Search Again</button>
							</a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 >Search Results <span class="bg-success">{{ $startDate}}</span> To <span class="bg-success">{{ $endDate }}</span> </h6>
				<hr/>
				<div class="card">
					<div class="card-body">

						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Code</th>
										<th>Name</th>
										<th>Email</th>
										<th>Payment Method</th>
										<th>Total Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($bookings as $key=> $item)
									<tr>
										<td>{{ $key+1}}</td>
										<td>{{ $item->code}}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->email }}</td>
										<td>{{ $item->payment_method }}</td>
										<td>${{ $item->totel_price }}</td>
										<td>
						<a href="{{ route('download.invoice',$item->id) }}" class="btn btn-warning px-3"><i class="lni lni-download"></i></a>
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