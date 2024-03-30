<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\Nganh;
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
        $danhSachNganh = Nganh::all();
        return view('admin.quan-ly.giang-vien.index', [
            'title' => 'Danh sách giảng viên',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachGiangVien,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachKhoa' => $danhSachKhoa,
            'danhSachNganh' => $danhSachNganh,
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
        if (!preg_match('/^[a-zA-Z0-9]+$/', $request->ma_giang_vien) || $request->ma_giang_vien !== $giangVien->ma_giang_vien) {
            $existingMaGiangVien = GiangVien::where('ma_giang_vien', $request->ma_giang_vien)->first();
            if ($existingMaGiangVien) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Mã giảng viên đã tồn tại!'
                ]);
            }
        
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã giảng viên chỉ được chứa chữ cái và số.'
            ]);
        }

        if ($request->ten_giang_vien !== $giangVien->ten_giang_vien) {
            if (preg_match('/[^\p{L}\s]/u', $request->ten_giang_vien)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Tên giảng viên không được chứa ký tự đặc biệt và số.'
                ]);
            }
        }

        if ($request->so_dien_thoai !== $giangVien->so_dien_thoai || !preg_match('/^\d{10,11}$/', $request->so_dien_thoai)) {
            if (!preg_match('/^\d{10,11}$/', $request->so_dien_thoai)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Số điện thoại phải có từ 10 đến 11 số.'
                ]);
            }
        
            $existingNumberPhone = GiangVien::where('so_dien_thoai', $request->so_dien_thoai)->first();
            if ($existingNumberPhone) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Số điện thoại đã tồn tại!'
                ]);
            }
        }    

        if ($request->email !== $giangVien->email || !filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Email không đúng định dạng.'
                ]);
            }
        
            $existingEmail = GiangVien::where('email', $request->email)->first();
            if ($existingEmail) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Email đã tồn tại!'
                ]);
            }
        }
        
        if ($request->ngay_sinh !== $giangVien->ngay_sinh) {
            if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $request-> ngay_sinh)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Ngày sinh phải có định dạng YYYY-MM-DD.'
                ]);
            }
        }
        if ($giangVien) {
            $giangVien->ma_giang_vien = $request->ma_giang_vien;
            $giangVien->ten_giang_vien = $request->ten_giang_vien;
            $giangVien->so_dien_thoai = $request->so_dien_thoai;
            $giangVien->email = $request->email;
            $giangVien->ngay_sinh = $request->ngay_sinh;
            $giangVien->ma_khoa = $request->ma_khoa;
            $giangVien->cac_mon_giang_day = $request->cac_mon;
            $giangVien->save();
            $request->session()->flash('success_message', 'Cập nhật giảng viên thành công!');
            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Cập nhật giảng viên thành công!',
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
        
        if (empty($request->ma_giang_vien) || empty($request->ten_giang_vien) || empty($request->so_dien_thoai) || empty($request->email) || empty($request->ngay_sinh) || empty($request->ma_khoa)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng điền đầy đủ thông tin!'
            ]);
        }
        if (!preg_match('/^[a-zA-Z0-9]+$/', $request->ma_giang_vien)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã giảng viên chỉ được chứa chữ cái và số.'
            ]);
        }
        $existingGiangVien = GiangVien::where('ma_giang_vien', $request->ma_giang_vien)->first();
        if ($existingGiangVien) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mã giảng viên đã tồn tại!'
            ]);
        }
        if (preg_match('/[^\p{L}\s]/u', $request->ten_sinh_vien)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Tên giảng viên không được chứa ký tự đặc biệt và số.'
            ]);
        }
        $existingNumberPhone = GiangVien::where('so_dien_thoai', $request->so_dien_thoai)->first();
        if ($existingNumberPhone) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Số điện thoại đã tồn tại!'
            ]);
        }
        if (!preg_match('/^\d{10,11}$/', $request->so_dien_thoai)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Số điện thoại phải có từ 10 đến 11 số.'
            ]);
        }
        $existingEmail = GiangVien::where('email', $request->email)->first();
        if ($existingEmail) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Email đã tồn tại!'
            ]);
        }
        if (!filter_var($request-> email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Email không đúng định dạng.'
            ]);
        }
        if (!preg_match('/^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12][0-9]|3[01])$/', $request-> ngay_sinh)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Ngày sinh phải có định dạng YYYY-MM-DD.'
            ]);
        }
        $giangVien = new GiangVien;
        if ($giangVien) {
            $giangVien->ma_giang_vien = $request->ma_giang_vien;
            $giangVien->ten_giang_vien = $request->ten_giang_vien;
            $giangVien->so_dien_thoai = $request->so_dien_thoai;
            $giangVien->email = $request->email;
            $giangVien->ngay_sinh = $request->ngay_sinh;
            $giangVien->ma_khoa = $request->ma_khoa;
            $giangVien->save();
            $request->session()->flash('success_message', 'Thêm giảng viên thành công!');
            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Thêm giảng viên thành công!',
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
        
        if (!$giangVien) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy giảng viên để xóa!'
            ]);
        }
        
        $giangVien->delete();
        return response()->json([
            'success'   => true,
            'message'   => 'Thêm giảng viên thành công!',
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
