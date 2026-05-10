<?php

$title = 'Pengumuman';

require_once 'app/views/frontend/layouts/header.php';

if (!isset($pengumuman)) {

    $pengumuman = [];
}

?>

<!-- HEADER -->
<section class="informasi-header">

    <div class="container text-center">

        <h1>Pengumuman Sekolah</h1>

        <p>
            Informasi pengumuman terbaru sekolah
        </p>

    </div>

</section>

<!-- PENGUMUMAN -->
<section class="py-5">

    <div class="container">

        <?php if (!empty($pengumuman)) : ?>

            <div class="d-flex flex-column gap-3">

                <?php foreach ($pengumuman as $p) : ?>

                    <div class="card border-0 shadow-sm rounded-4 pengumuman-card">

                        <div class="card-body p-4">

                            <div class="row align-items-center">

                                <!-- ICON -->
                                <div class="col-md-1 text-center mb-3 mb-md-0">

                                    <div class="pengumuman-icon">

                                        <i class="bi bi-megaphone-fill"></i>

                                    </div>

                                </div>

                                <!-- CONTENT -->
                                <div class="col-md-8">

                                    <!-- TITLE -->
                                    <h5 class="fw-bold mb-2">

                                        <?= htmlspecialchars($p['judul'] ?? '-'); ?>

                                    </h5>

                                    <!-- META -->
                                    <div class="d-flex gap-3 flex-wrap text-muted small mb-2">

                                        <span>

                                            <i class="bi bi-calendar-event"></i>

                                            <?= !empty($p['created_at'])
                                                ? date('d M Y', strtotime($p['created_at']))
                                                : '-'; ?>

                                        </span>

                                        <span>

                                            <i class="bi bi-person"></i>

                                            <?= htmlspecialchars($p['penulis'] ?? '-'); ?>

                                        </span>

                                    </div>

                                    <!-- ISI -->
                                    <p class="text-muted mb-0">

                                        <?= mb_strimwidth(strip_tags($p['isi'] ?? ''), 0, 130, '...'); ?>

                                    </p>

                                </div>

                                <!-- BUTTON -->
                                <div class="col-md-3 text-md-end mt-3 mt-md-0">

                                    <div class="d-flex flex-md-column gap-2 align-items-md-end">

                                        <!-- DETAIL -->
                                        <a href="index.php?url=pengumuman/<?= htmlspecialchars($p['slug']); ?>"
                                            class="btn btn-primary rounded-pill px-4 btn-sm">

                                            <i class="bi bi-eye"></i>
                                            Detail

                                        </a>

                                        <!-- PDF -->
                                        <?php if (!empty($p['file_pdf'])) : ?>

                                            <a href="public/uploads/pengumuman/<?= htmlspecialchars($p['file_pdf']); ?>"
                                                target="_blank"
                                                class="btn btn-danger rounded-pill px-4 btn-sm">

                                                <i class="bi bi-file-earmark-pdf"></i>
                                                PDF

                                            </a>

                                        <?php endif; ?>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>

        <?php else : ?>

            <div class="alert alert-info text-center rounded-4 shadow-sm">

                <i class="bi bi-info-circle"></i>

                Belum ada pengumuman tersedia.

            </div>

        <?php endif; ?>

    </div>

</section>

<?php require_once 'app/views/frontend/layouts/footer.php'; ?>