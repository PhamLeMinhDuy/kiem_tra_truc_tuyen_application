@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between">
        <div class="mr-5">
            Danh sách ngành
        </div>
        <div class="font-normal text-sm mr-5 mt-6">
            @include('admin.quan-ly.nganh.components.add')
        </div> 
    </div>
@endsection

@section('content')
    <div class="p-2">
        @include('components.datatable', [$danhSachCot, $danhSachDuLieu])
    </div>
@endsection
@include('admin.quan-ly.nganh.create-modal')
@include('admin.quan-ly.nganh.update-modal')
@include('admin.quan-ly.nganh.delete-modal')
@section('page-js')
     <script type="text/javascript">
    </script> 
@endsection