document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       NAVBAR
    ========================================= */


    const navbar = document.getElementById('navbar');

    if (navbar) {

        let lastScroll = 0;

        window.addEventListener('scroll', function () {

            let currentScroll = window.pageYOffset;

            if (currentScroll > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }

            if (currentScroll > lastScroll && currentScroll > 100) {
                navbar.classList.add('navbar-hidden');
            } else {
                navbar.classList.remove('navbar-hidden');
            }

            lastScroll = currentScroll;
        });
    }

    /* =========================================
       CKEDITOR
    ========================================= */

    const editor = document.querySelector('#editor');

    if (editor && typeof ClassicEditor !== 'undefined') {

        ClassicEditor
            .create(editor)
            .catch(error => {
                console.error(error);
            });
    }

    /* =========================================
       Sidebar Mobile Toggle
    ========================================= */

    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('.sidebar');
    const backdrop = document.getElementById('sidebarBackdrop');

    if (toggleBtn && sidebar && backdrop) {

        toggleBtn.addEventListener('click', function () {

            sidebar.classList.toggle('show');
            backdrop.classList.toggle('active');
        });

        backdrop.addEventListener('click', function () {

            sidebar.classList.remove('show');
            backdrop.classList.remove('active');
        });
    }

    /* =========================================
       Select2
    ========================================= */

    if ($('.select2').length) {

        $('.select2').select2({
            placeholder: "-- Pilih Siswa --",
            allowClear: true,
            width: '100%'
        });
    }

    /* =========================================
       DataTables
    ========================================= */

    if ($('#datatable').length) {

        $('#datatable').DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 10,

            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                zeroRecords: "Data tidak ditemukan",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                infoEmpty: "Data kosong",

                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "›",
                    previous: "‹"
                }
            }
        });
    }

});