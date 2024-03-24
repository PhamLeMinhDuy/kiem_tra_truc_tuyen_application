<?php

namespace App\Http\Controllers;

use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class LopHocPhanController extends Controller
{
    public function index(){
        $danhSachSinhVien = LopHocPhan::all();
        $columnNames = Schema::getColumnListing('lop_hoc_phan');
        $danhSachTenCot = ['ID', 'Mã lớp học phần', 'Tên lớp học phần', 'Môn học'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        return view('admin.quan-ly.lop-hoc-phan.index', [
            'title' => 'Danh sách lớp học phần',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachSinhVien,
            'danhSachCotDb' => $danhSachCotDb,
            'modalCapNhat' => 'modal-cap-nhat-lop-hoc-phan',
            'modalThem' => 'modal-them-lop-hoc-phan',
            'modalXoa' => 'modal-xoa-lop-hoc-phan',
        ]);
    }
    public function handleCapNhatLopHocPhan(Request $request) {
        $id = (int)$request->id_lop-hoc-phan;
        $lop_hoc_phan= LopHocPhan::find($id);
        if ($lop_hoc_phan) {
            $lop_hoc_phan->ma_lop_hoc_phan= $request->ma_lop_hoc_phan;
            $lop_hoc_phan->ten_lop_hoc_phan= $request->ten_lop_hoc_phan;
            $lop_hoc_phan->ma_mon_hoc= $request->ma_mon_hoc;
            $lop_hoc_phan->thoi_gian_bat_dau= $request->thoi_gian_bat_dau;
            $lop_hoc_phan->thoi_gian_ket_thuc= $request->thoi_gian_ket_thuc;
            $lop_hoc_phan->danh_sach_sinh_vien= $request->danh_sach_sinh_vien;
            $lop_hoc_phan->danh_sach_bai_thi= $request->danh_sach_bai_thi;
            $lop_hoc_phan->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }
    public function handleThemLopHocPhan(Request $request) {
        $lop_hoc_phan= new LopHocPhan;
        if ($lop_hoc_phan) {
            $lop_hoc_phan->ma_lop_hoc_phan= $request->ma_lop_hoc_phan;
            $lop_hoc_phan->ten_lop_hoc_phan= $request->ten_lop_hoc_phan;
            $lop_hoc_phan->ma_mon_hoc= $request->ma_mon_hoc;
            $lop_hoc_phan->thoi_gian_bat_dau= $request->thoi_gian_bat_dau;
            $lop_hoc_phan->thoi_gian_ket_thuc= $request->thoi_gian_ket_thuc;
            $lop_hoc_phan->danh_sach_sinh_vien= $request->danh_sach_sinh_vien;
            $lop_hoc_phan->danh_sach_bai_thi= $request->danh_sach_bai_thi;
            $lop_hoc_phan->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaLopHocPhan(Request $request) {
        $id = (int)$request->id_lop_hoc_phan;
        $lop_hoc_phan= LopHocPhan::find($id);
        
        // Nếu không tìm thấy giảng viên, trả về thông báo lỗi
        if (!$lop_hoc_phan) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy môn học để xóa!'
            ]);
        }
        
        // Nếu tìm thấy giảng viên, tiến hành xóa
        $lop_hoc_phan->delete();

        // Trả về thông báo thành công và redirect về trang danh sách giảng viên
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.lop_hoc_phan.quan-ly-lop_hoc_phan')
        ]);
    }
}
