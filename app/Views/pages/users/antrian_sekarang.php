<?= $this->include('parts/header'); ?>

<?= $this->include('parts/topbar'); ?>

<?= $this->include('parts/navbar'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Antrian sekarang</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Riwayat periksa</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Antrian sekarang
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Appointment Start -->
<div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <?php $tgl = strtotime($lastAntrian->tgl_registrasi); ?>
        <?php if ($tgl >= $today) : ?>

            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-6 mb-5">
                        Terima Kasih Atas kepercayaan Anda.
                    </h1>
                    <p class="mb-5">
                        Bawalah kartu Berobat anda dan datang 1 jam sebelumnya. <br>
                        Jika memilih cara bayar BPJS, bawalah surat rujukan atau surat kontrol asli dan tunjukkan pada
                        petugas di Lobby resepsionis.
                    </p>
                    <div class="bg-light rounded p-3">
                        <div class="d-flex align-items-center bg-white rounded p-3">
                            <img class="flex-shrink-0 rounded-circle me-3" src="<?= base_url(); ?>/assets/img/profile.jpg" alt="" />
                            <h5 class="mb-0">Call Us: +012 345 6789</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" id="form">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                                <span class="text-white fs-2"><?= $lastAntrian->no_reg ?></span>
                                <!-- <img class="img-fluid" src="<?= base_url(); ?>/assets/img/icon/icon-10-light.png" alt="" /> -->
                            </div>
                            <h4 class="mb-0">Nomor antrian anda</h4>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item justify-content-between align-items-center text-center">
                                <span class="fw-bold">Nama Lengkap:</span> <br> <?= $lastAntrian->nm_pasien ?>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center text-center">
                                <span class="fw-bold">Nomor Rekam Medik:</span> <br> <?= $lastAntrian->no_rkm_medis ?>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center text-center">
                                <span class="fw-bold">Tanggal Antrian Periksa:</span> <br>
                                <?php $datePeriksa = (date_format(date_create($lastAntrian->tgl_registrasi), 'd-M-Y'));  ?>
                                <?= $datePeriksa ?>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center text-center">
                                <span class="fw-bold">Nomor Antrian: </span> <br>
                                <span class="badge bg-primary"><?= $lastAntrian->no_reg ?></span>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center text-center">
                                <span class="fw-bold">Poliklinik Tujuan:</span> <br> <?= $lastAntrian->nm_poli ?>
                                <?= $lastAntrian->jam_mulai ?> - <?= $lastAntrian->jam_selesai ?>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center text-center">
                                <span class="fw-bold">Dokter Tujuan: </span> <br> <?= $lastAntrian->nm_dokter ?>
                            </li>
                            <li class="list-group-item justify-content-between align-items-center text-center">
                                <span class="fw-bold">Cara Bayar: </span> <br> <?= $lastAntrian->png_jawab ?>
                            </li>
                        </ul>
                        <div class="alert alert-warning mt-4 text-center" role="alert">
                            Maksimal ganti tanggal antrian pukul 23.59, H-1 dari tanggal kunjungan!
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-grid">
                                <button class="btn btn-primary py-3" data-bs-toggle="modal" data-bs-target="#gantiAntrian">
                                    Ganti tanggal antrian? <i class="far fa-calendar-minus fa-lg"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="d-grid">
                                <button class="btn btn-danger py-3" data-bs-toggle="modal" data-bs-target="#batalAntrian">
                                    Batalkan antrian? <i class="far fa-calendar-times fa-lg"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>
            <div class="alert alert-danger text-center" role="alert">
                Tidak ada antrian untuk anda!
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- Appointment End -->

<!-- Modal ganti antrian -->
<div class="modal fade" id="gantiAntrian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti tanggal antrian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin ingin mengganti tanggal antrian anda? <br>
                Nomor antrian anda saat ini akan otomatis dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger text-white hover-overlay" data-bs-dismiss="modal">Tidak</button>
                <form action="<?= base_url('/gantiTanggalAntrian'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="text" value="" name="" hidden>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal batal antrian -->
<div class="modal fade" id="batalAntrian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembatalan antrian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin ingin membatalkan antrian anda?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-danger text-white hover-overlay" data-bs-dismiss="modal">Tidak</button>
                <form action="<?= base_url('/batalTanggalAntrian'); ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="text" value="" name="" hidden>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('parts/footer'); ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?= $this->include('parts/end_footer'); ?>