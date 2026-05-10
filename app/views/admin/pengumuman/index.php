<?php

$title = 'Pengumuman';

require_once 'app/views/admin/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                <i class="bi bi-megaphone text-primary"></i>
                Pengumuman

            </h3>

            <p class="text-muted mb-0">

                Kelola pengumuman website

            </p>

        </div>

        <a href="index.php?url=admin/pengumuman/tambah"
            class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Tambah Pengumuman

        </a>

    </div>

    <!-- CARD -->
    <div class="card shadow-sm">

        <div class="card-body">

            <?php if (!empty($pengumuman)) : ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle"
                        id="datatable">

                        <thead>

                            <tr class="text-center">

                                <th width="60">No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>PDF</th>
                                <th>Penulis</th>
                                <th>Tanggal</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            foreach ($pengumuman as $p) :
                            ?>

                                <tr>

                                    <!-- NO -->
                                    <td class="text-center">

                                        <?= $no++; ?>

                                    </td>

                                    <!-- GAMBAR -->
                                    <td width="120">

                                        <?php if (!empty($p['gambar'])) : ?>

                                            <img src="public/uploads/pengumuman/<?= $p['gambar']; ?>"
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

                                            <?= htmlspecialchars($p['judul']); ?>

                                        </div>

                                        <small class="text-muted">

                                            <?= $p['slug']; ?>

                                        </small>

                                    </td>

                                    <!-- PDF -->
                                    <td class="text-center">

                                        <?php if (!empty($p['file_pdf'])) : ?>

                                            <span class="badge bg-danger">

                                                PDF

                                            </span>

                                        <?php else : ?>

                                            <span class="badge bg-secondary">

                                                Tidak ada

                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <!-- PENULIS -->
                                    <td class="text-center">

                                        <?= htmlspecialchars($p['penulis']); ?>

                                    </td>

                                    <!-- TANGGAL -->
                                    <td class="text-center">

                                        <?= date('d-m-Y', strtotime($p['created_at'])); ?>

                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">

                                        <div class="btn-group btn-group-sm">

                                            <!-- EDIT -->
                                            <a href="index.php?url=admin/pengumuman/edit/<?= $p['id']; ?>"
                                                class="btn btn-outline-primary">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <!-- HAPUS -->
                                            <a href="index.php?url=admin/pengumuman/hapus/<?= $p['id']; ?>"
                                                class="btn btn-outline-danger"
                                                onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">

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

                $empty_title = 'Belum Ada Pengumuman';

                $empty_text = 'Silakan tambahkan pengumuman baru';

                require 'app/views/components/empty_state.php';

                ?>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require_once 'app/views/admin/layouts/footer.php'; ?>