<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AmenitieController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\GorupNameController;



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
         Route::get('/edit/type/{id}','EditType')->name('edit_type');
         Route::post('/update/type','UpdateType')->name('update_type');
         Route::get('/delete/type/{id}','DeleteType')->name('delete_type');
    });
    Route::controller(AmenitieController::class)->group(function(){
        Route::get('/all/amenitie','AllAmenitie')->name('all_amenitie');
        Route::get('/add/amenitie','AddAmenitie')->name('add_amenitie');
        Route::post('/store/amenitie','StoreAmenitie')->name('store_amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie')->name('edit_amenitie');
        Route::post('/update/amenitie','UpdateAmenitie')->name('update_amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie')->name('delete_amenitie');
   });
   Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all_permission');
        Route::get('/add/permission','AddPermission')->name('add_permission');
        Route::post('/store/permission','StorePermission')->name('store_permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit_permission');
        Route::post('/update/permission','UpdatePermission')->name('update_permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete_permission');
    });
    Route::controller(GorupNameController::class)->group(function(){
        Route::get('/all/GroupName','AllGroupName')->name('all_group_name');
        Route::get('/add/GroupName','AddGroupName')->name('add_group_name');
        Route::post('/store/GroupName','StoreGroupName')->name('store_group_name');
        Route::get('/edit/GroupName/{id}','EditGroupName')->name('edit_group_name');
        Route::post('/update/GroupName','UpdateGroupName')->name('update_group_name');
        Route::get('/delete/GroupName/{id}','DeleteGroupName')->name('delete_group_name');
    });

});

