@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style type="text/css">
	.form-check-label{
		text-transform: capitalize;
	}
</style>
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Add Roles In Permission</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Roles In Permission</li>
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
    <form id="myForm" class="row g-3" method="post" action="{{ route('role.permission.store') }}" enctype="multipart/form-data" >

        @csrf

        <div class="col-md-6">
            <label for="input14" class="form-label">Roles Name</label>
           
            <select name="role_id" class="form-select mb-3" aria-label="Default select example">
				<option selected="" disabled>Select Role</option>
				@foreach($roles as $role)
				<option value="{{ $role->id }}">{{ $role->name }}</option>
				@endforeach
			</select>
        </div>

        <div class="form-check">
			<input class="form-check-input" type="checkbox" value="" id="CheckDefaultMain">
			<label class="form-check-label" for="CheckDefaultMain">Permission All</label>
		</div>
		<hr>

		@foreach($permission_groups as $group)
		<div class="row">
			<div class="col-3">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label" for="flexCheckDefault">{{ $group->group_name}}</label>
				</div>
			</div>
			<div class="col-9">
				@php
					$permissions = App\Models\User::getpermissionByGroupName($group->group_name);
				@endphp
				@foreach($permissions as $permission)
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="flexCheckDefault{{ $permission->id }}">
					<label class="form-check-label" for="flexCheckDefault{{ $permission->id }}">{{ $permission->name}}</label>
				</div>
				@endforeach
				<br>
			</div>
		</div><!-- End Row -->
		@endforeach


       


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

<script type="text/javascript">
	$('#CheckDefaultMain').click(function(){
		if ($(this).is(':checked')) {
			$('input[ type = checkbox]').prop('checked',true);
		}else{
			$('input[ type = checkbox]').prop('checked',false);
		}
	})
</script>
@endsection