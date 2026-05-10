<?php

$title = 'Tambah Pengumuman';

require_once 'app/views/admin/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">

            <i class="bi bi-plus-circle text-primary"></i>
            Tambah Pengumuman

        </h3>

        <p class="text-muted mb-0">

            Tambahkan pengumuman baru website

        </p>

    </div>

    <?php

    $form_title = 'Form Tambah Pengumuman';

    require 'app/views/components/form_card_start.php';

    ?>

    <form action="index.php?url=admin/pengumuman/simpan"
        method="POST"
        enctype="multipart/form-data">

        <!-- JUDUL -->
        <div class="mb-3">

            <label class="form-label">
                Judul Pengumuman
            </label>

            <input type="text"
                name="judul"
                class="form-control"
                required>

        </div>

        <!-- PENULIS -->
        <div class="mb-3">

            <label class="form-label">
                Penulis
            </label>

            <input type="text"
                name="penulis"
                class="form-control"
                placeholder="Contoh: Kesiswaan"
                required>

        </div>

        <!-- GAMBAR -->
        <div class="mb-3">

            <label class="form-label">
                Gambar (Optional)
            </label>

            <input type="file"
                name="gambar"
                class="form-control">

        </div>

        <!-- PDF -->
        <div class="mb-3">

            <label class="form-label">
                File PDF (Optional)
            </label>

            <input type="file"
                name="file_pdf"
                class="form-control"
                accept=".pdf">

        </div>

        <!-- ISI -->
        <div class="mb-3">

            <label class="form-label">
                Isi Pengumuman
            </label>
            <textarea
                name="isi"
                id="editor"
                rows="8"
                class="form-control"
                placeholder="Masukkan isi pengumuman"></textarea>

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-2">

            <button type="submit"
                class="btn btn-primary">

                <i class="bi bi-save"></i>
                Simpan

            </button>

            <a href="index.php?url=admin/pengumuman"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

    <?php require 'app/views/components/form_card_end.php'; ?>

</div>

<?php require_once 'app/views/admin/layouts/footer.php'; ?>