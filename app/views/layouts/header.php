<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title><?= pageTitle($title ?? '') ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
          rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background: #f4f6f9;
            overflow-x: hidden;
            font-size: 14px;
        }

        /* =========================
           WRAPPER
        ========================= */
        .wrapper {
            display: flex;
            min-height: 100vh;
            align-items: stretch;
        }

        /* =========================
           SIDEBAR
        ========================= */
        .sidebar {
            width: 250px;
            min-width: 250px;
            background: linear-gradient(180deg, #4f65d6, #3c52c7);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 1rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 15px;
            border-radius: 10px;
            color: white;
            text-decoration: none;
            margin-bottom: 6px;
            transition: 0.2s;
            font-weight: 500;
        }

        .menu-item:hover {
            background: rgba(255, 255, 255, 0.15);
            color: white;
        }

        .menu-item.active {
            background: white;
            color: #3c52c7;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        /* =========================
           MAIN CONTENT
        ========================= */
        .main-content {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: white;
            border-bottom: 1px solid #dee2e6;
            min-height: 65px;
        }

        .content {
            padding: 20px;
            overflow-x: auto;
            flex: 1;
        }

        /* =========================
           CARD
        ========================= */
        .card {
            border: none;
            border-radius: 14px;
        }

        .card-header {
            border-radius: 14px 14px 0 0 !important;
            border-bottom: 1px solid #f1f1f1;
        }

        /* =========================
           TABLE
        ========================= */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table {
            vertical-align: middle;
        }

        .table thead th {
            background: #f8f9fa;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f7ff;
        }

        /* =========================
           FORM
        ========================= */
        .form-label {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            min-height: 45px;
        }

        .form-control:focus,
        .form-select:focus {
            box-shadow: none;
            border-color: #4f65d6;
        }

        /* =========================
           BUTTON
        ========================= */
        .btn {
            border-radius: 10px;
        }

        /* =========================
           ALERT
        ========================= */
        .alert {
            border: none;
            border-radius: 12px;
        }

        /* =========================
           MOBILE
        ========================= */
        @media (max-width: 768px) {

            .sidebar {
                position: fixed;
                top: 0;
                left: -250px;
                height: 100vh;
                z-index: 1030;
                transition: 0.3s;
            }

            .sidebar.show {
                left: 0;
            }

            .sidebar-backdrop {
                display: none;
            }

            .sidebar-backdrop.active {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1020;
            }
        }
    </style>
</head>

<body>

<?php

startSession();

if (!isset($_SESSION['user'])) {

    redirect('auth');
}

$user = $_SESSION['user'];

?>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">

        <!-- LOGO -->
        <div class="text-center mb-4">

            <i class="bi bi-file-earmark-text fs-1"></i>

            <h5 class="mt-2 mb-0 fw-bold">
                Aplikasi SKL
            </h5>

            <small class="text-light">
                <?= ucfirst($user['role']); ?>
            </small>

        </div>

        <!-- MENU ADMIN -->
        <?php if ($user['role'] === 'admin') : ?>

            <a href="index.php?url=admin/dashboard"
               class="menu-item <?= activeMenu('admin/dashboard'); ?>">

                <i class="bi bi-house-door"></i>
                Dashboard

            </a>

            <a href="index.php?url=kategori"
            class="menu-item <?= activeMenu('kategori'); ?>">

                <i class="bi bi-tags"></i>
                Kategori

            </a>

            <a href="index.php?url=informasi"
            class="menu-item <?= activeMenu('informasi'); ?>">

                <i class="bi bi-newspaper"></i>
                Informasi

            </a>

            <a href="index.php?url=admin/admin"
               class="menu-item <?= activeMenu('admin/admin'); ?>">

                <i class="bi bi-people"></i>
                Manajemen User

            </a>

        <?php endif; ?>

        <!-- FOOTER SIDEBAR -->
        <div class="mt-auto text-center pt-4">

            <small>

                Login sebagai <br>

                <strong>
                    <?= htmlspecialchars($user['nama']); ?>
                </strong>

            </small>

        </div>

    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOPBAR -->
        <nav class="navbar topbar px-4">

            <div class="container-fluid">

                <div class="d-flex align-items-center">

                    <button class="btn btn-outline-primary d-md-none me-2"
                            id="toggleSidebar">

                        <i class="bi bi-list"></i>

                    </button>

                    <span class="navbar-text fw-bold text-uppercase text-primary">

                        SMAN 1 CIGOMBONG

                    </span>

                </div>

                <div class="d-flex align-items-center gap-3">

                    <span class="text-muted small d-none d-md-block">

                        <?= date('d M Y'); ?>

                    </span>

                    <a href="index.php?url=auth/logout"
                       class="btn btn-sm btn-outline-danger">

                        <i class="bi bi-box-arrow-right"></i>
                        Logout

                    </a>

                </div>

            </div>

        </nav>

        <!-- CONTENT -->
        <div class="content">

            <?php flash(); ?>