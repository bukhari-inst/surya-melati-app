<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="index.html" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0">
            <img class="img-fluid me-3" src="<?= base_url(); ?>/assets/img/surya-melati.png" alt="" />Surya melati
        </h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto bg-light rounded pe-4 py-3 py-lg-0">
            <a href="index.html" class="nav-item nav-link active">Pendaftaran</a>
            <a href="about.html" class="nav-item nav-link <?= uri_string() == '/' ? 'active' : '' ?> ">About
                Us</a>
            <a href="service.html" class="nav-item nav-link">Our Services</a>
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" style="display: inline;">
                    <img src="<?= base_url(); ?>/assets/img/default.svg" alt="Image_profile" class="image--cover"
                        style="max-width: 50px;">
                </a>
                <div class="dropdown-menu bg-light border-0 m-0">
                    <a href="#" class="dropdown-item">Bukhari Inst</a>
                    <a href="<?= base_url('/logout'); ?>" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <a href="" class="btn btn-primary px-3 d-none d-lg-block">Get A Quote</a> -->
</nav>
<!-- Navbar End -->