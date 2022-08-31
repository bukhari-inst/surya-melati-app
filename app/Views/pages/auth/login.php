<?= $this->include('parts/header'); ?>

<div class="wrapper">

    <div class="logo">
        <a href="https://imgbb.com/"><img src="https://i.ibb.co/GM3wCF8/BB.png" alt="BB" border="0"></a>

    </div>

    <div class="text-center mt-4 name">Selamat datang kembali.</div>
    <?php if (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger text-center" role="alert">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>
    <form class="p-3 mt-3" action="<?= base_url('/loginProcess') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-floating mb-3 d-flex align-items-center">
            <input type="number" class="form-control" name="noRkmMedis" id="floatingInput"
                placeholder="Nomor Rekam Medik" required>
            <label for="floatingInput">Nomor rekam medik</label>
        </div>
        <div class="form-floating">
            <input type="date" class="form-control" name="date" id="floatingPassword" placeholder="Tanggal lahir"
                required>
            <label for="floatingPassword">Tanggal lahir</label>
        </div>
        <button class="btn mt-4">Login</button>
    </form>
    <div class="text-center fs-6">
        <!-- <a href="#">Daftar Pasien Baru</a> -->
    </div>
</div>

<?= $this->include('parts/end_footer'); ?>