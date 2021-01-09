<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DF Catering</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url('assets_front') ?>/img/favicon.png" rel="icon">
    <link href="<?php echo base_url('assets_front') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets_front') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets_front') ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets_front') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets_front') ?>/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets_front') ?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets_front') ?>/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?php echo base_url('assets_front') ?>/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets_front') ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Restaurantly - v1.2.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .dropdown-menu {
            background-color: transparent;
        }
    </style>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-phone"></i> +62 812-6782-3029
                <span class="d-none d-lg-inline-block"><i class="icofont-clock-time icofont-rotate-180"></i> Setiap Hari: 09:00 AM - 20:00 PM</span>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="<?= base_url() ?>">DF Catering</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url() ?>">Home</a></li>
                    <!-- <li><a href="#about">About</a></li> -->
                    <li><a href="#menu">Menu</a></li>
                    <!-- <li><a href="#gallery">Gallery</a></li> -->
                    <li><a href="#contact">Contact</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Konfirmasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= base_url("Konfirmasi/harian") ?>">Harian</a>
                            <a class="dropdown-item" href="<?= base_url("Konfirmasi/pesta") ?>">Pesta</a>
                        </div>
                    </li>
                    <?php
                    if ($this->session->email != '') {
                    ?>
                        <li class="book-a-table text-center"><a href="<?= site_url('C_home_front/logout') ?>">Logout</a></li>

                    <?php } else { ?>
                        <li class="book-a-table text-center"><a href="#book-a-table">Registrasi / Login</a></li>
                    <?php } ?>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1>Welcome to <span>Restaurantly</span></h1>
                    <h2>Delivering great food for more than 18 years!</h2>

                    <div class="btns">
                        <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
                        <a href="#book-a-table" class="btn-book animated fadeInUp scrollto">Book a Table</a>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                    <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
                </div>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">





        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <!-- <p>Check Our Tasty Menu</p> -->
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-senin">Senin</li>
                            <li data-filter=".filter-selasa">Selasa</li>
                            <li data-filter=".filter-rabu">Rabu</li>
                            <li data-filter=".filter-selasa">Kamis</li>
                            <li data-filter=".filter-jumat">Jumat</li>
                            <li data-filter=".filter-sabtu">Sabtu</li>
                            <li data-filter=".filter-minggu">Minggu</li>
                        </ul>
                    </div>
                </div>

                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    <?php

                    $query =  $this->db->query("SELECT * FROM menu_makanan");

                    foreach ($query->result_array() as $row) {

                    ?>
                        <div class="col-lg-6 menu-item filter-<?= $row['hari'] ?>">
                            <img src="<?= base_url('foto/foto_menu/' . $row['foto_makanan']) ?>" class="menu-img" alt="">
                            <div class="menu-content">
                                <a href="#"><?= $row['nama_menu'] ?></a><span>Rp. <?= number_format($row['harga'], 0, ',', '.') ?></span>
                            </div>
                            <!-- <div class="menu-ingredients">
                                Lorem, deren, trataro, filede, nerada
                            </div> -->
                        </div>

                    <?php } ?>



                </div>
                <br>
                <table align="center">
                    <td>
                        <center> <a target="_blank" href="<?= base_url('C_home_front/harian') ?>" class="btn btn-warning" style="width: 150px;">Pesan Harian</a></center>
                    </td>
                    <td>
                        <center> <a target="_blank" href="<?= base_url('C_home_front/pesta') ?>" class="btn btn-warning" style="width: 150px;">Pesan Pesta</a></center>
                    </td>
                </table>



            </div>
        </section><!-- End Menu Section -->
        <!-- ======= Book A Table Section ======= -->
        <?php
        if ($this->session->email != '') {
        } else {
        ?>
            <section id="book-a-table" class="book-a-table">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Login</h2>

                    </div>

                    <form action="<?= base_url('C_home_front') ?>" method="post">

                        <div class="form-row">

                            <div class="col-lg-4 col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                <div class="validate"></div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-warning" type="submit" name="log">Login</button></div>
                    </form>
                </div>
                <br>
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Registrasi</h2>

                    </div>

                    <form action="<?= base_url('C_home_front') ?>" method="post">

                        <div class="form-row">
                            <div class="col-lg-4 col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" data-rule="minlen:4" data-msg="Masukan Minimal 4 Karakter">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Anda" data-rule="email" data-msg="Masukan Email Yang Valid">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Telepon Anda" data-rule="minlen:11" data-msg="Minimal 11 Karakter">
                                <div class="validate"></div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-lg-4 col-md-6 form-group">
                                <textarea placeholder="Alamat Anda" name="alamat" id="alamat" class="form-control"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password Anda" data-rule="minlen:8" data-msg="Minimal 8 Karakter">
                                <div class="validate"></div>
                            </div>

                        </div>
                        <div class="text-center">
                            <button class="btn btn-block btn-warning" type="submit" name="reg">Registrasi</button>
                        </div>
                    </form>


                </div>


            </section>
        <?php } ?>

        <!-- End Book A Table Section -->

        <!-- ======= Testimonials Section ======= -->

        <!-- ======= Gallery Section ======= -->


        <!-- ======= Chefs Section ======= -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>
            </div>

            <div data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
            </div>

            <div class="container" data-aos="fade-up">

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="open-hours">
                                <i class="icofont-clock-time icofont-rotate-90"></i>
                                <h4>Open Hours:</h4>
                                <p>
                                    Monday-Saturday:<br>
                                    11:00 AM - 2300 PM
                                </p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>Restaurantly</h3>
                            <p>
                                A108 Adam Street <br>
                                NY 535022, USA<br><br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('assets_front') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/venobox/venobox.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets_front') ?>/js/main.js"></script>

</body>

</html>