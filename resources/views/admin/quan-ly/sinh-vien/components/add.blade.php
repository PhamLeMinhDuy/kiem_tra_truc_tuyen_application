<button  onclick="showModalThem('{{ $modalThem }}')"  class=" border border-cyan-400 py-2 px-4 rounded inline-flex items-center hover:bg-cyan-500 font-bold hover:text-white">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 fill-current transition hover:text-white" viewBox="0 0 640 512"><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
    Thêm sinh viên
</button>

<script>
     function showModalThem(modalThem) {
            document.getElementById(modalThem).style.display = 'block';
            var button = event.target;
            var parentTr = button.closest('tr');
        }
</script>