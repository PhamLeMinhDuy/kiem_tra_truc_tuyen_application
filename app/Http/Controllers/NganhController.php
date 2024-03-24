<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\Nganh;
use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class NganhController extends Controller
{
    public function index(){
        $danhSachSinhVien = Nganh::all();
        $columnNames = Schema::getColumnListing('nganh');
        $danhSachTenCot = ['ID', 'Mã ngành', 'Tên ngành', 'Mã khoa'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        return view('admin.quan-ly.nganh.index', [
            'title' => 'Danh sách ngành',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachSinhVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'modalCapNhat' => 'modal-cap-nhat-nganh',
            'modalThem' => 'modal-them-nganh',
            'modalXoa' => 'modal-xoa-nganh',
            'dataType' => 'nganh',
        ]);
    }
    public function handleCapNhatNganh(Request $request) {
        $id = (int)$request->id_nganh;
        $nganh = Nganh::find($id);
        if ($nganh) {
            $nganh->ma_nganh = $request->ma_nganh;
            $nganh->ten_nganh = $request->ten_nganh;
            $nganh->ma_khoa = $request->ma_khoa;
            $nganh->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.nganh.quan-ly-nganh')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }
    public function handleThemNganh(Request $request) {
        $nganh = new nganh;
        if ($nganh) {
            $nganh->ma_nganh = $request->ma_nganh;
            $nganh->ten_nganh = $request->ten_nganh;
            $nganh->ma_khoa = $request->ma_khoa;
            $nganh->save();

            return response()->json([
                'success'   => true,
                'redirect'   => route('admin.quan-ly.nganh.quan-ly-nganh')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaNganh(Request $request) {
        $id = (int)$request->id_nganh;
        $nganh = Nganh::find($id);
        
        // Nếu không tìm thấy giảng viên, trả về thông báo lỗi
        if (!$nganh) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy môn học để xóa!'
            ]);
        }
        
        // Nếu tìm thấy giảng viên, tiến hành xóa
        $nganh->delete();

        // Trả về thông báo thành công và redirect về trang danh sách giảng viên
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.nganh.quan-ly-nganh')
        ]);
    }
}
