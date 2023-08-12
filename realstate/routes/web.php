<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Agent\AgentController;



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

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
});
Route::middleware(['auth','role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});
