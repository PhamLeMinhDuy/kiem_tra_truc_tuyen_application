@extends('sinhvien.layouts.master')

@section('title', $title)

@section('page-title')
    <div class="flex items-center justify-between font-bold">
        <div class="mr-5">
            Xem điểm
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-8 ">
        @if (isset($ketQuas) && count($ketQuas) > 0)
            @foreach ($ketQuas as $ketQua)
                <div class="border p-4 mb-4 bg-white">
                    <p class="font-semibold">Tên bài thi: {{ $ketQua['tenBaiThi'] }}</p>
                    <p class="font-semibold">Mã bài thi: {{ $ketQua['maBaiThi'] }}</p>
                    <p class="font-semibold">Số câu đúng: {{ $ketQua['soCauDung'] }}</p>
                    <p class="font-semibold">Điểm số: {{ $ketQua['diem'] }}</p>
                </div>
            @endforeach
        @else
            <p class="text-red-500">Không có kết quả</p>
        @endif
    </div>
@endsection
