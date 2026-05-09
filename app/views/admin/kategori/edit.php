<?php

$title = 'Edit Kategori';

require_once 'app/views/admin/layouts/header.php';

// Validasi data
if (empty($kategori)) {

    setFlash('danger', 'Data kategori tidak ditemukan');

    redirect('kategori');
}

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">

            <i class="bi bi-pencil-square text-primary"></i>
            Edit Kategori

        </h3>

        <p class="text-muted mb-0">

            Update data kategori website

        </p>

    </div>

    <?php

    $form_title = 'Form Edit Kategori';

    require 'app/views/components/form_card_start.php';

    ?>

    <form action="index.php?url=kategori/update/<?= $kategori['id']; ?>"
        method="POST">

        <!-- NAMA -->
        <div class="mb-3">

            <label class="form-label">
                Nama Kategori
            </label>

            <input type="text"
                name="nama_kategori"

                class="form-control"

                value="<?= htmlspecialchars($kategori['nama_kategori']); ?>"

                required>

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-2">

            <button class="btn btn-primary">

                <i class="bi bi-save"></i>
                Update

            </button>

            <a href="index.php?url=kategori"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

    <?php require 'app/views/components/form_card_end.php'; ?>

</div>

<?php require_once 'app/views/admin/layouts/footer.php'; ?>