<?= $this->include('parts/header'); ?>

<?= $this->include('parts/topbar'); ?>

<?= $this->include('parts/navbar'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Informasi Kamar</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Informasi Kamar
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Informasi Kamar Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5">Informasi Daftar Kamar</h1>
        </div>
        <div class="d-none d-lg-block">
            <div class="d-flex justify-content-center mx-3 mb-5">
                <a href="#" class="btn btn-outline-dark mx-3" aria-current="page">Kelas 1</a>
                <a href="#" class="btn btn-outline-dark mx-3">Kelas 2</a>
                <a href="#" class="btn btn btn-outline-dark mx-3">Kelas 3</a>
                <a href="#" class="btn btn-outline-dark mx-3" aria-current="page">Kelas Utama</a>
                <a href="#" class="btn btn-outline-dark mx-3">Kelas VIP</a>
            </div>
        </div>
        <div class="d-lg-none">
            <div class="d-flex justify-content-center mb-3">
                <a href="#" class="btn btn-outline-dark" aria-current="page">Kelas 1</a>
                <a href="#" class="btn btn-outline-dark mx-3">Kelas 2</a>
                <a href="#" class="btn btn btn-outline-dark">Kelas 3</a>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <a href="#" class="btn btn-outline-dark me-2" aria-current="page">Kelas Utama</a>
                <a href="#" class="btn btn-outline-dark ms-2">Kelas VIP</a>
            </div>
        </div>
        <div class=" row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/madinah.png" alt="" />
                    <div class="text-center p-4">
                        <h5>Madinah 1</h5>
                        <span>Berisi 2 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">MADINAH 1</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 2 Bed</p>
                            <p>Tersisa 0 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 400.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/madinah.png" alt="" />
                    <div class="text-center p-4">
                        <h5>Madinah 2</h5>
                        <span>Berisi 1 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">MADINAH 1</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 1 Bed</p>
                            <p>Tersisa 0 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 450.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/hcu.png" alt="" />
                    <div class="text-center p-4">
                        <h5>HCU</h5>
                        <span>Berisi 4 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">HCU</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 1 Bed</p>
                            <p>Tersisa 3 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 300.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/arofah.png" alt="" />
                    <div class="text-center p-4">
                        <h5>Arofah Utara</h5>
                        <span>Berisi 6 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">AROFAH UTARA</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 3 Bed</p>
                            <p>Tersisa 3 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 1110.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/arofah.png" alt="" />
                    <div class="text-center p-4">
                        <h5>Arofah Selatan</h5>
                        <span>Berisi 7 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">AROFAH SELATAN</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 1 Bed</p>
                            <p>Tersisa 6 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 1110.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/hcu.png" alt="" />
                    <div class="text-center p-4">
                        <h5>Mekkah 1</h5>
                        <span>Berisi 3 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">MEKKAH 1</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 0 Bed</p>
                            <p>Tersisa 3 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 205.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/hcu.png" alt="" />
                    <div class="text-center p-4">
                        <h5>Mekkah 2</h5>
                        <span>Berisi 2 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">MEKKAH 2</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 1 Bed</p>
                            <p>Tersisa 1 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 205.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded">
                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/hcu.png" alt="" />
                    <div class="text-center p-4">
                        <h5>Mekkah 3</h5>
                        <span>Berisi 2 Bed</span>
                    </div>
                    <div class="team-text text-center bg-white p-4">
                        <h5  class="fw-bold">MEKKAH 3</h5>
                        <div class="list-group">
                            <p class="badge bg-info text-dark" class="fw-bold">Informasi Bed</p>
                            <p>Terisi 0 Bed</p>
                            <p>Tersisa 2 Bed</p>
                            <p class="badge bg-info text-dark" class="fw-bold">Harga</p>
                            <p>Rp. 205.000 / Hari</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Informasi Kamar End -->

<?= $this->include('parts/footer'); ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?= $this->include('parts/end_footer'); ?>