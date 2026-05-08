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

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        /* =========================
           NAVBAR
        ========================= */
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .navbar-brand {
            font-weight: bold;
            color: #4f65d6 !important;
            font-size: 22px;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin-left: 10px;
            transition: 0.2s;
        }

        .nav-link:hover {
            color: #4f65d6 !important;
        }

        .btn-login {
            border-radius: 10px;
            padding: 8px 16px;
        }

        /* =========================
           HERO
        ========================= */
        .hero-section {
            background: linear-gradient(135deg, #4f65d6, #6f86ff);
            color: white;
            padding: 100px 0;
        }

        .hero-title {
            font-size: 48px;
            font-weight: bold;
        }

        .hero-text {
            font-size: 18px;
            opacity: 0.95;
        }

        /* =========================
           SECTION
        ========================= */
        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #6c757d;
            margin-bottom: 40px;
        }

        /* =========================
           CARD
        ========================= */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .card img {
            height: 220px;
            object-fit: cover;
        }

        /* =========================
           FOOTER
        ========================= */
        footer {
            background: #212529;
            color: white;
            padding: 50px 0 20px;
            margin-top: 80px;
        }

        footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

        /* =========================
           MOBILE
        ========================= */
        @media (max-width: 768px) {

            .hero-section {
                padding: 70px 0;
                text-align: center;
            }

            .hero-title {
                font-size: 34px;
            }

            .hero-text {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">

        <div class="container">

            <!-- LOGO -->
            <a class="navbar-brand"
                href="index.php">

                <i class="bi bi-mortarboard-fill"></i>
                Website Sekolah

            </a>

            <!-- TOGGLE -->
            <button class="navbar-toggler"
                type="button"

                data-bs-toggle="collapse"

                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>

            <!-- MENU -->
            <div class="collapse navbar-collapse"
                id="navbarNav">

                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">

                        <a class="nav-link"
                            href="index.php">

                            Home

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="informasi">

                            Informasi

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="#">

                            Pengumuman

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="#">

                            Tentang

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link"
                            href="#">

                            Kontak

                        </a>

                    </li>


                </ul>

            </div>

        </div>

    </nav>