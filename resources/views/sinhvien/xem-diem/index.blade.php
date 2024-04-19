@extends('sinhvien.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('page-title')
    <div class="flex items-center justify-between font-bold">
        <div class="mr-5">
            Xem điểm
        </div>
    </div>
@endsection

@section('content')
    <div class="mt-8 " style="overflow-y: auto; max-height: 80vh;">
            @foreach ($ketQuas as $ketQua)
                <div class="border p-4 mb-4 bg-white">
                    <p class="font-semibold">Tên bài thi: {{ $ketQua['tenBaiThi'] }}</p>
                    <p class="font-semibold">Mã bài thi: {{ $ketQua['maBaiThi'] }}</p>
                    <p class="font-semibold">Số câu đúng: {{ $ketQua['soCauDung'] }}</p>
                    <p class="font-semibold">Điểm số: {{ $ketQua['diem'] }}</p>
                </div>
            @endforeach
    </div>
@endsection

