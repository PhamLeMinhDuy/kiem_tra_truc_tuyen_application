
<div class="flex justify-end mb-2">
    <input type="text" id="searchInput" class="w-64 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-400" placeholder="Tìm kiếm...">
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($danhSachCot as $tenCot)
                    @if ($tenCot != 'ID')
                     <th scope="col" class="px-6 py-3 @if($tenCot == 'Email' || $tenCot == 'Ngày sinh' || $tenCot == 'Số điện thoại') hide-on-small-screen @endif">
                        {{ $tenCot }}
                    </th>
                    @endif
                @endforeach
                <th scope="col" class="px-6 py-3">
                    Action
                 </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($danhSachDuLieu as $duLieu)
                <tr id="row-{{ $duLieu['id'] }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    @for ($i = 1; $i < sizeof($danhSachCotDb); $i++)
                    <td class="px-6 py-4 @if($danhSachCotDb[$i] == 'email' || $danhSachCotDb[$i] == 'ngay_sinh' || $danhSachCotDb[$i] == 'so_dien_thoai') hide-on-small-screen @endif">
                        {{ $duLieu[$danhSachCotDb[$i]] }}
                    </td>
                    @endfor
                    @if ($dataType === 'giang_vien')
                        <input type="hidden" name="" class="cac-mon-giang-day-data" value="{{ $duLieu['cac_mon_giang_day'] }}">
                    @endif
                    @if ($dataType === 'lop_hoc_phan' || $dataType === 'lop_hoc_phan_giang_vien')
                        <input type="hidden" name="" class="danh-sach-sinh-vien-lop-hoc-phan" value="{{ $duLieu['danh_sach_sinh_vien'] }}">
                        <input type="hidden" name="" class="danh-sach-giang-vien-lop-hoc-phan" value="{{ $duLieu['danh_sach_giang_vien'] }}">
                        <input type="hidden" name="" class="danh-sach-bai-thi-lop-hoc-phan" value="{{ $duLieu['danh_sach_bai_thi'] }}">
                    @endif
                    @if ($dataType === 'danh_sach_cau_hoi')
                        <input type="hidden" name="" class="danh-sach-cau-hoi-bai-thi" value="{{ $duLieu['danh_sach_cau_hoi'] }}">
                    @endif
                    <td class="flex items-center px-6 py-4">
                        <button onclick="showModalChiTiet('{{ $modalCapNhat }}')" class="mr-4" title="Cập nhật">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:cursor-pointer" viewBox="0 0 512 512">
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" fill="#a8a29e"/>
                            </svg>
                        </button>       
                        @if($dataType !== 'lop_hoc_phan_giang_vien')
                        <button onclick="showModalXoa('{{ $modalXoa }}')" class="mr-4" title="Xóa">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 448 512">
                                <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" fill="#fb7185"/>
                            </svg>
                        </button>
                        @endif
                        @if ($dataType === 'giang_vien')
                        <button onclick="showModalCacMonGiangDay('{{ $modalCacMonGiangDay }}')" title="Các môn giảng dạy">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                            </svg>                                                          
                        </button>
                        @endif
                        @if ($dataType === 'lop_hoc_phan')
                        <button onclick="showModalSinhVien('{{ $modalSinhVien }}')" title="Danh sách sinh viên" class="mr-2">
                            <svg class="w-7 h-7 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" stroke-width="1.5" fill="#a3e635">
                                <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                            </svg>                                                         
                        </button>
                        <button onclick="showModalGiangVien('{{ $modalGiangVien }}')" title="Danh sách giảng viên" class="mr-2">
                            <svg class="w-6 h-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" stroke-width="1.5" fill="#22d3ee">
                                <path d="M96 128a128 128 0 1 0 256 0A128 128 0 1 0 96 128zm94.5 200.2l18.6 31L175.8 483.1l-36-146.9c-2-8.1-9.8-13.4-17.9-11.3C51.9 342.4 0 405.8 0 481.3c0 17 13.8 30.7 30.7 30.7H162.5c0 0 0 0 .1 0H168 280h5.5c0 0 0 0 .1 0H417.3c17 0 30.7-13.8 30.7-30.7c0-75.5-51.9-138.9-121.9-156.4c-8.1-2-15.9 3.3-17.9 11.3l-36 146.9L238.9 359.2l18.6-31c6.4-10.7-1.3-24.2-13.7-24.2H224 204.3c-12.4 0-20.1 13.6-13.7 24.2z"/>
                            </svg>                                                         
                        </button>
                        <button onclick="showModalBaiThi('{{ $modalBaiThi }}')" title="Danh sách bài thi">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#facc15" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                              </svg>                                                                                       
                        </button>
                        @endif
                        @if ($dataType === 'lop_hoc_phan_giang_vien')
                        <button onclick="showModalSinhVien('{{ $modalSinhVien }}')" title="Danh sách sinh viên" class="mr-2">
                            <svg class="w-7 h-7 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" stroke-width="1.5" fill="#a3e635">
                                <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/>
                            </svg>                                                         
                        </button>
                        <button onclick="showModalBaiThi('{{ $modalBaiThi }}')" title="Danh sách bài thi">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#facc15" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                              </svg>                                                                                       
                        </button>
                        @endif
                        @if ($dataType === 'bai_thi_giang_vien')
                        <button onclick="showCauHoiGiangVien()" type="button" title="Thêm câu hỏi">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#a3e635" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </button>
                        @endif
                        @if ($dataType === 'bai_thi')
                        <button onclick="showCauHoi()" type="button" title="Thêm câu hỏi">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#a3e635" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>
                        </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4 ml-auto">
    {{ $danhSachDuLieu->onEachSide(1)->links('vendor.pagination.tailwind') }}
</div>
@php
    $dsSinhVienAll = [];
    $dsGiangVienAll = [];
    $dsBaiThiAll = [];
    
    if ($dataType == 'lop_hoc_phan' || $dataType == 'lop_hoc_phan_giang_vien') {
        $dsSinhVienAll = $danhSachSinhVienAll;
        $dsGiangVienAll = $danhSachGiangVienAll;
        $dsBaiThiAll = $danhSachBaiThiAll;
    }
    if ($dataType == 'lop_hoc_phan_giang_vien') {
        $id_gv = $id_giang_vien;
    }
@endphp
<script>
    function showModalChiTiet(modalCapNhat) {
        var modal = document.getElementById(modalCapNhat)
        modal.style.display = 'block';
        var button = event.target;
        var parentTr = button.closest('tr');
        document.getElementById('data-id').value = parentTr.id.split('-')[1]
        var childrenCell = parentTr.children;
        var inputListGiangVien = document.querySelectorAll('.input-cap-nhat-giang-vien')
        for (let i = 0; i<inputListGiangVien.length; i++) { 
            inputListGiangVien[i].value = childrenCell[i].innerText;
        }
        var inputListSinhVien = document.querySelectorAll('.input-cap-nhat-sinh-vien')
        for (let i = 0; i<inputListSinhVien.length; i++) { 
            inputListSinhVien[i].value = childrenCell[i].innerText;
        }
        var inputListMonHoc = document.querySelectorAll('.input-cap-nhat-mon-hoc')
        for (let i = 0; i<inputListMonHoc.length; i++) { 
            inputListMonHoc[i].value = childrenCell[i].innerText;
        }
        var inputListNganh = document.querySelectorAll('.input-cap-nhat-nganh')
        for (let i = 0; i<inputListNganh.length; i++) { 
            inputListNganh[i].value = childrenCell[i].innerText;
        }
        var inputListKhoa = document.querySelectorAll('.input-cap-nhat-khoa')
        for (let i = 0; i<inputListKhoa.length; i++) { 
            inputListKhoa[i].value = childrenCell[i].innerText;
        }
        var inputListLopHocPhan = document.querySelectorAll('.input-cap-nhat-lop-hoc-phan')
        for (let i = 0; i<inputListLopHocPhan.length; i++) { 
            inputListLopHocPhan[i].value = childrenCell[i].innerText;
        }
        var inputListLopHocPhan = document.querySelectorAll('.input-cap-nhat-lop-hoc-phan-giang-vien')
        for (let i = 0; i<inputListLopHocPhan.length; i++) { 
            inputListLopHocPhan[i].value = childrenCell[i].innerText;
        }
        var inputListLopHocPhan = document.querySelectorAll('.input-cap-nhat-bai-thi')
        for (let i = 0; i<inputListLopHocPhan.length; i++) { 
            inputListLopHocPhan[i].value = childrenCell[i].innerText;
        }
        var inputListNguoiDung = document.querySelectorAll('.input-cap-nhat-nguoi-dung')
        for (let i = 0; i<inputListNguoiDung.length; i++) { 
            inputListNguoiDung[i].value = childrenCell[i].innerText;
        }

    }
    function showModalXoa(modalXoa) {
        document.getElementById(modalXoa).style.display = 'block';
        var button = event.target;
        var parentTr = button.closest('tr');
        document.getElementById('data-id').value = parentTr.id.split('-')[1]
    }

    function showModalCacMonGiangDay(modal) {
        document.getElementById(modal).style.display = 'block';
        var danhSachMon = @json($danhSachMon);
        var button = event.target;
        var parentTr = button.closest('tr');
        document.getElementById('giang-vien-id--cac-mon-giang-day').value = parentTr.id.split('-')[1]
        var cacMonGiangDayDataString = parentTr.querySelector('.cac-mon-giang-day-data').value;
        var cacMonGiangDayData = JSON.parse(cacMonGiangDayDataString);
        if(cacMonGiangDayData) {
            var parentElement = document.getElementById("list-mon-hoc")
            parentElement.innerHTML = ``;
            var HTMLData = ``;
            cacMonGiangDayData.map((item, index)=>{
                HTMLData += 
                `
                <div class="list-group-item flex justify-between items-center mb-4">
                    <div class="">
                        <select name="" id="" value="${item.ma_mon}" class="select-mon-hoc col-span-2 border rounded-sm px-2 py-1 w-[300px]">
                            ${
                                danhSachMon.map((mon, index)=>{
                                    return `<option ${item.ma_mon === mon.ma_mon_hoc ? 'selected' : ''} value="${mon.ma_mon_hoc}">${mon.ten_mon_hoc}</option>`
                                })
                            }
                        </select>
                    </div>
                    <div class="ml-4">
                        <button onclick="xoaMon()" class="" type="button" title="Xóa">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 448 512">
                                <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" fill="#fb7185"/>
                            </svg>
                        </button>
                    </div>
                </div>
                `
            })
            parentElement.innerHTML = HTMLData
        }
    }

    // Hàm kiểm tra kích thước màn hình và ẩn hoặc hiển thị các cột
    function toggleColumns() {
        var screenWidth = window.innerWidth;
        var columns = document.querySelectorAll('.hide-on-small-screen');

        if (screenWidth <= 640) {
            // Ẩn các cột khi màn hình nhỏ hơn hoặc bằng 640px
            columns.forEach(function(column) {
                column.classList.add('hidden');
            });
        } else {
            // Hiển thị các cột khi màn hình lớn hơn 640px
            columns.forEach(function(column) {
                column.classList.remove('hidden');
            });
        }
    }

    function showModalSinhVien(modalSinhVien) {
        document.getElementById(modalSinhVien).style.display = 'block';
        var danhSachSinhVienAll = @json($dsSinhVienAll);
        var button = event.target;
        var parentTr = button.closest('tr');
        document.getElementById('lop-hoc-phan-id--danh-sach-sinh-vien').value = parentTr.id.split('-')[1]
        var danhSachSinhVienHienTaiString = parentTr.querySelector('.danh-sach-sinh-vien-lop-hoc-phan').value;
        document.getElementById('danh-sach-sinh-vien-hien-tai-data--lop-hoc-phan').value = danhSachSinhVienHienTaiString
        var danhSachSinhVienHienTai = JSON.parse(danhSachSinhVienHienTaiString.length > 0 ? danhSachSinhVienHienTaiString : '[]');
        danhSachSinhVienHienTai.map(item => {
            var index = danhSachSinhVienAll.findIndex(element => element.ma_sinh_vien == item.ma_sinh_vien)
            item.ten_sinh_vien = danhSachSinhVienAll[index].ten_sinh_vien
        })

        var danhSachSinhVienHienTaiBlock = document.getElementById('danh-sach-sinh-vien--lop-hoc-phan--selected')
        var innerHTMl = ``;
        danhSachSinhVienHienTai.map(item => {
            innerHTMl += `
            <div class="border w-full h-fit flex items-center p-2 mb-1">
                <div class="w-5/6">
                    <p class="">
                        ${item.ten_sinh_vien}
                    </p>
                    <p class="">
                        ${item.ma_sinh_vien}
                    </p>
                </div>
                <div class="w-1/6">
                    <button onclick="xoaSinhVien('${item.ma_sinh_vien}')" type="button" class=" hover:border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>`
        })
        danhSachSinhVienHienTaiBlock.innerHTML = innerHTMl;

        var danhSachSinhVienAllBlock = document.getElementById('danh-sach-sinh-vien--lop-hoc-phan')
        var innerHTMl = ``;
        danhSachSinhVienAll.map(item => {
            if(danhSachSinhVienHienTai.findIndex(element => element.ma_sinh_vien == item.ma_sinh_vien) != -1) {
                innerHTMl += `
                <div class="border w-full h-fit flex items-center p-2 mb-1 bg-gray-200">
                    <div class="w-5/6">
                        <p class="">
                            ${item.ten_sinh_vien}
                        </p>
                        <p class="">
                            ${item.ma_sinh_vien}
                        </p>
                    </div>
                    <div class="w-1/6">
                        <button class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>`
            } else {
                innerHTMl += `
                <div class="border w-full h-fit flex items-center p-2 mb-1">
                    <div class="w-5/6">
                        <p class="">
                            ${item.ten_sinh_vien}
                        </p>
                        <p class="">
                            ${item.ma_sinh_vien}
                        </p>
                    </div>
                    <div class="w-1/6">
                        <button onclick="themSinhVien('${item.ma_sinh_vien}')" type="button" class=" hover:border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>`
            }
        })
        danhSachSinhVienAllBlock.innerHTML = innerHTMl;
    }

    function showModalGiangVien(modalGiangVien) {
        document.getElementById(modalGiangVien).style.display = 'block';
        var danhSachGiangVienAll = @json($dsGiangVienAll);
        var button = event.target;
        var parentTr = button.closest('tr');
        document.getElementById('lop-hoc-phan-id--danh-sach-giang-vien').value = parentTr.id.split('-')[1]
        var danhSachGiangVienHienTaiString = parentTr.querySelector('.danh-sach-giang-vien-lop-hoc-phan').value;
        document.getElementById('danh-sach-giang-vien-hien-tai-data--lop-hoc-phan').value = danhSachGiangVienHienTaiString
        var danhSachGiangVienHienTai = JSON.parse(danhSachGiangVienHienTaiString.length > 0 ? danhSachGiangVienHienTaiString : '[]');
        danhSachGiangVienHienTai.map(item => {
            var index = danhSachGiangVienAll.findIndex(element => element.ma_giang_vien == item.ma_giang_vien)
            item.ten_giang_vien = danhSachGiangVienAll[index].ten_giang_vien
        })

        var danhSachGiangVienHienTaiBlock = document.getElementById('danh-sach-giang-vien--lop-hoc-phan--selected')
        var innerHTMl = ``;
        danhSachGiangVienHienTai.map(item => {
            innerHTMl += `
            <div class="border w-full h-fit flex items-center p-2 mb-1">
                <div class="w-5/6">
                    <p class="">
                        ${item.ten_giang_vien}
                    </p>
                    <p class="">
                        ${item.ma_giang_vien}
                    </p>
                </div>
                <div class="w-1/6">
                    <button onclick="xoaGiangVien('${item.ma_giang_vien}')" type="button" class=" hover:border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>`
        })
        danhSachGiangVienHienTaiBlock.innerHTML = innerHTMl;

        var danhSachGiangVienAllBlock = document.getElementById('danh-sach-giang-vien--lop-hoc-phan')
        var innerHTMl = ``;
        danhSachGiangVienAll.map(item => {
            if(danhSachGiangVienHienTai.findIndex(element => element.ma_giang_vien == item.ma_giang_vien) != -1) {
                innerHTMl += `
                <div class="border w-full h-fit flex items-center p-2 mb-1 bg-gray-200">
                    <div class="w-5/6">
                        <p class="">
                            ${item.ten_giang_vien}
                        </p>
                        <p class="">
                            ${item.ma_giang_vien}
                        </p>
                    </div>
                    <div class="w-1/6">
                        <button class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>`
            } else {
                innerHTMl += `
                <div class="border w-full h-fit flex items-center p-2 mb-1">
                    <div class="w-5/6">
                        <p class="">
                            ${item.ten_giang_vien}
                        </p>
                        <p class="">
                            ${item.ma_giang_vien}
                        </p>
                    </div>
                    <div class="w-1/6">
                        <button onclick="themGiangVien('${item.ma_giang_vien}')" type="button" class=" hover:border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>`
            }
        })
        danhSachGiangVienAllBlock.innerHTML = innerHTMl;
    }

    function showModalBaiThi(modalBaiThi) {
        document.getElementById(modalBaiThi).style.display = 'block';
        var danhSachBaiThiAll = @json($dsBaiThiAll);
        var button = event.target;
        var parentTr = button.closest('tr');
        document.getElementById('lop-hoc-phan-id--danh-sach-bai-thi').value = parentTr.id.split('-')[1]
        var danhSachBaiThiHienTaiString = parentTr.querySelector('.danh-sach-bai-thi-lop-hoc-phan').value;
        document.getElementById('danh-sach-bai-thi-hien-tai-data--lop-hoc-phan').value = danhSachBaiThiHienTaiString
        var danhSachBaiThiHienTai = JSON.parse(danhSachBaiThiHienTaiString.length > 0 ? danhSachBaiThiHienTaiString : '[]');
        danhSachBaiThiHienTai.map(item => {
            var index = danhSachBaiThiAll.findIndex(element => element.ma_bai_thi == item.ma_bai_thi)
            item.ten_bai_thi = danhSachBaiThiAll[index].ten_bai_thi
        })

        var danhSachBaiThiHienTaiBlock = document.getElementById('danh-sach-bai-thi--lop-hoc-phan--selected')
        var innerHTMl = ``;
        danhSachBaiThiHienTai.map(item => {
            innerHTMl += `
            <div class="border w-full h-fit flex items-center p-2 mb-1">
                <div class="w-5/6">
                    <p class="">
                        ${item.ten_bai_thi}
                    </p>
                    <p class="">
                        ${item.ma_bai_thi}
                    </p>
                </div>
                <div class="w-1/6">
                    <button onclick="xoaBaiThi('${item.ma_bai_thi}')" type="button" class=" hover:border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>`
        })
        danhSachBaiThiHienTaiBlock.innerHTML = innerHTMl;

        var danhSachBaiThiAllBlock = document.getElementById('danh-sach-bai-thi--lop-hoc-phan')
        var innerHTMl = ``;
        danhSachBaiThiAll.map(item => {
            if(danhSachBaiThiHienTai.findIndex(element => element.ma_bai_thi == item.ma_bai_thi) != -1) {
                innerHTMl += `
                <div class="border w-full h-fit flex items-center p-2 mb-1 bg-gray-200">
                    <div class="w-5/6">
                        <p class="">
                            ${item.ten_bai_thi}
                        </p>
                        <p class="">
                            ${item.ma_bai_thi}
                        </p>
                    </div>
                    <div class="w-1/6">
                        <button class="hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>`
            } else {
                innerHTMl += `
                <div class="border w-full h-fit flex items-center p-2 mb-1">
                    <div class="w-5/6">
                        <p class="">
                            ${item.ten_bai_thi}
                        </p>
                        <p class="">
                            ${item.ma_bai_thi}
                        </p>
                    </div>
                    <div class="w-1/6">
                        <button onclick="themBaiThi('${item.ma_bai_thi}')" type="button" class=" hover:border">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </button>
                    </div>
                </div>`
            }
        })
        danhSachBaiThiAllBlock.innerHTML = innerHTMl;
    }

    @if(isset($id_giang_vien))
        var id_giang_vien = {{ $id_giang_vien }};
        function showCauHoiGiangVien() {
            var button = event.target;
            var parentTr = button.closest('tr');
            var id = parentTr.id.split('-')[1];
            var url = "{{ route('giang-vien.quan-ly.bai-thi.quan-ly-bai-thi-cau-hoi', [':id', ':id_giang_vien']) }}";
            url = url.replace(':id', id);
            url = url.replace(':id_giang_vien', id_giang_vien);
            window.location.href = url;
        }
    @else
        function showCauHoi() {
            var button = event.target;
            var parentTr = button.closest('tr');
            var id = parentTr.id.split('-')[1];
            var url = "{{ route('admin.quan-ly.bai-thi.quan-ly-bai-thi-cau-hoi', ':id') }}";
            url = url.replace(':id', id);
            window.location.href = url;
        }
    @endif

    const searchInput = document.getElementById('searchInput');
    const rows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function() {
        const searchText = searchInput.value.trim().toLowerCase();

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let rowMatch = false;

            cells.forEach(cell => {
                if (cell.textContent.trim().toLowerCase().includes(searchText)) {
                    rowMatch = true;
                }
            });

            if (rowMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Gọi hàm toggleColumns khi trang được tải hoặc kích thước màn hình thay đổi
    window.addEventListener('load', toggleColumns);
    window.addEventListener('resize', toggleColumns)
</script>

