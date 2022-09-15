<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="<?= base_url('/'); ?>" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img class="img-fluid me-3" src="<?= base_url(); ?>/assets/img/surya-melati.png" alt="" />Surya melati
        </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto bg-light rounded pe-4 py-3 py-lg-0">
            <a href="<?= base_url('/'); ?>"
                class="nav-item nav-link <?= uri_string() == '/' ? 'active' : '' ?>">Pendaftaran</a>
            <div class="nav-item dropdown">
                <a href="<?= base_url('/riwayatPeriksa'); ?>"
                    class="nav-link dropdown-toggle <?= uri_string() == 'antrianSekarang' || uri_string() == 'riwayatPeriksa' ? 'active' : '' ?>"
                    data-bs-toggle="dropdown">Riwayat
                    Periksa</a>
                <div class="dropdown-menu bg-light border-0 m-0">
                    <a href="<?= base_url('/riwayatPeriksa'); ?>" class="dropdown-item">Riwayat
                        Periksa</a>
                    <a href="<?= base_url('/antrianSekarang'); ?>" class="dropdown-item">Antrian Sekarang</a>
                </div>
            </div>
            <a href="<?= base_url('/jadwalDokter'); ?>"
                class="nav-item nav-link <?= uri_string() == 'jadwalDokter' ? 'active' : '' ?>">Jadwal Dokter</a>
            <a href="<?= base_url('/informasiKamar'); ?>"
                class="nav-item nav-link <?= uri_string() == 'informasiKamar' ? 'active' : '' ?>">Informasi Kamar</a>
            <a href="<?= base_url('/pengaduan'); ?>"
                class="nav-item nav-link <?= uri_string() == 'pengaduan' ? 'active' : '' ?>">Pengaduan</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" style="display: inline;">
                    <img src="<?= base_url(); ?>/assets/img/default.svg" alt="Image_profile" class="image--cover"
                        style="max-width: 50px;">
                </a>
                <div class="dropdown-menu bg-light border-0 m-0">
                    <a href="#" class="dropdown-item">
                        <?php $string = $user ?>
                        <?= $string = character_limiter($string, 15); ?>
                    </a>
                    <a href="<?= base_url('/logout'); ?>" class="dropdown-item">Logout
                        <span style="color: #015fc9;">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="" class="btn btn-primary px-3 d-none d-lg-block">Get A Quote</a> -->
</nav>
<!-- Navbar End -->