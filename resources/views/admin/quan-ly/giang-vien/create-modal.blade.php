<div class="fixed top-0 left-0 inset-0 overflow-y-auto bg-gray-600 bg-opacity-50 w-screen h-screen" style="display: none; z-index:100;" id="modal-them-giang-vien">
    
    <div class="bg-white rounded p-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="modal-title mb-6">
          <h4 class="text-lg font-semibold">
              Thêm giảng viên
          </h4>
        </div>
        <form id="form-them-giang-vien" class="mb-0">
            <div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã giảng viên:</label>
                  <input id="input-ma-giang-vien-them" class="input-them-giang-vien col-span-2 border rounded-sm px-2 py-1" type="text">
                  <span id="error-ma-giang-vien" class="text-red-500"></span>
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Tên giảng viên:</label>
                  <input id="input-ten-giang-vien-them" class="input-them-giang-vien col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Số điện thoại:</label>
                  <input id="input-so-dien-thoai-them" class="input-them-giang-vien col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Email:</label>
                  <input id="input-email-them" class="input-them-giang-vien col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Ngày sinh:</label>
                  <input id="input-ngay-sinh-them" class="input-them-giang-vien col-span-2 border rounded-sm px-2 py-1" type="date">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Khoa:</label>
                  <select name="" id="input-ma-khoa-them" class="input-them-giang-vien col-span-2 border rounded-sm px-2 py-1" >
                    @foreach ($danhSachKhoa as $khoa)
                        <option value="{{ $khoa->ma_khoa }}">{{ $khoa->ten_khoa }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                <label class="col-span-1" for="">Ngành:</label>
                <select name="" id="input-ma-nganh-them" class="input-them-giang-vien col-span-2 border rounded-sm px-2 py-1" >
                    @foreach ($danhSachNganh as $nganh)
                        <option value="{{ $nganh->ma_nganh }}">{{ $nganh->ten_nganh }}</option>
                    @endforeach
                  </select>
            </div>
            </div>
            <div class="flex justify-between mt-5">
                <button onclick="them()" type="submit" class="mr-3 border border-cyan-400 py-2 px-4 mt-4 rounded inline-flex items-center hover:bg-cyan-500 font-bold hover:text-white">
                Thêm
              </button>
              <button id="btn-huy-them" type='button' class="mr-3 border border-rose-400 py-2 px-4 mt-4 rounded inline-flex items-center hover:bg-rose-500 font-bold hover:text-white">
                Hủy
              </button>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $('#btn-huy-them').on('click', function(event){
        document.getElementById('modal-them-giang-vien').style.display = 'none';
        var inputList = document.querySelectorAll('.input-them-giang-vien')
        for (let i = 0; i<inputList.length; i++) { 
            inputList[i].value = '';
        }
    })
    $('#form-them-giang-vien').on('submit', function(event){
        event.preventDefault();
        axios.post("{{ route('admin.quan-ly.giang-vien.handle-them-giang-vien') }}", {
            ma_giang_vien: $('#input-ma-giang-vien-them').val(),
            ten_giang_vien: $('#input-ten-giang-vien-them').val(),
            so_dien_thoai: $('#input-so-dien-thoai-them').val(),
            email: $('#input-email-them').val(),
            ngay_sinh: $('#input-ngay-sinh-them').val(),
            ma_khoa: $('#input-ma-khoa-them').val(),
            ma_nganh: $('#input-ma-nganh-them').val(),
        })
        .then(function (response) {
            if (response.data.success) {
                window.location.replace(response.data.redirect);
                return;
            }
            Swal.fire({
                icon: response.data.type,
                title: response.data.message,
                showConfirmButton: false,
                timer: 1500
            })
        })
        .catch(function (error) {
            Swal.fire({
                icon: 'error',
                title: 'Có lỗi hệ thống! Xin lỗi bạn vì sự bất tiện này!',
                showConfirmButton: false,
                timer: 1500
            })
        });
    })
    document.addEventListener("DOMContentLoaded", function() {
        // Kiểm tra Session để hiển thị thông báo
        @if(Session::has('success_message'))
            Swal.fire({
                icon: 'success',
                title: '{{ Session::get('success_message') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    });
</script>