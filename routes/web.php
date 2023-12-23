<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhuongController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('Trang chủ');
    Route::post('/ward', [PhuongController::class, 'getPhuongByQuan'])->name('getPhuongByQuan');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('Thông tin cá nhân');
        Route::get('/ho_so', [ProfileController::class, 'index'])->name('Hồ sơ');
        Route::get('/update', [ProfileController::class, 'update'])->name('Cập nhật thông tin cá nhân');
        Route::post('/update', [ProfileController::class, 'save'])->name('Lưu thông tin cá nhân');
        Route::post('/avatar', [ProfileController::class, 'updateAvatar'])->name('Cập nhật avatar');
    });
});
