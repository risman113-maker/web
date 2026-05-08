<?php

$title = 'Manajemen User';

require_once 'app/views/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-people-fill text-primary"></i>
                Manajemen User
            </h3>

            <p class="text-muted mb-0">
                Kelola seluruh data user aplikasi
            </p>
        </div>

        <a href="index.php?url=admin/tambah_user"
           class="btn btn-primary shadow-sm">

            <i class="bi bi-person-plus"></i>
            Tambah User

        </a>

    </div>

    <!-- CARD -->
    <div class="card shadow-sm">

        <div class="card-body">

            <?php if (!empty($users)) : ?>

                <div class="table-responsive">

                    <table class="table table-hover align-middle"
                           id="datatable"
                           style="width:100%">

                        <thead class="table-light">

                            <tr class="text-center">

                                <th width="50">No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Siswa ID</th>
                                <th>Last Login</th>
                                <th width="180">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            foreach ($users as $user) :
                            ?>

                                <tr>

                                    <!-- NO -->
                                    <td class="text-center">
                                        <?= $no++; ?>
                                    </td>

                                    <!-- USERNAME -->
                                    <td>
                                        <?= htmlspecialchars($user['username']); ?>
                                    </td>

                                    <!-- NAMA -->
                                    <td class="fw-semibold">
                                        <?= htmlspecialchars($user['nama']); ?>
                                    </td>

                                    <!-- ROLE -->
                                    <td class="text-center">

                                        <?php

                                        $role = $user['role'];

                                        $color = 'secondary';

                                        if ($role == 'admin') {
                                            $color = 'danger';
                                        } elseif ($role == 'guru') {
                                            $color = 'success';
                                        } elseif ($role == 'walikelas') {
                                            $color = 'warning';
                                        } elseif ($role == 'siswa') {
                                            $color = 'info';
                                        }

                                        ?>

                                        <span class="badge bg-<?= $color; ?>">

                                            <?= ucfirst($role); ?>

                                        </span>

                                    </td>

                                    <!-- SISWA ID -->
                                    <td class="text-center">

                                        <?= $user['siswa_id'] ?: '-'; ?>

                                    </td>

                                    <!-- LAST LOGIN -->
                                    <td class="text-center">

                                        <?= $user['last_login']
                                            ? date('d-m-Y H:i', strtotime($user['last_login']))
                                            : '<span class="text-muted">Belum login</span>'; ?>

                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">

                                        <div class="btn-group btn-group-sm">

                                            <!-- RESET PASSWORD -->
                                            <a href="index.php?url=admin/reset_password/<?= $user['id']; ?>"
                                               class="btn btn-outline-secondary"

                                               onclick="return confirm('Reset password user ini ke default (123456)?')"

                                               title="Reset Password">

                                                <i class="bi bi-arrow-clockwise"></i>

                                            </a>

                                            <!-- HAPUS -->
                                            <a href="index.php?url=admin/hapus_user/<?= $user['id']; ?>"
                                               class="btn btn-outline-danger"

                                               onclick="return confirm('Yakin ingin menghapus user ini?')"

                                               title="Hapus User">

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

                <div class="alert alert-info mb-0">

                    <i class="bi bi-info-circle"></i>

                    Belum ada data user.

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>