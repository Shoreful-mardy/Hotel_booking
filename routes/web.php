<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\BookAreaController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Frontend\FrontendRoomController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\RoomListController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\RoleController;

// Route::get('/', function () {
//     return view('frontend.main_master');
// });
Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//===========Start User Group Middleware=======
Route::middleware('auth')->group(function () {

    Route::get('/profile', [UserController::class, 'Profile'])->name('user.profile');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

     /// USER CHECKOUT ROUTE START FROM HERE
     Route::controller(BookingController::class)->group(function(){
        Route::get('/checkout/','CheckOut')->name('checkout');
        Route::post('/booking/store/','UserBookingStore')->name('user_booking_store');
        Route::post('/checkout/store/','CheckOutStore')->name('checkout.store');
        Route::match(['get', 'post'],'/stripe_pay', [BookingController::class, 'stripe_pay'])->name('stripe_pay');
     });
     ///  USER CHECKOUT ROUTE END HERE

     //User Booking Dashboard
     Route::controller(BookingController::class)->group(function(){
        Route::get('/user/booking/','UserBooking')->name('user.booking');
        Route::get('/user/invoice/{id}','UserDownloadInvoice')->name('user.invoice');
     });

     //User Comment 
     Route::controller(CommentController::class)->group(function(){
        Route::post('/add/comment/','AddComment')->name('add.comment');
     });




});
//=======End User Group Middleware=======

require __DIR__.'/auth.php';
//===========Start Admin Group Middleware=======
Route::middleware(['auth','roles'])->group(function(){
     Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
     Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
     Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
     Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
     Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
     Route::post('/admin/change/update', [AdminController::class, 'AdminChangeUpdate'])->name('admin.change.update');


     /// TEAM ALL ROUTE START FROM HERE
     Route::controller(TeamController::class)->group(function(){
        Route::get('/all/team','AllTeam')->name('all.team');
        Route::get('/add/team','AddTeam')->name('add.team');
        Route::post('/store/team','TeamStore')->name('team.store');
        Route::get('/edit/team/{id}','EditTeam')->name('edit.team');
        Route::post('/update/team','TeamUpdate')->name('team.update');
        Route::get('/delete/team/{id}','TeamDelete')->name('delete.team');
     });
     /// TEAM ALL ROUTE END  HERE


     /// BOOK AREA ALL ROUTE START FROM HERE
     Route::controller(BookAreaController::class)->group(function(){
        Route::get('/book/area/','BookArea')->name('book.area');
        Route::post('/update/book/area','UpdateBookArea')->name('update.book.area');
     });
     ///BOOK AREA ALL ROUTE END  HERE


     /// ROOM TYPE ALL ROUTE START FROM HERE
     Route::controller(RoomTypeController::class)->group(function(){
        Route::get('/room/type/','RoomTypeList')->name('room.type');
        Route::get('/add/room/type/','AddRoomType')->name('add.room.type');
        Route::post('/store/room/type/','StoreRoomType')->name('room.type.store');
     });
     ///ROOM TYPE ALL ROUTE END  HERE


     /// ROOM  ALL ROUTE START FROM HERE
     Route::controller(RoomController::class)->group(function(){
        Route::get('/edit/room/{id}','EditRoom')->name('edit.room');
        Route::post('/update/room/{id}','UpdateRoom')->name('update.room');
        Route::get('/multi/image/delete/{id}','MultiImageDelete')->name('multi.image.delete');
        Route::post('/store/room/no/{id}','StoreRoomNo')->name('store.room.no');
        Route::get('/edit/room/no/{id}','EditRoomNo')->name('edit.room.number');
        Route::post('/update/room/no/{id}','UpdateRoomNo')->name('update.room.no');
        Route::get('/delete/room/no/{id}','DeleteRoomNo')->name('delete.room.number');

        Route::get('/delete/room/{id}','DeleteRoom')->name('delete.room');
     });
     ///ROOM  ALL ROUTE END  HERE

     /// Admin booking ALL ROUTE START FROM HERE
     Route::controller(BookingController::class)->group(function(){
        Route::get('/booking/list/','BookingList')->name('booking.list');
        Route::get('/edit/booking/{id}','EditBooking')->name('edit_booking');
        Route::post('/update/booking/status/{id}','UpdateBookingStatus')->name('update.booking.status');
        Route::post('/update/booking/{id}','UpdateBooking')->name('update.booking');
        //For Assign Room Route
        Route::get('/assign/room/{id}','AssignRoom')->name('assign_room');
        Route::get('/assign/room/store/{booking_id}/{room_no_id}','AssignRoomStore')->name('assign_room_store');
        Route::get('/assign/room/delete/{id}','AssignRoomDelete')->name('assign_room_delete');

        Route::get('/download/invoice/{id}','DownloadInvoice')->name('download.invoice');
     });
     ///Admin booking ALL ROUTE END  HERE

     /// Room List All Route start
     Route::controller(RoomListController::class)->group(function(){
        Route::get('view/room/list/','ViewRoomList')->name('view.room.list');
        Route::get('add/room/list/','AddRoomList')->name('add.room.list');
        Route::post('/store/roomlist', 'StoreRoomList')->name('store.roomlist');
     });
     //Room List All Route end

     /// SMTP Setting All Route start
     Route::controller(SettingController::class)->group(function(){
        Route::get('smtp/setting/','SmtpSetting')->name('smtp.setting');
        Route::post('smtp/update/','SmtpUpdate')->name('smtp.update');
     });
     //SMTP Setting All Route end

     /// Testimonial All Route start
     Route::controller(TestimonialController::class)->group(function(){
        Route::get('/all/testimonial','AllTestimonial')->name('all.testimonial');
        Route::get('/add/testimonial','AddTestimonial')->name('add.testimonial');
        Route::post('/store/testimonial','StoreTestimonial')->name('testimonial.store');
        Route::get('/edit/testimonial/{id}','EditTestimonial')->name('edit.testimonial');
        Route::post('/update/testimonial/','UpdateTestimonial')->name('testimonial.update');
        Route::get('/delete/testimonial/{id}','DeleteTestimonial')->name('delete.testimonial');
     });
     //Testimonial All Route end


     /// Blog Category All Route start
     Route::controller(BlogController::class)->group(function(){

        Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
        Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');
        Route::get('/edit/blog/category/{id}','EditBlogCategory');
        Route::post('/update/blog/category','UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');

     });
     //Blog Category All Route end

     /// Blog Post All Route start
     Route::controller(BlogController::class)->group(function(){

        Route::get('/all/blog/post','AllBlogPost')->name('all.blog.post');
        Route::get('/add/blog/post','AddBlogPost')->name('add.blog.post');
        Route::post('/store/blog/post','StoreBlogPost')->name('store.blog.post');
        Route::get('/edit/blog/post/{id}','EditBlogPost')->name('edit.blog.post');
        Route::post('/update/blog/post/','UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/blog/post/{id}','DeleteBlogPost')->name('delete.blog.post');

     });
     //Blog Post All Route end


     /// Blog Post Comment For Admin All Route start 
     Route::controller(CommentController::class)->group(function(){
        Route::get('/all/blog/comment','AllBlogComment')->name('all.blog.comment');
        Route::post('/update/comment/status','UpdateCommentStatus')->name('update.comment.status');
     });
     //Blog Post Comment For Admin All Route end

     /// Booking Report All Route start 
     Route::controller(ReportController::class)->group(function(){
        Route::get('/booking/report','BookingReport')->name('booking.report');
        Route::post('/search/by/date','SearchByDate')->name('search-by-date');
     });
     //Booking Report All Route end

     /// Site Setting All Route start
     Route::controller(SettingController::class)->group(function(){
        Route::get('site/setting/','SiteSetting')->name('site.setting');
        Route::post('update/site/setting/','UpdateSiteSetting')->name('update.site.setting');
     });
     //Site Setting All Route end

      /// Gallery All Route start
     Route::controller(GalleryController::class)->group(function(){
        Route::get('all/gallery/','AllGallery')->name('all.gallery');
        Route::get('add/gallery/','AddGallery')->name('add.gallery');
        Route::post('store/gallery/','StoreGallery')->name('store.gallery');
        Route::post('delete/gallery/multiple','DeleteGalleryMultiple')->name('delete.gallery.multiple');
        Route::get('delete/gallery/image/{id}','DeleteGalleryImage')->name('delete.gallery.image');
    });
     //Gallery All Route end

    ///Contact All Route start for admin
    Route::controller(ContactController::class)->group(function(){
        Route::get('/contact/message','ContactMessage')->name('contact.message');
        Route::get('/view/message/{id}','ViewMessage');
     });
     //Contact All Route end for admin

    /// Role & Permission All Route start
     Route::controller(RoleController::class)->group(function(){
        Route::get('all/permisson/','AllPermission')->name('all.permission');
        Route::get('add/permisson/','AddPermission')->name('add.permission');
        Route::post('store/permisson/','StorePermission')->name('store.permission');
        Route::get('edit/permisson/{id}','EditPermission')->name('edit.permission');
        Route::post('update/permisson/','UpdatePermission')->name('update.permission');
        Route::get('delete/permisson/{id}','DeletePermission')->name('delete.permission');

        //Excel Permission import and export 
        Route::get('import/permisson/','ImportPermission')->name('import.permission');
        Route::get('export/permisson/','ExportPermission')->name('export');
        Route::post('import/permisson/','Import')->name('import');
    });
    //Role & Permission All Route end



 });

 //=======End Admin Group Middleware=======



// admin login route
 Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
 // admin login route

/// FRONTENT ROOM  ALL ROUTE START FROM HERE
 Route::controller(FrontendRoomController::class)->group(function(){
    Route::get('all/rooms/','AllFrontendRooms')->name('froom.all');
    Route::get('/room/details/{id}','RoomDetailsPage');
    Route::get('/booking/search/','BookingSearch')->name('booking.search');
    Route::get('/search/room/details/{id}','SearchRoomDetails')->name('search_room_details');
    Route::get('/check_room_availability/', 'CheckRoomAvailability')->name('check_room_availability');
 });
///FRONTENT ROOM  ALL ROUTE END  HERE

///Frontend Blog Post All Route start
 Route::controller(BlogController::class)->group(function(){
    Route::get('/blog/details/{id}','BlogDetails')->name('blog.details');
    Route::get('/all/blog/','AllBlog')->name('all.blog');
    Route::get('/Categorywise/post/{id}','CatWisePost')->name('cat_wise.post');
 });
 //Frontend Blog Post All Route end

 ///Frontend Gallery All Route start 
  Route::controller(GalleryController::class)->group(function(){
    Route::get('/show/gallery/','ShowGallery')->name('show.gallery');
 });
 //Frontend Gallery All Route end

 ///Contact All Route start
  Route::controller(ContactController::class)->group(function(){
    Route::get('/contact/','ContactUs')->name('contact.us');
    Route::post('/contact/store','ContactStore')->name('contact.store');
 });
 //Contact All Route end

///Notification All Route start 
  Route::controller(BookingController::class)->group(function(){
    Route::post('/mark-notification-as-read/{notification}','MarkAsRead');
 });
 //Notification All Route end

