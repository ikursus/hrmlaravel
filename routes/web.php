<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    // Laravel akan cari folder resources/views
    // dan template bernama welcome.php atau welcome.blade.php

    $pageTitle = '<h1>Welcome Page</h1><script>alert("Anda dihack")</script>';
    $subTitle = 'Sub Title';
    $copyright = config('hrm.site.copyright');

    $senaraiUsers = [
        ['name' => 'Ahmad', 'email' => 'ahmad@gmail.com', 'status' => 'aktif'],
        ['name' => 'Ali', 'email' => 'ali@gmail.com', 'status' => 'banned'],
        ['name' => 'Abu', 'email' => 'abu@gmail.com', 'status' => 'pending'],
    ];

    // Cara 1 passing / attach data ke template
    // return view('welcome')->with('pageTitle', $pageTitle)->with('subTitle', $subTitle)->with('copyright', $copyright);
    // Cara 2 passing / attach data ke template
    // return view('welcome', ['pageTitle' => $pageTitle, 'subTitle' => $subTitle,'copyright' => $copyright]);
    // Cara 3 passing / attach data ke template
    return view('welcome', compact('pageTitle', 'subTitle', 'copyright', 'senaraiUsers'));
})->name('utama');

// Routing untuk paparkan borang login
Route::get('/signin', [LoginController::class, 'paparBorangLogin'])->name('login');
// Routing untuk terima data daripada borang login
Route::post('/login', [LoginController::class, 'checkLogin'])->name('login.authenticate');

Route::get('/signup', [RegisterController::class, 'paparBorangRegister'])->name('register.page');
Route::post('/signup', [RegisterController::class, 'saveRegistration'])->name('register.save');

Route::get('/forgot-password', [ForgotPasswordController::class, 'paparBorangForgotPasword'])->name('password.forgot');
Route::post('/forgot-password', [ForgotPasswordController::class, 'requestPassword'])->name('password.request');

