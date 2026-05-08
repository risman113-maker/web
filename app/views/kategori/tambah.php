<?php

$title = 'Tambah Kategori';

require_once 'app/views/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">

            <i class="bi bi-plus-circle text-primary"></i>
            Tambah Kategori

        </h3>

        <p class="text-muted mb-0">

            Tambahkan kategori baru website

        </p>

    </div>

    <?php

    $form_title = 'Form Tambah Kategori';

    require 'app/views/components/form_card_start.php';

    ?>

    <form action="index.php?url=kategori/simpan"
          method="POST">

        <!-- NAMA -->
        <div class="mb-3">

            <label class="form-label">
                Nama Kategori
            </label>

            <input type="text"
                   name="nama_kategori"
                   class="form-control"

                   placeholder="Masukkan nama kategori"

                   required>

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-2">

            <button class="btn btn-primary">

                <i class="bi bi-save"></i>
                Simpan

            </button>

            <a href="index.php?url=kategori"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

    <?php require 'app/views/components/form_card_end.php'; ?>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>