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
    <link rel="stylesheet" href="<?php echo base_url('assets_front') ?>/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">



    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets_front') ?>/css/style.css" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Restaurantly - v1.2.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

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
                    <!-- <li><a href="#menu">Menu</a></li> -->
                    <!-- <li><a href="#gallery">Gallery</a></li> -->
                    <!-- <li><a href="#contact">Contact</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Konfirmasi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: transparent;">
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

    <br><br><br>

    <main id="main">


        <?php echo $contents ?>


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
    <!-- <script src="<?php echo base_url('assets_front') ?>/jquery-3.4.1.min.js"></script> -->
    <script src="<?php echo base_url('assets_front') ?>/plugins/ui.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/venobox/venobox.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/vendor/aos/aos.js"></script>
    <!-- <script src="<?php echo base_url('assets_front') ?>/plugins/jquery/jquery.min.js"></script> -->
    <script src="<?php echo base_url('assets_front') ?>/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url('assets_front') ?>/plugins/script.js"></script>


    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets_front') ?>/js/main.js"></script>
    <script src="<?php echo base_url('assets_front/') ?>plugins/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets_front/') ?>plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets_front/') ?>plugins/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url('assets_front/') ?>plugins/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('assets_front/') ?>plugins/responsive.bootstrap.min.js"></script>


    <script src="<?php echo base_url('assets_front/') ?>plugins/datatables/jquery.dataTables.js"></script>

    <script src="<?php echo base_url('assets_front/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>


</body>

</html>