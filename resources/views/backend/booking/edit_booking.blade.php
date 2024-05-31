@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">

		           <div class="col">
						 <div class="card radius-10 border-start border-0 border-3 border-info">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">Booking No:</p>
										<h6 class="my-1 text-info">{{ $editData->code}}</h6>
									</div>
									<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
									</div>
								</div>
							</div>
						 </div>
					  </div>

					  <div class="col">
							<div class="card radius-10 border-start border-0 border-3 border-danger">
							   <div class="card-body">
								   <div class="d-flex align-items-center">
									   <div>
										   <p class="mb-0 text-secondary">Booking Date:</p>
										   <h5 class="my-1 text-danger">{{ $editData->created_at->format('d/m/y') }}</h5>
									   </div>
									   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-wallet'></i>
									   </div>
								   </div>
							   </div>
							</div>
					  </div>

					  <div class="col">
							<div class="card radius-10 border-start border-0 border-3 border-success">
							   <div class="card-body">
								   <div class="d-flex align-items-center">
									   <div>
										   <p class="mb-0 text-secondary">Pay Method:</p>
										   <h6 class="my-1 text-success">{{ $editData->payment_method}}</h6>
									   </div>
									   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
									   </div>
								   </div>
							   </div>
							</div>
					  </div>

					  <div class="col">
							<div class="card radius-10 border-start border-0 border-3 border-warning">
							   <div class="card-body">
								   <div class="d-flex align-items-center">
									   <div>
										   <p class="mb-0 text-secondary">Pay Status</p>
										   <h6 class="my-1 text-warning">
										   @if($editData->payment_status == '1')
											<span class="text-success">Complete</span>
											@else
											<span class="text-danger">Pending</span>
											@endif
										</h6>
									   </div>
									   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
									   </div>
								   </div>
							   </div>
							</div>
					  </div>

					  <div class="col">
							<div class="card radius-10 border-start border-0 border-3 border-warning">
							   <div class="card-body">
								   <div class="d-flex align-items-center">
									   <div>
										   <p class="mb-0 text-secondary">Status</p>
										   <h6 class="my-1 text-warning">
										   @if($editData->status == '1')
											<span class="text-success">Complete</span>
											@else
											<span class="text-danger">Pending</span>
											@endif
										   </h6>
									   </div>
									   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-group'></i>
									   </div>
								   </div>
							   </div>
							</div>
					  </div>   
				</div><!--end row-->

	<div class="row">
      <div class="col-12 col-lg-8 d-flex">
         <div class="card radius-10 w-100">
         	<div class="card-body">
         		<div class="table-responsive">
         			<table class="table align-middle mb-0">
         				<thead class="table-light">
         					<tr>
         						<th>Room Type</th>
         						<th>Total Room</th>
         						<th>Price</th>
         						<th>Check IN/Out Date</th>
         						<th>Total Days</th>
         						<th>Total</th>
         					</tr>
         				</thead>
         				<tbody>
         					<td>{{ $editData->room->type->name }}</td>
         					<td>{{ $editData->number_of_room }}</td>
         					<td>${{ $editData->actual_price }}</td>
         					<td>
         						<span class="badge bg-primary">{{ $editData->check_in}}</span>  /<br><span class="badge bg-warning text-dark"> {{ $editData->check_out}}
         					</td>
         					<td>{{ $editData->totel_night }}</td>
         					<td>${{ $editData->actual_price * $editData->number_of_room }}</td>
         				</tbody>
         				
         			</table>

         			<div class="col-md-6" style="float: left;">
         				<style>
         					.test_table td{text-align: left; }
         				</style>
         				<table class="table" style="float:left;" border="none">
         					<tr>
         						<td class="text-success"><b>Customer Info</b></td>
         						<td></td>
         					</tr>
         					<tr>
         						<td>Name:</td>
         						<td>{{ $editData->user->name}}</td>
         					</tr>
         					<tr>
         						<td>Email:</td>
         						<td>{{ $editData->user->email}}</td>
         					</tr>
         					<tr>
         						<td>Phone No:</td>
         						<td>{{ $editData->user->phone}}</td>
         					</tr>
         					
         				</table>
         			</div>

         			<div class="col-md-6" style="float: right;">
         				<style>
         					.test_table td{text-align: right; }
         				</style>
         				<table class="table test_table" style="float:right;" border="none">
         					<tr>
         						<td class="text-success"><b>Payment Info</b></td>
         						<td></td>
         					</tr>
         					<tr>
         						<td>Subtotal:</td>
         						<td>${{ $editData->subtotel}}</td>
         					</tr>
         					<tr>
         						<td>Discount:</td>
         						<td>${{ $editData->discount}}</td>
         					</tr>
         					<tr>
         						<td>Grand Total:</td>
         						<td>${{ $editData->totel_price}}</td>
         					</tr>
         					
         				</table>
         			</div>
         			
         		</div>
        <form action="{{ route('update.booking.status',$editData->id)}}" method="post"> 
        	@csrf
        	<div class="row" style="margin-top: 40px;">
        		<div class="col-md-6">
        			<label>Payment Status</label>
        			<select name="payment_status" class="form-select">
        				<option>Select Status</option>
        				<option value="0" {{ $editData->payment_status == 0?'selected':''}}>Pending</option>
        				<option value="1" {{ $editData->payment_status == 1?'selected':''}}>Complete</option>

        			</select>
        		</div>
        		<div class="col-md-6">
        			<label>Booking Status</label>
        			<select name="status" class="form-select">
        				<option>Select Status</option>
        				<option value="0" {{ $editData->status == 0?'selected':''}}>Pending</option>
        				<option value="1" {{ $editData->status == 1?'selected':''}}>Complete</option>

        			</select>
        		</div>
        		
        	</div>
        	<div class="row" style="margin-top: 20px;">
        	<div class="col-md-12">
        		<button type="submit" class="btn btn-primary">Update</button>
        	</div>
        	</div>
        </form>
         		
         	</div>

			  
		  </div>
	   </div>

   <div class="col-12 col-lg-4 d-flex">
      <div class="card radius-10 w-100">
		<div class="card-header">
			<div class="d-flex align-items-center">
				<div>
					<h6 class="mb-0">Manage Room And Date</h6>
				</div>

			</div>
		</div>
		   <div class="card-body">
				<form action="">
					<div class="row">
						<div class="col-md-12 mb-2">
							<label for="">Check In</label>
							<input type="date" required name="check_in" class="form-control" value="{{ $editData->check_in}}">
						</div>
						<div class="col-md-12 mb-2">
							<label for="">Check Out</label>
							<input type="date" required name="check_out" class="form-control" value="{{ $editData->check_out}}">
						</div>

						<div class="col-md-12 mb-2">
							<label for="">Room</label>
							<input type="number" required name="number_of_room" class="form-control" value="{{ $editData->number_of_room}}">
						</div>

						<div class="col-md-12 mb-2">
							<label for="">Availability : <span class="text-success availability"></span></label>
						</div>
						<div class="mt-2">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>

					</div>
				</form>
		   </div>
	   </div>
   </div>
	</div><!--end row-->			
</div>
@endsection