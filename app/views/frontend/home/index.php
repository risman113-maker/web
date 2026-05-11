<?php

$title = 'Home';

require_once 'app/views/frontend/layouts/header.php';

?>

<!-- HERO -->
<section class="hero-section">

    <div class="container">

        <div class="row align-items-center">

            <!-- TEXT -->
            <div class="col-lg-6">

                <!-- BADGE -->
                <span class="hero-badge mb-3 d-inline-block">

                    <i class="bi bi-mortarboard-fill"></i>
                    SPMB SMAN 1 Cigombong 2025

                </span>

                <!-- TITLE -->
                <h1 class="hero-title mb-4">

                    Sistem Penerimaan Murid Baru
                    SMAN 1 Cigombong

                </h1>

                <!-- TEXT -->
                <p class="hero-text mb-4">

                    Selamat datang di website resmi SPMB
                    SMAN 1 Cigombong. Dapatkan informasi
                    lengkap mengenai pendaftaran, jadwal,
                    persyaratan, pengumuman, dan kegiatan
                    sekolah secara cepat, transparan,
                    dan mudah diakses.

                </p>

                <!-- BUTTON -->
                <div class="d-flex gap-3 flex-wrap">

                    <a href="index.php?url=informasi"
                        class="btn btn-light rounded-pill px-4 shadow-sm">

                        <i class="bi bi-journal-text"></i>
                        Info SPMB

                    </a>

                    <a href="#informasi"
                        class="btn btn-outline-light rounded-pill px-4">

                        Jelajahi

                    </a>

                </div>

            </div>

            <!-- IMAGE -->
            <div class="col-lg-6 text-center mt-5 mt-lg-0">

                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
                    class="img-fluid hero-image"
                    alt="SPMB SMAN 1 Cigombong"
                    loading="lazy">

            </div>

        </div>

    </div>

</section>

<!-- INFORMASI -->
<section class="py-5"
    id="informasi">

    <div class="container">

        <!-- TITLE -->
        <div class="text-center mb-5">

            <h2 class="section-title">

                Informasi SPMB Terbaru

            </h2>

            <p class="section-subtitle">

                Jadwal, pengumuman, dan informasi terbaru
                SPMB SMAN 1 Cigombong

            </p>

        </div>

        <div class="row g-4">

            <?php if (!empty($informasi) && is_array($informasi)) : ?>

                <?php foreach ($informasi as $i) : ?>

                    <div class="col-md-6 col-lg-4">

                        <div class="card berita-card h-100 border-0 shadow-sm">

                            <!-- IMAGE -->
                            <div class="overflow-hidden posisi-gambar">

                                <?php if (!empty($i['gambar'])) : ?>

                                    <img src="public/uploads/<?= htmlspecialchars($i['gambar']); ?>"
                                        class="card-img-top berita-img"
                                        alt="<?= htmlspecialchars($i['judul'] ?? 'Informasi'); ?>"
                                        loading="lazy">

                                <?php else : ?>

                                    <img src="https://via.placeholder.com/600x400"
                                        class="card-img-top berita-img"
                                        alt="No Image"
                                        loading="lazy">

                                <?php endif; ?>

                                <!-- BADGE -->
                                <span class="badge kategori-badge">

                                    <?= htmlspecialchars($i['nama_kategori'] ?? 'SPMB'); ?>

                                </span>

                            </div>

                            <!-- BODY -->
                            <div class="card-body d-flex flex-column">

                                <!-- TITLE -->
                                <h5 class="fw-bold berita-title mb-3">

                                    <?= htmlspecialchars($i['judul'] ?? 'Tanpa Judul'); ?>

                                </h5>

                                <!-- CONTENT -->
                                <p class="text-muted flex-grow-1">

                                    <?= htmlspecialchars(mb_strimwidth(strip_tags($i['isi'] ?? ''), 0, 110, '...')); ?>

                                </p>

                                <!-- FOOTER -->
                                <div class="d-flex justify-content-between align-items-center mt-3">

                                    <!-- DATE -->
                                    <small class="text-muted">

                                        <i class="bi bi-calendar-event"></i>

                                        <?= !empty($i['created_at'])
                                            ? date('d M Y', strtotime($i['created_at']))
                                            : '-'; ?>

                                    </small>

                                    <small class="text-muted d-block mt-1">

                                        <i class="bi bi-person"></i>

                                        <?= htmlspecialchars($i['penulis']); ?>

                                    </small>

                                    <!-- BUTTON -->
                                    <a href="index.php?url=informasi/<?= urlencode($i['slug'] ?? ''); ?>"
                                        class="btn btn-primary btn-sm px-3 rounded-pill">

                                        Detail

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

                        Belum ada informasi SPMB tersedia.

                    </div>

                </div>

            <?php endif; ?>

        </div>

        <!-- BUTTON -->
        <div class="text-center mt-5">

            <a href="index.php?url=informasi"
                class="btn btn-outline-primary btn-lg rounded-pill px-4">

                Lihat Semua Informasi SPMB

            </a>

        </div>

    </div>

</section>

<!-- ABOUT -->
<section class="py-5 bg-white">

    <div class="container">

        <div class="row align-items-center g-5">

            <!-- IMAGE -->
            <div class="col-lg-6 text-center">

                <img src="https://cdn-icons-png.flaticon.com/512/4207/4207247.png"
                    class="img-fluid"
                    alt="Tentang SPMB"
                    loading="lazy">

            </div>

            <!-- TEXT -->
            <div class="col-lg-6">

                <span class="text-primary fw-semibold">

                    Tentang SPMB

                </span>

                <h2 class="fw-bold mb-4 mt-2">

                    SMAN 1 Cigombong

                </h2>

                <p class="text-muted">

                    SPMB SMAN 1 Cigombong hadir untuk memberikan
                    layanan penerimaan murid baru secara
                    modern, transparan, dan mudah diakses
                    oleh calon murid maupun orang tua.

                </p>

                <p class="text-muted">

                    Melalui website ini, seluruh informasi
                    mengenai jalur pendaftaran, jadwal seleksi,
                    persyaratan, hingga pengumuman dapat diakses
                    dengan cepat dan praktis.

                </p>

                <a href="#informasi"
                    class="btn btn-primary rounded-pill px-4 mt-3">

                    Lihat Informasi

                </a>

            </div>

        </div>

    </div>

</section>

<?php require_once 'app/views/frontend/layouts/footer.php'; ?>