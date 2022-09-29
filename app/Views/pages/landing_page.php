<?= $this->include('parts/header'); ?>

<!-- Topbar Start -->
<div class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt me-2"></small>
                <small>+012 345 6789</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-envelope-open me-2"></small>
                <small>info@example.com</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-clock me-2"></small>
                <small>Mon - Fri : 09 AM - 09 PM</small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center">
                <a class="text-white-50 ms-4" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-white-50 ms-4" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-white-50 ms-4" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-white-50 ms-4" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img class="img-fluid me-3" src="<?= base_url(); ?>/assets/img/surya-melati.png" alt="" />Surya melati
        </h1>
    </a>
    <div class="ms-auto">
        <a href="" class="btn btn-primary px-3 d-none d-lg-block">Get Started</a>
    </div>
</nav>
<!-- Navbar End -->

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url(); ?>/assets/img/carousel-1.jpg" alt="Image" />
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h1 class="display-3 text-dark mb-4 animated slideInDown">
                                    Pendaftaran Antrian Menjadi Mudah
                                </h1>
                                <p class="fs-5 text-body mb-5">
                                    Bosan mengantri berjam-jam di rumah sakit? Rasakan efisiensi
                                    pendaftaran antrian online kami.
                                </p>
                                <a href="<?= base_url('/'); ?>" class=" btn btn-primary py-3 px-5">Daftar Antrian
                                    Sekarang <i class="fas fa-sign-in-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style="min-height: 400px">
                    <img class="position-absolute w-100 h-100" src="<?= base_url(); ?>/assets/img/about.jpg" alt=""
                        style="object-fit: cover" />
                    <div class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
                        style="width: 200px; height: 200px">
                        <div class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3">
                            <h1 class="text-white mb-0">25</h1>
                            <h2 class="text-white">Years</h2>
                            <h5 class="text-white mb-0">Experience</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-5">
                        Layanan pendaftaran antrian online
                    </h1>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 me-3"
                                    src="<?= base_url(); ?>/assets/img/icon/icon-04-primary.png" alt="" />
                                <h5 class="mb-0">Dapatkan nomor antrian dalam hitungan detik</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 me-3"
                                    src="<?= base_url(); ?>/assets/img/icon/icon-03-primary.png" alt="" />
                                <h5 class="mb-0">Periksa status antrian Anda</h5>
                            </div>
                        </div>
                    </div>
                    <p class="mb-4">
                        Kami di sini untuk membuat segalanya lebih mudah dengan memberi Anda pilihan untuk mendaftar
                        secara online dan menunggu giliran Anda dalam kenyamanan rumah atau kantor Anda.
                    </p>
                    <div class="border-top mt-4 pt-4">
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 rounded-circle me-3"
                                src="<?= base_url(); ?>/assets/img/profile.jpg" alt="" />
                            <h5 class="mb-0">Call Us: +012 345 6789</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Footer Start -->
<?= $this->include('parts/footer'); ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?= $this->include('parts/end_footer'); ?>