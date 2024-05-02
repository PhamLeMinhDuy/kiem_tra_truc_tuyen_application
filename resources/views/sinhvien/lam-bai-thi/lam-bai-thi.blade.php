<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Làm bài thi')</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
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
                                        <input type="checkbox" id="cauTraLoi{{$i+1}}" name="cauTraLoi{{ $index + 1 }}" value="{{ $cauTraLoi }}">
                                    @else
                                        <input type="radio" id="cauTraLoi{{$i+1}}" name="cauTraLoi{{ $index + 1 }}" value="{{ $cauTraLoi }}">
                                    @endif
                                    <label for="cauTraLoi{{$i+1}}">{{ chr(65 + $i) }}. {{ $cauTraLoi }}</label>
                                </li>
                            @endforeach
                        </ul>
                        @php
                            $dapAnDungIndexes = $cauHoi['dap_an_dung'];
                            $dapAnDungValues = [];
                            foreach ($dapAnDungIndexes as $dapAnDungIndex) {
                                $dapAnDungValues[] = $cauHoi['cau_tra_loi'][$dapAnDungIndex];
                            }
                            $dapAnDungString = implode(', ', $dapAnDungValues);
                        @endphp
                        <input type="hidden" name="dapAnDung{{ $index + 1 }}" value="{{ $dapAnDungString }}">
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
                            <button onclick="goToQuestion({{ $i }})" class=" quiz-nav-btn border-2 hover:bg-gray-200  px-3 py-2 rounded-lg mb-2 mr-2 w-10 text-center">{{ $i }}</button>
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
</body>
</html>

<script type="text/javascript">
        let currentPage = 1;
        const totalPages = {{ $totalPages }};
        const btnPrevious = document.getElementById('btnPrevious');
        const btnNext = document.getElementById('btnNext');
        const totalQuestions = {{ $totalQuestions }};
        function showPage(page) {
            for (let i = 1; i <= {{ $totalQuestions }}; i++) {
                const question = document.getElementById(`question${i}`);
                if (question) {
                    question.style.display = (i >= (page - 1) * 5 + 1 && i <= page * 5) ? 'block' : 'none';
                }
            }
        }

        // Lưu trạng thái trang hiện tại vào localStorage
        function saveCurrentPage() {
            localStorage.setItem('currentPage', currentPage);
        }

        // Hàm kiểm tra nếu có dữ liệu trong localStorage thì hiển thị trang đó
        function showStoredPage() {
            const storedPage = localStorage.getItem('currentPage');
            if (storedPage) {
                currentPage = parseInt(storedPage);
                showPage(currentPage);
                updateButtonsVisibility();
            }
        }

        // Lưu trạng thái đáp án vào localStorage khi người dùng chọn
        function saveAnswer(questionNumber, answer) {
            localStorage.setItem(`answer${questionNumber}`, answer);
        }

        // Lưu trạng thái đáp án vào localStorage khi người dùng chọn
        function saveAnswer(questionNumber, answer) {
            localStorage.setItem(`answer${questionNumber}`, answer);
        }

        // Hàm kiểm tra và áp dụng trạng thái đáp án đã lưu khi trang được tải lại
        function applyStoredAnswers() {
            for (let i = 1; i <= totalQuestions; i++) {
                const storedAnswer = localStorage.getItem(`answer${i}`);
                if (storedAnswer) {
                    const inputs = document.querySelectorAll(`input[name="cauTraLoi${i}"]`);
                    inputs.forEach(input => {
                        if (input.type === 'radio') {
                            // Nếu là radio, chỉ kiểm tra và check input có giá trị trùng với storedAnswer
                            if (input.value === storedAnswer) {
                                input.checked = true;
                            }
                        } else if (input.type === 'checkbox') {
                            // Nếu là checkbox, kiểm tra nhiều giá trị storedAnswer phân tách bởi dấu phẩy
                            const storedAnswers = storedAnswer.split(',');
                            if (storedAnswers.includes(input.value)) {
                                input.checked = true;
                            }
                        }
                    });
                }
            }
        }

        function onLoad() {
            currentPage = 1; // Đặt lại currentPage thành 1
            showStoredPage(); // Gọi hàm để hiển thị trang đã lưu
            applyStoredAnswers(); // Gọi hàm để áp dụng câu trả lời đã lưu
        }

        window.onload = onLoad;
        // Gọi hàm saveCurrentPage() khi người dùng chuyển trang
        btnPrevious.addEventListener('click', saveCurrentPage);
        btnNext.addEventListener('click', saveCurrentPage);

        document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
        input.addEventListener('change', function() {
            const questionNumber = this.name.replace('cauTraLoi', '');
            let answer;
            if (this.type === 'checkbox') {
                // Nếu là checkbox, lấy tất cả các giá trị được chọn và nối chúng lại thành một chuỗi ngăn cách bởi dấu phẩy
                const checkedInputs = document.querySelectorAll(`input[name="${this.name}"]:checked`);
                const checkedValues = Array.from(checkedInputs).map(input => input.value);
                answer = checkedValues.join(',');
            } else {
                // Nếu là radio, chỉ lấy giá trị của input hiện tại
                answer = this.value;
            }
            saveAnswer(questionNumber, answer);
            });
        });

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
        
        // Lấy danh sách câu trả lời của người dùng
        function getSelectedAnswers() {
            let selectedAnswers = {};

            // Duyệt qua mỗi câu hỏi
            for (let i = 1; i <= {{ $totalQuestions }}; i++) {
                let question = document.getElementsByName("cauTraLoi" + i);

                // Duyệt qua tất cả các lựa chọn của câu hỏi
                for (let j = 0; j < question.length; j++) {
                    if (question[j].checked) {
                        // Nếu lựa chọn này được chọn, thêm vào đáp án đã chọn cho câu hỏi tương ứng
                        if (!selectedAnswers["Câu " + i]) {
                            selectedAnswers["Câu " + i] = [];
                        }
                        selectedAnswers["Câu " + i].push(question[j].value);
                    }
                }
            }
            return selectedAnswers;
        }

        // Lấy danh sách đáp án đúng
        function layDapAnDungTuInputHidden() {
            let dapAnDung = {};

            // Lấy tất cả các input hidden
            const hiddenInputs = document.querySelectorAll('input[type="hidden"]');

            // Duyệt qua từng input hidden
            hiddenInputs.forEach(input => {
                // Lấy tên của input
                const tenInput = input.getAttribute('name');

                // Kiểm tra xem tên input có phải là tên của một câu hỏi không (có dạng "dapAnDungN")
                if (tenInput.startsWith('dapAnDung')) {
                    // Lấy số thứ tự của câu hỏi từ tên input
                    const soThuTuCauHoi = tenInput.replace('dapAnDung', '');

                    // Lấy giá trị của input, tức là danh sách các đáp án đúng cho câu hỏi đó
                    const giaTriInput = input.value;

                    // Chuyển danh sách các đáp án đúng thành mảng (nếu cần)
                    const mangDapAnDung = giaTriInput.split(', ');

                    // Thêm danh sách đáp án đúng vào đối tượng dapAnDung với khóa là tên của câu hỏi
                    dapAnDung["Câu " + soThuTuCauHoi] = mangDapAnDung;
                }
            });

            return dapAnDung;
        }

        // Tính điểm 
        
        function tinhDiem(cauTraLoiNguoiDung, dapAnDung) {
            let diemTongCong = 0;
            const soCauHoi = Object.keys(dapAnDung).length; // Tổng số câu hỏi
            const diemMoiCauHoi = 10 / soCauHoi; // Điểm cho mỗi câu hỏi

            // Duyệt qua từng câu hỏi
            for (let i = 1; i <= soCauHoi; i++) {
                const dapAnDungCuaCauHoi = dapAnDung["Câu " + i];
                const cauTraLoiNguoiDungCuaCauHoi = cauTraLoiNguoiDung["Câu " + i];
                
                // Kiểm tra nếu câu trả lời của người dùng trùng với đáp án đúng
                if (Array.isArray(cauTraLoiNguoiDungCuaCauHoi)) {
                    // Multiple choice
                    const diemMoiCauTraLoiDung = diemMoiCauHoi / dapAnDungCuaCauHoi.length; // Điểm cho mỗi đáp án đúng

                    // Duyệt qua từng đáp án đúng của câu hỏi
                    dapAnDungCuaCauHoi.forEach(dapAn => {
                        if (cauTraLoiNguoiDungCuaCauHoi.includes(dapAn)) {
                            // Cộng điểm nếu trả lời đúng
                            diemTongCong += diemMoiCauTraLoiDung;
                        }
                    });
                } else {
                    // Single choice
                    if (JSON.stringify(cauTraLoiNguoiDungCuaCauHoi) === JSON.stringify(dapAnDungCuaCauHoi)) {
                        // Cộng điểm nếu trả lời đúng
                        diemTongCong += diemMoiCauHoi;
                    }
                }
            }

            // Làm tròn điểm đến một chữ số thập phân
            diemTongCong = parseFloat(diemTongCong.toFixed(1));

            return diemTongCong;
        }

        function tinhSoCauTraLoiDung(cauTraLoiNguoiDung, dapAnDung) {
            let soCauTraLoiDung = 0;
            const soCauHoi = Object.keys(dapAnDung).length; // Tổng số câu hỏi

            // Duyệt qua từng câu hỏi
            for (let i = 1; i <= soCauHoi; i++) {
                const dapAnDungCuaCauHoi = dapAnDung["Câu " + i];
                const cauTraLoiNguoiDungCuaCauHoi = cauTraLoiNguoiDung["Câu " + i];

                // Kiểm tra nếu câu trả lời của người dùng trùng với đáp án đúng
                if (Array.isArray(cauTraLoiNguoiDungCuaCauHoi)) {
                    // Multiple choice
                    let isAllCorrect = true;
                    dapAnDungCuaCauHoi.forEach(dapAn => {
                        if (!cauTraLoiNguoiDungCuaCauHoi.includes(dapAn)) {
                            isAllCorrect = false;
                        }
                    });
                    if (isAllCorrect) {
                        // Tăng số câu trả lời đúng
                        soCauTraLoiDung++;
                    }
                } else {
                    // Single choice
                    if (JSON.stringify(cauTraLoiNguoiDungCuaCauHoi) === JSON.stringify(dapAnDungCuaCauHoi)) {
                        // Tăng số câu trả lời đúng
                        soCauTraLoiDung++;
                    }
                }
            }

            return soCauTraLoiDung;
        }

        let submitted = false; 
        function submitAnswers() {
            if (!submitted) { // Kiểm tra đã submit hay chưa
                submitted = true; 
                document.getElementById("submitBtn").style.display = "none"; 
            }

            // Lấy danh sách đáp án đúng và danh sách câu trả lời của người dùng
            const dapAnDung = layDapAnDungTuInputHidden();
            const cauTraLoiNguoiDung = getSelectedAnswers();
            const diem = tinhDiem(cauTraLoiNguoiDung,dapAnDung);
            const soCauTraLoiDung = tinhSoCauTraLoiDung(cauTraLoiNguoiDung,dapAnDung);
            // Gửi yêu cầu Axios
            axios.post("{{ route('sinh-vien.quan-ly.xem-diem.handle-them-diem-sinh-vien') }}", {
                ma_bai_thi: '{{ $maBaiThi }}',
                ten_bai_thi: '{{ $tenBaiThi }}',
                ma_lop_hoc_phan: '{{ $maLopHocPhan }}',
                id: '{{ $id }}',
                diem: diem,
                so_cau_tra_loi_dung: soCauTraLoiDung ,
            })
            .then(function (response) {
                if (response.data.success) {
                    localStorage.clear();
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
