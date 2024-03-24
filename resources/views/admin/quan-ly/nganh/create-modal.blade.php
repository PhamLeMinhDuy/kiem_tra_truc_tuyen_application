<div class="fixed top-0 left-0 inset-0 overflow-y-auto bg-gray-600 bg-opacity-50 w-screen h-screen" style="display: none; z-index:100;" id="modal-them-nganh">
    <div class="bg-white rounded p-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
        <div class="modal-title mb-6">
          <h4 class="text-lg font-semibold">
              Thêm ngành
          </h4>
        </div>
        <form id="form-them-nganh">
            <div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã ngành:</label>
                  <input id="input-ma-nganh-them" class="input-them-nganh col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Tên ngành:</label>
                  <input id="input-ten-nganh-them" class="input-them-nganh col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
              <div class="form-group grid grid-cols-3 gap-4 mb-2">
                  <label class="col-span-1" for="">Mã khoa:</label>
                  <input id="input-ma-khoa-them" class="input-them-nganh col-span-2 border rounded-sm px-2 py-1" type="text">
              </div>
            </div>
            <div class="flex justify-between mt-5">
                <button onclick="them()" type="submit" class="mr-3 border border-cyan-400 py-2 px-4 rounded inline-flex items-center hover:bg-cyan-500 font-bold hover:text-white">
                Thêm
              </button>
              <button id="btn-huy-them" type='button' class="mr-3 border border-rose-400 py-2 px-4 rounded inline-flex items-center hover:bg-rose-500 font-bold hover:text-white">
                Hủy
              </button>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $('#btn-huy-them').on('click', function(event){
        document.getElementById('modal-them-nganh').style.display = 'none';
        var inputList = document.querySelectorAll('.input-them-nganh')
        for (let i = 0; i<inputList.length; i++) { 
            inputList[i].value = '';
        }
    })

  function them() {
    $('#form-them-nganh').on('submit', function(event){
        event.preventDefault();
        axios.post("{{ route('admin.quan-ly.nganh.handle-them-nganh') }}", {
            ma_nganh: $('#input-ma-nganh-them').val(),
            ten_nganh: $('#input-ten-nganh-them').val(),
            ma_khoa: $('#input-ma-khoa-them').val(),
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