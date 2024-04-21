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
    <div class="">
        <div class="container mt-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($thongTinLopHocPhan as $lopHocPhan)
                
                <a class="col-span-1 mt-4" href="{{ route('sinh-vien.quan-ly.bai-thi.quan-ly-bai-thi-sinh-vien', ['id' => $id]) }}">   
                    <div class="border border-gray-300 rounded-md shadow bg-white">
                        <!-- Thông tin chi tiết nằm bên trái -->
                        <div class="text-gray-500 pb-2">
                            <h2 class="text-lg font-bold border-b p-2 bg-blue-200">{{ $lopHocPhan['ten_lop_hoc_phan'] }}</h2>
                            
                            <p class="mt-2 text-base font-semibold px-2">Số bài thi đã làm: <span class=" font-normal">{{ $lopHocPhan['so_luong_bai_thi_da_lam'] }}</span></p>
                            <p class="mt-2 text-base font-semibold px-2">Đang có: <span class="text-red-400">{{ $lopHocPhan['so_luong_bai_thi'] }}</span></p>
                        </div>
                        <!-- Liên kết chi tiết nằm bên phải -->
                    </div>
                </a>
                <!-- Card -->
                @endforeach
            </div>
        </div>
    </div>
@endsection