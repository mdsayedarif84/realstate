<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\AmenitieController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\GorupNameController;
use App\Http\Controllers\Dashboard\DashboardController;


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
Route::middleware(['auth','roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin_profile');
    Route::post('/admin/profile/store', [AdminController::class, 'profileFinalUpdateInfo'])->name('admin_profile_store');
    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin_change_password');
    Route::post('admin/update/password', [AdminController::class, 'adminUpdatePassword'])->name('admin_update_password');
});
//admin loging blade custom route position is roues/auth.php
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

//Agent Gorup Middleware
Route::middleware(['auth','roles:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});
Route::middleware(['auth','roles:admin'])->group(function () {
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/all/type','AllType')->name('all_type')->middleware('permission:all_type');
        Route::get('/add/type','AddType')->name('add_type')->middleware('permission:add_type');
        Route::post('/store/type','StoreType')->name('store_type');
        Route::get('/edit/type/{id}','EditType')->name('edit_type')->middleware('permission:edit_type');
        Route::post('/update/type','UpdateType')->name('update_type');
        Route::get('/delete/type/{id}','DeleteType')->name('delete_type')->middleware('permission:delete_type');
    });
    Route::controller(AmenitieController::class)->group(function(){
        Route::get('/all/amenitie','AllAmenitie')->name('all_amenitie')->middleware('permission:all_amenitie');
        Route::get('/add/amenitie','AddAmenitie')->name('add_amenitie')->middleware('permission:add_amenitie');
        Route::post('/store/amenitie','StoreAmenitie')->name('store_amenitie');
        Route::get('/edit/amenitie/{id}','EditAmenitie')->name('edit_amenitie')->middleware('permission:edit_amenitie');
        Route::post('/update/amenitie','UpdateAmenitie')->name('update_amenitie');
        Route::get('/delete/amenitie/{id}','DeleteAmenitie')->name('delete_amenitie')->middleware('permission:delete_amenitie');
   });
   /// Permission ///
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/permission','AllPermission')->name('all_permission')->middleware('permission:all_permission');
        Route::get('/add/permission','AddPermission')->name('add_permission');
        Route::post('/store/permission','StorePermission')->name('store_permission');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit_permission')->middleware('permission:edit_permission');
        Route::post('/update/permission','UpdatePermission')->name('update_permission');
        Route::get('/delete/permission/{id}','DeletePermission')->name('delete_permission')->middleware('permission:delete_permission');

        Route::get('/import/permission','ImportPermission')->name('import_permission');
        Route::get('/export','Export')->name('export');
        Route::post('/import','Import')->name('import');
    });
    ////// All Role & Add Role Permission ///////
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles','AllRoles')->name('all_roles');
        Route::get('/add/roles','AddRoles')->name('add_roles');
        Route::post('/store/roles','StoreRoles')->name('store_roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit_roles');
        Route::post('/update/roles','UpdateRoles')->name('update_roles');
        Route::get('/delete/roles/{id}','DeleteRoles')->name('delete_roles');

        Route::get('/add/roles/permission','AddRolesPermission')->name('add_roles_permission');
        Route::post('/add/store/permission','StoreRolesPermission')->name('store_roles_permission');
        Route::get('/all/roles/permission','AllRolesPermission')->name('all_roles_permission');
        Route::get('/admin/roles/edit/{id}','AdminRolesEdit')->name('admin_roles_edit');
        Route::post('/admin/roles/update/','AdminRolesUpdate')->name('update_admin_role');
        Route::get('/delete/admin/roles/{id}','AdminRoleDelete')->name('delete_admin_role');
    });
    //allAdmin
    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/admin','AllAdmin')->name('all_admin');
        Route::get('/add/admin','AddAdmin')->name('add_admin');
        Route::post('/store/admin','adminFinalStoreInfo')->name('store_admin');
        Route::get('/edit/admin/{id}','EditAdmin')->name('edit_admin');
        Route::post('/update/admin','adminFinalUpdateInfo')->name('update_admin');
        Route::get('/delete/admin/{id}','DeleteAdmin')->name('delete_admin');


    });
    ///// All Group //////
    Route::controller(GorupNameController::class)->group(function(){
        Route::get('/all/GroupName','AllGroupName')->name('all_group_name');
        Route::get('/add/GroupName','AddGroupName')->name('add_group_name');
        Route::post('/store/GroupName','StoreGroupName')->name('store_group_name');
        Route::get('/edit/GroupName/{id}','EditGroupName')->name('edit_group_name');
        Route::post('/update/GroupName','UpdateGroupName')->name('update_group_name');
        Route::get('/delete/GroupName/{id}','DeleteGroupName')->name('delete_group_name');
        Route::get('/acitve/GroupName/{id}','ActiveGroupName')->name('active_group_name');
        Route::get('/inactive/GroupName/{id}','InactiveGroupName')->name('inactive_group_name');
    });

});

