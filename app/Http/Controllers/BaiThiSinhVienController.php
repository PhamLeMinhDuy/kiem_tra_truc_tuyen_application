<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BaiThi;
use App\Models\SinhVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;

class BaiThiSinhVienController extends Controller
{
    public function index($id){
        $sinhVien = SinhVien::find($id);
        $tenSinhVien = $sinhVien->ten_sinh_vien;
        $maSinhVien = $sinhVien->ma_sinh_vien;
        $danhSachLopHocPhan = LopHocPhan::all();
        $thongTinLopHocPhan = [];
        $thongTinBaiThi = [];
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
                    $danhSachBaiThi = json_decode($lopHocPhan->danh_sach_bai_thi, true);
                    if (is_array($danhSachBaiThi)) {
                        foreach ($danhSachBaiThi as $baiThi) {
                            // Thêm mã bài thi vào mảng nếu thời gian kết thúc chưa đến
                            $thongTinLopHocPhan[] = [
                                'ten_lop_hoc_phan' => $lopHocPhan->ten_lop_hoc_phan,
                                'ma_bai_thi' => $baiThi['ma_bai_thi'],
                                'thoi_gian_bat_dau' => $lopHocPhan->thoi_gian_bat_dau,
                                'thoi_gian_ket_thuc' => $lopHocPhan->thoi_gian_ket_thuc,
                            ];
                        }
                    }
                }
            }
        }

        foreach ($thongTinLopHocPhan as $thongTin) {
            $maBaiThi = $thongTin['ma_bai_thi'];
            $baiThi = BaiThi::where('ma_bai_thi', $maBaiThi)->first();
            if ($baiThi) {
                $thongTinBaiThi[] = [
                    'ma_bai_thi' => $maBaiThi,
                    'ten_bai_thi' => $baiThi->ten_bai_thi,
                    'thoi_gian_bat_dau' => $baiThi->thoi_gian_bat_dau,
                    'thoi_gian_ket_thuc' => $baiThi->thoi_gian_ket_thuc,
                ];
            }
        }
        return view('sinhvien.bai-thi.index', [
            'title' => 'Bài thi sinh viên',
            'tenSinhVien' => $tenSinhVien,
            'id' => $id,
            'thongTinBaiThi' => $thongTinBaiThi,
        ]);
    }
    
}
