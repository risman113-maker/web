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

                    <i class="bi bi-stars"></i>
                    Website Sekolah Modern

                </span>

                <!-- TITLE -->
                <h1 class="hero-title mb-4">

                    Selamat Datang di
                    Website Sekolah

                </h1>

                <!-- TEXT -->
                <p class="hero-text mb-4">

                    Media informasi sekolah untuk menyampaikan
                    berita, pengumuman, dan kegiatan sekolah
                    secara cepat dan mudah diakses.

                </p>

                <!-- BUTTON -->
                <div class="d-flex gap-3 flex-wrap">

                    <a href="index.php?url=informasi"
                        class="btn btn-light rounded-pill px-4">

                        <i class="bi bi-newspaper"></i>
                        Informasi

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
                    alt="Hero Image">

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

                Informasi Terbaru

            </h2>

            <p class="section-subtitle">

                Informasi dan berita terbaru sekolah

            </p>

        </div>

        <div class="row g-4">

            <?php if (!empty($informasi)) : ?>

                <?php foreach ($informasi as $i) : ?>

                    <div class="col-md-4">

                        <div class="card berita-card h-100 border-0 shadow-sm">

                            <!-- GAMBAR -->
                            <div class="overflow-hidden posisi-gambar">

                                <?php if (!empty($i['gambar'])) : ?>

                                    <img src="public/uploads/<?= htmlspecialchars($i['gambar']); ?>"
                                        class="card-img-top berita-img"
                                        alt="<?= htmlspecialchars($i['judul']); ?>">

                                <?php else : ?>

                                    <img src="https://via.placeholder.com/600x400"
                                        class="card-img-top berita-img"
                                        alt="No Image">

                                <?php endif; ?>

                                <!-- BADGE -->
                                <span class="badge kategori-badge">

                                    <?= htmlspecialchars($i['nama_kategori']); ?>

                                </span>

                            </div>

                            <div class="card-body d-flex flex-column">

                                <!-- JUDUL -->
                                <h5 class="fw-bold berita-title">

                                    <?= htmlspecialchars($i['judul']); ?>

                                </h5>

                                <!-- ISI -->
                                <p class="text-muted flex-grow-1">

                                    <?= substr(strip_tags($i['isi']), 0, 110); ?>...

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

                                    <!-- BUTTON -->
                                    <a href="index.php?url=informasi/<?= htmlspecialchars($i['slug']); ?>"
                                        class="btn btn-primary btn-sm px-3 rounded-pill">

                                        Baca

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <div class="col-12">

                    <div class="alert alert-info text-center shadow-sm">

                        Belum ada informasi tersedia.

                    </div>

                </div>

            <?php endif; ?>

        </div>

        <div class="text-center mt-5">

            <a href="index.php?url=informasi"
                class="btn btn-outline-primary btn-lg rounded-pill px-4">

                Lihat Semua Informasi

            </a>

        </div>

    </div>

</section>

<!-- ABOUT -->
<section class="py-5 bg-white">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <img src="https://cdn-icons-png.flaticon.com/512/4207/4207249.png"
                    class="img-fluid"
                    alt="About Image">

            </div>

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Tentang Website

                </h2>

                <p class="text-muted">

                    Website ini dibuat untuk memberikan
                    informasi sekolah secara cepat,
                    modern, dan mudah diakses oleh siswa,
                    guru, dan masyarakat.

                </p>

                <a href="#"
                    class="btn btn-primary mt-3">

                    Selengkapnya

                </a>

            </div>

        </div>

    </div>

</section>

<?php require_once 'app/views/frontend/layouts/footer.php'; ?>