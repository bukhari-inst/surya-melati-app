<?= $this->include('parts/header'); ?>

<?= $this->include('parts/topbar'); ?>

<?= $this->include('parts/navbar'); ?>

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-1">Perbarui</h1>
        <h6 class="display-6 fs-3 animated slideInDown mb-4">Data anda</h6>
        <a href="#form" class=" btn btn-primary py-3 px-5 mt-4 mb-5">Klik di sini <i class="fas fa-hand-point-left fa-lg"></i></a>

        <div class="row">
            <div class="col-12">
                <?php if ($validation->getError('norekammedik')) : ?>
                    <div class="text-center alert alert-danger" role="alert">
                        <?= $validation->getError('norekammedik') ?>
                    </div>
                <?php endif; ?>
                <?php if ($validation->getError('tanggalkunjungan')) : ?>
                    <div class="text-center alert alert-danger" role="alert">
                        <?= $validation->getError('tanggalkunjungan') ?>
                    </div>
                <?php endif; ?>
                <?php if ($validation->getError('poliklinik')) : ?>
                    <div class="text-center alert alert-danger" role="alert">
                        <?= $validation->getError('poliklinik') ?>
                    </div>
                <?php endif; ?>
                <?php if ($validation->getError('pilihdokter')) : ?>
                    <div class="text-center alert alert-danger" role="alert">
                        <?= $validation->getError('pilihdokter') ?>
                    </div>
                <?php endif; ?>
                <?php if ($validation->getError('payment')) : ?>
                    <div class="text-center alert alert-danger" role="alert">
                        <?= $validation->getError('payment') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="text-center alert alert-success" role="alert">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="text-center alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Perbarui Data Start -->
<div class="container-fluid py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                <h1 class="display-6 mb-5">
                    We're Award Winning Insurance Company
                </h1>
                <p class="mb-5">
                    Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                    stet lorem sit clita duo justo magna dolore erat amet. Tempor erat
                    elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                    diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit
                    clita duo justo magna.
                </p>
                <div class="bg-light rounded p-3">
                    <div class="d-flex align-items-center bg-white rounded p-3">
                        <img class="flex-shrink-0 rounded-circle me-3" src="<?= base_url(); ?>/assets/img/profile.jpg" alt="" />
                        <h5 class="mb-0">Call Us: +012 345 6789</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" id="form">
                <div class="bg-light rounded p-5">
                    <form action="<?= base_url('/updateDataUser'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" value="<?= $pasien->nm_pasien ?>" name="namaPasien" />
                                    <label for="gname">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="gmail" placeholder="Gurdian Email" value="<?= $pasien->no_ktp ?>" name="nikKtp" />
                                    <label for="gmail">NIK KTP</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" name="jenisKelamin" required>
                                        <option selected><?= $pasien->jk ?></option>
                                        <option value="L">L</option>
                                        <option value="P">P</option>
                                    </select>
                                    <label for="cname">Jenis Kelamin</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" name="agama">
                                        <option selected><?= $pasien->agama ?></option>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="PROTESTAN">PROTESTAN</option>
                                        <option value="KATOLIK">KATOLIK</option>
                                        <option value="HINDU">HINDU</option>
                                        <option value="BUDDHA">BUDDHA</option>
                                        <option value="KHONGHUCU">KHONGHUCU</option>
                                    </select>
                                    <label for="cname">Agama</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cage" placeholder="Child Age" value="<?= $pasien->tmp_lahir ?>" name="tempatLahir" />
                                    <label for="cage">Tempat Lahir</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="dform" placeholder="Input Form" value="<?= date_format(date_create($pasien->tgl_lahir), 'd-M-Y') ?>" name="tglLahir" onfocus="(this.type='date')" onblur="(this.type='text')" />
                                    <label for="cage">Tanggal Lahir</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="fform" placeholder="Input Form" value="<?= $pasien->nm_ibu ?>" name="namaIbu" />
                                    <label for="cage">Nama Ibu</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="gform" placeholder="Input Form" value="<?= $pasien->alamat ?>" name="alamat" />
                                    <label for="cage">Alamat Lengkap</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" name="golonganDarah">
                                        <option selected><?= $pasien->gol_darah ?></option>
                                        <option value="A">A</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                    </select>
                                    <label for="cage">Golongan Darah</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating pekerjaan">
                                    <select class="select-pekerjaan" style="width: 100%;" name="pekerjaan" required>
                                        <option selected style="margin-top: 25px;"><?= $pasien->pekerjaan ?></option>
                                        <?php foreach ($pekerjaan as $pkj) : ?>
                                            <option value="<?= $pkj ?>"><?= $pkj ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <label for="cage" style="margin-top: -13px; opacity: 0.65;">Pekerjaan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select" aria-label="Default select example" name="statusNikah">
                                        <option selected><?= $pasien->stts_nikah ?></option>
                                        <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                        <option value="MENIKAH">MENIKAH</option>
                                        <option value="DUDA">DUDA</option>
                                        <option value="JANDA">JANDA</option>
                                    </select>
                                    <label for="cage">Status Nikah</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kform" placeholder="Input Form" value="<?= $pasien->no_tlp ?>" name="nomorTelepon" />
                                    <label for="cage">Nomor Telepon / WA</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block py-3 px-5" type="submit">
                                        Simpan
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
<!-- Perbarui data end -->

<?= $this->include('parts/footer'); ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?= $this->include('parts/end_footer'); ?>