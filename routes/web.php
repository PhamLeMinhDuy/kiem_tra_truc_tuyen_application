<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhoaController;
use App\Http\Controllers\NganhController;
use App\Http\Controllers\BaiThiController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\LopHocPhanController;
use App\Http\Controllers\BaiThiSinhVienController;
use App\Http\Controllers\DashboardSinhVienController;


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
            Route::put('/quan-ly-giang-vien-cap-nhat', [GiangVienController::class, 'handleCapNhatGiangVien'])->name('handle-cap-nhat-giang-vien');
            Route::post('/quan-ly-giang-vien-them', [GiangVienController::class, 'handleThemGiangVien'])->name('handle-them-giang-vien');
            Route::post('/quan-ly-giang-vien-xoa', [GiangVienController::class, 'handleXoaGiangVien'])->name('handle-xoa-giang-vien');
            Route::post('/quan-ly-cac-mon-giang-day', [GiangVienController::class, 'handleCacMonGiangDay'])->name('handle-cac-mon-giang-day');
        });
        Route::group(['prefix' => 'sinh-vien', 'as'=>'sinh-vien.'], function() {
            Route::get('/quan-ly-sinh-vien', [SinhVienController::class, 'index'])->name('quan-ly-sinh-vien');
            Route::put('/quan-ly-sinh-vien-cap-nhat', [SinhVienController::class, 'handleCapNhatSinhVien'])->name('handle-cap-nhat-sinh-vien');
            Route::post('/quan-ly-sinh-vien-them', [SinhVienController::class, 'handleThemSinhVien'])->name('handle-them-sinh-vien');
            Route::post('/quan-ly-sinh-vien-xoa', [SinhVienController::class, 'handleXoaSinhVien'])->name('handle-xoa-sinh-vien');
        });
        Route::group(['prefix' => 'mon-hoc', 'as'=>'mon-hoc.'], function() {
            Route::get('/quan-ly-mon-hoc', [MonHocController::class, 'index'])->name('quan-ly-mon-hoc');
            Route::put('/quan-ly-mon-hoc-cap-nhat', [MonHocController::class, 'handleCapNhatMonHoc'])->name('handle-cap-nhat-mon-hoc');
            Route::post('/quan-ly-mon-hoc-them', [MonHocController::class, 'handleThemMonHoc'])->name('handle-them-mon-hoc');
            Route::post('/quan-ly-mon-hoc-xoa', [MonHocController::class, 'handleXoaMonHoc'])->name('handle-xoa-mon-hoc');
        });
        Route::group(['prefix' => 'nganh', 'as'=>'nganh.'], function() {
            Route::get('/quan-ly-nganh', [NganhController::class, 'index'])->name('quan-ly-nganh');
            Route::put('/quan-ly-nganh-cap-nhat', [NganhController::class, 'handleCapNhatNganh'])->name('handle-cap-nhat-nganh');
            Route::post('/quan-ly-nganh-them', [NganhController::class, 'handleThemNganh'])->name('handle-them-nganh');
            Route::post('/quan-ly-nganh-xoa', [NganhController::class, 'handleXoaNganh'])->name('handle-xoa-nganh');
        });
        Route::group(['prefix' => 'khoa', 'as'=>'khoa.'], function() {
            Route::get('/quan-ly-khoa', [KhoaController::class, 'index'])->name('quan-ly-khoa');
            Route::put('/quan-ly-khoa-cap-nhat', [KhoaController::class, 'handleCapNhatkhoa'])->name('handle-cap-nhat-khoa');
            Route::post('/quan-ly-khoa-them', [KhoaController::class, 'handleThemkhoa'])->name('handle-them-khoa');
            Route::post('/quan-ly-khoa-xoa', [KhoaController::class, 'handleXoakhoa'])->name('handle-xoa-khoa');
        });
        Route::group(['prefix' => 'lop-hoc-phan', 'as'=>'lop-hoc-phan.'], function() {
            Route::get('/quan-ly-lop-hoc-phan', [LopHocPhanController::class, 'index'])->name('quan-ly-lop-hoc-phan');
            Route::put('/quan-ly-lop-hoc-phan-cap-nhat', [LopHocPhanController::class, 'handleCapNhatLopHocPhan'])->name('handle-cap-nhat-lop-hoc-phan');
            Route::put('/quan-ly-lop-hoc-phan-cap-nhat-danh-sach-sinh-vien', [LopHocPhanController::class, 'handleCapNhatDanhSachSinhVienLopHocPhan'])->name('handle-cap-nhat-danh-sach-sinh-vien-lop-hoc-phan');
            Route::put('/quan-ly-lop-hoc-phan-cap-nhat-danh-sach-giang-vien', [LopHocPhanController::class, 'handleCapNhatDanhSachGiangVienLopHocPhan'])->name('handle-cap-nhat-danh-sach-giang-vien-lop-hoc-phan');
            Route::put('/quan-ly-lop-hoc-phan-cap-nhat-danh-sach-bai-thi', [LopHocPhanController::class, 'handleCapNhatDanhSachBaiThiLopHocPhan'])->name('handle-cap-nhat-danh-sach-bai-thi-lop-hoc-phan');
            Route::post('/quan-ly-lop-hoc-phan-them', [LopHocPhanController::class, 'handleThemLopHocPhan'])->name('handle-them-lop-hoc-phan');
            Route::post('/quan-ly-lop-hoc-phan-xoa', [LopHocPhanController::class, 'handleXoaLopHocPhan'])->name('handle-xoa-lop-hoc-phan');
        });
        Route::group(['prefix' => 'bai-thi', 'as'=>'bai-thi.'], function() {
            Route::get('/quan-ly-bai-thi', [BaiThiController::class, 'index'])->name('quan-ly-bai-thi');
            Route::get('/quan-ly-bai-thi-cau-hoi/{id}', [BaiThiController::class, 'handleCauHoi'])->name('quan-ly-bai-thi-cau-hoi');
            Route::put('/quan-ly-bai-thi-cap-nhat', [BaiThiController::class, 'handleCapNhatBaiThi'])->name('handle-cap-nhat-bai-thi');
            Route::post('/quan-ly-bai-thi-them', [BaiThiController::class, 'handleThemBaiThi'])->name('handle-them-bai-thi');
            Route::post('/quan-ly-bai-thi-xoa', [BaiThiController::class, 'handleXoaBaiThi'])->name('handle-xoa-bai-thi');
            Route::post('/quan-ly-bai-thi-them-cau-hoi', [BaiThiController::class, 'handleThemCauHoi'])->name('handle-them-bai-thi-cau-hoi');
        });
        Route::group(['prefix' => 'nguoi-dung', 'as'=>'nguoi-dung.'], function() {
            Route::get('/quan-ly-nguoi-dung', [NguoiDungController::class, 'index'])->name('quan-ly-nguoi-dung');
            Route::put('/quan-ly-nguoi-dung-cap-nhat', [NguoiDungController::class, 'handleCapNhatNguoiDung'])->name('handle-cap-nhat-nguoi-dung');
            Route::post('/quan-ly-nguoi-dung-them', [NguoiDungController::class, 'handleThemNguoiDung'])->name('handle-them-nguoi-dung');
            Route::post('/quan-ly-nguoi-dung-xoa', [NguoiDungController::class, 'handleXoaNguoiDung'])->name('handle-xoa-nguoi-dung');
        });
    });
});

Route::group(['prefix' => 'sinh-vien', 'as'=>'sinh-vien.'], function() {
    Route::group(['prefix' => 'quan-ly', 'as'=>'quan-ly.'], function() {
        Route::group(['prefix' => '', 'as'=>'trang-chu.'], function() {
            Route::get('/sinh-vien/{id}', [HomeController::class, 'sinhVienHome'])->name('trang-sinh-vien');
        });
        Route::get('/quan-ly-dashboard/{id}', [DashboardSinhVienController::class, 'index'])->name('quan-ly-dashboard');
        Route::get('/quan-ly-bai-thi-sinh-vien/{id}', [BaiThiSinhVienController::class, 'index'])->name('quan-ly-bai-thi-sinh-vien');
    });
});