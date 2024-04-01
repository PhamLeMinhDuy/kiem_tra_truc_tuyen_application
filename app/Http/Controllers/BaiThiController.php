<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\Nganh;

use App\Models\BaiThi;
use App\Models\MonHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class BaiThiController extends Controller
{
    public function index(){
        $danhSachSinhVien = BaiThi::all();
        $columnNames = Schema::getColumnListing('bai_thi');
        $danhSachTenCot = ['ID', 'Mã bài thi', 'Tên bài thi'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        $danhSachNganh = Nganh::all();
        return view('admin.quan-ly.bai-thi.index', [
            'title' => 'Danh sách bài thi',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachSinhVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'danhSachNganh' => $danhSachNganh,
            'modalCapNhat' => 'modal-cap-nhat-bai-thi',
            'modalThem' => 'modal-them-bai-thi',
            'modalXoa' => 'modal-xoa-bai-thi',
            'dataType' => 'bai_thi',
        ]);
    }
    public function handleCapNhatBaiThi(Request $request) {
        $id = (int)$request->id_bai_thi;
        $baiThi = BaiThi::find($id);
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $request->ma_bai_thi) || ($request->ma_bai_thi !== $baiThi->ma_bai_thi)) {
            $existingMaBaiThi = BaiThi::where('ma_bai_thi', $request->ma_bai_thi)->first();
            if ($existingMaBaiThi) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Mã bài thi đã tồn tại!'
                ]);
            }
        
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã bài thi chỉ được chứa chữ cái và số.'
            ]);
        }
        if ($request->ten_bai_thi !== $baiThi->ten_bai_thi) {
            if (preg_match('/[^\p{L}\s]/u', $request->ten_bai_thi)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Tên bài thi không được chứa ký tự đặc biệt và số.'
                ]);
            }
        }
        if ($baiThi) {
            $baiThi->ma_bai_thi = $request->ma_bai_thi;
            $baiThi->ten_bai_thi = $request->ten_bai_thi;
            $baiThi->save();
            $request->session()->flash('success_message', 'Cập nhật bài thi thành công!');
            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Cập nhật môn học thành công!',
                'redirect'   => route('admin.quan-ly.bai-thi.quan-ly-bai-thi')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }

    public function handleThemBaiThi(Request $request) {
        if (empty($request->ma_bai_thi) || empty($request->ten_bai_thi) ) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng điền đầy đủ thông tin!'
            ]);
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', $request->ma_bai_thi)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã bài thi chỉ được chứa chữ cái và số.'
            ]);
        }

        if (preg_match('/[^\p{L}\s]/u', $request->ten_bai_thi)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Tên bài thi không được chứa ký tự đặc biệt và số.'
            ]);
        }
        $baiThi = new BaiThi;
        if ($baiThi) {
            $baiThi->ma_bai_thi = $request->ma_bai_thi;
            $baiThi->ten_bai_thi = $request->ten_bai_thi;
            $baiThi->save();
            $request->session()->flash('success_message', 'Thêm bài thi thành công!');

            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Thêm bài thi thành công!',
                'redirect'   => route('admin.quan-ly.bai-thi.quan-ly-bai-thi')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaBaiThi(Request $request) {
        $id = (int)$request->id_bai_thi;
        $baiThi = BaiThi::find($id);
        
        if (!$baiThi) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy bài thi để xóa!'
            ]);
        }
        
        $baiThi->delete();
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.bai-thi.quan-ly-bai-thi')
        ]);
    }
    public function handleCauHoi(Request $request, $id) { 
        $baiThi = BaiThi::find($id);
        return view('admin.quan-ly.bai-thi.cau-hoi', [
            'title' =>$baiThi->ten_bai_thi ,
            'id' => $id,
        ]);
        
    }

    public function handleThemCauHoi(Request $request) {
        $cauHoi = BaiThi::find((int)$request->cauHoiId);
        $cauHoi->danh_sach_cau_hoi = $request->data;
        $cauHoi->save();
        
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.bai-thi.quan-ly-bai-thi')
        ]);
    }
}

