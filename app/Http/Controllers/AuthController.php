<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function dangNhapView() {
        return view('dang-nhap');
    }

    public function dangKyView() {
        return view('dang-ky');
    }

    public function handleDangKy(Request $request) {

        dd("A");
        if (empty($request->ten)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng nhập họ tên!'
            ]);
        }

        if (empty($request->email)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng nhập email!'
            ]);
        }

        if (empty($request->matKhau)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng nhập mật khẩu!'
            ]);
        }

        if (empty($request->xacNhanMatKhau)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng nhập mật khẩu xác nhận!'
            ]);
        }

        

        if($request->xacNhanMatKhau != $request->matKhau){
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mật khẩu không khớp!'
            ]);
        }

        $emailExist = NguoiDung::where('email', $request->email)->exists();
        if($emailExist) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Email này đã đăng ký tài khoản!'
            ]);
        }

        $nguoiDungMoi = new NguoiDung;
        $nguoiDungMoi->ho_ten = $request->ten;
        $nguoiDungMoi->email = $request->email;
        $nguoiDungMoi->mat_khau = Hash::make($request->matKhau);
        $nguoiDungMoi->save();

        return response()->json([
            'success'   => true,
            'redirect'   => route('dang-nhap')
        ]);
    }
}
