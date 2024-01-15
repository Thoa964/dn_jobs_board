<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BaiDangController;
use App\Http\Controllers\BaiDangCuaToiController;
use App\Http\Controllers\DangKyUngTuyenController;
use App\Http\Controllers\DuAnCaNhanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HoSoController;
use App\Http\Controllers\NganhNgheController;
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

Route::post('/login', [
    'uses' => 'App\Http\Controllers\Auth\LoginController@login',
    'middleware' => 'phe_duyet'
]);

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('Trang chủ');
    Route::get('/register/company', [RegisterController::class, 'companyRegister'])->name(__('register.company'));
    Route::post('/register/company', [RegisterController::class, 'doRegister'])->name('company.register');
    Route::post('/ward', [PhuongController::class, 'getPhuongByQuan'])->name('getPhuongByQuan');
});

Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', [BaiDangController::class, 'index'])->name('Danh sách công việc');
    Route::get('/tim-kiem', [BaiDangController::class, 'search'])->name('Tìm kiếm');

    Route::group(['middleware' => 'doanh_nghiep'], function () {
        Route::get('/create', [BaiDangController::class, 'create'])->name('Đăng bài tuyển dụng');
        Route::post('/create', [BaiDangController::class, 'store'])->name('Lưu bài đăng');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/{ma_bai_dang}/ung-tuyen', [DangKyUngTuyenController::class, 'ungTuyen'])->name('Ứng tuyển');
    });

    Route::get('/{ma_bai_dang}', [BaiDangController::class, 'show'])->name('Chi tiết công việc');
    Route::get('/{ma_bai_dang}/edit', [BaiDangController::class, 'edit'])->name('Sửa bài');
    Route::post('/{ma_bai_dang}/edit', [BaiDangController::class, 'update'])->name('Cập nhật bài đăng');
    Route::get('/{ma_bai_dang}/ung-vien', [BaiDangController::class, 'showListUngVien'])->name('Danh sách ứng viên');
    Route::post('/{ma_bai_dang}/ung-vien', [BaiDangController::class, 'updateTrangThaiDangKy'])->name('Cập nhật trang thái đăng ký');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'me'], function () {
        Route::get('/bai-dang', [BaiDangCuaToiController::class, 'index'])->name('Bài đăng của tôi');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('Thông tin cá nhân');
        Route::get('/update', [ProfileController::class, 'update'])->name('Cập nhật thông tin cá nhân');
        Route::post('/update', [ProfileController::class, 'save'])->name('Lưu thông tin cá nhân');
        Route::post('/avatar', [ProfileController::class, 'updateAvatar'])->name('Cập nhật avatar');
    });

    Route::group(['prefix' => 'ho-so'], function () {
       Route::post('/', [ProfileController::class, 'updateHoSo'])->name('Cập nhật hồ sơ');
       Route::post('/bang-cap', [ProfileController::class, 'insertBangCap'])->name('Thêm mới bằng cấp');
       Route::delete('/bang-cap/{ma_bang_cap}', [ProfileController::class, 'deleteBangCap'])->name('Xóa bằng cấp');
       Route::post('/ky-nang', [ProfileController::class, 'insertKyNang'])->name('Thêm mới kỹ năng');
       Route::delete('/ky-nang/{ma_ky_nang}', [ProfileController::class, 'deleteKyNang'])->name('Xóa kỹ năng');
       Route::post('/du-an', [ProfileController::class, 'insertDuAn'])->name('Thêm mới dự án');
       Route::delete('/du-an/{ma_du_an}', [ProfileController::class, 'deleteDuAn'])->name('Xóa dự án');
    });

    Route::group(['prefix' => 'du-an'], function () {
        Route::get('/{ma_du_an}', [DuAnCaNhanController::class, 'show'])->name('Chi tiết dự án');
    });

    Route::group(['prefix' => 'ho-so'], function () {
        Route::get('/{ma_ho_so}', [HoSoController::class, 'show'])->name('Chi tiết hồ sơ');
    });

    Route::group(['prefix' => 'nganh-nghe'], function () {
        Route::post('/', [NganhNgheController::class, 'store'])->name('Tạo mới ngành nghề');
    });

    Route::group(['prefix' => 'password'], function () {
        Route::post('/change', [ChangePasswordController::class, 'changePassword'])->name('Đổi mật khẩu');
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('Trang thống kê');
    Route::get('/users', [UserController::class, 'index'])->name('Quản lý người dùng');
    Route::post('/users', [UserController::class, 'save'])->name('Tạo mới người dùng');
    Route::get('/users/{tai_khoan}/deactivate', [UserController::class, 'deactivate'])->name('Khóa người dùng');
    Route::get('/users/{tai_khoan}/activate', [UserController::class, 'activate'])->name('Mở khóa người dùng');
    Route::get('/users/{tai_khoan}/regenerate-password', [UserController::class, 'regeneratePassword'])
        ->name('Cấp lại mật khẩu');
});
