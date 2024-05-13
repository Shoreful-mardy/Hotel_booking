<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\TeamController;

// Route::get('/', function () {
//     return view('frontend.main_master');
// });
Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'Profile'])->name('user.profile');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
     Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
     Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
     Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');


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


});

require __DIR__.'/auth.php';
//===========Start Admin Group Middleware=======
 Route::middleware(['auth','roles'])->group(function(){
     Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
     Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
     Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
     Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
     Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
     Route::post('/admin/change/update', [AdminController::class, 'AdminChangeUpdate'])->name('admin.change.update');

 });
 //=======End Admin Group Middleware=======
// admin login route
 Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
 // admin login route

