<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class GiangVienController extends Controller
{
    public function index(){
        $danhSachGiangVien = GiangVien::all();
        $columnNames = Schema::getColumnListing('giang_vien');
        $danhSachTenCot = ['ID', 'Mã giảng viên', 'Tên giảng viên', 'Số điện thoại', 'Email', 'Ngày sinh', 'Mã khoa'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        return view('admin.quan-ly.giang-vien.index', [
            'title' => 'Danh sách giảng viên',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachGiangVien,
            'danhSachCotDb' => $danhSachCotDb,
            'modal' => 'modal-giang-vien',
        ]);
    }

    public function handleCapNhatGiangVien(Request $request) {
        $id = (int)$request->id_giang_vien;
        $giangVien = GiangVien::find($id);
        if ($giangVien) {
            $giangVien->ma_giang_vien = $request->ma_giang_vien;
            $giangVien->ten_giang_vien = $request->ten_giang_vien;
            $giangVien->so_dien_thoai = $request->so_dien_thoai;
            $giangVien->email = $request->email;
            $giangVien->ngay_sinh = $request->ngay_sinh;
            $giangVien->ma_khoa = $request->ma_khoa;
            $giangVien->cac_mon_giang_day = $request->cac_mon;
            $giangVien->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.giang-vien.quan-ly-giang-vien')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }
}
