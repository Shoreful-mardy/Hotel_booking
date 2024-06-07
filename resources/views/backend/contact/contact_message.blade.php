@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Contact Message</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Contact Message</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Contact Message</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Subject</th>
										<th>Time</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($contact as $key=> $item)
									<tr>
										<td>{{ $key+1}}</td>
										<td>{{ $item->name}}</td>
										<td>{{ $item->email}}</td>
										<td>{{ $item->phone}}</td>
										<td>{{ $item->subject}}</td>
										<td>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
										<td>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal" id="{{ $item->id}}" onclick="viewMessage(this.id)"><i class="fadeIn animated bx bx-message-detail"></i></button>
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


<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Message</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="message_view">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function viewMessage(id){
		$.ajax({
			type: 'GET',
			url: '/view/message/'+id,
			dataType: 'json',

			success:function(data){
				$('#message_view').text(data.message);
			}
		});
	}	



</script>
@endsection