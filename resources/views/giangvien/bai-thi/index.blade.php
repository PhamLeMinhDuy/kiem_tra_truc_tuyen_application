@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between">
        <div class="mr-5">
            Danh sách bài thi
        </div>
        <div class="font-normal text-sm mr-5 mt-6">
            @include('giangvien.bai-thi.components.add')
        </div> 
    </div>
@endsection

@section('content')
    <div class="p-2">
        @include('components.datatable', [$danhSachCot, $danhSachDuLieu])
    </div>
@endsection
@include('giangvien.bai-thi.create-modal')
@include('giangvien.bai-thi.update-modal')
@include('giangvien.bai-thi.delete-modal') 
@section('page-js')
     <script type="text/javascript">
    </script> 
@endsection