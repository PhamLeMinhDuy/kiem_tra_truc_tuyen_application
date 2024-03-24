<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class GiangVienController extends Controller
{
    public function index(){
        $danhSachGiangVien = GiangVien::all();
        $columnNames = Schema::getColumnListing('giang_vien');
        $danhSachTenCot = ['ID', 'Mã giảng viên', 'Tên giảng viên', 'Số điện thoại', 'Email', 'Ngày sinh', 'Mã khoa','Các môn giảng dạy'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot)-1; $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        return view('admin.quan-ly.giang-vien.index', [
            'title' => 'Danh sách giảng viên',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachGiangVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachKhoa' => $danhSachKhoa,
            'modalCapNhat' => 'modal-cap-nhat-giang-vien',
            'modalThem' => 'modal-them-giang-vien',
            'modalXoa' => 'modal-xoa-giang-vien',
            'modalCacMonGiangDay' => 'modal-cac-mon-giang-day',
            'dataType' => 'giang_vien',
            'danhSachMon' => $danhSachMon,
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
    public function handleThemGiangVien(Request $request) {
        $giangVien = new GiangVien;
        if ($giangVien) {
            $giangVien->ma_giang_vien = $request->ma_giang_vien;
            $giangVien->ten_giang_vien = $request->ten_giang_vien;
            $giangVien->so_dien_thoai = $request->so_dien_thoai;
            $giangVien->email = $request->email;
            $giangVien->ngay_sinh = $request->ngay_sinh;
            $giangVien->ma_khoa = $request->ma_khoa;
            $giangVien->ma_nganh = $request->ma_nganh;
            $giangVien->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.giang-vien.quan-ly-giang-vien')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaGiangVien(Request $request) {
        $id = (int)$request->id_giang_vien;
        $giangVien = GiangVien::find($id);
        
        // Nếu không tìm thấy giảng viên, trả về thông báo lỗi
        if (!$giangVien) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy giảng viên để xóa!'
            ]);
        }
        
        // Nếu tìm thấy giảng viên, tiến hành xóa
        $giangVien->delete();

        // Trả về thông báo thành công và redirect về trang danh sách giảng viên
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.giang-vien.quan-ly-giang-vien')
        ]);
    }

    public function handleCacMonGiangDay(Request $request) {
        $giangVien = GiangVien::find((int)$request->giangVienId);
        $giangVien->cac_mon_giang_day = $request->data;
        $giangVien->save();

        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.giang-vien.quan-ly-giang-vien')
        ]);
    }
}
