<?php

$title = 'Informasi';

require_once 'app/views/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                <i class="bi bi-newspaper text-primary"></i>
                Informasi

            </h3>

            <p class="text-muted mb-0">

                Kelola informasi website

            </p>

        </div>

        <a href="index.php?url=informasi/tambah"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Tambah Informasi

        </a>

    </div>

    <!-- CARD -->
    <div class="card shadow-sm">

        <div class="card-body">

            <?php if (!empty($informasi)) : ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle"
                           id="datatable">

                        <thead>

                            <tr class="text-center">

                                <th width="60">No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            foreach ($informasi as $i) :
                            ?>

                                <tr>

                                    <!-- NO -->
                                    <td class="text-center">
                                        <?= $no++; ?>
                                    </td>

                                    <!-- GAMBAR -->
                                    <td width="120">

                                        <?php if (!empty($i['gambar'])) : ?>

                                            <img src="public/uploads/<?= $i['gambar']; ?>"
                                                 class="img-fluid rounded"
                                                 style="height:70px; object-fit:cover;">

                                        <?php else : ?>

                                            <span class="badge bg-secondary">

                                                Tidak ada gambar

                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <!-- JUDUL -->
                                    <td>

                                        <div class="fw-semibold">

                                            <?= htmlspecialchars($i['judul']); ?>

                                        </div>

                                        <small class="text-muted">

                                            <?= $i['slug']; ?>

                                        </small>

                                    </td>

                                    <!-- KATEGORI -->
                                    <td class="text-center">

                                        <span class="badge bg-primary">

                                            <?= $i['nama_kategori']; ?>

                                        </span>

                                    </td>

                                    <!-- TANGGAL -->
                                    <td class="text-center">

                                        <?= date('d-m-Y', strtotime($i['created_at'])); ?>

                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">

                                        <div class="btn-group btn-group-sm">

                                            <!-- EDIT -->
                                            <a href="index.php?url=informasi/edit/<?= $i['id']; ?>"
                                               class="btn btn-outline-primary">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <!-- HAPUS -->
                                            <a href="index.php?url=informasi/hapus/<?= $i['id']; ?>"
                                               class="btn btn-outline-danger"

                                               onclick="return confirm('Yakin ingin menghapus informasi ini?')">

                                                <i class="bi bi-trash"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else : ?>

                <?php

                $empty_title = 'Belum Ada Informasi';

                $empty_text = 'Silakan tambahkan informasi baru';

                require 'app/views/components/empty_state.php';

                ?>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>