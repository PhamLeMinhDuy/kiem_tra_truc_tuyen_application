@extends('sinhvien.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between font-bold">
        <div class="mr-5">
            Dashboard
        </div>
    </div>
@endsection
@section('content')
    <div class="p-2">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($thongTinLopHocPhan as $lopHocPhan)
                <!-- Card -->
                <div class="p-4 border border-gray-300 rounded-md flex bg-white">
                    <!-- Thông tin chi tiết nằm bên trái -->
                    <div class="flex-grow">
                        <h2 class="text-lg font-bold text-center">{{ $lopHocPhan['ten_lop_hoc_phan'] }}</h2>
                        <p class="mt-2 text-gray-600">Thời gian bắt đầu: {{ $lopHocPhan['thoi_gian_bat_dau'] }}</p>
                        <p class="mt-2 text-gray-600">Thời gian kết thúc: {{ $lopHocPhan['thoi_gian_ket_thuc'] }}</p>
                    </div>
                    <!-- Liên kết chi tiết nằm bên phải -->
                    <a href="#" class="self-end text-blue-500 hover:underline mt-auto">Chi tiết</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection