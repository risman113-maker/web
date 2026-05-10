<?php

$title = 'Tambah Informasi';

require_once 'app/views/admin/layouts/header.php';

if (!isset($kategori)) {

    $kategori = [];
}

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">

            <i class="bi bi-plus-circle text-primary"></i>
            Tambah Informasi

        </h3>

        <p class="text-muted mb-0">

            Tambahkan informasi baru website

        </p>

    </div>

    <?php

    $form_title = 'Form Tambah Informasi';

    require 'app/views/components/form_card_start.php';

    ?>

    <form action="index.php?url=admin/informasi/simpan"
        method="POST"

        enctype="multipart/form-data">

        <!-- KATEGORI -->
        <div class="mb-3">

            <label class="form-label">
                Kategori
            </label>

            <select name="kategori_id"
                class="form-select"
                required>

                <option value="">
                    -- Pilih Kategori --
                </option>

                <?php foreach ($kategori as $k) : ?>

                    <option value="<?= $k['id']; ?>">

                        <?= $k['nama_kategori']; ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <!-- JUDUL -->
        <div class="mb-3">

            <label class="form-label">
                Judul Informasi
            </label>

            <input type="text"
                name="judul"

                class="form-control"

                placeholder="Masukkan judul informasi"

                required>

        </div>

        <!-- GAMBAR -->
        <div class="mb-3">

            <label class="form-label">
                Gambar
            </label>

            <input type="file"
                name="gambar"

                class="form-control">

        </div>

        <!-- ISI -->
        <div class="mb-3">

            <label class="form-label">
                Isi Informasi
            </label>

            <textarea
                name="isi"
                id="editor"
                rows="8"
                class="form-control"
                placeholder="Masukkan isi informasi"
                required></textarea>

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-2">

            <button class="btn btn-primary">

                <i class="bi bi-save"></i>
                Simpan

            </button>

            <a href="index.php?url=admin/informasi"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

    <?php require 'app/views/components/form_card_end.php'; ?>

</div>

<?php require_once 'app/views/admin/layouts/footer.php'; ?>