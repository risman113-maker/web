<?php

$title = 'Informasi';

require_once 'app/views/frontend/layouts/header.php';

?>

<!-- HEADER -->
<section class="py-5 bg-white border-bottom mt-5">

    <div class="container text-center">

        <h1 class="fw-bold mb-3">

            Informasi Sekolah

        </h1>

        <p class="text-muted mb-0">

            Kumpulan informasi dan berita terbaru sekolah

        </p>

    </div>

</section>

<!-- INFORMASI -->
<section class="py-5">

    <div class="container">

        <div class="row g-4">

            <?php if (!empty($informasi)) : ?>

                <?php foreach ($informasi as $i) : ?>

                    <div class="col-md-4">

                        <div class="card berita-card border-0 shadow-sm h-100">

                            <!-- GAMBAR -->
                            <div class="berita-image-wrapper">

                                <?php if (!empty($i['gambar'])) : ?>

                                    <img src="public/uploads/<?= htmlspecialchars($i['gambar']); ?>"
                                        class="card-img-top berita-img"
                                        alt="<?= htmlspecialchars($i['judul']); ?>">

                                <?php else : ?>

                                    <img src="https://via.placeholder.com/600x400"
                                        class="card-img-top berita-img"
                                        alt="No Image">

                                <?php endif; ?>

                                <!-- KATEGORI -->
                                <span class="badge kategori-badge">

                                    <?= htmlspecialchars($i['nama_kategori']); ?>

                                </span>

                            </div>

                            <div class="card-body d-flex flex-column">

                                <!-- JUDUL -->
                                <h5 class="fw-bold berita-title mb-3">

                                    <?= htmlspecialchars($i['judul']); ?>

                                </h5>

                                <!-- ISI -->
                                <p class="text-muted berita-text flex-grow-1">

                                    <?= substr(strip_tags($i['isi']), 0, 120); ?>...

                                </p>

                                <!-- FOOTER -->
                                <div class="d-flex justify-content-between align-items-center mt-3">

                                    <!-- TANGGAL -->
                                    <small class="text-muted">

                                        <i class="bi bi-calendar-event"></i>

                                        <?= !empty($i['created_at'])
                                            ? date('d M Y', strtotime($i['created_at']))
                                            : '-'; ?>

                                    </small>

                                    <!-- DETAIL -->
                                    <a href="index.php?url=informasi/<?= htmlspecialchars($i['slug']); ?>"
                                        class="btn btn-primary btn-sm rounded-pill px-3">

                                        Baca

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <div class="col-12">

                    <div class="alert alert-info text-center shadow-sm rounded-4">

                        <i class="bi bi-info-circle"></i>

                        Belum ada informasi tersedia.

                    </div>

                </div>

            <?php endif; ?>

        </div>
    </div>

</section>

<?php require_once 'app/views/frontend/layouts/footer.php'; ?>