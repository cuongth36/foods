<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\UserActive;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');


// Admin
// Route::middleware('auth')->group(function () {
    // Route::middleware([UserActive::class])->group(function () { 
        Route::prefix('admin')->group(function () {
            Route::get('/dashboard', function () {
                return view('layouts.admin-master-layout');
            });
        });
    // });
// });


Route::get('blog', function () {
    return 123;
})->name('home.blogs');


// User
Route::get('dang-ky', [CustomerController::class, 'create'])->name('home.register');
Route::post('dang-ky', [CustomerController::class, 'store'])->name('user.register');
Route::get('xac-thuc-email/kich-hoat-nguoi-dung',  [CustomerController::class, 'activeUser'])->name('active.user');
Route::get('kich-hoat-thanh-cong', [CustomerController::class, 'activeSuccess'])->name('active.success');
Route::get('khoi-phuc-mat-khau',  [CustomerController::class, 'viewForgotPassword'])->name('user.view_forgot_password');
Route::post('khoi-phuc-mat-khau',  [CustomerController::class, 'forgotPassword'])->name('user.forgot_password');
// Route::get('dang-nhap1', function () { return view('login'); });
Route::get('dang-nhap', function () { return view('login'); })->name('home.login');
Route::post('dang-nhap', [LoginController::class, 'login'])->name('login');
Route::get('dang-xuat', [LoginController::class, 'logout'])->name('logout');


Route::post('dang-xuat', function () {
    return 'dang xuat';
})->name('home.logout');

// Route::get('/', function () {
//     return view('welcome');
// });
