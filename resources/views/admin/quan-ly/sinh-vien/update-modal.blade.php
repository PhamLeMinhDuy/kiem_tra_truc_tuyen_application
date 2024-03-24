<div class="fixed top-0 left-0 inset-0 overflow-y-auto bg-gray-600 bg-opacity-50 w-screen h-screen" style="display: none; z-index:100;" id="modal-cap-nhat-sinh-vien">
    <div class="bg-white rounded p-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="modal-title mb-6">
          <h4 class="text-lg font-semibold">
              Chi tiết sinh viên
          </h4>
          <input type="hidden" id="data-id">
        </div>
        <form id="form-cap-nhat-sinh-vien">
            <div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã giảng viên:</label>
                  <input id="input-ma-sinh-vien-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1 input-cap-nhat-sinh-vien" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Tên giảng viên:</label>
                  <input id="input-ten-sinh-vien-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1 input-cap-nhat-sinh-vien" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Số điện thoại:</label>
                  <input id="input-so-dien-thoai-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1 input-cap-nhat-sinh-vien" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Email:</label>
                  <input id="input-email-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1 input-cap-nhat-sinh-vien" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Ngày sinh:</label>
                  <input id="input-ngay-sinh-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1 input-cap-nhat-sinh-vien" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã khoa:</label>
                  <input id="input-ma-khoa-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1 input-cap-nhat-sinh-vien" type="text">
              </div>
            </div>
            <div class="flex justify-between mt-5">
                <button  type="submit" class="mr-3 border border-emerald-400 py-2 px-4 rounded inline-flex items-center hover:bg-emerald-500 font-bold hover:text-white">
                Cập nhật
              </button>
              <button id="btn-huy-cap-nhat" type='button' class="mr-3 border border-rose-400 py-2 px-4 rounded inline-flex items-center hover:bg-rose-500 font-bold hover:text-white">
                Hủy
              </button>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $('#btn-huy-cap-nhat').on('click', function(event){
        document.getElementById('modal-cap-nhat-sinh-vien').style.display = 'none';
        var inputList = document.querySelectorAll('.input-cap-nhat-sinh-vien')
        for (let i = 0; i<inputList.length; i++) { 
            inputList[i].value = '';
        }
    })
  
    $('#form-cap-nhat-sinh-vien').on('submit', function(event){
      // Ngăn chặn hành vi mặc định của form
      event.preventDefault();
      
      // Kiểm tra các trường nhập liệu
      var ma_sinh_vien = $('#input-ma-sinh-vien-cap-nhat').val();
      var ten_sinh_vien = $('#input-ten-sinh-vien-cap-nhat').val();
      var so_dien_thoai = $('#input-so-dien-thoai-cap-nhat').val();
      var email = $('#input-email-cap-nhat').val();
      var ngay_sinh = $('#input-ngay-sinh-cap-nhat').val();
      var ma_khoa = $('#input-ma-khoa-cap-nhat').val();
  
      if (ma_sinh_vien && ten_sinh_vien && so_dien_thoai && email && ngay_sinh && ma_khoa) {
        // Nếu tất cả các trường đã được nhập, gửi form đi
        axios.post("{{ route('admin.quan-ly.sinh-vien.handle-cap-nhat-sinh-vien') }}", {
            id_sinh_vien: $('#data-id').val(),
            ma_sinh_vien: ma_sinh_vien,
            ten_sinh_vien: ten_sinh_vien,
            so_dien_thoai: so_dien_thoai,
            email: email,
            ngay_sinh: ngay_sinh,
            ma_khoa: ma_khoa,
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
                timer: 1000
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
      } else {
        // Nếu có trường chưa được nhập, hiển thị thông báo lỗi
        Swal.fire({
            icon: 'error',
            title: 'Vui lòng nhập đầy đủ thông tin.',
            showConfirmButton: false,
            timer: 1500
        });
      }
    });
</script>
  