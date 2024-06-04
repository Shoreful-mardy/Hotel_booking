@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Blog Post</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Blog Post</li>
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
    <form id="myForm" class="row g-3" method="post" action="{{ route('update.blog.post') }}" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="id" value="{{ $post->id}}">
        <input type="hidden" name="oldimg" value="{{ $post->post_image }}">

        <div class="col-md-4">
            <label for="input13" class="form-label">Post Category</label>
            <div class="form-group position-relative input-icon">
                <select name="blogcat_id" id="input19" class="form-select">
                    <option selected="">Choose...</option>
                    @foreach($blog_category as $item)
                    <option value="{{ $item->id }}" {{ $post->blogcat_id == $item->id ? 'selected' : '' }} >{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-8">
            <label for="input14" class="form-label">Post Title</label>
            <div class="form-group  position-relative input-icon">
                <input type="text" class="form-control" name="post_title" id="input14"  value="{{ $post->post_title }}">
            </div>
        </div>
       
       
        <div class="form-group col-md-12">
            <label for="input23" class="form-label">Short Description</label>
            <textarea class="form-control" name="short_desc" id="input23"  rows="2">{{ $post->short_desc }}</textarea>
        </div>

        <div class="form-group col-md-12">
            <label for="input23" class="form-label">Long Description</label>
            <textarea class="form-control" name="long_desc" id="mytextarea" placeholder="Description ..." rows="3">{!! $post->long_desc !!}</textarea>
        </div>

        <div class="form-group col-md-8">
            <label for="input14" class="form-label">Post Image</label>
            <div class="form-group position-relative input-icon">
                <input type="file" name="post_image" class="form-control" id="image"><br>
            </div>
        </div>

        <div class="col-md-4">
            <label for="input14" class="form-label"></label>
            <div class="position-relative input-icon">
        <img id="showImage" src="{{ (!empty($post->post_image)) ? asset($post->post_image) : url('upload/no_image.jpg') }}" alt="image" class="bg-primary" style="width: 100px;">
            </div>
        </div>


        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-4">Submit</button>
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

<!-- Script For Image Show in Input Field -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<!-- Script For Image Show in Input Field End -->


<!-- Script For Validation -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                blogcat_id: {
                    required : true,
                },
                post_title: {
                    required : true,
                }, 

                short_desc: {
                    required : true,
                },
                long_desc: {
                    required : true,
                },
                post_image: {
                    required : true,
                },
                
            },
            messages :{
                blogcat_id: {
                    required : 'Please Select Category Name',
                },
                post_title: {
                    required : 'Please Enter Post Tile',
                }, 
                short_desc: {
                    required : 'Please Enter Short Description',
                },
                long_desc: {
                    required : 'Please Enter Post Description',
                }, 
                post_image: {
                    required : 'Please Select Image',
                },  
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
<!-- Script For Validation -->

<!-- Script For Image Show in Input Field -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<!-- Script For Image Show in Input Field End -->

@endsection