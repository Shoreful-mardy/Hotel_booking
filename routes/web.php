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
     });
     ///  USER CHECKOUT ROUTE END HERE




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

