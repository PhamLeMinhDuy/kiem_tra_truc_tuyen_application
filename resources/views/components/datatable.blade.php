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
                    @if ($dataType === 'giang_vien' || $dataType === 'mon_hoc' || $dataType === 'khoa' || $dataType === 'nganh')
                        <input type="hidden" name="" class="cac-mon-giang-day-data" value="{{ $duLieu['cac_mon_giang_day'] }}">
                    @endif
                    <td class="flex items-center px-6 py-4">
                        <button onclick="showModalChiTiet('{{ $modalCapNhat }}')" class="mr-4" title="Cập nhật">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:cursor-pointer" viewBox="0 0 512 512">
                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" fill="#a8a29e"/>
                            </svg>
                        </button>
                        <button onclick="showModalXoa('{{ $modalXoa }}')" class="mr-4" title="Xóa">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 448 512">
                                <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" fill="#fb7185"/>
                            </svg>
                        </button>
                        @if ($dataType === 'giang_vien')
                        <button onclick="showModalCacMonGiangDay('{{ $modalCacMonGiangDay }}')" title="Các môn giảng dạy">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-yellow-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                            </svg>                                                          
                        </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


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

    // Gọi hàm toggleColumns khi trang được tải hoặc kích thước màn hình thay đổi
    window.addEventListener('load', toggleColumns);
    window.addEventListener('resize', toggleColumns)
</script>