<?= $this->include('parts/header'); ?>

<div class="wrapper">

    <div class="logo">
        <a href="https://imgbb.com/"><img src="https://i.ibb.co/GM3wCF8/BB.png" alt="BB" border="0"></a>

    </div>

    <div class="text-center mt-4 name">Selamat datang kembali.</div>
    <form class="p-3 mt-3" action="<?= route_to('login') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-floating mb-3 d-flex align-items-center">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Nomor Rekam Medik">
            <label for="floatingInput"> Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <!-- <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" name="userName" id="userName" placeholder="Nomor Rekam Medik" />
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="password" id="pwd" placeholder="NIK" />
        </div> -->
        <button class="btn mt-4">Login</button>
    </form>
    <div class="text-center fs-6">
        <a href="#">Daftar Pasien Baru</a>
    </div>
</div>

<?= $this->include('parts/end_footer'); ?>