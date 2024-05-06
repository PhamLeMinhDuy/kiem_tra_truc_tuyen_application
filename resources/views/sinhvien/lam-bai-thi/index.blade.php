@extends('sinhvien.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between mt-4">
        <div class="mr-5 w-full border bg-white h-[120px] flex items-center px-4 text-4xl">
            {{ $tenBaiThi }}
        </div>
    </div>
@endsection
@section('content')
    <div class="w-full mt-5">
        <div class="mr-5 border bg-white h-[600px]  px-4 text-xl p-4">
            <div class="mb-6">
                <p class="font-bold">Mô tả:</p>
                @php
                    $moTaSentences = explode('.', $moTa);
                    foreach ($moTaSentences as $sentence) {
                        echo "<p><strong>$sentence</strong></p>";
                    }
                @endphp
            </div>
            <div class="flex flex-col items-center justify-center  ">
                <div class="mb-5">
                    Attemp allowed: 1
                </div>
                <div class="mb-5">
                    Time limit: {{ $sogio}} h {{ $sophut }} p
                </div>
                @if(\Carbon\Carbon::now()->gte($thoiGianKetThucThi) || !$coTrongDanhSach)
                    <button class="px-4 py-2 rounded-md border border-neutral-300 bg-neutral-100 text-neutral-500 text-sm hover:-translate-y-1 transform transition duration-200 hover:shadow-md" disabled>
                        Can't Attemp quiz now
                    </button>
                @else
                    <a href="{{ route('sinh-vien.quan-ly.bai-thi.quan-ly-lam-bai-thi-trac-nghiem-sinh-vien', ['id' => $id, 'maBaiThi' => $maBaiThi]) }}" class="px-4 py-2 rounded-md border border-neutral-300 bg-neutral-100 text-neutral-500 text-sm hover:-translate-y-1 transform transition duration-200 hover:shadow-md">
                        Attemp quiz now
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
