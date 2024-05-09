<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CutiController;

Route::get('/', HomeController::class)->name('utama');

// Routing untuk paparkan borang login
Route::get('/signin', [LoginController::class, 'paparBorangLogin'])->name('login');
// Routing untuk terima data daripada borang login
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login.authenticate');

Route::get('/signup', [RegisterController::class, 'paparBorangRegister'])->name('register.page');
Route::post('/signup', [RegisterController::class, 'saveRegistration'])->name('register.save');

Route::get('/forgot-password', [ForgotPasswordController::class, 'paparBorangForgotPasword'])->name('password.forgot');
Route::post('/forgot-password', [ForgotPasswordController::class, 'requestPassword'])->name('password.request');



// Pengurusan Users
// Route untuk paparkan senarai users dari DB
// Route::get('/users', [UserController::class, 'index'])->name('users.index');

// // Route untuk papar borang tambah user
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// // Route untuk terima data daripada borang tambah user dan simpan rekod
// Route::get('/users/create', [UserController::class, 'store'])->name('users.store');

// // Route untuk paparkan butiran / detail user yang dipilih berdasarkan parameter id / username etc
// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

// // Route untuk paparkan borang kemaskini user yang dipilih berdasarkan parameter id / username etc
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

// // Route untuk terima data daripada borang edit user dan simpan rekod
// Route::patch('/users/{user}/edit', [UserController::class, 'update'])->name('users.update');

// // Route untuk hapus user daripada DB
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('/users', UserController::class);

    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti/create', [CutiController::class, 'store'])->name('cuti.store');
    Route::get('/cuti/{cuti}/edit', [CutiController::class, 'edit'])->name('cuti.edit'); // Kalau nak guna resource parameter dan Dependencies Injection Model Cuti pada Controller
    Route::patch('/cuti/{id}/edit', [CutiController::class, 'update'])->name('cuti.update');
    Route::delete('/cuti/{cuti}', [CutiController::class, 'destroy'])->name('cuti.destroy');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});

// Route::middleware(['auth'])->group(function () {});





