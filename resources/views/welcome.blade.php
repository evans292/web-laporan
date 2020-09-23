<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Regna Bootstrap Template</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
    rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="{{ asset('regna/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('regna/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('regna/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('regna/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('regna/vendor/venobox/venobox.css') }} " rel="stylesheet">
  <link href="{{ asset('regna/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('regna/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Regna - v2.1.0
  * Template URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header-transparent">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
        <!-- Uncomment below if you prefer to use a text logo -->
        <h1><a href="#hero">E - Lapor</a></h1>
      </div>

      @if (Route::has('login'))
      @auth
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="index.html">Home</a></li>
          <li><a href="#about">About Us</a></li>
           <li><a href="/reports">Laporan</a></li>
        </ul>
      </nav>
      @else
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
      @endauth
      @endif
    </div>

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>E - Lapor</h1>
      <h2>Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h2>
      <a href="#about" class="btn-get-started">Get Started</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
            <h2 class="title">Tentang</h2>
            <p class="text-justify">
              Untuk
              mencapai visi
              dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik
              dalam satu pintu.
              Tujuannya, masyarakat memiliki satu saluran pengaduan secara Nasional.
            </p>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fa fa-edit"></i></div>
              <h4 class="title"><a href="">Tulis Laporan</a></h4>
              <p class="description">Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
            </div>

            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fa fa-comment"></i></div>
              <h4 class="title"><a href="">Proses Tindak Lanjut</a></h4>
              <p class="description">Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
            </div>


          </div>

          <div class="col-lg-6 background order-lg-2 order-1" data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3 class="section-title">Fakta</h3>
          <p class="section-description">JUMLAH LAPORAN SEKARANG</p>
        </div>
        <div class="row counters">

          <div class="col-lg-12 col-6 text-center">
            <span data-toggle="counter-up">{{ $count }}</span>
            <p>Laporan</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->


    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Daftar Segera</h3>
            <p class="cta-text"> “Berani LAPOR Untuk Pelayanan Publik yang Lebih Baik”</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ route('register') }}">Register</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Regna</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Regna
      -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


  <!-- Vendor JS Files -->
  <script src="{{ asset('regna/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('regna/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/hoverIntent/hoverIntent.js') }}"></script>
  <script src="{{ asset('regna/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('regna/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('regna/js/main.js') }}"></script>

</body>

</html>