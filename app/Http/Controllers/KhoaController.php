<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class KhoaController extends Controller
{
    public function index(){
        $danhSachSinhVien = Khoa::all();
        $columnNames = Schema::getColumnListing('khoa');
        $danhSachTenCot = ['ID', 'Mã khoa', 'Tên khoa'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        return view('admin.quan-ly.khoa.index', [
            'title' => 'Danh sách khoa',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachSinhVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'modalCapNhat' => 'modal-cap-nhat-khoa',
            'modalThem' => 'modal-them-khoa',
            'modalXoa' => 'modal-xoa-khoa',
            'dataType' => 'khoa',
        ]);
    }
    public function handleCapNhatKhoa(Request $request) {
        $id = (int)$request->id_khoa;
        $khoa = Khoa::find($id);
        if ($khoa) {
            $khoa->ma_khoa = $request->ma_khoa;
            $khoa->ten_khoa = $request->ten_khoa;
            $khoa->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.khoa.quan-ly-khoa')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }
    public function handleThemKhoa(Request $request) {
        $khoa = new Khoa;
        if ($khoa) {
            $khoa->ma_khoa = $request->ma_khoa;
            $khoa->ten_khoa = $request->ten_khoa;
            $khoa->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.khoa.quan-ly-khoa')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaKhoa(Request $request) {
        $id = (int)$request->id_khoa;
        $khoa = Khoa::find($id);
        
        // Nếu không tìm thấy giảng viên, trả về thông báo lỗi
        if (!$khoa) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy môn học để xóa!'
            ]);
        }
        
        // Nếu tìm thấy giảng viên, tiến hành xóa
        $khoa->delete();

        // Trả về thông báo thành công và redirect về trang danh sách giảng viên
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.khoa.quan-ly-khoa')
        ]);
    }
}
