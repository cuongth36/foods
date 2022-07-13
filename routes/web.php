<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
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
Route::middleware('user.active')->group(function () {
    Route::group(['prefix'=>'admin','as'=>'admin.'], function() {
        // Hiển thị thông tin dashboard gồm danh thu
        Route::get('/', function () {
            return view('layouts.admin-master-layout');
        });
        // Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

        Route::group(['prefix'=>'products','as'=>'products.'], function() {
            Route::get('/',  [ProductController::class, 'index'])->name('list');
            Route::get('/add', [ProductController::class, 'create'])->name('add');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
        });

    });

    // Route::prefix('admin')->group(function () {
    //     Route::get('/', function () {
    //         return view('layouts.admin-master-layout');
    //     });
    //     Route::get('product', [ProductController::class, 'create'])->name('add');
    // });
});


Route::get('blog', function () {
    return 123;
})->name('home.blogs');

// Đăng ký user
Route::get('dang-ky', [CustomerController::class, 'create'])->name('home.register');
Route::post('dang-ky', [CustomerController::class, 'store'])->name('user.register');
Route::get('xac-thuc-email/kich-hoat-nguoi-dung',  [CustomerController::class, 'activeUser'])->name('active.user');
Route::get('kich-hoat-thanh-cong', [CustomerController::class, 'activeSuccess'])->name('active.success');

// Thay đổi mật khẩu
Route::get('khoi-phuc-mat-khau',  [CustomerController::class, 'viewForgotPassword'])->name('user.view_forgot_password');
Route::post('khoi-phuc-mat-khau',  [CustomerController::class, 'forgotPassword'])->name('user.forgot_password');

// Đăng nhập, đăng xuất
Route::get('dang-nhap', function () {
    return view('login');
})->name('home.login');
Route::post('dang-nhap', [LoginController::class, 'login'])->name('login');
Route::get('dang-xuat', [LoginController::class, 'logout'])->name('logout');

// Giỏ hàng
Route::get('cart', function () {})->name('home.mycart');
Route::get('cart-of-user', function () {})->name('home.cartUser');

// Route::get('/', function () {
//     return view('welcome');
// });
