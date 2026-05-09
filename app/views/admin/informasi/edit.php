<?php

$title = 'Edit Informasi';

require_once 'app/views/admin/layouts/header.php';

// VALIDASI
if (!isset($kategori)) {

    $kategori = [];
}

if (empty($informasi)) {

    setFlash('danger', 'Data informasi tidak ditemukan');

    redirect('informasi/index');
}

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">

            <i class="bi bi-pencil-square text-primary"></i>
            Edit Informasi

        </h3>

        <p class="text-muted mb-0">

            Update informasi website

        </p>

    </div>

    <?php

    $form_title = 'Form Edit Informasi';

    require 'app/views/components/form_card_start.php';

    ?>

    <form action="index.php?url=admin/informasi/update/<?= $informasi['id']; ?>"
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

                    <option value="<?= $k['id']; ?>"

                        <?= $k['id'] == $informasi['kategori_id']
                            ? 'selected'
                            : ''; ?>>

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

                value="<?= htmlspecialchars($informasi['judul']); ?>"

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

        <!-- PREVIEW -->
        <?php if (!empty($informasi['gambar'])) : ?>

            <div class="mb-3">

                <img src="public/uploads/<?= $informasi['gambar']; ?>"
                    class="img-fluid rounded shadow-sm"
                    style="max-width: 250px;">

            </div>

        <?php endif; ?>

        <!-- ISI -->
        <div class="mb-3">

            <label class="form-label">
                Isi Informasi
            </label>

            <textarea name="isi"
                rows="8"

                class="form-control"

                required><?= htmlspecialchars($informasi['isi']); ?></textarea>

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-2">

            <button class="btn btn-primary">

                <i class="bi bi-save"></i>
                Update

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