<?php

namespace App\Http\Controllers;

use App\Models\KetQua;
use App\Models\SinhVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class XemDiemController extends Controller
{
    public function index($id) {
        $sinhVien = SinhVien::find($id);
        $tenSinhVien = $sinhVien->ten_sinh_vien;
        $maSinhVien = $sinhVien->ma_sinh_vien;
    
        // Lấy danh sách kết quả của sinh viên có mã $maSinhVien
        $ketQuas = KetQua::where('ma_sinh_vien', $maSinhVien)->get();
        $ketQuaArray = [];
    
        foreach ($ketQuas as $ketQua) {
            $maBaiThi = $ketQua->ma_bai_thi;
    
            // Lấy thông tin từ cột bai_thi của bảng SinhVien
            $sinhVienBaiThi = SinhVien::whereJsonContains('bai_thi', ['ma_bai_thi' => $maBaiThi])->first();
    
            if ($sinhVienBaiThi) {
                // Trích xuất mã lớp học phần từ cột bai_thi nếu tồn tại
                $baiThiData = json_decode($sinhVienBaiThi->bai_thi, true);
    
                foreach ($baiThiData as $baiThi) {
                    // Kiểm tra xem ma_bai_thi từ bảng KetQua có tồn tại trong bai_thi của sinh viên
                    if ($baiThi['ma_bai_thi'] === $maBaiThi) {
                        $maLopHocPhan = $baiThi['ma_lop_hoc_phan'];
    
                        // Lấy thông tin lớp học phần từ bảng LopHocPhan
                        $lopHocPhan = LopHocPhan::where('ma_lop_hoc_phan', $maLopHocPhan)->first();
    
                        // Kiểm tra xem lớp học phần có tồn tại không trước khi thêm vào mảng kết quả
                        if ($lopHocPhan) {
                            // Thêm thông tin kết quả vào mảng
                            $ketQuaArray[] = [
                                'maBaiThi' => $ketQua->ma_bai_thi,
                                'tenBaiThi' => $ketQua->ten_bai_thi,
                                'diem' => $ketQua->diem,
                                'soCauDung' => $ketQua->so_cau_tra_loi_dung,
                                'maLopHocPhan' => $maLopHocPhan,
                                'tenLopHocPhan' => $lopHocPhan->ten_lop_hoc_phan, // Thêm tên lớp học phần vào mảng
                            ];
                        }
                    }
                }
            }
        }
    
        return view('sinhvien.xem-diem.index', [
            'title' => 'Xem điểm',
            'tenSinhVien' => $tenSinhVien,
            'id' => $id,
            'ketQuas' => $ketQuaArray,
        ]);
    }
    
    public function handleThemDiemSinhVien(Request $request) {
        $id = $request->id;
        $sinhVien = SinhVien::find($id);
        $maSinhVien = $sinhVien->ma_sinh_vien;
        $ketQua = new KetQua;
        $ketQua->ma_bai_thi = $request->ma_bai_thi;
        $ketQua->ten_bai_thi = $request->ten_bai_thi;
        $ketQua->diem =  $request->diem;
        $ketQua->ma_sinh_vien = $maSinhVien;
        $ketQua->so_cau_tra_loi_dung = $request->so_cau_tra_loi_dung;
        $ketQua->save();
        $baiThiJson = $sinhVien->bai_thi;

        // Chuyển chuỗi JSON thành mảng PHP
        $baiThiArray = json_decode($baiThiJson, true);
    
        // Thêm mã bài thi và mã lớp học phần vào mảng
        $baiThiArray[] = [
            'ma_bai_thi' => $request->ma_bai_thi,
            'ma_lop_hoc_phan' => $request->ma_lop_hoc_phan,
        ];
    
        // Chuyển mảng thành chuỗi JSON mới
        $baiThiJsonUpdated = json_encode($baiThiArray);
    
        // Cập nhật cột bai_thi của sinh viên
        $sinhVien->bai_thi = $baiThiJsonUpdated;
        $sinhVien->save();
        return response()->json([
            'success'   => true,
            'redirect'   => route('sinh-vien.quan-ly.bai-thi.quan-ly-bai-thi-sinh-vien', ['id' => $id])
        ]);
    }
}
