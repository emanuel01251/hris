<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:super_admin,hr'])->group(function () {
    Route::resource('users', UserManagementController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/attendance', App\Livewire\Attendance\AttendanceLogger::class)->name('timesheet');
    Route::get('/leave', App\Livewire\Leave\LeaveManager::class)->name('leave');
});

Route::middleware(['auth', 'role:super_admin,hr'])->group(function () {
    Route::get('/employees', App\Livewire\Employee\EmployeeList::class)->name('employees');
});

require __DIR__.'/auth.php';
