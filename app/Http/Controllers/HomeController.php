<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];
    public function adminHome(){
        $this->data['title'] = 'Trang chủ người admin';
        return view('layouts.master', $this->data);
    }

    public function sinhVienHome(){
        $this->data['title'] = 'Trang chủ sinh viên';
        return view('sinhvien.layouts.master', $this->data);
    }

    public function adminQuanLyGiangVien(){
        $this->data['title'] = 'Quán lý giảng viên';
        return view('admin.quan-ly.giang-vien.index', $this->data);
    }
}
