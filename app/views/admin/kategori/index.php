<?php

$title = 'Kategori';

require_once 'app/views/admin/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                <i class="bi bi-tags-fill text-primary"></i>
                Kategori

            </h3>

            <p class="text-muted mb-0">

                Kelola kategori website

            </p>

        </div>

        <!-- BUTTON TAMBAH -->
        <a href="index.php?url=kategori/tambah"
            class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>
            Tambah Kategori

        </a>

    </div>

    <!-- CARD -->
    <div class="card shadow-sm">

        <div class="card-body">

            <?php if (!empty($kategori)) : ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle"
                        id="datatable">

                        <thead>

                            <tr class="text-center">

                                <th width="60">No</th>
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            foreach ($kategori as $k) :
                            ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++; ?>
                                    </td>

                                    <td class="fw-semibold">

                                        <?= htmlspecialchars($k['nama_kategori']); ?>

                                    </td>

                                    <td>

                                        <span class="badge bg-secondary">

                                            <?= htmlspecialchars($k['slug']); ?>

                                        </span>

                                    </td>

                                    <td class="text-center">

                                        <div class="btn-group btn-group-sm">

                                            <!-- EDIT -->
                                            <a href="index.php?url=kategori/edit/<?= $k['id']; ?>"
                                                class="btn btn-outline-primary">

                                                <i class="bi bi-pencil-square"></i>

                                            </a>

                                            <!-- HAPUS -->
                                            <a href="index.php?url=kategori/hapus/<?= $k['id']; ?>"
                                                class="btn btn-outline-danger"
                                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">

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

                $empty_title = 'Belum Ada Kategori';
                $empty_text  = 'Silakan tambahkan kategori baru';

                require 'app/views/components/empty_state.php';

                ?>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require_once 'app/views/admin/layouts/footer.php'; ?>