<?php

if (empty($informasi)) {

    die('Informasi tidak ditemukan');
}

$title = $informasi['judul'];

require_once 'app/views/frontend/layouts/header.php';

?>

<!-- DETAIL -->
<section class="py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card shadow-sm">

                    <!-- GAMBAR -->
                    <?php if (!empty($informasi['gambar'])) : ?>

                        <img src="public/uploads/<?= $informasi['gambar']; ?>"
                            class="card-img-top"
                            style="max-height: 500px; object-fit: cover;">

                    <?php endif; ?>

                    <div class="card-body p-4">

                        <!-- KATEGORI -->
                        <span class="badge bg-primary mb-3">

                            <?= $informasi['nama_kategori']; ?>

                        </span>

                        <!-- JUDUL -->
                        <h2 class="fw-bold mb-3">

                            <?= htmlspecialchars($informasi['judul']); ?>

                        </h2>

                        <!-- TANGGAL -->
                        <div class="text-muted mb-4">

                            <i class="bi bi-calendar-event"></i>

                            <?= date('d F Y', strtotime($informasi['created_at'])); ?>

                        </div>

                        <!-- ISI -->
                        <div class="lh-lg">

                            <?= nl2br(htmlspecialchars($informasi['isi'])); ?>

                        </div>

                        <!-- BUTTON -->
                        <div class="mt-5">

                            <a href="index.php?url=home/informasi"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Kembali

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<?php require_once 'app/views/frontend/layouts/footer.php'; ?>