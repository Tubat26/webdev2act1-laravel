<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('auth.index');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
Route::post('/user-login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/register', [AuthController::class, 'indexRegister'])->name('auth.register');
Route::post('/user-register', [AuthController::class, 'userRegister'])->name('auth.userRegister');

Route::middleware([AuthCheck::class])->group(function () {
    // Student Records View
    Route::get('/students', [StudentsController::class, 'myWelcomeView'])->name('std.myWelcomeView');
    
    // Create Student
    Route::post('/create', [StudentsController::class, 'createNewStd'])->name('std.createNew');
    
    // Update Student
    Route::put('/update/{id}', [StudentsController::class, 'updateStd'])->name('std.update');

    // Delete Student (Ensure this is correctly defined)
    Route::delete('/delete/{id}', [StudentsController::class, 'deleteStd'])->name('std.delete');
});

// Logout Route (Accessible to authenticated users)
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
