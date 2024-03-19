<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    @vite('resources/css/app.css')
    <title>Đăng ký</title>
</head>
<body>
    <div class="w-screen h-screen relative" style="background-image: url({{ asset('images/auth_bg.jpg') }});">   
        <div class=" bg-black bg-opacity-75 w-[200px] sm:w-[460px] h-screen absolute top-0 left-0 sm:block hidden">

        </div>
        <div class="w-full h-full xl:max-w-screen-xl flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="flex items-center col-span-1">
                    <div class="p-4 bg-white shadow-lg border w-[360px] rounded z-10">
                        <form id="form-dang-ky" action="submit">
                            <div class="flex justify-between items-end mb-8">
                                <h2 class="text-xl font-semibold">Đăng ký</h2>
                                <span class="font-normal"><a href="{{ route('dang-nhap') }}">Đăng nhập</a></span>
                            </div>
                            <div class="form-group mt-4">
                                <input type="text" name="ten-nguoi-dung-dang-ky" id="ten-nguoi-dung-dang-ky" placeholder="Họ tên" class="border outline-none rounded w-full py-1 px-2 h-10">
                                
                            </div>
                            <div class="form-group mt-4">
                                <input type="text" name="email-dang-ky" id="email-dang-ky" placeholder="Email đăng nhập" class="border outline-none rounded w-full py-1 px-2 h-10">
                                
                            </div>
                            <div class="form-group mt-4">
                                <input type="password" name="mat-khau-dang-ky" id="mat-khau-dang-ky" placeholder="Mật khẩu" class="border outline-none rounded w-full py-1 px-2 h-10">
                               
                            </div>
                            <div class="form-group mt-4">
                                <input type="password" name="xac-nhan-mat-khau-dang-ky" id="xac-nhan-mat-khau-dang-ky" placeholder="Xác nhận mật khẩu" class="border outline-none rounded w-full py-1 px-2 h-10">
                            </div>
                            <div class="mt-4">
                                <button class="w-full rounded bg-blue-500 text-white font-bold py-2 border border-blue-500 hover:bg-white hover:text-blue-500">
                                    Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('plugins/axios/axios.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.bundle.js') }}"></script>
<script type="text/javascript">
    $('#form-dang-ky').on('submit', function(event){
        event.preventDefault();
        axios.post("{{ route('handle-dang-ky') }}", {
            ten: $('#ten-nguoi-dung-dang-ky').val(),
            email: $('#email-dang-ky').val(),
            matKhau: $('#mat-khau-dang-ky').val(),
            xacNhanMatKhau: $('#xac-nhan-mat-khau-dang-ky').val(),
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
</script>
