<?php

$title = 'Informasi';

require_once 'app/views/frontend/layouts/header.php';

?>

<!-- HEADER -->
<section class="py-5 bg-white border-bottom">

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

                                    <?= substr(strip_tags($i['isi']), 0, 120); ?>...

                                </p>

                            </div>

                            <div class="card-footer bg-white border-0">

                                <div class="d-flex justify-content-between align-items-center">

                                    <!-- TANGGAL -->
                                    <small class="text-muted">

                                        <?= date('d M Y', strtotime($i['created_at'])); ?>

                                    </small>

                                    <!-- DETAIL -->
                                    <a href="index.php?url=home/detail/<?= $i['slug']; ?>"
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

<?php require_once 'app/views/frontend/layouts/footer.php'; ?>