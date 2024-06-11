@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Admin</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
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
    <form id="myForm" class="row g-3" method="post" action="{{ route('update.admin',$user->id) }}" >

        @csrf

        <div class="col-md-6">
            <label for="input14" class="form-label">Admin User Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
        </div>

        <div class="col-md-6">
            <label for="input14" class="form-label">Admin User Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
        </div>
        <div class="col-md-6">
            <label for="input14" class="form-label">Admin User Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
        </div>
        <div class="col-md-6">
            <label for="input14" class="form-label">Admin User Address</label>
                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
        </div>

        <div class="col-md-6">
            <label for="input14" class="form-label">Role Name</label>
           <select name="roles" class="form-select mb-3" aria-label="Default select example">
                <option selected="">Select Role</option>
                @foreach($roles as $rol)
                <option value="{{ $rol->name}}" {{ $user->hasRole($rol->name) ? 'selected' : '' }} >{{ $rol->name}}</option>
                @endforeach
                
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