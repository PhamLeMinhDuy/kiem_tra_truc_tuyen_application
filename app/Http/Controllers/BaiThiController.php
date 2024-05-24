<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\Nganh;

use App\Models\BaiThi;
use App\Models\MonHoc;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class BaiThiController extends Controller
{
    public function index(){
        $danhSachSinhVien = BaiThi::paginate(10);
        $columnNames = Schema::getColumnListing('bai_thi');
        $danhSachTenCot = ['ID', 'Mã bài thi', 'Tên bài thi', 'Thời gian bắt đầu', 'Thời gian kết thúc', 'Mô tả'];
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
            $baiThi->thoi_gian_bat_dau = $request->thoi_gian_bat_dau;
            $baiThi->thoi_gian_ket_thuc = $request->thoi_gian_ket_thuc;
            $baiThi->mo_ta = $request->mo_ta;
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
            $baiThi->thoi_gian_bat_dau = $request->thoi_gian_bat_dau;
            $baiThi->thoi_gian_ket_thuc = $request->thoi_gian_ket_thuc;
            $baiThi->mo_ta = $request->mo_ta;
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
        // Tìm bài thi theo ID
        $baiThi = BaiThi::find($id);

        // Giải mã JSON để lấy danh sách câu hỏi
        $danhSachCauHoi = json_decode($baiThi->danh_sach_cau_hoi, true);

        // Chuyển danh sách câu hỏi thành mảng để truy cập dễ dàng hơn

        return view('admin.quan-ly.bai-thi.cau-hoi', [
            'title' => $baiThi->ten_bai_thi,
            'id' => $id,
            'danhSachCauHoi' => $danhSachCauHoi, // Truyền danh sách câu hỏi vào view
        ]);
    }


    public function handleThemCauHoi(Request $request) {
        $cauHoi = BaiThi::find((int)$request->cauHoiId);
        
        // Check if danh_sach_cau_hoi is null and assign an empty array if it is
        $danhSachCauHoi = $cauHoi->danh_sach_cau_hoi ?? [];
        
        // Update danh_sach_cau_hoi with the new data
        $danhSachCauHoi = $request->data;
        
        // Assign the updated danh_sach_cau_hoi back to the $cauHoi object
        $cauHoi->danh_sach_cau_hoi = $danhSachCauHoi;
        
        // Save the changes
        $cauHoi->save();
        
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.bai-thi.quan-ly-bai-thi')
        ]);
    }

    public function indexBaiThiGiangVien($id){
        $giangVien = GiangVien::find($id);
        $maGiangVien = $giangVien->ma_giang_vien;
        $danhSachBaiThi = BaiThi::where('ma_nguoi_tao', $maGiangVien)->paginate(10);
        $columnNames = Schema::getColumnListing('bai_thi');
        $danhSachTenCot = ['ID', 'Mã bài thi', 'Tên bài thi', 'Thời gian bắt đầu', 'Thời gian kết thúc', 'Mô tả'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        $danhSachNganh = Nganh::all();
        return view('giangvien.bai-thi.index', [
            'title' => 'Danh sách bài thi',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachBaiThi,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'danhSachNganh' => $danhSachNganh,
            'modalCapNhat' => 'modal-cap-nhat-bai-thi',
            'modalThem' => 'modal-them-bai-thi',
            'modalXoa' => 'modal-xoa-bai-thi',
            'dataType' => 'bai_thi_giang_vien',
            'giangVien' => $giangVien,
            'id' => $id,
            'id_giang_vien' => $id,
        ]);
    }


    public function handleThemBaiThiGiangVien(Request $request) {
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
        $giangVien = GiangVien::find($request->id_giang_vien);
        $maGiangVien = $giangVien->ma_giang_vien;
        $baiThi = new BaiThi;
        if ($baiThi) {
            $baiThi->ma_bai_thi = $request->ma_bai_thi;
            $baiThi->ten_bai_thi = $request->ten_bai_thi;
            $baiThi->thoi_gian_bat_dau = $request->thoi_gian_bat_dau;
            $baiThi->thoi_gian_ket_thuc = $request->thoi_gian_ket_thuc;
            $baiThi->mo_ta = $request->mo_ta;
            $baiThi->ma_nguoi_tao = $maGiangVien;
            $baiThi->save();
            $request->session()->flash('success_message', 'Thêm bài thi thành công!');

            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Thêm bài thi thành công!',
                'redirect'   => route('giang-vien.quan-ly.bai-thi.quan-ly-bai-thi-giang-vien', [$giangVien->id])
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleCapNhatBaiThiGiangVien(Request $request) {
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

        $giangVien = GiangVien::find($request->id_giang_vien);
        $maGiangVien = $giangVien->ma_giang_vien;
        if ($baiThi) {
            $baiThi->ma_bai_thi = $request->ma_bai_thi;
            $baiThi->ten_bai_thi = $request->ten_bai_thi;
            $baiThi->thoi_gian_bat_dau = $request->thoi_gian_bat_dau;
            $baiThi->thoi_gian_ket_thuc = $request->thoi_gian_ket_thuc;
            $baiThi->mo_ta = $request->mo_ta;
            $baiThi->save();
            $request->session()->flash('success_message', 'Cập nhật bài thi thành công!');
            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Cập nhật môn học thành công!',
                'redirect'   => route('giang-vien.quan-ly.bai-thi.quan-ly-bai-thi-giang-vien', [$giangVien->id])
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }

    public function handleXoaBaiThiGiangVien(Request $request) {
        $id = (int)$request->id_bai_thi;
        $baiThi = BaiThi::find($id);
        $giangVien = GiangVien::find($request->id_giang_vien);
        $maGiangVien = $giangVien->ma_giang_vien;
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
            'redirect'   => route('giang-vien.quan-ly.bai-thi.quan-ly-bai-thi-giang-vien', [$giangVien->id])
        ]);
    }

    public function handleCauHoiGiangVien(Request $request, $id, $id_giang_vien) { 
        // Tìm bài thi theo ID
        $baiThi = BaiThi::find($id);

        $giangVien = GiangVien::find($request->id_giang_vien);
        $maGiangVien = $giangVien->ma_giang_vien;

        // Giải mã JSON để lấy danh sách câu hỏi
        $danhSachCauHoi = json_decode($baiThi->danh_sach_cau_hoi, true);

        // Chuyển danh sách câu hỏi thành mảng để truy cập dễ dàng hơn

        return view('giangvien.bai-thi.cau-hoi', [
            'title' => $baiThi->ten_bai_thi,
            'id' => $id,
            'danhSachCauHoi' => $danhSachCauHoi, // Truyền danh sách câu hỏi vào view
            'giangVien' => $giangVien, 
            'id_giang_vien' => $id_giang_vien,
        ]);
    }


    public function handleThemCauHoiGiangVien(Request $request) {
        $cauHoi = BaiThi::find((int)$request->cauHoiId);
        
        // Check if danh_sach_cau_hoi is null and assign an empty array if it is
        $danhSachCauHoi = $cauHoi->danh_sach_cau_hoi ?? [];
        
        // Update danh_sach_cau_hoi with the new data
        $danhSachCauHoi = $request->data;
        
        // Assign the updated danh_sach_cau_hoi back to the $cauHoi object
        $cauHoi->danh_sach_cau_hoi = $danhSachCauHoi;
        
        // Save the changes
        $cauHoi->save();
        $giangVien = GiangVien::find($request->id_giang_vien);
        return response()->json([
            'success'   => true,
            'redirect'   => route('giang-vien.quan-ly.bai-thi.quan-ly-bai-thi-giang-vien', [$giangVien->id])
        ]);
    }

    public function downloadTemplate()
    {
        $file = public_path('templates/template.xlsx'); // Đường dẫn đến tệp mẫu Excel

        return response()->download($file, 'template.xlsx');
    }

}

