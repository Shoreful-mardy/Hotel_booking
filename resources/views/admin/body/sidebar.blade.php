<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Easy Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">


				<li>
					<a href="{{ route('admin.dashboard')}}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-group"></i>
						</div>
						<div class="menu-title">Manage Team</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.team')}}"><i class='bx bx-radio-circle'></i>All Team</a>
						</li>
						<li> <a href="{{ route('add.team')}}"><i class='bx bx-radio-circle'></i>Add Team</a>
						</li>
						
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-book"></i>
						</div>
						<div class="menu-title">Manage Book Area</div>
					</a>
					<ul>
						<li> <a href="{{ route('book.area')}}"><i class='bx bx-radio-circle'></i>Update Book Area</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-home-smile"></i>
						</div>
						<div class="menu-title">Manage Room Type</div>
					</a>
					<ul>
						<li> <a href="{{ route('room.type')}}"><i class='bx bx-radio-circle'></i>Room Type List</a>
						</li>
					</ul>
				</li>

				<li class="menu-label">Manage Booking</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Booking</div>
					</a>
					<ul>
						<li> <a href="{{ route('booking.list')}}"><i class='bx bx-radio-circle'></i>Booking List</a>
						</li>
						<li> <a href="{{ route('add.room.list')}}"><i class='bx bx-radio-circle'></i> Add Booking Room</a>
						</li>
						
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Booking Report</div>
					</a>
					<ul>
						<li> <a href="{{ route('booking.report')}}"><i class='bx bx-radio-circle'></i>Booking Report</a>
						</li>
						
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Manage Room List</div>
					</a>
					<ul>
						<li> <a href="{{ route('view.room.list')}}"><i class='bx bx-radio-circle'></i>Room List</a>
						</li>

					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Setting</div>
					</a>
					<ul>
						<li> <a href="{{ route('smtp.setting')}}"><i class='bx bx-radio-circle'></i>Smtp Setting</a>
						</li>

					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Testimonial</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.testimonial')}}"><i class='bx bx-radio-circle'></i>All Testimonial</a>
						</li>

						<li> <a href="{{ route('add.testimonial')}}"><i class='bx bx-radio-circle'></i>Add Testimonial</a>
						</li>

					</ul>
				</li>
				
				
				
				
				<li class="menu-label">Blog</li>
				
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Blog Category</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.blog.category')}}"><i class='bx bx-radio-circle'></i>All Category</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Blog Post</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.blog.post')}}"><i class='bx bx-radio-circle'></i>All Blog Post</a>
						</li>
						<li> <a href="{{ route('add.blog.post')}}"><i class='bx bx-radio-circle'></i>Add Blog Post</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Manage Comment</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.blog.comment')}}"><i class='bx bx-radio-circle'></i>All Comment</a>
						</li>
					</ul>
				</li>


			</ul>
			<!--end navigation-->
		</div>