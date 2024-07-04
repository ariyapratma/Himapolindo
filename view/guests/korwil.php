<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Himapolindo">
  <link href="../../assets_guests/images/favicon/logoprofil-remove.png" rel="icon">
  <title>Korwil | Himapolindo</title>
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

    .text-center {
      text-align: center;
    }

    .center-image {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .schema-list {
      list-style-type: none;
      padding: 0;
    }

    .schema-list li {
      margin: 10px 0;
    }

    .schema-list a {
      text-decoration: none;
      color: #000;
      font-size: 16px;
    }

    .schema-list a:hover {
      text-decoration: underline;
    }

    .accordion {
      background-color: #fff;
      color: #000;
      cursor: pointer;
      padding: 18px;
      padding-left: 50px;
      /* Space for the image */
      width: 100%;
      text-align: left;
      border: 1px solid #ccc;
      /* Thin grey border */
      outline: none;
      transition: background-color 0.4s, color 0.4s;
      font-size: 16px;
      border-radius: 4px;
      /* Rounded corners */
      position: relative;
      /* For image positioning */
    }

    .accordion:hover {
      background-color: #ae292a;
      color: #fff;
    }

    .accordion a {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: black;
      /* Default text color */
    }

    .accordion a:hover {
      color: white;
      /* Text color on hover */
    }

    .accordion img {
      position: absolute;
      left: 10px;
      /* Position image to the left */
      top: 50%;
      transform: translateY(-50%);
      height: 30px;
      width: 30px;
      border-radius: 5px;
    }

    .panel {
      padding: 0 18px;
      background-color: white;
      display: none;
      overflow: hidden;
      border: 1px solid #ccc;
      /* Thin grey border */
      border-top: none;
      border-radius: 0 0 8px 8px;
      /* Rounded bottom corners */
    }

    .panel a {
      text-decoration: none;
      color: #000;
    }

    .panel a:hover {
      text-decoration: underline;
    }

    .center-image {
      width: 150px;
      height: 150px;
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
            <h1 class="pagetitle__heading mb-0">Kordinasi Wilayah</h1>
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

    <section class="features-layout2 pt-80 pb-5">
      <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
          <div class="col-lg-12">
            <img src="../../assets_guests/images/logo/logo-profil.png" alt="Logo Profil" class="image">
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <section class="features-layout2 pt-20 pb-5">
      <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
          <div class="col-lg-12">
            <h2 class="heading__title fz-25" style="color: black;">KORWIL 1</h2><a href="korwildetail.php">
              <img src="../../assets_guests/images/logo/korwil1.jpg" alt="Logo Profil" class="center-image"></a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <section class="features-layout2 pt-20 pb-5">
      <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
          <div class="col-lg-12">
            <h2 class="heading__title fz-25" style="color: black;">KORWIL 2</h2><a href="korwildetail.php">
              <img src="../../assets_guests/images/logo/korwil2.jpg" alt="Logo Profil" class="center-image"></a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <section class="features-layout2 pt-20 pb-5">
      <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
          <div class="col-lg-12">
            <h2 class="heading__title fz-25" style="color: black;">KORWIL 3</h2><a href="korwildetail.php">
              <img src="../../assets_guests/images/logo/korwil3.png" alt="Logo Profil" class="center-image"></a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <section class="features-layout2 pt-20 pb-5">
      <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
          <div class="col-lg-12">
            <h2 class="heading__title fz-25" style="color: black;">KORWIL 4</h2><a href="korwildetail.php">
              <img src="../../assets_guests/images/logo/korwil4.jpg" alt="Logo Profil" class="center-image"></a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <section class="features-layout2 pt-20 pb-5">
      <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
          <div class="col-lg-12">
            <h2 class="heading__title fz-25" style="color: black;">KORWIL 5</h2><a href="korwildetail.php">
              <img src="../../assets_guests/images/logo/korwil5.jpg" alt="Logo Profil" class="center-image"></a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <section class="features-layout2 pt-20 pb-5">
      <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
          <div class="col-lg-12">
            <h2 class="heading__title fz-25" style="color: black;">KORWIL 6</h2><a href="korwildetail.php">
              <img src="../../assets_guests/images/logo/korwil6.jpg" alt="Logo Profil" class="center-image"></a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

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
  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
</body>

</html>