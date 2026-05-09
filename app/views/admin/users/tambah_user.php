<?php

$title = 'Tambah User';

require_once 'app/views/admin/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="mb-4">

        <h3 class="fw-bold">

            <i class="bi bi-person-plus-fill text-primary"></i>
            Tambah User

        </h3>

        <p class="text-muted mb-0">

            Tambahkan user baru ke dalam sistem

        </p>

    </div>

    <!-- CARD -->
    <div class="card shadow-sm">

        <div class="card-body">

            <form action="index.php?url=admin/simpan_user"
                method="POST">

                <!-- USERNAME -->
                <div class="mb-3">

                    <label class="form-label">

                        Username

                    </label>

                    <input type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan username"
                        required>

                </div>

                <!-- NAMA -->
                <div class="mb-3">

                    <label class="form-label">

                        Nama Lengkap

                    </label>

                    <input type="text"
                        name="nama"
                        class="form-control"
                        placeholder="Masukkan nama lengkap"
                        required>

                </div>

                <!-- ROLE -->
                <div class="mb-3">

                    <label class="form-label">

                        Role

                    </label>

                    <select name="role"
                        class="form-select"
                        required>

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <option value="admin">
                            Admin
                        </option>

                        <option value="guru">
                            Guru
                        </option>

                        <option value="walikelas">
                            Wali Kelas
                        </option>

                        <option value="siswa">
                            Siswa
                        </option>

                    </select>

                </div>

                <!-- PASSWORD DEFAULT -->
                <div class="mb-4">

                    <label class="form-label">

                        Password Default

                    </label>

                    <input type="text"
                        class="form-control"
                        value="123456"
                        readonly>

                    <small class="text-muted">

                        Password default akan dienkripsi otomatis.

                    </small>

                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-2">

                    <button class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Simpan

                    </button>

                    <a href="index.php?url=admin/admin"
                        class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php require_once 'app/views/admin/layouts/footer.php'; ?>