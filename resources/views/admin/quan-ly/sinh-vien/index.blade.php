@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    Danh sách sinh viên
@endsection
@section('content')
    <div class="p-2">
        @include('components.datatable', [$danhSachCot, $danhSachDuLieu])
    </div>
@endsection
@section('page-js')
    <script type="text/javascript">
    </script>
@endsection