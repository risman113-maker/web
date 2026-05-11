<?php

$title = 'Kontak';

require_once 'app/views/frontend/layouts/header.php';

?>

<!-- HEADER -->
<section class="informasi-header">

    <div class="container text-center">

        <h1>Hubungi Kami</h1>

        <p>
            Informasi dan layanan SPMB SMAN 1 Cigombong
        </p>

    </div>

</section>

<!-- KONTAK -->
<section class="py-5">

    <div class="container">

        <div class="row g-4">

            <!-- INFORMASI KONTAK -->
            <div class="col-lg-5">

                <div class="card berita-card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            Informasi Kontak
                        </h4>

                        <div class="mb-4">

                            <h6 class="fw-semibold">

                                <i class="bi bi-geo-alt-fill text-primary"></i>

                                Alamat

                            </h6>

                            <p class="text-muted mb-0">

                                7R23+7MV, Watesjaya, Kec. Cigombong, Kabupaten Bogor, Jawa Barat 16110

                            </p>

                        </div>

                        <div class="mb-4">

                            <h6 class="fw-semibold">

                                <i class="bi bi-telephone-fill text-primary"></i>

                                Telepon

                            </h6>

                            <p class="text-muted mb-0">

                                (0251) 123456

                            </p>

                        </div>

                        <div class="mb-4">

                            <h6 class="fw-semibold">

                                <i class="bi bi-envelope-fill text-primary"></i>

                                Email

                            </h6>

                            <p class="text-muted mb-0">

                                smancigo@sman1cigombong.sch.id

                            </p>

                        </div>

                        <div>

                            <h6 class="fw-semibold">

                                <i class="bi bi-clock-fill text-primary"></i>

                                Jam Pelayanan

                            </h6>

                            <p class="text-muted mb-0">

                                Senin - Jumat<br>
                                08.00 - 15.00 WIB

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- FORM -->
            <div class="col-lg-7">

                <div class="card berita-card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">
                            Kirim Pesan
                        </h4>

                        <form>

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Nama Lengkap
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        placeholder="Masukkan nama">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input type="email"
                                        class="form-control"
                                        placeholder="Masukkan email">

                                </div>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Subjek
                                </label>

                                <input type="text"
                                    class="form-control"
                                    placeholder="Masukkan subjek">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    Pesan
                                </label>

                                <textarea class="form-control"
                                    rows="5"
                                    placeholder="Tulis pesan Anda"></textarea>

                            </div>

                            <button type="submit"
                                class="btn btn-primary rounded-pill px-4">

                                <i class="bi bi-send-fill"></i>

                                Kirim Pesan

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- MAP -->
<section class="pb-5">

    <div class="container">

        <div class="card berita-card border-0 shadow-sm overflow-hidden rounded-4">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.168740309764!2d106.80158527378805!3d-6.749264765993241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69cc62e52131ab%3A0xa67cabf205dd2713!2sSMAN%201%20Cigombong!5e0!3m2!1sen!2sid!4v1778468145621!5m2!1sen!2sid"
                width="100%"
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

        </div>

    </div>

</section>

<?php require_once 'app/views/frontend/layouts/footer.php'; ?>