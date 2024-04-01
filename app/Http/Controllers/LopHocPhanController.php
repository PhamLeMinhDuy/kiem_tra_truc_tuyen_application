<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\Nganh;
use App\Models\BaiThi;
use App\Models\MonHoc;
use App\Models\SinhVien;
use App\Models\GiangVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class LopHocPhanController extends Controller
{
    public function index(){
        $danhSachSinhVien = LopHocPhan::all();
        $columnNames = Schema::getColumnListing('lop_hoc_phan');
        $danhSachTenCot = ['ID', 'Mã lớp học phần', 'Tên lớp học phần', 'Môn học', 'Thời gian bắt đầu', 'Thời gian kết thúc', 'Danh sách sinh viên', 'Danh sách giảng viên'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot)-2; $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        $danhSachNganh = Nganh::all();
        $danhSachSinhVienAll = SinhVien::all();
        $danhSachGiangVienAll = GiangVien::all();
        $danhSachBaiThiAll = BaiThi::all();
        return view('admin.quan-ly.lop-hoc-phan.index', [
            'title' => 'Danh sách lớp học phần',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachSinhVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'danhSachNganh' => $danhSachNganh,
            'danhSachSinhVienAll' => $danhSachSinhVienAll,
            'danhSachGiangVienAll' => $danhSachGiangVienAll,
            'danhSachBaiThiAll' => $danhSachBaiThiAll,
            'modalCapNhat' => 'modal-cap-nhat-lop-hoc-phan',
            'modalThem' => 'modal-them-lop-hoc-phan',
            'modalXoa' => 'modal-xoa-lop-hoc-phan',
            'modalSinhVien' => 'modal-sinh-vien',
            'modalGiangVien' => 'modal-giang-vien',
            'modalBaiThi' => 'modal-bai-thi',
            'dataType' => 'lop_hoc_phan',
        ]);
    }
    public function handleCapNhatLopHocPhan(Request $request) {
        $id = (int)$request->id_lop_hoc_phan;
        $lop_hoc_phan= LopHocPhan::find($id);
        if (!preg_match('/^[a-zA-Z0-9]+$/', $request->ma_lop_hoc_phan) || $request->ma_lop_hoc_phan !== $giangVien->ma_lop_hoc_phan) {
            $existingMaGiangVien = GiangVien::where('ma_lop_hoc_phan', $request->ma_lop_hoc_phan)->first();
            if ($existingMaGiangVien) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Mã lóp học phần đã tồn tại!'
                ]);
            }
        
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã lớp học phần chỉ được chứa chữ cái và số.'
            ]);
        }

        if ($request->ten_lop_hoc_phan !== $giangVien->ten_lop_hoc_phan) {
            if (preg_match('/[^\p{L}\s]/u', $request->ten_lop_hoc_phan)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Tên lớp học phần không được chứa ký tự đặc biệt và số.'
                ]);
            }
        }

        if ($lop_hoc_phan) {
            $lop_hoc_phan->ma_lop_hoc_phan= $request->ma_lop_hoc_phan;
            $lop_hoc_phan->ten_lop_hoc_phan= $request->ten_lop_hoc_phan;
            $lop_hoc_phan->ma_mon_hoc= $request->ma_mon_hoc;
            $lop_hoc_phan->thoi_gian_bat_dau= $request->thoi_gian_bat_dau;
            $lop_hoc_phan->thoi_gian_ket_thuc= $request->thoi_gian_ket_thuc;
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
        if (empty($request->ma_lop_hoc_phan) || empty($request->ten_lop_hoc_phan) || empty($request->ma_mon_hoc) || empty($request->thoi_gian_bat_dau) || empty($request->thoi_gian_ket_thuc) ) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng điền đầy đủ thông tin!'
            ]);
        }

        if (!preg_match('/^[a-zA-Z0-9_]+$/', $request->ma_lop_hoc_phan)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã lớp học phần chỉ được chứa chữ cái, số và dấu _.'
            ]);
        }
        
        $existingLopHocPhan = LopHocPhan::where('ma_lop_hoc_phan', $request->ma_lop_hoc_phan)->first();
        if ($existingLopHocPhan) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã lớp học phần đã tồn tại!'
            ]);
        }

        if (preg_match('/[^\p{L}\s]/u', $request->ten_lop_hoc_phan)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Tên lớp học phần không được chứa ký tự đặc biệt và số.'
            ]);
        }

        $lop_hoc_phan= new LopHocPhan;
        if ($lop_hoc_phan) {
            $lop_hoc_phan->ma_lop_hoc_phan= $request->ma_lop_hoc_phan;
            $lop_hoc_phan->ten_lop_hoc_phan= $request->ten_lop_hoc_phan;
            $lop_hoc_phan->ma_mon_hoc= $request->ma_mon_hoc;
            $lop_hoc_phan->thoi_gian_bat_dau= $request->thoi_gian_bat_dau;
            $lop_hoc_phan->thoi_gian_ket_thuc= $request->thoi_gian_ket_thuc;
            $lop_hoc_phan->save();
            $request->session()->flash('success_message', 'Thêm lớp học phần thành công!');
            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Thêm lớp học phần thành công!',
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
            'redirect'   => route('admin.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan')
        ]);
    }

    public function handleCapNhatDanhSachSinhVienLopHocPhan(Request $request)
    {
        $lopHocPhan = LopHocPhan::find($request->id);
        $lopHocPhan->danh_sach_sinh_vien = $request->danh_sach_sinh_vien;
        $lopHocPhan->save();
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan')
        ]);
    }

    public function handleCapNhatDanhSachGiangVienLopHocPhan(Request $request)
    {
        $lopHocPhan = LopHocPhan::find($request->id);
        $lopHocPhan->danh_sach_giang_vien = $request->danh_sach_giang_vien;
        $lopHocPhan->save();
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan')
        ]);
    }

    public function handleCapNhatDanhSachBaiThiLopHocPhan(Request $request)
    {
        $lopHocPhan = LopHocPhan::find($request->id);
        $lopHocPhan->danh_sach_bai_thi = $request->danh_sach_bai_thi;
        $lopHocPhan->save();
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.lop-hoc-phan.quan-ly-lop-hoc-phan')
        ]);
    }

}
