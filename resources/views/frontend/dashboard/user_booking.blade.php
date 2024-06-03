@extends('frontend.main_master')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Inner Banner -->
        <div class="inner-banner inner-bg6">
            <div class="container">
                <div class="inner-title">
                    <ul>
                        <li>
                            <a href="{{ url('/')}}">Home</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>User Dashboard </li>
                    </ul>
                    <h3>User Booking List</h3>
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->

        <!-- Service Details Area -->
        <div class="service-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                     <div class="col-lg-3">
                     	@include('frontend.dashboard.sidemenu')
                    </div>


                    <div class="col-lg-9">
                        <div class="service-article">
                            
 
            <section class="checkout-area pb-70">
            <div class="container">
<form action="{{ route('user.password.update') }}" method="post">
        @csrf
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="billing-details">
            <h3 class="title">User Booking List</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">B No</th>
      <th scope="col">B Date</th>
      <th scope="col">Customer</th>
      <th scope="col">Room</th>
      <th scope="col">Check In/Out</th>
      <th scope="col">Total Room</th>
      <th scope="col">Guest</th>
    </tr>
  </thead>
  <tbody>
 @foreach($allData as $item)
    <tr>
      <td>{{ $item->code}}</td>
      <td>{{ $item->created_at->format('d/m/y')}}</td>
      <td>{{ $item->user->name}}</td>
      <td>{{ $item->room->type->name}}</td>
      <td><span class="badge bg-primary">{{ $item->check_in}}</span><br><span class="badge bg-warning text-dark">{{ $item->check_in}}</span></td>
      <td>{{ $item->number_of_room}}</td>
      <td>{{ $item->person}}</td>
    </tr>
@endforeach
  </tbody>
</table>
</div>
</div>
</div>
</form>      
                
            </div>
        </section>
                            
                        </div>
                    </div>

                   
                </div>
            </div>
        </div>
        <!-- Service Details Area End -->




@endsection