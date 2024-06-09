@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Import Permission</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"><a href="{{ route('export')}}"><button type="button" class="btn btn-outline-warning px-5 radius-30">Export Excel</button>
                            </a></li>
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
    <form id="myForm" class="row g-3" method="post" action="{{ route('import') }}" enctype="multipart/form-data">

        @csrf

        <div class="col-md-12">
            <label for="input14" class="form-label">Excel File Import</label>
           
                <input type="file" class="form-control" name="import_file">
        </div>

  
       


        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-4">Upload</button>
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