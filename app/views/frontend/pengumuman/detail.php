<?php

// VALIDASI DATA
if (empty($pengumuman)) {

    die('Pengumuman tidak ditemukan');
}

$title = htmlspecialchars($pengumuman['judul']);

require_once 'app/views/frontend/layouts/header.php';

?>

<!-- DETAIL -->
<section class="py-5 mt-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card shadow-sm border-0 rounded-4 overflow-hidden">

                    <!-- GAMBAR -->
                    <?php if (!empty($pengumuman['gambar'])) : ?>

                        <img src="public/uploads/pengumuman/<?= htmlspecialchars($pengumuman['gambar']); ?>"
                            class="img-fluid w-100"
                            style="max-height: 500px; object-fit: cover;"
                            alt="<?= htmlspecialchars($pengumuman['judul']); ?>">

                    <?php endif; ?>

                    <div class="card-body p-4 p-md-5">

                        <!-- BADGE -->
                        <span class="badge bg-primary mb-3 px-3 py-2 rounded-pill">

                            Pengumuman

                        </span>

                        <!-- TITLE -->
                        <h2 class="fw-bold mb-3">

                            <?= htmlspecialchars($pengumuman['judul']); ?>

                        </h2>

                        <!-- META -->
                        <div class="d-flex flex-wrap gap-3 text-muted mb-4">

                            <!-- DATE -->
                            <span>

                                <i class="bi bi-calendar-event"></i>

                                <?= !empty($pengumuman['created_at'])
                                    ? date('d F Y', strtotime($pengumuman['created_at']))
                                    : '-'; ?>

                            </span>

                            <!-- PENULIS -->
                            <span>

                                <i class="bi bi-person"></i>

                                <?= htmlspecialchars($pengumuman['penulis']); ?>

                            </span>

                        </div>

                        <!-- PDF -->
                        <?php if (!empty($pengumuman['file_pdf'])) : ?>

                            <div class="mb-4">

                                <a href="public/uploads/pengumuman/<?= htmlspecialchars($pengumuman['file_pdf']); ?>"
                                    target="_blank"
                                    class="btn btn-danger rounded-pill px-4">

                                    <i class="bi bi-file-earmark-pdf"></i>
                                    Download PDF

                                </a>

                            </div>

                        <?php endif; ?>

                        <!-- ISI -->
                        <div class="lh-lg detail-content">

                            <?= $pengumuman['isi']; ?>

                        </div>

                        <!-- BUTTON -->
                        <div class="mt-5">

                            <a href="index.php?url=pengumuman"
                                class="btn btn-secondary rounded-pill px-4">

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