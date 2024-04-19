<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthController extends Controller
{
    public function dangNhapView() {
        return view('dang-nhap');
    }

    public function dangKyView() {
        return view('dang-ky');
    }

    public function handleDangKy(Request $request) {
        $validator = Validator::make($request->all(), [
            'ten' => 'regex:/^[A-Za-z\s]+$/',
            'email' => 'email',
            'matKhau' => 'min:8|regex:/^[a-zA-Z0-9]+$/',
        ], [
            'ten.regex' => 'Tên người dùng phải là kiểu chữ và không có ký tự đặc biệt.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'matKhau.min' => 'Mật khấu phải lớn hơn 8 ký tự.',
            'matKhau.regex' => 'Mật khẩu không được chứa ký tự đặc biệt.',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => $validator->errors()->first(),
            ]);
        }

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

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => $validator->errors()->second(),
                'timer'     => 5000 
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
    public function handleDangNhap(Request $request) {
        // Kiểm tra và xử lý các trường hợp lỗi
        if (empty($request->email)) {
            // Trả về thông báo lỗi nếu email trống
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng nhập email!'
            ]);
        }
    
        if (empty($request->matKhau)) {
            // Trả về thông báo lỗi nếu mật khẩu trống
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng nhập mật khẩu!'
            ]);
        }
    
        // Kiểm tra email và mật khẩu từ yêu cầu đăng nhập
        if ($request->filled(['email', 'matKhau'])) {
            // Lấy thông tin người dùng từ cơ sở dữ liệu
            $nguoiDung = NguoiDung::where('email', $request->email)->first();
            
            // Kiểm tra xem thông tin đăng nhập có hợp lệ không
            if ($nguoiDung && Hash::check($request->matKhau, $nguoiDung->mat_khau)) {
                // Đăng nhập người dùng
                Auth::login($nguoiDung);
    
                // Kiểm tra xem người dùng là sinh viên
                $sinhVien = SinhVien::where('email', $request->email)->first();
    
                // Nếu là sinh viên, chuyển hướng và truyền ID của sinh viên vào view
                if ($sinhVien) {
                    return response()->json([
                        'success'   => true,
                        'redirect'  => route('sinh-vien.quan-ly.dashboard.quan-ly-dashboard', ['id' => $sinhVien->id])
                    ]);
                } elseif ($nguoiDung->role == 'Admin') {
                    // Nếu là admin, chuyển hướng đến trang quản trị admin
                    return response()->json([
                        'success'   => true,
                        'redirect'  => route('admin.quan-ly.giang-vien.quan-ly-giang-vien')
                    ]);
                } else {
                    // Nếu không phải sinh viên hoặc admin, chuyển hướng đến trang chính
                    return response()->json([
                        'success'   => true,
                        'redirect'  => route('home')
                    ]);
                }
            }
        }
    
        // Trả về thông báo lỗi nếu thông tin đăng nhập không hợp lệ
        return response()->json([
            'success'   => false,
            'type'      => 'error',
            'message'   => 'Thông tin đăng nhập không hợp lệ.'
        ]);
    }
}