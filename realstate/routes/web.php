<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin Gorup Middleware
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin_profile');
    Route::post('/admin/profile/store', [AdminController::class, 'profileFinalUpdateInfo'])->name('admin_profile_store');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin_change_password');
    Route::post('admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin_update_password');

});
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

//Agent Gorup Middleware
Route::middleware(['auth','role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});
Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(PropertyTypeController::class)->group(function(){
         Route::get('/all/type','AllType')->name('all_type');
         Route::get('/add/type','AddType')->name('add_type');
         Route::post('/store/type','StoreType')->name('store_type');

    });

});

