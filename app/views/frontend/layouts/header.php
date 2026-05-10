<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title><?= pageTitle($title ?? 'Website Sekolah'); ?></title>

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        rel="stylesheet">

    <!-- CSS CUSTOM -->
    <link rel="stylesheet"
        href="assets/css/style.css">

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top"
        id="navbar">

        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand d-flex align-items-center gap-2"
                href="index.php">

                <i class="bi bi-mortarboard-fill"></i>

                <span>
                    SMAN 1 CIGOMBONG
                </span>

            </a>

            <!-- TOGGLE -->
            <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse"
                id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                    <!-- HOME -->
                    <li class="nav-item">

                        <a class="nav-link <?= activeMenu('home'); ?>"
                            href="index.php">

                            Home

                        </a>

                    </li>

                    <!-- INFORMASI -->
                    <li class="nav-item">

                        <a class="nav-link <?= activeMenu('informasi'); ?>"
                            href="index.php?url=informasi">

                            Informasi

                        </a>

                    </li>

                    <!-- PENGUMUMAN -->
                    <li class="nav-item">

                        <a class="nav-link <?= activeMenu('pengumuman'); ?>"
                            href="index.php?url=pengumuman">

                            Pengumuman

                        </a>

                    </li>

                    <!-- KONTAK -->
                    <li class="nav-item">

                        <a class="nav-link <?= activeMenu('kontak'); ?>"
                            href="#">

                            Kontak

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>