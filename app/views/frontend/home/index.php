<?php

$title = 'Home';

require_once 'app/views/frontend/layouts/header.php';

?>

<!-- HERO -->
<section class="hero-section">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h1 class="hero-title mb-4">

                    Selamat Datang di
                    Website Sekolah

                </h1>

                <p class="hero-text mb-4">

                    Website informasi sekolah modern untuk
                    menyampaikan berita, pengumuman,
                    dan kegiatan sekolah secara cepat dan mudah.

                </p>

                <div class="d-flex gap-3 flex-wrap">

                    <a href="index.php?url=home/informasi"
                        class="btn btn-light btn-lg">

                        <i class="bi bi-newspaper"></i>
                        Lihat Informasi

                    </a>

                    <a href="#informasi"
                        class="btn btn-outline-light btn-lg">

                        Jelajahi

                    </a>

                </div>

            </div>

            <!-- IMAGE -->
            <div class="col-lg-6 text-center mt-5 mt-lg-0">

                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png"
                    class="img-fluid"
                    style="max-height: 350px;">

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

                        <div class="card shadow-sm h-100">

                            <!-- GAMBAR -->
                            <?php if (!empty($i['gambar'])) : ?>

                                <img src="public/uploads/<?= $i['gambar']; ?>"
                                    class="card-img-top">

                            <?php else : ?>

                                <img src="https://via.placeholder.com/600x400"
                                    class="card-img-top">

                            <?php endif; ?>

                            <div class="card-body">

                                <!-- KATEGORI -->
                                <span class="badge bg-primary mb-2">

                                    <?= $i['nama_kategori']; ?>

                                </span>

                                <!-- JUDUL -->
                                <h5 class="fw-bold">

                                    <?= htmlspecialchars($i['judul']); ?>

                                </h5>

                                <!-- ISI -->
                                <p class="text-muted">

                                    <?= substr(strip_tags($i['isi']), 0, 100); ?>...

                                </p>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <div class="d-flex justify-content-between align-items-center">

                                    <small class="text-muted">

                                        <?= date('d M Y', strtotime($i['created_at'])); ?>

                                    </small>

                                    <a href="informasi/<?= $i['slug']; ?>"
                                        class="btn btn-sm btn-primary">

                                        Baca

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            <?php else : ?>

                <div class="col-12">

                    <div class="alert alert-info text-center">

                        Belum ada informasi tersedia.

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>

<!-- ABOUT -->
<section class="py-5 bg-white">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <img src="https://cdn-icons-png.flaticon.com/512/4207/4207249.png"
                    class="img-fluid">

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