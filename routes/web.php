<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Livewire\Dashboard\HrDashboard;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'role:super_admin,hr'])->group(function () {
    Route::get('/dashboard', HrDashboard::class)->name('dashboard');
    Route::resource('users', UserManagementController::class);
    Route::get('/employees', App\Livewire\Employee\EmployeeList::class)->name('employees');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/attendance', App\Livewire\Attendance\AttendanceLogger::class)->name('timesheet');
    Route::get('/leave', App\Livewire\Leave\LeaveManager::class)->name('leave');
});

require __DIR__.'/auth.php';
