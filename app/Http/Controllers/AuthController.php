<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\GiangVien;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function dangNhapView() {
        return view('dang-nhap');
    }

    public function handleDangXuat() {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('dang-nhap'); // Chuyển hướng về trang đăng nhập
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
                // Kiểm tra người dùng là giảng viên
                $giangVien = GiangVien::where('email', $request->email)->first();
    
                // Nếu là sinh viên, chuyển hướng và truyền ID của sinh viên vào view
                if ($sinhVien) {
                    return response()->json([
                        'success'   => true,
                        'redirect'  => route('sinh-vien.quan-ly.dashboard.quan-ly-dashboard', ['id' => $sinhVien->id])
                    ]);
                } elseif ($giangVien) {
                    // Nếu là giảng viên, chuyển hướng và truyền ID của giảng viên vào view
                    return response()->json([
                        'success'   => true,
                        'redirect'  => route('giang-vien.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan-giang-vien', ['id' => $giangVien->id])
                    ]);
                } elseif ($nguoiDung->role == 'Admin') {
                    // Nếu là admin, chuyển hướng đến trang quản trị admin
                    return response()->json([
                        'success'   => true,
                        'redirect'  => route('admin.quan-ly.giang-vien.quan-ly-giang-vien')
                    ]);
                } else {
                    // Nếu không tồn tại trong cả ba trường hợp trên
                    // Thông báo tài khoản không có trong hệ thống
                    return response()->json([
                        'success'   => false,
                        'message'   => 'Tài khoản không tồn tại trong hệ thống'
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

    public function handleDangNhapVanLang($userEmail, $userName) {
        $nguoiDung = NguoiDung::where('email', $userEmail)->first();

        // Nếu người dùng không tồn tại, thêm vào bảng NguoiDung với vai trò "Chưa phân quyền"
        if (!$nguoiDung) {
            $nguoiDung = NguoiDung::create([
                'email' => $userEmail,
                'ho_ten' => $userName,
                'role' => 'Chưa phân quyền',
            ]);

            // Chuyển hướng đến trang thông báo và truyền email của người dùng
            return view('thong-bao',['userEmail' => $userEmail, 'message' => 'Tài khoản ' . $userEmail . ' hiện chưa được phân quyền. Vui lòng chờ để được phân quyền. Cảm ơn bạn đã kiên nhẫn!']);
        }

        // Nếu người dùng tồn tại nhưng chưa được phân quyền
        if ($nguoiDung->role == 'Chưa phân quyền') {
            // Chuyển hướng đến trang thông báo và truyền email của người dùng
            return view('thong-bao',['userEmail' => $userEmail, 'message' => 'Tài khoản ' . $userEmail . ' hiện chưa được phân quyền. Vui lòng chờ để được phân quyền. Cảm ơn bạn đã kiên nhẫn!']);
        }
    
        // Kiểm tra xem thông tin đăng nhập có hợp lệ không
        if ($nguoiDung) {
            // Đăng nhập người dùng
            Auth::login($nguoiDung);
            if (empty($nguoiDung->session_id)) {
                // Thêm session_id hiện tại vào cột session_id
                $nguoiDung->session_id = Session::getId();
                $nguoiDung->save();

                 // Kiểm tra xem người dùng là sinh viên
                $sinhVien = SinhVien::where('email', $userEmail)->first();
        
                // Kiểm tra người dùng là giảng viên
                $giangVien = GiangVien::where('email', $userEmail)->first();
        
                // Nếu là sinh viên, chuyển hướng và truyền ID của sinh viên vào view
                if ($sinhVien) {
                    // Chuyển hướng ngay sau khi xác nhận thành công
                    return redirect()->route('sinh-vien.quan-ly.dashboard.quan-ly-dashboard', ['id' => $sinhVien->id]);
                } elseif ($giangVien) {
                    // Chuyển hướng ngay sau khi xác nhận thành công
                    return redirect()->route('giang-vien.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan-giang-vien', ['id' => $giangVien->id]);
                } elseif ($nguoiDung->role == 'Admin') {
                    // Chuyển hướng ngay sau khi xác nhận thành công
                    return redirect()->route('admin.quan-ly.giang-vien.quan-ly-giang-vien');
                } else {
                    // Thông báo tài khoản không có trong hệ thống
                    return response()->json([
                        'success'   => false,
                        'message'   => 'Tài khoản không tồn tại trong hệ thống'
                    ]);
                }
            } else {
                // Nếu đã có session_id, chuyển hướng đến trang thông báo
                return view('thong-bao', ['userEmail' => $userEmail, 'message' => 'Tài khoản đã được đăng nhập trước đó và chưa được đăng xuất. Vui lòng đăng xuất tài khoản trước đó.']);
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