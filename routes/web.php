<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\NganhController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\LopHocPhanController;


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


Route::get('/admin', [HomeController::class, 'adminHome'])->name('trang-admin');

Route::get('/dang-nhap', [AuthController::class, 'dangNhapView'])->name('dang-nhap');
Route::get('/dang-ky', [AuthController::class, 'dangKyView'])->name('dang-ky');
Route::post('/dang-ky', [AuthController::class, 'handleDangKy'])->name('handle-dang-ky');
Route::post('/dang-nhap', [AuthController::class, 'handleDangNhap'])->name('handle-dang-nhap');

Route::group(['prefix' => 'admin', 'as'=>'admin.'], function() {
    Route::group(['prefix' => 'quan-ly', 'as'=>'quan-ly.'], function() {
        Route::group(['prefix' => 'giang-vien', 'as'=>'giang-vien.'], function() {
            Route::get('/quan-ly-giang-vien', [GiangVienController::class, 'index'])->name('quan-ly-giang-vien');
            Route::post('/quan-ly-giang-vien-cap-nhat', [GiangVienController::class, 'handleCapNhatGiangVien'])->name('handle-cap-nhat-giang-vien');
            Route::post('/quan-ly-giang-vien-them', [GiangVienController::class, 'handleThemGiangVien'])->name('handle-them-giang-vien');
            Route::post('/quan-ly-giang-vien-xoa', [GiangVienController::class, 'handleXoaGiangVien'])->name('handle-xoa-giang-vien');
            Route::post('/quan-ly-cac-mon-giang-day', [GiangVienController::class, 'handleCacMonGiangDay'])->name('handle-cac-mon-giang-day');
        });
        Route::group(['prefix' => 'sinh-vien', 'as'=>'sinh-vien.'], function() {
            Route::get('/quan-ly-sinh-vien', [SinhVienController::class, 'index'])->name('quan-ly-sinh-vien');
            Route::post('/quan-ly-sinh-vien-cap-nhat', [SinhVienController::class, 'handleCapNhatSinhVien'])->name('handle-cap-nhat-sinh-vien');
            Route::post('/quan-ly-sinh-vien-them', [SinhVienController::class, 'handleThemSinhVien'])->name('handle-them-sinh-vien');
            Route::post('/quan-ly-sinh-vien-xoa', [SinhVienController::class, 'handleXoaSinhVien'])->name('handle-xoa-sinh-vien');
        });
        Route::group(['prefix' => 'lop-hoc-phan', 'as'=>'lop-hoc-phan.'], function() {
            Route::get('/quan-ly-lop-hoc-phan', [LopHocPhanController::class, 'index'])->name('quan-ly-lop-hoc-phan');
        });
        Route::group(['prefix' => 'mon-hoc', 'as'=>'mon-hoc.'], function() {
            Route::get('/quan-ly-mon-hoc', [MonHocController::class, 'index'])->name('quan-ly-mon-hoc');
            Route::post('/quan-ly-mon-hoc-cap-nhat', [MonHocController::class, 'handleCapNhatMonHoc'])->name('handle-cap-nhat-mon-hoc');
            Route::post('/quan-ly-mon-hoc-them', [MonHocController::class, 'handleThemMonHoc'])->name('handle-them-mon-hoc');
            Route::post('/quan-ly-mon-hoc-xoa', [MonHocController::class, 'handleXoaMonHoc'])->name('handle-xoa-mon-hoc');
        });
        Route::group(['prefix' => 'nganh', 'as'=>'nganh.'], function() {
            Route::get('/quan-ly-nganh', [NganhController::class, 'index'])->name('quan-ly-nganh');
            Route::post('/quan-ly-nganh-cap-nhat', [NganhController::class, 'handleCapNhatNganh'])->name('handle-cap-nhat-nganh');
            Route::post('/quan-ly-nganh-them', [NganhController::class, 'handleThemNganh'])->name('handle-them-nganh');
            Route::post('/quan-ly-nganh-xoa', [NganhController::class, 'handleXoaNganh'])->name('handle-xoa-nganh');
        });
        Route::group(['prefix' => 'khoa', 'as'=>'khoa.'], function() {
            Route::get('/quan-ly-khoa', [KhoaController::class, 'index'])->name('quan-ly-khoa');
            Route::post('/quan-ly-khoa-cap-nhat', [KhoaController::class, 'handleCapNhatkhoa'])->name('handle-cap-nhat-khoa');
            Route::post('/quan-ly-khoa-them', [KhoaController::class, 'handleThemkhoa'])->name('handle-them-khoa');
            Route::post('/quan-ly-khoa-xoa', [KhoaController::class, 'handleXoakhoa'])->name('handle-xoa-khoa');
        });
        Route::group(['prefix' => 'lop-hoc-phan', 'as'=>'lop-hoc-phan.'], function() {
            Route::get('/quan-ly-lop-hoc-phan', [LopHocPhanController::class, 'index'])->name('quan-ly-lop-hoc-phan');
            Route::post('/quan-ly-lop-hoc-phan-cap-nhat', [LopHocPhanController::class, 'handleCapNhatlop-hoc-phan'])->name('handle-cap-nhat-lop-hoc-phan');
            Route::post('/quan-ly-lop-hoc-phan-them', [LopHocPhanController::class, 'handleThemlop-hoc-phan'])->name('handle-them-lop-hoc-phan');
            Route::post('/quan-ly-lop-hoc-phan-xoa', [LopHocPhanController::class, 'handleXoalop-hoc-phan'])->name('handle-xoa-lop-hoc-phan');
        });
    });
});
