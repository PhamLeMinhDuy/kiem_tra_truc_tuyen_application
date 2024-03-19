<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class SinhVienController extends Controller
{
    public function index(){
        $danhSachGiangVien = SinhVien::all();
        $columnNames = Schema::getColumnListing('sinh_vien');
        $danhSachTenCot = ['ID', 'Mã sinh viên', 'Tên sinh viên', 'Số điện thoại', 'Email', 'Ngày sinh', 'Mã khoa'];
        $DanhSachCot = [];
        $danhSachCotDb = [];
        for ($i = 0; $i < sizeof($danhSachTenCot); $i++) {
            $danhSachCot[] = $danhSachTenCot[$i];
            $danhSachCotDb[] = $columnNames[$i];
        }
        return view('admin.quan-ly.sinh-vien.index', [
            'title' => 'Danh sách sinh viên',
            'danhSachCot' => $danhSachCot,
            'danhSachDuLieu' => $danhSachGiangVien,
            'danhSachCotDb' => $danhSachCotDb,
            'modal' => 'modal-sinh-vien',
        ]);
    }
}
