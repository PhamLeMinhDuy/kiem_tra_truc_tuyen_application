@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between">
        <div class="mr-5">
            Bảng điểm
        </div> 
    </div>
@endsection
@section('content')
    <div class="p-2">
        <div class="flex justify-end mb-2">
            <input type="text" id="search" class="w-64 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-400" placeholder="Tìm kiếm...">
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Mã sinh viên</th>
                        <th class="px-6 py-3">Tên sinh viên</th>
                        <th class="px-6 py-3">Điểm</th>
                        <th class="px-6 py-3">Số câu đúng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhSachSinhVien as $duLieu)
                        <tr>
                            <td class="px-6 py-4">{{ $duLieu['ma_sinh_vien'] }}</td>
                            <td class="px-6 py-4">{{ $duLieu['ten_sinh_vien'] }}</td>
                            <td class="px-6 py-4">{{ $duLieu['diem'] }}</td>
                            <td class="px-6 py-4">{{ $duLieu['so_cau_tra_loi_dung'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $danhSachSinhVien->links() }}
            </div>
        </div>
    </div>
    
@endsection
@section('page-js')
     <script type="text/javascript">
        // Lọc dữ liệu khi người dùng nhập vào ô tìm kiếm
        document.getElementById('search').addEventListener('input', function() {
            var keyword = this.value.trim().toLowerCase(); // Lấy từ khóa tìm kiếm và chuẩn hóa
            var rows = document.querySelectorAll('tbody tr'); // Lấy tất cả các hàng trong tbody

            rows.forEach(function(row) {
                var maSinhVien = row.querySelector('td:nth-child(1)').textContent.trim().toLowerCase(); // Lấy mã sinh viên
                var tenSinhVien = row.querySelector('td:nth-child(2)').textContent.trim().toLowerCase(); // Lấy tên sinh viên

                // Kiểm tra xem từ khóa tìm kiếm có tồn tại trong mã sinh viên hoặc tên sinh viên không
                if (maSinhVien.includes(keyword) || tenSinhVien.includes(keyword)) {
                    row.style.display = ''; // Hiển thị hàng nếu có kết quả tìm kiếm
                } else {
                    row.style.display = 'none'; // Ẩn hàng nếu không có kết quả tìm kiếm
                }
            });
        });
    </script> 
@endsection
