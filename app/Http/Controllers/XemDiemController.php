<?php

namespace App\Http\Controllers;

use App\Models\BaiThi;
use App\Models\KetQua;
use App\Models\MonHoc;
use App\Models\SinhVien;
use App\Models\GiangVien;
use App\Models\LopHocPhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class XemDiemController extends Controller
{
    public function index($id) {
        $sinhVien = SinhVien::find($id);
        $tenSinhVien = $sinhVien->ten_sinh_vien;
        $maSinhVien = $sinhVien->ma_sinh_vien;
    
        // Lấy danh sách kết quả của sinh viên có mã $maSinhVien
        $ketQuas = KetQua::where('ma_sinh_vien', $maSinhVien)->get();
        $ketQuaArray = [];
        
        foreach ($ketQuas as $ketQua) {
            $maBaiThi = $ketQua->ma_bai_thi;
            
            // Lấy thông tin từ cột bai_thi của bảng SinhVien
            $sinhVienBaiThi = SinhVien::whereJsonContains('bai_thi', ['ma_bai_thi' => $maBaiThi])->first();
           
            if ($sinhVienBaiThi) {
                // Trích xuất mã lớp học phần từ cột bai_thi nếu tồn tại
                $baiThiData = json_decode($sinhVienBaiThi->bai_thi, true);
                
                foreach ($baiThiData as $baiThi) {
                    // Kiểm tra xem ma_bai_thi từ bảng KetQua có tồn tại trong bai_thi của sinh viên
                    if ($baiThi['ma_bai_thi'] === $maBaiThi) {
                        $maLopHocPhan = $baiThi['ma_lop_hoc_phan'];
                        
                        // Lấy thông tin lớp học phần từ bảng LopHocPhan
                        $lopHocPhan = LopHocPhan::where('ma_lop_hoc_phan', $maLopHocPhan)->first();
    
                        // Kiểm tra xem lớp học phần có tồn tại không trước khi thêm vào mảng kết quả
                        if ($lopHocPhan) {
                            // Thêm thông tin kết quả vào mảng
                            $ketQuaArray[] = [
                                'maBaiThi' => $ketQua->ma_bai_thi,
                                'tenBaiThi' => $ketQua->ten_bai_thi,
                                'diem' => $ketQua->diem,
                                'soCauDung' => $ketQua->so_cau_tra_loi_dung,
                                'maLopHocPhan' => $maLopHocPhan,
                                'tenLopHocPhan' => $lopHocPhan->ten_lop_hoc_phan, // Thêm tên lớp học phần vào mảng
                            ];
                        }
                    }
                }
            }
        }
        return view('sinhvien.xem-diem.index', [
            'title' => 'Xem điểm',
            'tenSinhVien' => $tenSinhVien,
            'id' => $id,
            'ketQuas' => $ketQuaArray,
        ]);
    }
    
    public function handleThemDiemSinhVien(Request $request) {
        $id = $request->id;
        $sinhVien = SinhVien::find($id);
        $maSinhVien = $sinhVien->ma_sinh_vien;
        $ketQua = new KetQua;
        $ketQua->ma_bai_thi = $request->ma_bai_thi;
        $ketQua->ten_bai_thi = $request->ten_bai_thi;
        $ketQua->diem =  $request->diem;
        $ketQua->ma_sinh_vien = $maSinhVien;
        $ketQua->so_cau_tra_loi_dung = $request->so_cau_tra_loi_dung;
        $ketQua->save();
        $baiThiJson = $sinhVien->bai_thi;

        // Chuyển chuỗi JSON thành mảng PHP
        $baiThiArray = json_decode($baiThiJson, true);
    
        // Thêm mã bài thi và mã lớp học phần vào mảng
        $baiThiArray[] = [
            'ma_bai_thi' => $request->ma_bai_thi,
            'ma_lop_hoc_phan' => $request->ma_lop_hoc_phan,
        ];
    
        // Chuyển mảng thành chuỗi JSON mới
        $baiThiJsonUpdated = json_encode($baiThiArray);
    
        // Cập nhật cột bai_thi của sinh viên
        $sinhVien->bai_thi = $baiThiJsonUpdated;
        $sinhVien->save();
        return response()->json([
            'success'   => true,
            'redirect'   => route('sinh-vien.quan-ly.bai-thi.quan-ly-bai-thi-sinh-vien', ['id' => $id, 'maLop' => $request->ma_lop_hoc_phan])
        ]);
    }

    public function indexXemDiemSinhVienGiangVien($id){
        // Tìm giảng viên dựa trên ID
        $giangVien = GiangVien::find($id);
        $maGiangVien = $giangVien->ma_giang_vien;
    
        // Lấy danh sách lớp học phần chứa giảng viên đó
        $danhSachLopHocPhanGiangVien = LopHocPhan::whereJsonContains('danh_sach_giang_vien',  ['ma_giang_vien' => $maGiangVien])->paginate(10);
    
        // Khởi tạo mảng danhSachDuLieu để chứa thông tin cần hiển thị
        $danhSachDuLieu = [];
        
        // Lấy danh sách bài thi từ các lớp học phần
        foreach ($danhSachLopHocPhanGiangVien as $lopHocPhan) {
            $danhSachBaiThiLopHocPhan = json_decode($lopHocPhan->danh_sach_bai_thi, true);
            
            if (is_array($danhSachBaiThiLopHocPhan)) {
                foreach ($danhSachBaiThiLopHocPhan as $baiThi) {
                    // Lấy thông tin về bài thi từ bảng BaiThi
                    $thongTinBaiThi = BaiThi::where('ma_bai_thi', $baiThi['ma_bai_thi'])->first();
    
                    if ($thongTinBaiThi) {
                        // Tạo một mảng chứa thông tin của mỗi bài thi
                        $duLieu = [
                            'id' => $lopHocPhan->id,
                            'ma_lop_hoc_phan' => $lopHocPhan->ma_lop_hoc_phan,
                            'ten_lop_hoc_phan' => $lopHocPhan->ten_lop_hoc_phan,
                            'ma_bai_thi' => $baiThi['ma_bai_thi'],
                            'ten_bai_thi' => $thongTinBaiThi->ten_bai_thi
                        ];
    
                        // Thêm mảng dữ liệu vào mảng danh sách dữ liệu
                        $danhSachDuLieu[] = $duLieu;
                    }
                }
            }
        }
        $danhSachDuLieu = collect($danhSachDuLieu);

        // Tạo một đối tượng LengthAwarePaginator từ đối tượng Collection
        $perPage = 10; // Số lượng mục trên mỗi trang
        $page = request()->get('page', 1); // Trang hiện tại
        $danhSachDuLieu = new LengthAwarePaginator(
            $danhSachDuLieu->forPage($page, $perPage), // Dữ liệu cho trang cụ thể
            $danhSachDuLieu->count(), // Tổng số mục
            $perPage, // Số lượng mục trên mỗi trang
            $page, // Trang hiện tại
            ['path' => request()->url(), 'query' => request()->query()] // Các tham số yêu cầu khác
        );
        $danhSachMon = MonHoc::all();
        // Khởi tạo mảng chứa tên cột
        $danhSachTenCot = ['Mã lớp học phần', 'Tên lớp học phần', 'Mã bài thi', 'Tên bài thi'];
    
        // Trả về view và truyền dữ liệu cần thiết
        return view('giangvien.xem-diem-sinh-vien.index', [
            'title' => 'Xem điểm sinh viên',
            'dataType' => 'xem_diem_sinh_vien_giang_vien',
            'danhSachDuLieu' => $danhSachDuLieu, // Truyền vào mảng chứa thông tin của các bài thi
            'danhSachCot' => $danhSachTenCot, // Truyền vào mảng chứa tên cột
            'id' => $id,
            'id_giang_vien' => $id,
            'giangVien' => $giangVien,
            'danhSachMon' => $danhSachMon,
        ]);
    }

    public function bangDiemSinhVienGiangVien($id, $maLopHocPhan, $maBaiThi)
    {
        // Tìm giảng viên và mã giảng viên
        $giangVien = GiangVien::find($id);
        $maGiangVien = $giangVien->ma_giang_vien;

        // Lấy danh sách mã sinh viên từ bảng LopHocPhan
        $lopHocPhan = LopHocPhan::where('ma_lop_hoc_phan', $maLopHocPhan)->first();
        $danhSachSinhVienJson = $lopHocPhan->danh_sach_sinh_vien;
        $danhSachSinhVien = json_decode($danhSachSinhVienJson, true);

        // Lấy điểm và số câu đúng của sinh viên từ bảng KetQua
        $ketQua = [];

        foreach ($danhSachSinhVien as $sinhVien) {
            $diemSinhVien = KetQua::where('ma_bai_thi', $maBaiThi)
                                    ->where('ma_sinh_vien', $sinhVien['ma_sinh_vien'])
                                    ->first();
            if ($diemSinhVien) {
                $ketQua[] = [
                    'ma_sinh_vien' => $sinhVien['ma_sinh_vien'],
                    'ten_sinh_vien' => SinhVien::where('ma_sinh_vien', $sinhVien['ma_sinh_vien'])->value('ten_sinh_vien'),
                    'diem' => $diemSinhVien->diem,
                    'so_cau_tra_loi_dung' => $diemSinhVien->so_cau_tra_loi_dung,
                ];
            }
        }

        $currentPage = LengthAwarePaginator::resolveCurrentPage() ?: 1;
        $perPage = 10;
        $currentPageItems = array_slice($ketQua, ($currentPage - 1) * $perPage, $perPage);
        $danhSachSinhVien = new LengthAwarePaginator($currentPageItems, count($ketQua), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

        // Trả về view với dữ liệu cần thiết
        return view('giangvien.xem-diem-sinh-vien.bang-diem', [
            'title' => 'Bảng điểm sinh viên',
            'dataType' => 'bang_diem_sinh_vien_giang_vien',
            'id' => $id,
            'giangVien' => $giangVien,
            'danhSachSinhVien' => $danhSachSinhVien,
        ]);
    }


    
    
}
