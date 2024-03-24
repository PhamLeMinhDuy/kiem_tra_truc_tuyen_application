<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class MonHocController extends Controller
{
    public function index(){
        $danhSachSinhVien = MonHoc::all();
        $columnNames = Schema::getColumnListing('mon_hoc');
        $danhSachTenCot = ['ID', 'Mã môn học', 'Tên môn học'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        return view('admin.quan-ly.mon-hoc.index', [
            'title' => 'Danh sách môn học',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachSinhVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'modalCapNhat' => 'modal-cap-nhat-mon-hoc',
            'modalThem' => 'modal-them-mon-hoc',
            'modalXoa' => 'modal-xoa-mon-hoc',
            'dataType' => 'mon_hoc',
        ]);
    }
    public function handleCapNhatMonHoc(Request $request) {
        $id = (int)$request->id_mon_hoc;
        $monHoc = MonHoc::find($id);
        if ($monHoc) {
            $monHoc->ma_mon_hoc = $request->ma_mon_hoc;
            $monHoc->ten_mon_hoc = $request->ten_mon_hoc;
            $monHoc->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.mon-hoc.quan-ly-mon-hoc')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }
    public function handleThemMonHoc(Request $request) {
        $monHoc = new MonHoc;
        if ($monHoc) {
            $monHoc->ma_mon_hoc = $request->ma_mon_hoc;
            $monHoc->ten_mon_hoc = $request->ten_mon_hoc;
            $monHoc->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.mon-hoc.quan-ly-mon-hoc')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaMonHoc(Request $request) {
        $id = (int)$request->id_mon_hoc;
        $monHoc = MonHoc::find($id);
        
        // Nếu không tìm thấy giảng viên, trả về thông báo lỗi
        if (!$monHoc) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy môn học để xóa!'
            ]);
        }
        
        // Nếu tìm thấy giảng viên, tiến hành xóa
        $monHoc->delete();

        // Trả về thông báo thành công và redirect về trang danh sách giảng viên
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.mon-hoc.quan-ly-mon-hoc')
        ]);
    }
}
