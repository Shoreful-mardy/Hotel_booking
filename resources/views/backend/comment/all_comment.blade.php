@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style type="text/css">
	.large-checkbox{
		transform: scale(1.5);
	}
</style>

<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Comment</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">All Comment</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">All Comment</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>User Name</th>
										<th>Post Title</th>
										<th>Message</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($comment as $key=> $item)
									<tr>
										<td>{{ $key+1}}</td>
										<td>{{ $item->user->name}}</td>
										<td>{{ Str::limit($item->post->post_title, 25) }}</td>
										<td>{{ Str::limit($item->message, 40) }}</td>
										<td>

								<div class="form-check-success form-check form-switch">
									<input class="form-check-input status-toggle large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger" data-comment-id="{{ $item->id }}" {{ $item->status ? 'checked' : ''}} >
								</div>
						<!-- <a href="{{ route('edit.team',$item->id)}}" class="btn btn-warning px-3 radius-30">Edit</a>
						<a href="{{ route('delete.team',$item->id)}}" id="delete" class="btn btn-danger px-3 radius-30">Delete</a> -->
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
<script type="text/javascript">
	$(document).ready(function(){
		$('.status-toggle').on('change', function(){
			var commentId = $(this).data('comment-id');
			var isChecked = $(this).is(':checked');
			// Sent Ajax Request to change status

			$.ajax({
				url: "{{ route('update.comment.status') }}",
				method: "POST",
				data: {
					comment_id: commentId,
					is_chacked: isChecked ? 1 : 0,
					_token: "{{ csrf_token()}}"
				},
				success: function(response){
					toastr.success(response.message);
				},
				error: function(){

				}
			});
		});
	});
</script>


@endsection