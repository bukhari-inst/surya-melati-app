<?= $this->include('parts/header'); ?>

<?= $this->include('parts/topbar'); ?>

<?= $this->include('parts/navbar'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Riwayat Periksa</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Riwayat periksa
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Riwayat Periksa Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto" style="max-width: 500px">
            <h1 class="display-6 mb-5">
                Riwayat periksa anda
            </h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded h-100 p-5">
                    <div class="d-flex align-items-center ms-n5 mb-4">
                        <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                            <img class="img-fluid" src="<?= base_url(); ?>/assets/img/icon/icon-10-light.png" alt="" />
                        </div>
                        <h4 class="mb-0">Daftar riwayat periksa</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">No. Rawat</th>
                                    <th scope="col">No. Antrian</th>
                                    <th scope="col">Poliklinik</th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">Status rawat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($historyAntrian as $history) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $history->tgl_registrasi ?></td>
                                    <td><?= $history->no_rawat ?></td>
                                    <td><?= $history->no_reg ?></td>
                                    <td><?= $history->nm_poli ?></td>
                                    <td><?= $history->nm_dokter ?></td>
                                    <td><?= $history->status_lanjut ?></td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Riwayat Periksa End -->

<?= $this->include('parts/footer'); ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?= $this->include('parts/end_footer'); ?>