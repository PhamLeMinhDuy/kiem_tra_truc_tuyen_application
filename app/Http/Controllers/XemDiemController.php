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
        $maSinhVien = $sinhVien->ma_sinh_vien;
        $tenSinhVien = $sinhVien->ten_sinh_vien;
        
        // Lấy danh sách kết quả của sinh viên có mã $maSinhVien
        $ketQuas = KetQua::where('ma_sinh_vien', $maSinhVien)->get();
    
        if ($ketQuas->isNotEmpty()) {
            // Tạo một mảng chứa thông tin các kết quả
            $ketQuaArray = [];
            foreach ($ketQuas as $ketQua) {
                $ketQuaArray[] = [
                    'maBaiThi' => $ketQua->ma_bai_thi,
                    'tenBaiThi' => $ketQua->ten_bai_thi,
                    'diem' => $ketQua->diem,
                    'soCauDung' => $ketQua->so_cau_tra_loi_dung,
                ];
            }
    
            // Truyền dữ liệu cho view
            return view('sinhvien.xem-diem.index', [
                'title' => 'Xem điểm',
                'tenSinhVien' => $tenSinhVien,
                'id' => $id,
                'ketQuas' => $ketQuaArray,
            ]);
        } else {
            // Xử lý trường hợp không có kết quả
            return view('sinhvien.xem-diem.index')->with('error', 'Không có kết quả');
        }
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

        return response()->json([
            'success'   => true,
            'redirect'   => route('sinh-vien.quan-ly.bai-thi.quan-ly-bai-thi-sinh-vien', ['id' => $id])
        ]);
    }
}
