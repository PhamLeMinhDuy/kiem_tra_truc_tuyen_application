<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BaiThi;
use App\Models\SinhVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                $thoiGianBatDau = Carbon::parse($baiThi->thoi_gian_bat_dau)->format('l, d/m/Y, H:i');
                $thoiGianKetThuc = Carbon::parse($baiThi->thoi_gian_ket_thuc)->format('l, d/m/Y, H:i');
                $danhSachCauHoi = json_decode($baiThi->danh_sach_cau_hoi, true);
                $tongSoCauHoi = count($danhSachCauHoi);
                $thongTinBaiThi[] = [
                    'ma_bai_thi' => $maBaiThi,
                    'ten_bai_thi' => $baiThi->ten_bai_thi,
                    'thoi_gian_bat_dau' => $thoiGianBatDau,
                    'thoi_gian_ket_thuc' => $thoiGianKetThuc,
                    'tongSoCauHoi' => $tongSoCauHoi,
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

    public function lamBaiThi($id, $maBaiThi){
        $sinhVien = SinhVien::find($id);
        $tenSinhVien = $sinhVien->ten_sinh_vien;
        $maSinhVien = $sinhVien->ma_sinh_vien;
        $baiThi = BaiThi::where('ma_bai_thi', $maBaiThi)->first();

        // Kiểm tra xem bài thi có tồn tại hay không
        if ($baiThi) {
            // Trích xuất thông tin về bài thi
            $tenBaiThi = $baiThi->ten_bai_thi;
            $thoiGianBatDau = $baiThi->thoi_gian_bat_dau;
            $thoiGianKetThuc = $baiThi->thoi_gian_ket_thuc;
            $moTa = $baiThi->mo_ta;
            $thoiGianBatDauThi = Carbon::parse($baiThi->thoi_gian_bat_dau);
            $thoiGianKetThucThi = Carbon::parse($baiThi->thoi_gian_ket_thuc);
            //Tính thòi gian
            $thoiGianLamBai = $thoiGianBatDauThi->diffInMinutes($thoiGianKetThucThi);
            $sogio = floor($thoiGianLamBai / 60);
            $sophut = $thoiGianLamBai % 60;
            // Truyền thông tin vào view
            return view('sinhvien.lam-bai-thi.index', [
                'title' => 'Bài thi',
                'tenSinhVien' => $tenSinhVien,
                'id' => $id,
                'tenBaiThi' => $tenBaiThi,
                'thoiGianBatDau' => $thoiGianBatDau,
                'thoiGianKetThuc' => $thoiGianKetThuc,
                'thoiGianLamBai' => $thoiGianLamBai,
                'thoiGianKetThucThi' => $thoiGianKetThucThi,
                'moTa' => $moTa,
                'sogio' => $sogio,
                'sophut' => $sophut,
                'maBaiThi' => $maBaiThi,
            ]);
        } else {
            // Xử lý trường hợp không tìm thấy bài thi
            return redirect()->back()->with('error', 'Không tìm thấy thông tin bài thi');
        }
    }

    public function lamBaiThiTracNghiem($id, $maBaiThi) {
        $sinhVien = SinhVien::find($id);
        $tenSinhVien = $sinhVien->ten_sinh_vien;
        $maSinhVien = $sinhVien->ma_sinh_vien;
        $baiThi = BaiThi::where('ma_bai_thi', $maBaiThi)->first();
        $tenBaiThi = $baiThi->ten_bai_thi;
        $thoiGianBatDau = $baiThi->thoi_gian_bat_dau;
        $thoiGianKetThuc = $baiThi->thoi_gian_ket_thuc;
        $thoiGianBatDauThi = Carbon::parse($baiThi->thoi_gian_bat_dau);
        $thoiGianKetThucThi = Carbon::parse($baiThi->thoi_gian_ket_thuc);
            //Tính thòi gian
        $thoiGianLamBai = $thoiGianBatDauThi->diffInMinutes($thoiGianKetThucThi);
        
        $danhSachCauHoi = json_decode($baiThi->danh_sach_cau_hoi, true);
        $totalQuestions = count($danhSachCauHoi);
        $totalPages = ceil($totalQuestions / 5);

        $maLopHocPhan = null;
        $danhSachBaiThi = DB::table('lop_hoc_phan')
            ->whereJsonContains('danh_sach_bai_thi', ['ma_bai_thi' => $maBaiThi])
            ->pluck('ma_lop_hoc_phan')
            ->first();

        if ($danhSachBaiThi) {
            $maLopHocPhan = $danhSachBaiThi;

            //Lấy tên lớp
            $tenLopHocPhan = DB::table('lop_hoc_phan')
            ->where('ma_lop_hoc_phan', $maLopHocPhan)
            ->value('ten_lop_hoc_phan');
        }
        return view('sinhvien.lam-bai-thi.lam-bai-thi',[
            'title' => 'Làm bài thi trắc nghiệm',
            'id' => $id,
            'maBaiThi' => $maBaiThi,
            'tenBaiThi' => $tenBaiThi,
            'thoiGianBatDau' => $thoiGianBatDau,
            'thoiGianKetThuc' => $thoiGianKetThuc,
            'thoiGianLamBai' => $thoiGianLamBai,
            'thoiGianKetThucThi' => $thoiGianKetThucThi,
            'maLopHocPhan' => $maLopHocPhan,
            'tenLopHocPhan' => $tenLopHocPhan,
            'danhSachCauHoi' => $danhSachCauHoi,
            'totalQuestions' => $totalQuestions,
            'totalPages' => $totalPages,
        ]);
    }
    
}
