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

				@if(Auth::user()->can('team.menu'))
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="fadeIn animated bx bx-group"></i>
						</div>
						<div class="menu-title">Manage Team</div>
					</a>
					<ul>
						@if(Auth::user()->can('team.all'))
						<li> <a href="{{ route('all.team')}}"><i class='bx bx-radio-circle'></i>All Team</a>
						</li>
						@endif
						@if(Auth::user()->can('team.add'))
						<li> <a href="{{ route('add.team')}}"><i class='bx bx-radio-circle'></i>Add Team</a>
						</li>
						@endif
						
					</ul>
				</li>
				@endif	
				@if(Auth::user()->can('bookarea.menu'))
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
				@endif

				@if(Auth::user()->can('room.type.menu'))
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
				@endif
				@if(Auth::user()->can('booking.menu'))
				<li class="menu-label">Manage Booking</li>
				
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart'></i>
						</div>
						<div class="menu-title">Booking</div>
					</a>
					<ul>
						@if(Auth::user()->can('booking.list'))
						<li> <a href="{{ route('booking.list')}}"><i class='bx bx-radio-circle'></i>Booking List</a>
						</li>
						@endif
						@if(Auth::user()->can('booking.add'))
						<li> <a href="{{ route('add.room.list')}}"><i class='bx bx-radio-circle'></i> Add Booking Room</a>
						</li>
						@endif
						
					</ul>
				</li>
				@endif
				@if(Auth::user()->can('booking.report'))
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
				@endif

				@if(Auth::user()->can('room.list'))
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
				@endif
				@if(Auth::user()->can('setting.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Setting</div>
					</a>
					<ul>
						@if(Auth::user()->can('smtp.menu'))
						<li> <a href="{{ route('smtp.setting')}}"><i class='bx bx-radio-circle'></i>Smtp Setting</a>
						</li>
						@endif
						@if(Auth::user()->can('site.setting'))
						<li> <a href="{{ route('site.setting')}}"><i class='bx bx-radio-circle'></i>Site Setting</a>
						</li>
						@endif

					</ul>
				</li>
				@endif
				@if(Auth::user()->can('testimonial.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Testimonial</div>
					</a>
					<ul>
						@if(Auth::user()->can('testimonial.all'))
						<li> <a href="{{ route('all.testimonial')}}"><i class='bx bx-radio-circle'></i>All Testimonial</a>
						</li>
						@endif
						@if(Auth::user()->can('testimonial.add'))
						<li> <a href="{{ route('add.testimonial')}}"><i class='bx bx-radio-circle'></i>Add Testimonial</a>
						</li>
						@endif

					</ul>
				</li>
				@endif
				@if(Auth::user()->can('hotel.gallery'))
				<li class="menu-label">Gallery</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Hotel Gallery</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.gallery')}}"><i class='bx bx-radio-circle'></i>All Gallery</a>
						</li>
					</ul>
				</li>
				@endif
				@if(Auth::user()->can('contact.message'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Contact Message</div>
					</a>
					<ul>
						<li> <a href="{{ route('contact.message')}}"><i class='bx bx-radio-circle'></i>Message</a>
						</li>
					</ul>
				</li>
				@endif
				
				
				
				
				<li class="menu-label">Blog</li>
				@if(Auth::user()->can('blog.category'))
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
				@endif
				@if(Auth::user()->can('blog.menu'))

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Blog Post</div>
					</a>
					<ul>
						@if(Auth::user()->can('all.blog'))
						<li> <a href="{{ route('all.blog.post')}}"><i class='bx bx-radio-circle'></i>All Blog Post</a>
						</li>
						@endif
						@if(Auth::user()->can('add.blog'))
						<li> <a href="{{ route('add.blog.post')}}"><i class='bx bx-radio-circle'></i>Add Blog Post</a>
						</li>
						@endif
					</ul>
				</li>
				@endif

				@if(Auth::user()->can('all.comments'))

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
				@endif
				@if(Auth::user()->can('role.permission.menu'))
				<li class="menu-label">Role & Permission</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Role & Permission</div>
					</a>
					<ul>
						@if(Auth::user()->can('all.permission'))
						<li> <a href="{{ route('all.permission')}}"><i class='bx bx-radio-circle'></i>All Permission</a>
						</li>
						@endif
						@if(Auth::user()->can('all.role'))
						<li> <a href="{{ route('all.role')}}"><i class='bx bx-radio-circle'></i>All Roles</a>
						</li>
						@endif
						
						<li> <a href="{{ route('add.role.permission')}}"><i class='bx bx-radio-circle'></i>Role Has Permission</a>
						</li>
						
						<li> <a href="{{ route('all.roles.permission')}}"><i class='bx bx-radio-circle'></i>All Role in Permission</a>
						</li>
					</ul>
				</li>

				@endif
				@if(Auth::user()->can('admin.menu'))
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Manage Admin User</div>
					</a>
					<ul>
						@if(Auth::user()->can('all.admin'))
						<li> <a href="{{ route('all.admin')}}"><i class='bx bx-radio-circle'></i>All Admin</a>
						</li>
						@endif
						@if(Auth::user()->can('add.admin'))
						<li> <a href="{{ route('add.admin')}}"><i class='bx bx-radio-circle'></i>Add Admin</a>
						</li>
						@endif
					</ul>
				</li>
				@endif


				<li class="menu-label">Other</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-support'></i>
						</div>
						<div class="menu-title">Support</div>
					</a>
					<ul>
						<li> <a href="{{ route('all.permission')}}"><i class='bx bx-radio-circle'></i>Customer</a>
						</li>
					</ul>
				</li>


			</ul>
			<!--end navigation-->
		</div>