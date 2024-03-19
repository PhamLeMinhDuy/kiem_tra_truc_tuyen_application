@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    Danh sách giảng viên
@endsection
@section('content')
    <div class="p-2">
        @include('components.datatable', [$danhSachCot, $danhSachDuLieu])
    </div>
@endsection
@include('admin.quan-ly.giang-vien.update-modal')
@section('page-js')
    <script type="text/javascript">
    </script>
@endsection