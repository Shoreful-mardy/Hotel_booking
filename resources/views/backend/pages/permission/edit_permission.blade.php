@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Permission</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Permission</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
            <div class="col-lg-12">
<div class="card">
<div class="card-body p-4">
    <form id="myForm" class="row g-3" method="post" action="{{ route('update.permission') }}" >

        @csrf
        <input type="hidden" name="id" value="{{ $permission->id }}">

        <div class="col-md-6">
            <label for="input14" class="form-label">Permission Name</label>
           
                <input type="text" class="form-control" value="{{ $permission->name }}" name="name">
        </div>

        <div class="col-md-6">
            <label for="input14" class="form-label">Permission Group</label>
           <select name="group_name" class="form-select mb-3" aria-label="Default select example">
                <option selected="">Select Group</option>
                <option value="Team" {{ $permission->group_name == 'Team' ? 'selected' : '' }}>Team</option>
                <option value="Book Area" {{ $permission->group_name == 'Book Area' ? 'selected' : '' }}>Book Area</option>
                <option value="Manage Room" {{ $permission->group_name == 'Manage Room' ? 'selected' : '' }}>Manage Room</option>
                <option value="Manage Room" {{ $permission->group_name == 'Booking' ? 'selected' : '' }}>Booking</option>
                <option value="Manage Report" {{ $permission->group_name == 'Booking Report' ? 'selected' : '' }}>Booking Report</option>
                <option value="Roomlist" {{ $permission->group_name == 'Roomlist' ? 'selected' : '' }}>Roomlist</option>
                <option value="Setting" {{ $permission->group_name == 'Setting' ? 'selected' : '' }}>Setting</option>
                <option value="Testimonial" {{ $permission->group_name == 'Testimonial' ? 'selected' : '' }}>Testimonial</option>
                <option value="Hotel Gallery" {{ $permission->group_name == 'Hotel Gallery' ? 'selected' : '' }}>Hotel Gallery</option>
                <option value="Contact Message" {{ $permission->group_name == 'Contact Message' ? 'selected' : '' }}>Contact Message</option>
                <option value="Blog Category" {{ $permission->group_name == 'Blog Category' ? 'selected' : '' }}>Blog Category</option>
                <option value="Blog Post" {{ $permission->group_name == 'Blog Post' ? 'selected' : '' }}>Blog Post</option>
                <option value="Manage Comment" {{ $permission->group_name == 'Manage Comment' ? 'selected' : '' }}>Manage Comment</option>
                <option value="Role and Permission" {{ $permission->group_name == '>Role and Permission' ? 'selected' : '' }}>Role and Permission</option>
                
            </select>
        </div>
       


        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
            </div>
        </div>
    </form>
</div>
                        </div>
            </div>
						</div>
					</div>
				</div>
			</div>


@endsection