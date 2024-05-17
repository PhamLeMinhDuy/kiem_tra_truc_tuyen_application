<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.0/main.min.js"></script>
    <title>@yield('title')</title>
</head>
<body class="bg-white">
    <div class="flex flex-col min-h-screen"> <!-- Sử dụng flex và flex-col để footer dính dưới cùng của trang -->
        <div class="flex h-screen">
            @include('sinhvien.layouts.blocks.sidebar')
            <div class="flex-1 relative">
                @include('sinhvien.layouts.blocks.header')
                <main class="pl-4 bg-white flex-1">
                    <h2 class="text-lg text-gray-800">
                        @yield('page-title')    
                    </h2>
                    @yield('content')
                </main>
                @include('sinhvien.layouts.blocks.footer')
            </div>
            
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">
     document.addEventListener("DOMContentLoaded", function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarCollapseButton = document.getElementById('sidebarCollapse');

        sidebarCollapseButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full'); // Thêm/xóa lớp để hiển thị/ẩn sidebar
        });

        // Ẩn sidebar khi kích thước màn hình nhỏ hơn 1024px (sử dụng tailwind breakpoints)
        function handleResize() {
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full'); // Ẩn sidebar khi màn hình nhỏ
            } else {
                sidebar.classList.remove('-translate-x-full'); // Hiển thị sidebar khi màn hình lớn hơn
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize(); // Xử lý ban đầu khi tải trang
    });
</script>
