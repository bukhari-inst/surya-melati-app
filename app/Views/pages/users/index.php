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
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto bg-light rounded pe-4 py-3 py-lg-0">
            <a href="index.html" class="nav-item nav-link active">Pendaftaran</a>
            <a href="about.html" class="nav-item nav-link">About Us</a>
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

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Pendaftaran</h1>
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
                        <img class="flex-shrink-0 rounded-circle me-3" src="<?= base_url(); ?>/assets/img/profile.jpg"
                            alt="" />
                        <h5 class="mb-0">Call Us: +012 345 6789</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" id="form">
                <div class="bg-light rounded p-5">
                    <form>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="gname" placeholder="Gurdian Name" />
                                    <label for="gname">Your Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="gmail" placeholder="Gurdian Email" />
                                    <label for="gmail">Your Email</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cname" placeholder="Child Name" />
                                    <label for="cname">Your Mobile</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="cage" placeholder="Child Age" />
                                    <label for="cage">Service Type</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 80px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">
                                    Get Appointment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h1 class="text-white mb-4">
                    <img class="img-fluid me-3" src="<?= base_url(); ?>/assets/img/icon/icon-02-light.png"
                        alt="" />Insure
                </h1>
                <p>
                    Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat
                    ipsum et lorem et sit, sed stet lorem sit clita
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Address</h5>
                <p>
                    <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
                </p>
                <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Quick Links</h5>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Newsletter</h5>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email" />
                    <button type="button" class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        SignUp
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br />Distributed By:
                    <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<?= $this->include('parts/end_footer'); ?>