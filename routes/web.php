<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dang-nhap', [AuthController::class, 'dangNhapView'])->name('dang-nhap');
Route::get('/dang-ky', [AuthController::class, 'dangKyView'])->name('dang-ky');
Route::post('/dang-ky', [AuthController::class, 'handleDangKy'])->name('handle-dang-ky');