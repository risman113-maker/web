<?php

$title = 'Edit Pengumuman';

require_once 'app/views/admin/layouts/header.php';

// VALIDASI
if (empty($pengumuman)) {

    setFlash('danger', 'Data pengumuman tidak ditemukan');

    redirect('pengumuman/index');
}

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">

            <i class="bi bi-pencil-square text-primary"></i>
            Edit Pengumuman

        </h3>

    </div>

    <?php

    $form_title = 'Form Edit Pengumuman';

    require 'app/views/components/form_card_start.php';

    ?>

    <form action="index.php?url=admin/pengumuman/update/<?= $pengumuman['id']; ?>"
        method="POST"
        enctype="multipart/form-data">

        <!-- JUDUL -->
        <div class="mb-3">

            <label class="form-label">
                Judul
            </label>

            <input type="text"
                name="judul"
                class="form-control"
                value="<?= htmlspecialchars($pengumuman['judul']); ?>"
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
                value="<?= htmlspecialchars($pengumuman['penulis'] ?? ''); ?>"
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

        <?php if (!empty($pengumuman['gambar'])) : ?>

            <div class="mb-3">

                <img src="public/uploads/pengumuman/<?= $pengumuman['gambar']; ?>"
                    class="img-fluid rounded shadow-sm"
                    style="max-width: 250px;">

            </div>

        <?php endif; ?>

        <!-- PDF -->
        <div class="mb-3">

            <label class="form-label">
                File PDF
            </label>

            <input type="file"
                name="file_pdf"
                class="form-control"
                accept=".pdf">

        </div>

        <?php if (!empty($pengumuman['file_pdf'])) : ?>

            <div class="mb-3">

                <a href="public/uploads/pengumuman/<?= $pengumuman['file_pdf']; ?>"
                    target="_blank"
                    class="btn btn-danger btn-sm">

                    <i class="bi bi-file-earmark-pdf"></i>
                    Lihat PDF

                </a>

            </div>

        <?php endif; ?>

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
                required><?= $pengumuman['isi']; ?></textarea>

        </div>

        <!-- BUTTON -->
        <div class="d-flex gap-2">

            <button class="btn btn-primary">

                <i class="bi bi-save"></i>
                Update

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