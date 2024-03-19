<div class="fixed top-0 left-0 inset-0 overflow-y-auto bg-gray-600 bg-opacity-50 w-screen h-screen" style="display: none; z-index:100;" id="modal-giang-vien">
    <div class="bg-white rounded p-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="modal-title mb-6">
          <h4 class="text-lg font-semibold">
              Chi tiết giảng viên
          </h4>
          <input type="hidden" id="data-id">
        </div>
        <form id="form-cap-nhat-giang-vien">
            <div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã giảng viên:</label>
                  <input id="input-ma-giang-vien-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Tên giảng viên:</label>
                  <input id="input-ten-giang-vien-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Số điện thoại:</label>
                  <input id="input-so-dien-thoai-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Email:</label>
                  <input id="input-email-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Ngày sinh:</label>
                  <input id="input-ngay-sinh-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã khoa:</label>
                  <input id="input-ma-khoa-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Các môn đang dạy:</label>
                  <input id="input-cac-mon-cap-nhat" class="col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
            </div>
            <div>
              <button onclick="capNhat()" type="submit">
                Cập nhật
              </button>
              <button onclick="tatModal()">
                Hủy
              </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
  function tatModal() {
    document.getElementById('modal-giang-vien').style.display = 'none';
  }

  function capNhat() {
    $('#form-cap-nhat-giang-vien').on('submit', function(event){
        event.preventDefault();
        axios.post("{{ route('admin.quan-ly.giang-vien.handle-cap-nhat-giang-vien') }}", {
            id_giang_vien: $('#data-id').val(),
            ma_giang_vien: $('#input-ma-giang-vien-cap-nhat').val(),
            ten_giang_vien: $('#input-ten-giang-vien-cap-nhat').val(),
            so_dien_thoai: $('#input-so-dien-thoai-cap-nhat').val(),
            email: $('#input-email-cap-nhat').val(),
            ngay_sinh: $('#input-ngay-sinh-cap-nhat').val(),
            ma_khoa: $('#input-ma-khoa-cap-nhat').val(),
            cac_mon: $('#input-cac-mon-cap-nhat').val(),
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
    })
  }
</script>