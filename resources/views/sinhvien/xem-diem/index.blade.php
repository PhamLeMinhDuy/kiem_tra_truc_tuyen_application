@extends('sinhvien.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('page-title')
    <div class="flex items-center justify-between font-bold text-xl">
        <div class="mr-5">
            Xem điểm
        </div>
    </div>
@endsection

@section('content')
    <div class="flex space-x-4 my-4">
        <!-- Button chuyển sang chế độ xem đồ thị -->
        <button id="chartModeBtn" onclick="switchToNormalView()"  class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-teal-200 rounded-md shadow-sm hover:bg-teal-50 focus:outline-none focus:shadow-none">
            Thẻ điểm 
        </button>
        <!-- Button chuyển sang chế độ xem bình thường -->
        <button id="normalModeBtn" onclick="switchToChartView()"  class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-rose-200 rounded-md shadow-sm hover:bg-rose-50 focus:outline-none focus:shadow-none">
            Đồ thị
        </button>
    </div>
    <div id="normalMode" class="mt-2 " style="overflow-y: auto; max-height: 80vh;"> 
        @php
            $previousMaLopHocPhan = null;
            $labels = [];
            $data = [];
        @endphp
        @if (count($ketQuas) > 0)
            @foreach ($ketQuas as $ketQua)
                @if ($ketQua['maLopHocPhan'] !== $previousMaLopHocPhan)
                    <div class="flex items-center justify-between font-bold text-xl">
                        <div class="mr-5 mb-5">
                            {{ $ketQua['tenLopHocPhan'] }} - {{ $ketQua['maLopHocPhan'] }}
                        </div>
                    </div>
                    @php
                        $previousMaLopHocPhan = $ketQua['maLopHocPhan'];
                    @endphp
                @endif
                <div class="border p-4 mb-4 bg-white">
                    <p class="font-semibold text-xl text-red-600 mb-2">Tên bài thi: {{ $ketQua['tenBaiThi'] }}</p>
                    <p class="text-gray-600">Mã bài thi: {{ $ketQua['maBaiThi'] }}</p>
                    <p class="text-green-600">Số câu đúng: {{ $ketQua['soCauDung'] }}</p>
                    <p class="text-blue-600">Điểm số: {{ $ketQua['diem'] }}</p>
                </div>
                @php
                    // Thêm tên bài thi và điểm vào mảng labels và data
                    $labels[] = $ketQua['tenBaiThi'];
                    $data[] = $ketQua['diem'];
                @endphp
            @endforeach
        @else
            <div class="text-red-600 font-bold">
                Sinh viên chưa có điểm.
            </div>
        @endif
    </div>
    <div id="chartMode" class="mt-8 hidden">
        <!-- Đặt canvas trong một container để kiểm soát kích thước -->
        <div class="w-full p-4 h-[700px]"> <!-- Thêm padding để biểu đồ không bị dính vào mép -->
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    // Chuyển sang chế độ xem bình thường (normal view)
    function switchToNormalView() {
        document.getElementById('normalMode').classList.remove('hidden');
        document.getElementById('chartMode').classList.add('hidden');
    }

    // Chuyển sang chế độ xem đồ thị (chart view)
    function switchToChartView() {
        document.getElementById('normalMode').classList.add('hidden');
        document.getElementById('chartMode').classList.remove('hidden');

        // Vẽ biểu đồ Chart.js khi chuyển sang chế độ xem đồ thị
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!}, // Sử dụng tên bài thi làm nhãn
                datasets: [{
                    label: 'Điểm số',
                    data: {!! json_encode($data) !!}, // Sử dụng điểm số làm dữ liệu
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 10
                    }
                }
            }
        });
    }
</script>

