<?php

namespace App\Http\Controllers;

use App\Models\BaiThi;
use App\Models\GiangVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;

class XemLichThiController extends Controller
{
    public function xemLichThi($id)
    {
        
        $giangVien = GiangVien::findOrFail($id);
        $maGiangVien = $giangVien->ma_giang_vien;
        // Tìm lớp học phần mà giảng viên tham gia
        $lopHocPhan = LopHocPhan::whereJsonContains('danh_sach_giang_vien', ['ma_giang_vien' => $maGiangVien])->first();
        
        // Kiểm tra xem lớp học phần có tồn tại không
        if ($lopHocPhan) {
            // Lấy ra danh sách mã bài thi từ cột danh_sach_bai_thi của lớp học phần
            $danhSachBaiThi = json_decode($lopHocPhan->danh_sach_bai_thi, true);
            
            // Tìm các bài thi dựa trên mã bài thi từ danh sách mã bài thi
            $danhSachBaiThiGv = BaiThi::whereIn('ma_bai_thi', array_column($danhSachBaiThi, 'ma_bai_thi'))->get();
            
            // Truyền danh sách bài thi dưới dạng biến trong hàm view()
            return view('giangvien.lich-thi.index', [
                'title' => 'Xem lịch thi',
                'danh_sach_bai_thi' => $danhSachBaiThiGv,
                'giangVien' => $giangVien
            ]);
        } else {
            // Trường hợp không tìm thấy lớp học phần, xử lý tùy thuộc vào logic của bạn, ví dụ redirect hoặc trả về view thông báo lỗi
        }
    }
}
