<?php

$title = 'Dashboard';

require_once 'app/views/layouts/header.php';

?>

<div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                <i class="bi bi-speedometer2 text-primary"></i>
                Dashboard

            </h3>

            <p class="text-muted mb-0">

                Selamat datang di sistem aplikasi SKL

            </p>

        </div>

        <div class="text-muted small">

            <?= date('d F Y'); ?>

        </div>

    </div>

    <!-- WELCOME CARD -->
    <div class="card shadow-sm border-0 mb-4">

        <div class="card-body">

            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">

                <div>

                    <h4 class="mb-2">

                        👋 Selamat datang,
                        <strong>
                            <?= htmlspecialchars($_SESSION['user']['nama'] ?? 'Admin'); ?>
                        </strong>

                    </h4>

                    <p class="text-muted mb-0">

                        Anda memiliki akses penuh untuk mengelola sistem aplikasi WEB

                    </p>

                </div>

                <div class="text-primary">

                    <i class="bi bi-person-circle"
                       style="font-size: 60px;"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- QUOTE -->
    <div class="card shadow-sm border-0 mb-4 bg-light">

        <div class="card-body text-center py-4">

            <i class="bi bi-lightbulb-fill fs-1 text-warning"></i>

            <p class="mt-3 mb-0 fs-5 fst-italic">

                “Sistem yang baik lahir dari pengelolaan yang rapi.
                Peran Anda hari ini menentukan kualitas data dan masa depan siswa.”

            </p>

        </div>

    </div>

    <!-- INFO PANEL -->
    <div class="row g-4">

        <!-- CARD USER -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Total User
                            </p>

                            <h3 class="fw-bold mb-0">
                                --
                            </h3>

                        </div>

                        <div class="text-primary">

                            <i class="bi bi-people-fill fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- CARD LOGIN -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Login Hari Ini
                            </p>

                            <h3 class="fw-bold mb-0">
                                --
                            </h3>

                        </div>

                        <div class="text-success">

                            <i class="bi bi-box-arrow-in-right fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- CARD ROLE -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <p class="text-muted mb-1">
                                Role Login
                            </p>

                            <h5 class="fw-bold mb-0 text-uppercase">

                                <?= htmlspecialchars($_SESSION['user']['role']); ?>

                            </h5>

                        </div>

                        <div class="text-warning">

                            <i class="bi bi-person-badge-fill fs-1"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once 'app/views/layouts/footer.php'; ?>