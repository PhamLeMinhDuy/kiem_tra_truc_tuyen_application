@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between">
        <div class="mr-5">
            Danh sách giảng viên
        </div>
        <div class="font-normal text-sm mr-5 mt-6">
            @include('admin.quan-ly.giang-vien.components.add')
        </div> 
    </div>
@endsection

@section('content')
    <div class="p-2">
        @include('components.datatable', [$danhSachCot, $danhSachDuLieu, $dataType])
    </div>
@endsection
@include('admin.quan-ly.giang-vien.create-modal')
@include('admin.quan-ly.giang-vien.update-modal')
@include('admin.quan-ly.giang-vien.delete-modal')
@include('admin.quan-ly.giang-vien.cac-mon-giang-day-modal')
@section('page-js')
     <script type="text/javascript">
    </script> 
@endsection