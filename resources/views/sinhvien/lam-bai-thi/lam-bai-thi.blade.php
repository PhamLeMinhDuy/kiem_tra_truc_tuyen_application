<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">
    <header class="bg-blue-500 p-4 flex items-center ">
        <div class="ml-16 mr-5">
            <img src="{{ asset('images/logo_vlu.png') }}" alt="Logo Trường" class="h-12">
        </div>
        <div class="text-white font-semibold">Trường Đại học Văn Lang</div>
    </header>
    <div class="container mx-auto mt-8">
        <div class="border border-gray-300 p-4" >
            <div class="mb-4">
                <h2 class="text-4xl font-semibold text-red-500 ">Tên bài thi: {{ $tenBaiThi }}</h2>
                <p class="text-lg text-gray-600">Tên lớp học phần: {{ $tenLopHocPhan  }}</p>
                <p class="text-lg text-gray-600">Mã lớp học phần: {{ $maLopHocPhan  }}</p>
            </div>
        </div>
    </div>
    
    <div class="container mx-auto mt-8">
        <div class="flex  w-full">
            <div class="questions w-4/6">
                <!-- Hiển thị các câu hỏi -->
                @foreach ($danhSachCauHoi as $index => $cauHoi)
                    <div class="question border border-gray-300 p-4 mb-4 w-full" id="question{{ $index + 1 }}">
                        <p class="mb-2">Câu hỏi {{ $index + 1 }}</p>
                        <!-- Nội dung câu hỏi -->
                        <p class="mb-2">{{ $cauHoi['cau_hoi'] }}</p>
                        <!-- Hiển thị các câu trả lời -->
                        <ul>
                            @foreach ($cauHoi['cau_tra_loi'] as $i => $cauTraLoi)
                                <li>
                                    @if (count($cauHoi['dap_an_dung']) > 1)
                                        <input type="checkbox" id="cauTraLoi{{$i+1}}" name="cauTraLoi{{ $index + 1 }}[]" value="{{ $cauTraLoi }}" onchange="luuCauTraLoiDaChon({{ $index + 1 }}, this.value, true)">
                                    @else
                                        <input type="radio" id="cauTraLoi{{$i+1}}" name="cauTraLoi{{ $index + 1 }}" value="{{ $cauTraLoi }}">
                                    @endif
                                    <label for="cauTraLoi{{$i+1}}">{{ chr(65 + $i) }}. {{ $cauTraLoi }}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <!-- Pagination -->
                <div class="pagination mt-4 flex justify-between">
                    @if ($totalPages > 1)
                        <button onclick="previousPage()" id="btnPrevious" class="btn btn-blue mr-2 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800"><< Previous page</button>
                        <button onclick="nextPage()" id="btnNext" class="btn btn-blue text-red-400 hover:text-white border border-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-500 dark:focus:ring-red-600">Next page >></button>
                    @endif
                </div>
            </div>
            <div class="flex justify-between mb-4 bg-white border-2 shadow ml-3 w-2/6 h-[480px] pt-5 rounded-lg overflow-auto">
                <div class="w-full mt-3 ">
                    <div class="text-lg text-red-600 font-semibold mb-7 border-b-2 flex items-center"><p class="ml-6 mb-3">Quiz navigation</p></div>
                    <div class="pl-6 flex flex-wrap items-center">
                        @for ($i = 1; $i <= $totalQuestions; $i++)
                            <button onclick="goToQuestion({{ $i }})" class=" quiz-nav-btn bg-gray-400 hover:bg-gray-600 text-white px-3 py-2 rounded-lg mb-2 mr-2 w-10 text-center">{{ $i }}</button>
                        @endfor
                    </div>
                    <div id="thoiGianConLai" class="text-gray-600 mt-5 pl-6"></div>
                    <div class="pl-6 mt-5">
                        <button onclick="submitAnswers()" id="submitBtn" class="btn btn-blue text-black border border-gray-800 bg-white hover:bg-black hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @stack('scripts')
    <script>
        let currentPage = 1;
        const totalPages = {{ $totalPages }};
        const btnPrevious = document.getElementById('btnPrevious');
        const btnNext = document.getElementById('btnNext');

        function showPage(page) {
            for (let i = 1; i <= {{ $totalQuestions }}; i++) {
                const question = document.getElementById(`question${i}`);
                if (question) {
                    question.style.display = (i >= (page - 1) * 5 + 1 && i <= page * 5) ? 'block' : 'none';
                }
            }
        }

       // Lưu trạng thái trang hiện tại vào Local Storage

        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
                updateButtonsVisibility(); // Lưu trạng thái trang hiện tại
            }
        }

        function nextPage() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
                updateButtonsVisibility(); // Lưu trạng thái trang hiện tại
            }
        }

        function goToQuestion(questionNumber) {
            currentPage = Math.ceil(questionNumber / 5);
            showPage(currentPage);
            updateButtonsVisibility();

        }

        function updateButtonsVisibility() {
            btnPrevious.style.display = (currentPage > 1) ? 'inline-block' : 'none';
            btnNext.style.display = (currentPage < totalPages) ? 'inline-block' : 'none';
        }

        // Hiển thị thời gian còn lại
        var thoiGianKetThuc = new Date('{{ $thoiGianKetThuc }}');
        var x = setInterval(function() {
            var thoiGianHienTai = new Date().getTime();
            var thoiGianConLai = thoiGianKetThuc - thoiGianHienTai;
            var gio = Math.floor((thoiGianConLai % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var phut = Math.floor((thoiGianConLai % (1000 * 60 * 60)) / (1000 * 60));
            var giay = Math.floor((thoiGianConLai % (1000 * 60)) / 1000);
            document.getElementById("thoiGianConLai").innerHTML = gio + " giờ " + phut + " phút " + giay + " giây ";

            if (thoiGianConLai <= 0) {
                clearInterval(x);
                document.getElementById("thoiGianConLai").innerHTML = "Hết thời gian làm bài";
                // Thực hiện hành động khi hết thời gian làm bài 
                submitAnswers(); // Tự động nộp bài khi hết thời gian
                document.getElementById("submitBtn").style.display = "none"; // Ẩn nút Submit sau khi hết thời gian
            }
        }, 1000); // Cập nhật thời gian mỗi giây (1000 ms)

        // Lưu câu trả lời đã chọn vào Local Storage
        function luuCauTraLoiDaChon(cauHoiIndex, cauTraLoiIndex, isCheckbox) {
            let selectedAnswers = JSON.parse(localStorage.getItem(`cauTraLoi${cauHoiIndex}`)) || [];
            if (isCheckbox) {
                if (!selectedAnswers.includes(cauTraLoiIndex)) {
                    selectedAnswers.push(cauTraLoiIndex);
                    localStorage.setItem(`cauTraLoi${cauHoiIndex}`, JSON.stringify(selectedAnswers));
                }
            } else {
                localStorage.setItem(`cauTraLoi${cauHoiIndex}`, cauTraLoiIndex);
            }
        }

        // Gọi hàm khôi phục câu trả lời khi trang được load
        window.onload = function() {
            showPage(currentPage);
        }
        // Hàm tính điểm số
        function calculateScore() {
            var danhSachCauHoi = @json($danhSachCauHoi);
            const totalQuestions = danhSachCauHoi.length;
            const scorePerQuestion = 10 / totalQuestions; // Điểm số cho mỗi câu hỏi
            let score = 0;

            for (let i = 0; i < danhSachCauHoi.length; i++) {
                const cauTraLoiDaChon = localStorage.getItem(`cauTraLoi${i + 1}`);
                const dapAnDungIndex = danhSachCauHoi[i].dap_an_dung - 1; // Vị trí index của đáp án đúng trong mảng câu trả lời
                const dapAnDung = danhSachCauHoi[i].cau_tra_loi[dapAnDungIndex];

                if (cauTraLoiDaChon && cauTraLoiDaChon == dapAnDung) {
                    score += scorePerQuestion; // Tăng điểm nếu câu trả lời đúng
                }
            }

            return score;
        }

        var danhSachCauHoi = @json($danhSachCauHoi);
        const totalQuestions = {{ $totalQuestions }};
        function countCorrectAnswers() {
            let count = 0;
            for (let i = 1; i <= totalQuestions; i++) {
                const cauTraLoiDaChon = localStorage.getItem(`cauTraLoi${i}`);
                const dapAnDungIndex = danhSachCauHoi[i - 1]['dap_an_dung'] - 1; // Vị trí index của đáp án đúng trong mảng câu trả lời
                const dapAnDung = danhSachCauHoi[i - 1]['cau_tra_loi'][dapAnDungIndex];

                if (cauTraLoiDaChon && cauTraLoiDaChon == dapAnDung) {
                    count++; // Tăng biến đếm nếu câu trả lời đúng
                }
            }
            return count;
        }

        let submitted = false; 
        function submitAnswers() {
            if (!submitted) { // Kiểm tra đã submit hay chưa
                submitted = true; 
                document.getElementById("submitBtn").style.display = "none"; 
            }

            // Lấy ra các giá trị cần thiết từ view
            const maBaiThi = "{{ $maBaiThi }}";
            const tenBaiThi = "{{ $tenBaiThi }}";
            const id = "{{ $id }}";
            const diemSo = calculateScore();
            const soCauTraLoiDung = countCorrectAnswers();
            // Gửi yêu cầu Axios
            axios.post("{{ route('sinh-vien.quan-ly.xem-diem.handle-them-diem-sinh-vien') }}", {
                ma_bai_thi: maBaiThi,
                ten_bai_thi: tenBaiThi,
                id: id,
                diem: diemSo, // Truyền điểm số tính được vào đây
                so_cau_tra_loi_dung: soCauTraLoiDung ,
            })
            .then(function (response) {
                if (response.data.success) {
                    window.location.replace(response.data.redirect);
                    return;
                }
            })
            .catch(function (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Có lỗi hệ thống! Xin lỗi bạn vì sự bất tiện này!',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        }
    </script>
</body>
</html>
