@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
         						<td>{{ $editData->name}}</td>
         					</tr>
         					<tr>
         						<td>Email:</td>
         						<td>{{ $editData->email}}</td>
         					</tr>
         					<tr>
         						<td>Phone No:</td>
         						<td>{{ $editData->phone}}</td>
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

<div class="col-md-12" style="clear: both;">
	<div class="margin-top:60px;  margin-bottom:20px;">
		 <a href="javascript::void(0)" class="btn btn-primary assign_room"> Assign Room</a>
		
	</div>
</div>

@php
	$assign_rooms = App\Models\BookingRoomList::with('room_number')->where('booking_id',$editData->id)->get();

@endphp
<br>
@if(count($assign_rooms) > 0)
<table class="table table-bordered">
	<tr>
		<th>Assigned Room Number</th>
		<th>Action</th>
	</tr>
	@foreach($assign_rooms as $item)
	<tr>
		<td>{{ $item->room_number->room_type_no}}</td>
		<td>
			<a href="{{ route('assign_room_delete',$item->id)}}" id="delete">Delete</a>
		</td>
	</tr>
	@endforeach
	

</table>
@else
<div class="alert alert text-danger">
	Not Found Assign Room
</div>
@endif      			
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
        		<a href="{{ route('download.invoice',$editData->id) }}" class="btn btn-warning px-3"><i class="lni lni-download"> Download Invoice</i></a>
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
				<form action="{{ route('update.booking',$editData->id) }}" method="post">
					@csrf
					<div class="row">
						<div class="col-md-12 mb-2">
							<label for="">Check In</label>
							<input type="date" required name="check_in" id="check_in" class="form-control" value="{{ $editData->check_in}}">
						</div>
						<div class="col-md-12 mb-2">
							<label for="">Check Out</label>
							<input type="date" required name="check_out" id="check_out" class="form-control" value="{{ $editData->check_out}}">
						</div>

						<div class="col-md-12 mb-2">
							<label for="">Room</label>
							<input type="number" required name="number_of_room" class="form-control" value="{{ $editData->number_of_room}}">
						</div>

						<input type="hidden" name="available_room" id="available_room" class="form-control" >

						<div class="col-md-12 mb-2">
							<label for="" >Availability : <span class="text-success availability"></span></label>
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

<!-- Model Start -->
		<div class="modal fade myModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Rooms</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body"></div>
				</div>
			</div>
		</div>

<!-- Model End -->

<script>

	$(document).ready(function(){
		getAvaility();


		$(".assign_room").on('click', function(){
            $.ajax({
                url: "{{ route('assign_room',$editData->id) }}",
                success: function(data){
                    $('.myModal .modal-body').html(data);
                    $('.myModal').modal('show');
                }
            });
            return false;
        });



	});

	 function getAvaility() {

	 	var check_in = $('#check_in').val();
	 	var check_out = $('#check_out').val();
	 	var room_id = "{{ $editData->room_id}}";

       $.ajax({
          url: "{{ route('check_room_availability') }}",
          data: {room_id:room_id, check_in:check_in, check_out:check_out},
          success: function(data){
             $(".availability").text(data['available_room']);
             $("#available_room").val(data['available_room']);
             price_calculate(data['total_nights']);
          }
       });
    }

</script>
@endsection