<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('sinhvien.layouts.blocks.sidebar')
        <div class="flex-1">
            @include('sinhvien.layouts.blocks.header')
            <main class="p-4">
                <h2 class="text-lg  text-gray-800 ml-2 mb-2">
                    @yield('page-title')
                    @yield('content')
                </h2>
                
            </main>
            @include('sinhvien.layouts.blocks.footer')
        </div>
    </div>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.bg-gray-400');
        const sidebarCollapseBtn = document.getElementById('sidebarCollapse');

        sidebarCollapseBtn.addEventListener('click', function () {
            sidebar.classList.toggle('hidden');
        });
    });
</script>