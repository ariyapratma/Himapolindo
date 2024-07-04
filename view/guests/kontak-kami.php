<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Himapolindo">
  <link href="../../assets_guests/images/favicon/logoprofil-remove.png" rel="icon">
  <title>Kontak Kami | Himapolindo</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="../../assets_guests/css/libraries.css">
  <link rel="stylesheet" href="../../assets_guests/css/style.css">
  <script src="https://kit.fontawesome.com/17f6f0a605.js" crossorigin="anonymous"></script>
  <style>
    /* ... CSS yang sudah ada ... */

    .about-section {
      padding: 50px;
      text-align: center;
      background-color: #FFFFFF;
    }

    .navbar-actions {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
    }

    .navbar-actions li {
      margin-left: 10px;
      position: relative;
      /* Ensure we can position the dropdown relative to the nav item */
    }

    @media only screen and (max-width: 767px) {
      .navbar-actions {
        flex-direction: column;
        align-items: flex-start;
      }

      .navbar-actions li {
        margin: 5px 0;
      }

      .header-layout1 .navbar-nav {
        flex-direction: column;
        align-items: flex-start;
      }

      .header-layout1 .navbar-nav .nav__item {
        justify-content: flex-start;
        padding: 5px 10px;
      }

      .header-layout1 .navbar-collapse {
        flex-direction: column;
        align-items: flex-start;
      }
    }

    .header-layout1 .navbar-nav {
      display: flex;
      justify-content: center;
      width: 100%;
    }

    .header-layout1 .navbar-nav .nav__item {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 10px;
      position: relative;
      /* Ensure we can position the dropdown relative to the nav item */
    }

    .header-layout1 .navbar-collapse {
      display: flex;
      justify-content: center;
      width: 100%;
    }

    .dropdown-menu {
      display: none;
      /* Hide the dropdown menu by default */
      position: absolute;
      left: 0;
      /* Align to the left */
      top: 100%;
      /* Position below the nav item */
      list-style: none;
      padding: 0;
      margin: 0;
      background-color: white;
      /* Set background color */
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      /* Add shadow for better visibility */
      z-index: 1000;
      /* Ensure dropdown appears above other content */
      min-width: 200px;
      /* Set a minimum width for the dropdown */
    }

    .dropdown-menu li {
      padding: 10px;
      /* Adjust padding for dropdown items */
    }

    .dropdown-menu li a {
      text-decoration: none;
      /* Remove underline from links */
      color: black;
      /* Set link color */
      display: block;
      /* Make links block elements */
      margin-right: auto;
      margin-left: 15px;
    }

    .nav__item:hover .dropdown-menu {
      display: block;
      /* Show the dropdown menu on hover */
    }

    .dropdown-menu li {
      padding: 10px;
      /* Adjust padding for dropdown items */
    }

    .dropdown-menu li a {
      text-decoration: none;
      /* Remove underline from links */
      color: black;
      /* Set link color */
      display: block;
      /* Make links block elements */
    }

    .dropdown-menu li a:hover {
      background-color: #ddd;
      /* Highlight on hover */
    }

    #team {
      background-color: #ae292a;
    }

    .slider .slide-item {
      display: flex;
      align-items: center;
      /* Pusatkan secara vertikal */
      justify-content: center;
      /* Pusatkan secara horizontal */
      min-height: 90vh;
      /* Atur tinggi minimum untuk slide-item */
      text-align: center;
      /* Memastikan teks di dalam slide-item berada di tengah secara horizontal */
      position: relative;
      /* Untuk memastikan bg-img diatur dengan benar */
      overflow: hidden;
      /* Pastikan elemen tidak meluap */
    }

    .slider .slide__body {
      max-width: 800px;
      /* Atur lebar maksimal untuk konten agar tidak terlalu lebar */
      margin: 0 auto;
      /* Pusatkan konten secara horizontal */
      padding: 20px;
      /* Tambahkan padding untuk memastikan ada jarak di sekitar konten */
      z-index: 2;
      /* Pastikan konten berada di atas gambar latar belakang */
      color: #fff;
      /* Pastikan teks berwarna putih agar kontras dengan latar belakang */
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .slider .slide__title {
      margin-bottom: 10px;
      /* Atur jarak bawah judul */
    }

    .slider .slide__desc {
      margin-bottom: 20px;
      /* Atur jarak bawah deskripsi */
    }

    .slider .bg-img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 1;
      /* Pastikan gambar latar belakang berada di belakang konten */
    }

    .slider .btn {
      margin: 0 5px;
      /* Atur jarak horizontal antar tombol */
    }

    @media (max-width: 768px) {
      .slider .slide__body {
        padding: 10px;
        /* Kurangi padding pada perangkat kecil */
      }

      .slider .slide__title {
        font-size: 1.5rem;
        /* Sesuaikan ukuran font untuk perangkat kecil */
        margin-bottom: 5px;
        /* Sesuaikan jarak bawah judul */
      }

      .slider .slide__desc {
        font-size: 1rem;
        /* Sesuaikan ukuran font untuk perangkat kecil */
        margin-bottom: 10px;
        /* Sesuaikan jarak bawah deskripsi */
      }

      .slider .btn {
        margin: 3px 0;
        /* Atur jarak vertikal antar tombol pada perangkat kecil */
      }
    }


    /* ... CSS yang sudah ada ... */
  </style>





</head>

<body>
  <div class="wrapper">

    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div>

    <!-- /.preloader -->

    <!-- =========================
        Header
    =========================== -->
    <header class="header header-layout1">
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="../../assets_guests/images/favicon/logoprofil.png" class="logo" alt="logo" width="60" height="60">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav">
              <li class="nav__item">
                <a href="index.php" class="nav__item-link">Beranda</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="aboutus.php" class="nav__item-link">About Us</a>
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" class="nav__item-link">Kegiatan</a>
                <button class="dropdown-toggle" data-toggle="dropdown"></button>
                <ul class="dropdown-menu">
                  <li class="nav__item"><a href="ravelnas.php" class="nav__item-link">Ravelnas</a></li>
                  <!-- /.nav-item -->
                  <li class="nav__item"><a href="kongreshimapolindo.php" class="nav__item-link">Kongres Himapolindo</a></li>
                  <!-- /.nav-item -->
                  <li class="nav__item"><a href="diesnatalishimapolindo.php" class="nav__item-link">Dies Natalis Himapoilindo</a></li>
                  <li class="nav__item"><a href="rakernas.php" class="nav__item-link">Rakernas</a></li>
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="korwil.php" class="nav__item-link">Korwil</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="catatanintelektual.php" class="nav__item-link">Catatan Intelektual</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="artikel.php" class="nav__item-link">Artikel</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="galeri.php" class="nav__item-link">Galeri</a>
              </li><!-- /.nav-item -->
              <li class="nav__item">
                <a href="kontak-kami.php" class="nav__item-link">Hubungi Kami</a>
              </li><!-- /.nav-item -->
            </ul><!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav><!-- /.navbar -->
    </header><!-- /.Header -->

    <section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
      <div class="bg-img"><img src="../../assets_guests/images/banners/kontakkami.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading mb-0">Kontak Kami</h1>
            <nav aria-label="breadcrumb">
              <!--<ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><a href="#">Kontak Kami</a></li>
              </ol>-->
            </nav>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <!-- ==========================
        contact layout 1
    =========================== -->
    <section class="contact-layout1 pb-50 pt-5">
      <div class="container">
        <h1 class="heading__title fz-25" style="color:black; text-align: center;">Contact Us</h1>
        <div class="row">
          <div class="col-12">
            <div class="contact-panel p-0 box-shadow-none">
              <div class="contact__panel-info mb-30">
                <div class="contact-info-box">
                  <h4 class="contact__info-box-title">Lokasi Kami</h4>
                  <ul class="contact__info-list list-unstyled">
                    <li>Jl. Kumbang No. 14, Babakan, Kec. Bogor Tengah
                      SV IPB University</li>
                  </ul><!-- /.contact__info-list -->
                </div><!-- /.contact-info-box -->
                <div class="contact-info-box">
                  <h4 class="contact__info-box-title">E-mail</h4>
                  <ul class="contact__info-list list-unstyled">
                    <li>Email: <a href="mailto:Solatec@7oroof.com">himapolindo@gmail.com</a></li>
                  </ul><!-- /.contact__info-list -->
                  <a href="mailto:himapolindo@gmail.com" class="btn btn__primary mt-2">
                    <i class="icon-arrow-right"></i>
                    <span>Email</span>
                  </a><br>
                </div><!-- /.contact-info-box -->
                <div class="contact-info-box">
                  <h4 class="contact__info-box-title">Kontak</h4>
                  <ul class="contact__info-list list-unstyled">
                    <li>0878-7528-1825</li>
                  </ul><!-- /.contact__info-list -->
                  <a href="https://wa.me/6287875281825" class="btn btn__primary mt-2">
                    <i class="icon-arrow-right"></i>
                    <span>whatsapp</span>
                  </a>
                </div><!-- /.contact-info-box -->
              </div><!-- /.contact__panel-info -->
              <section class="google-map py-1">
                <iframe frameborder="0" width="650px" height="480px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.465887173082!2d106.80328012499358!3d-6.588867293404799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d2e602b501%3A0x25a12f0f97fac4ee!2sSekolah%20Vokasi%20Institut%20Pertanian%20Bogor!5e0!3m2!1sid!2sid!4v1695665744203!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- <iframe 
                    src="https://maps.google.com/maps?q=Suite%20100%20San%20Francisco%2C%20LA%2094107%20United%20States&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"></iframe> -->
              </section><!-- /.GoogleMap -->
            </div><!-- /.contact__panel -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.contact layout 1 -->
    <!-- ========================
      Footer
    ========================== -->
    <footer class="footer">
      <div class="footer-primary">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 footer-widget footer-widget-contact">
              <h5 class="footer-widget-title">HIMAPOL</h5>
              <div class="footer-widget-content">
                <p class="mb-20">Himpunan Mahasiswa Ilmu Politik (HIMAPOL) Indonesia merupakan organisasi yang
                  menaungi himpunan mahasiswa jurusan dan atau departemen program studi ilmu politik
                  yang setaraf dengan lembaga perguruan dinggi diseluruh wilayah Negara Kesatuan
                  Republik Indonesia.</p>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-3 -->
            <div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2 footer-widget footer-widget-nav">
            </div><!-- /.col-xl-2 -->
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 footer-widget footer-widget-contact">
              <h6 class="footer-widget-title">Kunjungi</h6>
              <div class="footer-widget-content">
                <p class="mb-20">Email :<a href=""> himapolindo@gmail.com</a></p>
                <div class="contact__number d-flex align-items-center mb-30">
                  <i class="icon-phone"></i>
                  <a href="" class="color-primary">0878-7528-1825</a>
                </div><!-- /.contact__numbr -->
                <p class="mb-20">Jl. Kumbang No.14, RT.02/RW.06, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128</p>
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-3 -->
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 footer-widget footer-widget-align-right">
              <h6 class="footer-widget-title mr-5">Follow Kami</h6>
              <div class="footer-widget-content">
                <ul class="social-icons list-unstyled">
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul><!-- /.social-icons -->
              </div><!-- /.footer-widget-content -->
            </div><!-- /.col-xl-3 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-primary -->
      <div class="footer-copyrights">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between">
              <nav>
                <ul class="copyright__nav d-flex flex-wrap list-unstyled mb-0">
                  <li><a href="#">Terms & Conditions</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </nav>
              <p class="mb-0">
                <span class="color-gray">&copy; 2024 Himapolindo, All Rights Reserved</span>
              </p>
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-copyrights-->
    </footer><!-- /.Footer -->
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>

  </div><!-- /.wrapper -->

  <script src="../../assets_guests/js/jquery-3.5.1.min.js"></script>
  <script src="../../assets_guests/js/plugins.js"></script>
  <script src="../../assets_guests/js/main.js"></script>
</body>

</html>