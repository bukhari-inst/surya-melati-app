<?= $this->include('parts/header'); ?>

<?= $this->include('parts/topbar'); ?>

<?= $this->include('parts/navbar'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-1">Pendaftaran</h1>
        <h6 class="display-6 fs-3 animated slideInDown mb-4">Antrian Pasien</h6>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <!-- <li class="breadcrumb-item"><a href="#">Pendaftaran</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Appointment
                </li> -->
            </ol>
        </nav>

        <a href="#form" class=" btn btn-primary py-3 px-5 mt-4">Klik di sini <i
                class="fas fa-hand-point-left fa-lg"></i></a>
    </div>
</div>
<!-- Page Header End -->

<!-- Appointment Start -->
<div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <h1 class="display-6 mb-5">
                    Daftarkan antrian Anda untuk besok!
                </h1>
                <p class="mb-5">
                    Tidak perlu menunggu lagi, Surya Melati menawarkan sistem yang memungkinkan
                    pasien untuk mendaftar antrian secara online dan tidak perlu mengantri.
                </p>
                <div class="bg-light rounded p-3">
                    <div class="d-flex align-items-center bg-white rounded p-3">
                        <img class="flex-shrink-0 rounded-circle me-3" src="<?= base_url(); ?>/assets/img/profile.jpg"
                            alt="" />
                        <h5 class="mb-0">Call Us: +012 345 6789</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" id="form">
                <div class="bg-light rounded p-5">
                    <form action="<?= base_url('/registrasiAntrian'); ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="gname" placeholder="Gurdian Name"
                                        name="namapasien" readonly />
                                    <label for="gname">
                                        <?php $string = $user->nm_pasien ?>
                                        <?= $string = character_limiter($string, 15); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control text-center" id="rekammedik"
                                        placeholder="Gurdian Email" value="<?= $user->no_rkm_medis ?>"
                                        name="norekammedik" readonly style="padding-bottom: 1.625rem;" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="tanggalkunjungan"
                                        placeholder="Child Name" name="tanggalkunjungan" required />
                                    <label for="cname">Tanggal Kunjungan</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="js-example-basic-single" id="poliklinik" style="width: 100%;"
                                        name=" poliklinik" required>
                                        <option value="">Pilih Poliklinik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="js-example-basic-single" id="pilihdokter" style="width: 100%;"
                                        name="pilihdokter" required>
                                        <option value="">Pilih Dokter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <select class="js-example-basic-single" id="carabayar" style="width: 100%;"
                                        name="payment" onchange="admSelectCheck(this);" required>
                                        <option value="">Pilih Cara Bayar</option>
                                        <?php foreach ($payment as $pay) : ?>
                                        <option id="<?= $pay->png_jawab; ?>" value="<?= $pay->kd_pj; ?>">
                                            <?= $pay->png_jawab; ?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="admDivCheck" style="display:none;">
                                    <!-- <img id="image_upload_preview" width="200px" src="images/upload-rujukan.png" onclick="upload_rujukan()" style="cursor:pointer;" />-->
                                    <div class="alert alert-danger" role="alert">
                                        <p>Anda memilih cara
                                            bayar BPJS. Apakah anda memiliki surat rujukan atau surat kontrol? <br>
                                            Jika tidak, silahkan pilih cara bayar umum. <br> Jika ya, silahkan
                                            lanjutkan pendaftaran anda dan Jangan lupa membawa surat Rujukan atau surat
                                            kontrol ketika periksa.
                                        </p>
                                    </div>
                                    <input name="file" id="inputFile" type="file" style="display:none;" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary py-3" type="submit">
                                        Daftar Antrian <i class="fas fa-sign-in-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<?= $this->include('parts/footer'); ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?= $this->include('parts/end_footer'); ?>