@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between">
        <div class="mr-5">
            Điểm sinh viên
        </div> 
    </div>
@endsection
@section('content')
    <div class="p-2">
        <div class="flex justify-end mb-2">
            <input type="text" id="search" class="w-64 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-400" placeholder="Tìm kiếm...">
        </div>
        <div class="mb-4">
            <button id="showTableBtn" class="px-4 py-2 mr-2 rounded-md focus:outline-none border border-blue-500  hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out">Bảng Điểm</button>
            <button id="showChartBtn" class="px-4 py-2 rounded-md focus:outline-none border border-green-500  hover:bg-green-500 hover:text-white transition duration-300 ease-in-out">Đồ Thị Điểm</button>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Mã sinh viên
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="asc">&#9650;</button>
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="desc">&#9660;</button>
                        </th>
                        <th class="px-6 py-3">Tên sinh viên
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="asc">&#9650;</button>
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="desc">&#9660;</button>
                        </th>
                        <th class="px-6 py-3">Điểm
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="asc">&#9650;</button>
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="desc">&#9660;</button>
                        </th>
                        <th class="px-6 py-3">Số câu đúng
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="asc">&#9650;</button>
                            <button class="sort-btn" data-column="ma_sinh_vien" data-order="desc">&#9660;</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($danhSachSinhVien as $duLieu)
                        <tr>
                            <td class="px-6 py-4">{{ $duLieu['ma_sinh_vien'] }}</td>
                            <td class="px-6 py-4">{{ $duLieu['ten_sinh_vien'] }}</td>
                            <td class="px-6 py-4 student-score">{{ $duLieu['diem'] }}</td>
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
    <div id="chartContainer" class="mt-4" style="height: 300px;"></div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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

        document.addEventListener('DOMContentLoaded', function() {
            var currentChart = null; // Biến để lưu trữ đồ thị hiện tại

            // Button Hiển thị Bảng Điểm
            document.getElementById('showTableBtn').addEventListener('click', function() {
                document.querySelector('.overflow-x-auto').style.display = 'block';
                if (currentChart) {
                    currentChart.destroy(); // Hủy đồ thị hiện tại nếu có
                    currentChart = null; // Đặt lại biến đồ thị
                }
                document.getElementById('chartContainer').style.display = 'none';
            });

            // Button Hiển thị Đồ Thị Điểm
            document.getElementById('showChartBtn').addEventListener('click', function() {
                document.querySelector('.overflow-x-auto').style.display = 'none';
                document.getElementById('chartContainer').style.display = 'block';

                // Hủy đồ thị hiện tại nếu có
                if (currentChart) {
                    currentChart.destroy();
                }

                // Tính toán số lượng câu đúng của sinh viên
                var correctAnswers = {};
                var correctAnswerElements = document.querySelectorAll('tbody tr td:nth-child(4)'); // Lấy các phần tử thể hiện số câu đúng

                correctAnswerElements.forEach(function(element) {
                    var numCorrect = parseInt(element.textContent.trim());
                    if (!isNaN(numCorrect)) {
                        if (correctAnswers[numCorrect]) {
                            correctAnswers[numCorrect]++;
                        } else {
                            correctAnswers[numCorrect] = 1;
                        }
                    }
                });

                // Chuẩn bị dữ liệu để vẽ đồ thị
                var xLabels = Object.keys(correctAnswers); // Sử dụng số lượng câu đúng làm labels trên trục x
                var yData = Object.values(correctAnswers);

                // Vẽ đồ thị bằng thư viện ApexCharts
                var chartOptions = {
                    chart: {
                        type: 'bar',
                        height: 300,
                        toolbar: {
                            show: false
                        }
                    },
                    series: [{
                        name: 'Số lượng',
                        data: yData
                    }],
                    xaxis: {
                        categories: xLabels.map(String), // Chuyển đổi các nhãn thành chuỗi để sử dụng làm labels trên trục x
                        title: {
                            text: 'Số lượng câu đúng'
                        }
                    },
                    yaxis: {
                        min: 0,
                        max: 10, // Đặt giá trị tối thiểu của trục y là 0
                        title: {
                            text: 'Điểm'
                        }
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                position: 'top' // Hiển thị nhãn trên cột
                            }
                        }
                    }
                };

                // Tạo và render đồ thị mới
                currentChart = new ApexCharts(document.querySelector('#chartContainer'), chartOptions);
                currentChart.render();
            });
        });

        function getColumnIndex(columnName) {
            const headers = document.querySelectorAll('thead th');
            let index = 0;

            headers.forEach((header, i) => {
                const spanText = header.querySelector('span').textContent.trim();
                if (spanText === columnName) {
                    index = i + 1; // Bắt đầu từ 1 vì nth-child sử dụng chỉ số bắt đầu từ 1
                }
            });

            return index;
        }

    </script> 
@endsection
