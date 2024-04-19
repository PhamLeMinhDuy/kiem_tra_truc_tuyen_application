<?php

namespace App\Http\Controllers;

use App\Models\KetQua;
use App\Models\SinhVien;
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
                $ketQuaArray[] = [
                    'maBaiThi' => $ketQua->ma_bai_thi,
                    'tenBaiThi' => $ketQua->ten_bai_thi,
                    'diem' => $ketQua->diem,
                    'soCauDung' => $ketQua->so_cau_tra_loi_dung,
                ];
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
