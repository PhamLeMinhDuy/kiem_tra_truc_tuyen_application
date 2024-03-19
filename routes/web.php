<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\HomeAdminController;


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
            Route::post('/quan-ly-giang-vien', [GiangVienController::class, 'handleCapNhatGiangVien'])->name('handle-cap-nhat-giang-vien');
        });
        Route::group(['prefix' => 'sinh-vien', 'as'=>'sinh-vien.'], function() {
            Route::get('/quan-ly-sinh-vien', [SinhVienController::class, 'index'])->name('quan-ly-sinh-vien');
        });
    });
});
