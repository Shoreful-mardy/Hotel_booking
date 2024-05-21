@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Edit Room Number</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Room Number</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
            <div class="col-lg-12">
  <form method="post" action="{{ route('update.room.no',$edit_room->id) }}">

            @csrf
            <div class="row">
                <div class="col-md-4">
                <label for="input2" class="form-label">Room No</label>
                <input type="text" name="room_type_no" class="form-control" id="input2" value="{{ $edit_room->room_type_no}}">
                 </div>

                <div class="col-md-4">
                <label for="input7" class="form-label">Status</label>
                <select name="status" id="input7" class="form-select">
                    <option selected="">Select Status...</option>
                    <option value="1" {{ $edit_room->status == 1 ? 'selected':''}} >Active</option>
                    <option value="0" {{ $edit_room->status == 0 ? 'selected':''}} >Inactive</option>
                </select>
                </div>

                <div class="col-md-4">
                  <button type="submit" class="btn btn-success" style="margin-top: 28px;">Update</button>
                 </div>
            </div>
        </form>
                </div>
            </div>
						</div>
					</div>
				</div>
			</div>



@endsection