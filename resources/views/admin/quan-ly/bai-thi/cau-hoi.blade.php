@extends('layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('page-title')
    <div class="flex items-center justify-between sticky top-0">
        <div class="mr-5">
            {{ $title }}
        </div>
    </div>
@endsection

@section('content')
    <div class="">
        <div class="border-b mb-2 flex justify-between sticky top-0">
            <span class="text-lg mr-3 ml-2">
                Danh sách câu hỏi
            </span>
            <div class="flex items-center">
                <p class="text-md mr-3 ml-2">Thêm câu hỏi:</p>
                <div>
                    <button onclick="themCauHoiMotDapAn()"class ="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span class="relative px-2 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Một đáp án
                        </span>
                    </button>
                    <button onclick="themCauHoiNhieuDapAn()" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span class="relative px-2 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Nhiều đáp án
                        </span>
                    </button>
                </div>     
            </div>  
        </div> 
        <div id="list-cau-hoi">
            <div id = 'cau-hoi-1' class='cau-hoi'>
                <div class="tao-cau-hoi w-full flex p-4 border-2 rounded-lg shadow-black-50 mb-3">
                    <div class="w-1/6 mr-1">
                        Câu hỏi 1: 
                    </div>
                    <div class="w-5/6">
                        <div class="mb-2">
                            <label for="content" class="block text-sm font-medium text-gray-700">Câu hỏi</label>
                            <textarea id="content" name="content" rows="3" class="w-full px-3 py-2 mt-1 text-sm text-gray-700 placeholder-gray-400 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Nhập câu hỏi ở đây..."></textarea>
                        </div>
                        <div class="flex items-start flex-wrap">
                            <div class="w-full flex items-center">
                                <div class="w-2/3">
                                    Danh sách đáp án
                                </div>
                                <div class="w-1/3">
                                    Chọn đáp án đúng
                                </div>
                            </div>
                            <div id='' class="w-full list-cau-tra-loi">
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-1">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-1">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-1">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-1">
                                        <button >
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                            </div>
                        </div>
                        
                        <div class="w-full ">
                            <button onclick="themCauTraLoiMotDapAn()" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Thêm
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed inset-x-0 bottom-0 bg-white shadow-lg p-4">
            <div class="flex justify-end">
                <button onclick="luu()" class="mr-3 border-2 border-emerald-500 py-2 px-4 rounded inline-flex items-center hover:bg-emerald-500 font-bold hover:text-white">
                    Lưu
                </button>
            </div>
        </div>
    </div>
        
@endsection
@section('page-js')
     <script type="text/javascript">
        function themCauTraLoiMotDapAn() {
            var button = event.target;
            var cauHoi = button.closest('.cau-hoi');
            var number = cauHoi.id.split('-')[2];
            var parentElement = cauHoi.querySelector('.list-cau-tra-loi')
            var newDiv = document.createElement('div');
            newDiv.classList.add('list-group-items', 'w-full', 'flex', 'items-center', 'mb-2');
            newDiv.innerHTML = `<div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-${number}"  >
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>               `
            parentElement.appendChild(newDiv)
        }

        function themCauTraLoiNhieuDapAn() {
            var button = event.target;
            var cauHoi = button.closest('.cau-hoi');
            var number = cauHoi.id.split('-')[2];
            var parentElement = cauHoi.querySelector('.list-cau-tra-loi')
            console.log(parentElement);
            var newDiv = document.createElement('div');
            newDiv.classList.add('list-group-items', 'w-full', 'flex', 'items-center', 'mb-2');
            newDiv.innerHTML = `<div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="checkbox" class="input-dap-an mx-5"  name="group-${number}"   >
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>               `
            parentElement.appendChild(newDiv)
        }

        function themCauHoiMotDapAn() {
            var parentElement = document.getElementById("list-cau-hoi")
            var newDiv = document.createElement('div');
            var children = parentElement.children
            newDiv.id = `cau-hoi-${children.length + 1}`
            newDiv.classList.add(`cau-hoi`);
            newDiv.innerHTML = `
                <div class="tao-cau-hoi w-full flex p-4 border-2 rounded-lg shadow-black-50 mb-3">
                    <div class="w-1/6 mr-1">
                        Câu hỏi ${children.length + 1}: 
                    </div>
                    <div class="w-5/6">
                        <div class="mb-2">
                            <label for="content" class="block text-sm font-medium text-gray-700">Câu hỏi</label>
                            <textarea id="content" name="content" rows="3" class="w-full px-3 py-2 mt-1 text-sm text-gray-700 placeholder-gray-400 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Nhập câu hỏi ở đây..."></textarea>
                        </div>
                        <div class="flex items-start">
                            <div id='' class="w-full list-cau-tra-loi">
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" value="" class="input-dap-an mx-5" name="group-${children.length+1}">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-${children.length+1}">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-${children.length+1}">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="radio" class="input-dap-an mx-5" name="group-${children.length+1}">
                                        <button >
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                            </div>
                        </div>
                        
                        <div class="w-full ">
                            <button onclick="themCauTraLoiMotDapAn()" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Thêm
                                </span>
                            </button>
                        </div>
                    </div>
                </div>`
            parentElement.appendChild(newDiv)
        }

        function themCauHoiNhieuDapAn() {
            var parentElement = document.getElementById("list-cau-hoi")
            var newDiv = document.createElement('div');
            var children = parentElement.children
            newDiv.id = `cau-hoi-${children.length + 1}`
            newDiv.classList.add(`cau-hoi`);
            newDiv.innerHTML = `
                <div class="tao-cau-hoi w-full flex p-4 border-2 rounded-lg shadow-black-50 mb-3">
                    <div class="w-1/6 mr-1">
                        Câu hỏi ${children.length + 1}: 
                    </div>
                    <div class="w-5/6">
                        <div class="mb-2">
                            <label for="content" class="block text-sm font-medium text-gray-700">Câu hỏi</label>
                            <textarea id="content" name="content" rows="3" class="w-full px-3 py-2 mt-1 text-sm text-gray-700 placeholder-gray-400 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" placeholder="Nhập câu hỏi ở đây..."></textarea>
                        </div>
                        <div class="flex items-start">
                            <div id='' class="w-full list-cau-tra-loi">
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="checkbox" class="input-dap-an mx-5">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="checkbox" class="input-dap-an mx-5">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="checkbox" class="input-dap-an mx-5">
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                                <div class="w-full flex items-center mb-2 list-group-items">
                                    <div class="w-2/3 flex">
                                        <input type="text" class="w-full h-10 px-3 border-2 rounded cau-tra-loi" oninput="nhapCauTraLoi()">
                                    </div>
                                    <div class="w-1/3">
                                        <input type="checkbox" class="input-dap-an mx-5">
                                        <button >
                                        <button onclick="xoaCauTraLoi()">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                              </svg>                                          
                                        </button>
                                    </div>                            
                                </div>
                            </div>
                        </div>
                        
                        <div class="w-full ">
                            <button onclick="themCauTraLoiNhieuDapAn()" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Thêm
                                </span>
                            </button>
                        </div>
                    </div>
                </div>`
            parentElement.appendChild(newDiv)
        }

        function xoaCauTraLoi() {
            var button = event.target;
            var parentItem = button.closest('.list-group-items');
            parentItem.remove();
        }

        function nhapCauTraLoi(){
            var inputElement = event.target;
            var cauHoi = inputElement.closest('.cau-hoi');
            var parentElement = cauHoi.querySelector('.list-cau-tra-loi')
            var inputSelect = parentElement.querySelector('.input-dap-an')
            inputSelect.value = inputElement.value;
        }

        function luu() {
            var listCauHoi = [];

            var childrenElements = document.querySelectorAll('#list-cau-hoi .cau-hoi');
            childrenElements.forEach((cauHoiElement, index) => {
                var cauHoi = cauHoiElement.querySelector('#content').value.trim();

                var listCauTraLoi = [];
                var dapAnDung = [];
                cauHoiElement.querySelectorAll('.list-group-items').forEach((cauTraLoiElement, index) => {
                    var cauTraLoi = cauTraLoiElement.querySelector('.cau-tra-loi').value.trim();
                    var isDapAnDung = cauTraLoiElement.querySelector('.input-dap-an').checked;
                    
                    if (cauTraLoi !== '') {
                        listCauTraLoi.push(cauTraLoi);
                    }
                    if (isDapAnDung) {
                        dapAnDung.push(index);
                    }
                });

                if (cauHoi !== '' && listCauTraLoi.length > 0 && dapAnDung.length > 0) {
                    listCauHoi.push({
                        cau_hoi: cauHoi,
                        cau_tra_loi: listCauTraLoi,
                        dap_an_dung: dapAnDung
                    });
                }

                var jsonListCauHoi = JSON.stringify(listCauHoi)
                var cauHoiId = "{{ $id }}";
                event.preventDefault();
                axios.post("{{ route('admin.quan-ly.bai-thi.handle-them-bai-thi-cau-hoi') }}", {
                    data: jsonListCauHoi,
                    cauHoiId: cauHoiId,
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
            });

            console.log(listCauHoi);
        }

        
    </script> 
@endsection