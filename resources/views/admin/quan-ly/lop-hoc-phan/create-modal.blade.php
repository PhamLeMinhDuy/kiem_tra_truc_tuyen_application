<div class="fixed top-0 left-0 inset-0 overflow-y-auto bg-gray-600 bg-opacity-50 w-screen h-screen" style="display: none; z-index:100;" id="modal-them-lop-hoc-phan">
    <div class="bg-white rounded p-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="modal-title mb-6">
          <h4 class="text-lg font-semibold">
              Thêm lớp học phần
          </h4>
        </div>
        <form id="form-them-lop-hoc-phan">
            <div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã lớp học phần:</label>
                  <input id="input-ma-lop-hoc-phan-them" class="input-them-lop-hoc-phan col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Tên lớp học phần:</label>
                  <input id="input-ten-lop-hoc-phan-them" class="input-them-lop-hoc-phan col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                <label class="col-span-1" for="">Môn học:</label>
                <input id="input-mon-hoc-lop-hoc-phan-them" class="input-them-lop-hoc-phan col-span-2 border rounded-sm px-2 py-1" type="text">
            </div>
            <div class="form-group grid grid-cols-3 gap-4 mb-2">
                <label class="col-span-1" for="">Thời gian bắt đầu:</label>
                <input id="input-bat-dau-lop-hoc-phan-them" class="input-them-lop-hoc-phan col-span-2 border rounded-sm px-2 py-1" type="text">
            </div>
            <div class="form-group grid grid-cols-3 gap-4 mb-2">
                <label class="col-span-1" for="">Thời gian kết thúc:</label>
                <input id="input-ket-thuc-lop-hoc-phan-them" class="input-them-lop-hoc-phan col-span-2 border rounded-sm px-2 py-1" type="text">
            </div>
            <div class="form-group grid grid-cols-3 gap-4 mb-2">
                <label class="col-span-1" for="">Danh sách sinh viên</label>
                <input id="input-danh-sach-sinh-vien-lop-hoc-phan-them" class="input-them-lop-hoc-phan col-span-2 border rounded-sm px-2 py-1" type="text">
            </div>
            <div class="form-group grid grid-cols-3 gap-4 mb-2">
                <label class="col-span-1" for="">Danh sách bài thi:</label>
                <input id="input-danh-sach-bai-thi-lop-hoc-phan-them" class="input-them-lop-hoc-phan col-span-2 border rounded-sm px-2 py-1" type="text">
            </div>
            </div>
            <div class="flex justify-between mt-5">
                <button onclick="them()" type="submit" class="mr-3 border-2 border-cyan-500 py-2 px-4 rounded inline-flex items-center hover:bg-cyan-500 font-bold hover:text-white">
                Thêm
              </button>
              <button id="btn-huy-them" type='button' class="mr-3 border-2 border-rose-500 py-2 px-4 rounded inline-flex items-center hover:bg-rose-500 font-bold hover:text-white">
                Hủy
              </button>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $('#btn-huy-them').on('click', function(event){
        document.getElementById('modal-them-lop-hoc-phan').style.display = 'none';
        var inputList = document.querySelectorAll('.input-them-lop-hoc-phan')
        for (let i = 0; i<inputList.length; i++) { 
            inputList[i].value = '';
        }
    })

  function them() {
    $('#form-them-lop-hoc-phan').on('submit', function(event){
        event.preventDefault();
        axios.post("{{ route('admin.quan-ly.lop-hoc-phan.handle-them-lop-hoc-phan') }}", {
            ma_lop_hoc_phan: $('#input-ma-lop-hoc-phan-them').val(),
            ten_lop_hoc_phan: $('#input-ten-lop-hoc-phan-them').val(),
            ma_mon_hoc: $('#input-mon-hoc-lop-hoc-phan-them').val(),
            thoi_gian_dat_dau: $('#input-bat-dau-lop-hoc-phan-them').val(),
            thoi_gian_ket_thuc: $('#input-ket-thuc-lop-hoc-phan-them').val(),
            danh_sach_sinh_vien: $('#input-danh-sach-sinh-vien-lop-hoc-phan-them').val(),
            danh_sach_bai_thi: $('#input-danh-sach-bai-thi-lop-hoc-phan-them').val(),
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