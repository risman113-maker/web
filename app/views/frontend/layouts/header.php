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

        /* =========================
        BERITA CARD
        ========================= */

        .berita-card {
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s ease;
            background: white;
        }

        .berita-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12) !important;
        }

        .posisi-gambar {
            position: relative;
        }

        .berita-img {
            height: 230px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .berita-card:hover .berita-img {
            transform: scale(1.08);
        }

        .kategori-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, #4f65d6, #6f86ff);
            color: white;
            padding: 8px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .berita-title {
            line-height: 1.4;
            min-height: 58px;
        }

        .berita-card .btn-primary {
            border-radius: 30px;
            padding-left: 16px;
            padding-right: 16px;
        }

        /* =========================
   HERO SECTION
========================= */

        .hero-section {
            background: linear-gradient(135deg, #4f65d6, #6f86ff);
            color: white;
            padding: 80px 0;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 13px;
            backdrop-filter: blur(10px);
        }

        .hero-title {
            font-size: 42px;
            font-weight: 700;
            line-height: 1.3;
        }

        .hero-text {
            font-size: 17px;
            line-height: 1.8;
            opacity: 0.95;
        }

        .hero-image {
            max-height: 320px;
            animation: floating 4s ease-in-out infinite;
        }

        /* FLOATING */
        @keyframes floating {

            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* MOBILE */
        @media (max-width: 768px) {

            .hero-section {
                text-align: center;
                padding: 60px 0;
            }

            .hero-title {
                font-size: 32px;
            }

            .hero-text {
                font-size: 15px;
            }

            .hero-image {
                max-height: 240px;
            }
        }

        /* =========================
   NAVBAR
========================= */

        .navbar-custom {
            background: rgba(79, 101, 214, 0.92);
            backdrop-filter: blur(8px);
            padding-top: 16px;
            padding-bottom: 16px;
            transition: all 0.3s ease;
            z-index: 999;
        }

        /* SAAT SCROLL */
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding-top: 10px;
            padding-bottom: 10px;
        }

        /* BRAND */
        .navbar-brand {
            font-weight: bold;
            color: white !important;
            font-size: 22px;
            transition: 0.3s;
        }

        /* MENU */
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin-left: 10px;
            transition: 0.3s;
        }

        /* SAAT SCROLL */
        .navbar-scrolled .navbar-brand {
            color: #4f65d6 !important;
        }

        .navbar-scrolled .nav-link {
            color: #333 !important;
        }

        /* HOVER */
        .nav-link:hover {
            color: #ffd54f !important;
        }

        /* =========================
        NAVBAR HIDE/SHOW
        ========================= */

        .navbar-custom {
            transition:
                transform 0.35s ease,
                background 0.3s ease,
                padding 0.3s ease;
        }

        /* HILANG */
        .navbar-hidden {
            transform: translateY(-100%);
        }
    </style>


</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" id="navbar">


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

                    <!-- HOME -->
                    <li class="nav-item">

                        <a class="nav-link"
                            href="index.php">

                            Home

                        </a>

                    </li>

                    <!-- INFORMASI -->
                    <li class="nav-item">

                        <a class="nav-link"
                            href="index.php?url=informasi">

                            Informasi

                        </a>

                    </li>

                    <!-- PENGUMUMAN -->
                    <li class="nav-item">

                        <a class="nav-link"
                            href="#">

                            Pengumuman

                        </a>

                    </li>

                    <!-- TENTANG -->
                    <li class="nav-item">

                        <a class="nav-link"
                            href="#">

                            Tentang

                        </a>

                    </li>

                    <!-- KONTAK -->
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