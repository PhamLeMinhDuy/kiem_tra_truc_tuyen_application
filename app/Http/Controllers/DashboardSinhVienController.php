<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\SinhVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;

class DashboardSinhVienController extends Controller
{
    public function index($id){
        $sinhVien = SinhVien::find($id);
        $tenSinhVien = $sinhVien->ten_sinh_vien;
        $maSinhVien = $sinhVien->ma_sinh_vien;
        $danhSachLopHocPhan = LopHocPhan::all();
        $thongTinLopHocPhan = [];
    
        $tatCaMaSinhVien = SinhVien::pluck('ma_sinh_vien')->toArray();
    
        foreach ($danhSachLopHocPhan as $lopHocPhan) {
            $danhSachSinhVien = json_decode($lopHocPhan->danh_sach_sinh_vien, true);
            // Kiểm tra xem mã sinh viên hiện tại có trong danh sách sinh viên của lớp học phần hay không
            if (is_array($danhSachSinhVien) && in_array(['ma_sinh_vien' => $maSinhVien], $danhSachSinhVien)) {
                // Chuyển đổi thời gian kết thúc của lớp học phần từ dạng string sang đối tượng Carbon
                $thoiGianKetThuc = Carbon::parse($lopHocPhan->thoi_gian_ket_thuc);
                // So sánh thời gian kết thúc của lớp học phần với thời gian hiện tại
                if ($thoiGianKetThuc->isFuture()) {
                    // Thêm thông tin lớp học phần vào mảng nếu thời gian kết thúc chưa đến
                    $thongTinLopHocPhan[] = [
                        'ten_lop_hoc_phan' => $lopHocPhan->ten_lop_hoc_phan,
                        'thoi_gian_bat_dau' => $lopHocPhan->thoi_gian_bat_dau,
                        'thoi_gian_ket_thuc' => $lopHocPhan->thoi_gian_ket_thuc,
                    ];
                }
            }
        }
        return view('sinhvien.dashboard.index', [
            'title' => 'Dashboard sinh viên',
            'tenSinhVien' => $tenSinhVien,
            'id' => $id,
            'thongTinLopHocPhan' => $thongTinLopHocPhan,
        ]);
    }
}
