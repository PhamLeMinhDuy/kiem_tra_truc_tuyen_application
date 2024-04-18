<?php

namespace App\Http\Controllers;

use App\Models\Khoa;
use App\Models\Nganh;
use App\Models\MonHoc;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
class NguoiDungController extends Controller
{
    public function index(){
        $danhSachNguoiDung = NguoiDung::paginate(10);
        $columnNames = Schema::getColumnListing('nguoi_dung');
        $danhSachTenCot = ['ID', 'Họ tên', 'Email', 'Role'];
        $danhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        $danhSachKhoa = Khoa::all();
        $danhSachMon = MonHoc::all();
        $danhSachNganh = Nganh::all();
        return view('admin.quan-ly.nguoi-dung.index', [
            'title' => 'Danh sách người dùng',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachNguoiDung,
            'danhSachCotDb' => $danhSachCotDb,
            'danhSachMon' => $danhSachMon,
            'danhSachKhoa' => $danhSachKhoa,
            'danhSachNganh' => $danhSachNganh,
            'modalCapNhat' => 'modal-cap-nhat-nguoi-dung',
            'modalThem' => 'modal-them-nguoi-dung',
            'modalXoa' => 'modal-xoa-nguoi-dung',
            'dataType' => 'nguoi_dung',
        ]);
    }
    public function handleCapNhatNguoiDung(Request $request) {
        $id = (int)$request->id_nguoi_dung;
        $nguoiDung = NguoiDung::find($id);
        if ($request->ho_ten !== $nguoiDung->ho_ten) {
            if (preg_match('/[^\p{L}\s]/u', $request->ho_ten)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Tên người dùng không được chứa ký tự đặc biệt và số.'
                ]);
            }
        }
        if ($request->email !== $nguoiDung->email) {
            $existingEmail = NguoiDung::where('email', $request->email)->first();
            if ($existingEmail) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Email đã tồn tại!'
                ]);
            }

            if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)|| !filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Email không đúng định dạng.'
                ]);
            }
        }
        
        if ($request->email !== $nguoiDung->email) {
            if (!preg_match('/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9]{6,}$/', $request->mat_khau)) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Mật khẩu phải chứa ít nhất 6 ký tự và chỉ được chứa chữ cái hoặc số.'
                ]);
            }
        }
        if ($nguoiDung) {
            $nguoiDung->ho_ten = $request->ho_ten;
            $nguoiDung->email = $request->email;
            $nguoiDung->role = $request->role;
            $nguoiDung->save();
            $request->session()->flash('success_message', 'Cập nhật người thành công!');
            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Cập nhật người dùng thành công!',
                'redirect'   => route('admin.quan-ly.nguoi-dung.quan-ly-nguoi-dung')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình cập nhật!'
            ]);
        }
    }

    public function handleThemNguoiDung(Request $request) {
        if (empty($request->ho_ten) || empty($request->email) || empty($request->mat_khau) ) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Vui lòng điền đầy đủ thông tin!'
            ]);
        }

        if (preg_match('/[^\p{L}\s]/u', $request->ho_ten)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Tên người dùng không được chứa ký tự đặc biệt và số.'
            ]);
        }

        $existingEmail = NguoiDung::where('email', $request->email)->first();
            if ($existingEmail) {
                return response()->json([
                    'success'   => false,
                    'type'      => 'error',
                    'message'   => 'Email đã tồn tại!'
                ]);
            }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)|| !filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Email không đúng định dạng.'
            ]);
        }

        if (!preg_match('/^(?=.*[a-zA-Z0-9])[a-zA-Z0-9]{6,}$/', $request->mat_khau)) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Mật khẩu phải chứa ít nhất 6 ký tự và chỉ được chứa chữ cái hoặc số.'
            ]);
        }
        $nguoiDung = new NguoiDung;
        if ($nguoiDung) {
            $nguoiDung->ho_ten = $request->ho_ten;
            $nguoiDung->email = $request->email;
            $nguoiDung->mat_khau = Hash::make($request->mat_khau);
            $nguoiDung->role = $request->role;
            $nguoiDung->save();
            $request->session()->flash('success_message', 'Thêm người dùng thành công!');

            return response()->json([
                'success'   => true,
                'type'      => 'success',
                'message'   => 'Thêm người dùng thành công!',
                'redirect'   => route('admin.quan-ly.nguoi-dung.quan-ly-nguoi-dung')
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Có lỗi xảy ra trong quá trình thêm!'
            ]);
        }
       
    }

    public function handleXoaNguoiDung(Request $request) {
        $id = (int)$request->id_nguoi_dung;
        $nguoiDung = NguoiDung::find($id);
        
        if (!$nguoiDung) {
            return response()->json([
                'success'   => false,
                'type'      => 'error',
                'message'   => 'Không tìm thấy người dùng để xóa!'
            ]);
        }
        
        $nguoiDung->delete();
        return response()->json([
            'success'   => true,
            'redirect'   => route('admin.quan-ly.nguoi-dung.quan-ly-nguoi-dung')
        ]);
    }
}
