<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\MonHoc;
use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SinhVienController extends Controller
{
    public function index(){
        $danhSachSinhVien = SinhVien::all();
        $columnNames = Schema::getColumnListing('sinh_vien');
        $danhSachTenCot = ['ID', 'Mã sinh viên', 'Tên sinh viên', 'Số điện thoại', 'Email', 'Ngày sinh', 'Mã khoa','Mã ngành'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        return view('admin.quan-ly.sinh-vien.index', [
            'title' => 'Danh sách sinh viên',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachSinhVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'modalCapNhat' => 'modal-cap-nhat-sinh-vien',
            'modalThem' => 'modal-them-sinh-vien',
            'modalXoa' => 'modal-xoa-sinh-vien',
            'dataType' => 'sinh_vien',
        ]);
    }
    public function handleCapNhatSinhVien(Request $request) {
        $id = (int)$request->id_sinh_vien;
        $sinhVien = SinhVien::find($id);
        if ($sinhVien) {
            $sinhVien->ma_sinh_vien = $request->ma_sinh_vien;
            $sinhVien->ten_sinh_vien = $request->ten_sinh_vien;
            $sinhVien->so_dien_thoai = $request->so_dien_thoai;
            $sinhVien->email = $request->email;
            $sinhVien->ngay_sinh = $request->ngay_sinh;
            $sinhVien->ma_khoa = $request->ma_khoa;
            $sinhVien->cac_mon_sinh_day = $request->cac_mon;
            $sinhVien->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.sinh-vien.quan-ly-sinh-vien')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }
    public function handleThemSinhVien(Request $request) {
        $sinhVien = new SinhVien;
        if ($sinhVien) {
            $sinhVien->ma_sinh_vien = $request->ma_sinh_vien;
            $sinhVien->ten_sinh_vien = $request->ten_sinh_vien;
            $sinhVien->so_dien_thoai = $request->so_dien_thoai;
            $sinhVien->email = $request->email;
            $sinhVien->ngay_sinh = $request->ngay_sinh;
            $sinhVien->ma_khoa = $request->ma_khoa;
            $sinhVien->ma_nganh = $request->ma_nganh;
            $sinhVien->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.sinh-vien.quan-ly-sinh-vien')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaSinhVien(Request $request) {
        $id = (int)$request->id_sinh_vien;
        $sinhVien = SinhVien::find($id);
        
        // Nếu không tìm thấy giảng viên, trả về thông báo lỗi
        if (!$sinhVien) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy giảng viên để xóa!'
            ]);
        }
        
        // Nếu tìm thấy giảng viên, tiến hành xóa
        $sinhVien->delete();

        // Trả về thông báo thành công và redirect về trang danh sách giảng viên
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.sinh-vien.quan-ly-sinh-vien')
        ]);
    }
}
