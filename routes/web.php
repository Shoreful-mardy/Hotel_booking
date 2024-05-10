<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('frontend.main_master');
// });
Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

