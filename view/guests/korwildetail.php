
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Himapolindo">
  <link href="../../assets_guests/images/favicon/logoprofil-remove.png" rel="icon">
  <title>Himapolindo</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Rubik:400,500,600,700%7cRoboto:400,500,700&display=swap">
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
        position: relative; /* Ensure we can position the dropdown relative to the nav item */
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
        position: relative; /* Ensure we can position the dropdown relative to the nav item */
    }

    .header-layout1 .navbar-collapse {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .dropdown-menu {
        display: none; /* Hide the dropdown menu by default */
        position: absolute;
        left: 0; /* Align to the left */
        top: 100%; /* Position below the nav item */
        list-style: none;
        padding: 0;
        margin: 0;
        background-color: white; /* Set background color */
        box-shadow: 0 8px 16px rgba(0,0,0,0.2); /* Add shadow for better visibility */
        z-index: 1000; /* Ensure dropdown appears above other content */
        min-width: 200px; /* Set a minimum width for the dropdown */
    }

    .nav__item:hover .dropdown-menu {
        display: block; /* Show the dropdown menu on hover */
    }

    .dropdown-menu li {
        padding: 10px; /* Adjust padding for dropdown items */
    }

    .dropdown-menu li a {
        text-decoration: none; /* Remove underline from links */
        color: black; /* Set link color */
        display: block; /* Make links block elements */
    }

    .dropdown-menu li a:hover {
        background-color: #ddd; /* Highlight on hover */
    }

    .text-center {
    text-align: center;
    }

    .center-image {
    display: block;
    margin-left: auto;
    margin-right: auto;
    }
    
    .member {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .member:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2), 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .large-text {
    font-size: 20px; /* Atur ukuran font sesuai kebutuhan Anda */
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

    <!-- ========================
       page title 
    =========================== -->
    <section class="page-title page-title-layout1 bg-overlay bg-overlay-2 bg-parallax text-center">
      <div class="bg-img"><img src="../../assets_guests/images/logo/korwil1.jpg" alt="background"></div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
            <h1 class="pagetitle__heading mb-0">Korwil</h1>
          </div>
          </div><!-- /.col-xl-6 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.page-title -->

    <section class="features-layout2 pt-80 pb-5">
    <div class="container text-center"> <!-- Tambahkan 'text-center' -->
        <div class="row">
        <div class="col-lg-12">
            <img src="../../assets_guests/images/logo/logo-profil.png" alt="Logo Profil" class="center-image">
        </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
    </section><!-- /.Features Layout 2 -->

    <!-- ======================
    Features Layout 2
    ========================= -->
    <section class="features-layout2 pt-80">
    <div class="container">
    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-1">
    </div>
      <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="member">
                      <div class="member__img">
                          <img src="../../assets_guests/images/ftim/ucup-tim.jpg" alt="member img">
                      </div>
                      <div class="member__info d-flex align-items-center justify-content-between">
                          <div>
                              <h5 class="member__name">M Yusuf Budiman</h5>
                              <p class="member__desc">System & Data Analyst </p>
                          </div>
                          <ul class="social-icons list-unstyled mb-0">
                              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                          </ul>
                      </div>
            </div>
      </div><!-- /col-lg-4 -->
      <div class="col-sm-12 col-md-12 col-lg-1">
            </div>
      <div class="col-sm-12 col-md-12 col-lg-6 ml-10">
        <h1 class="heading__title">KORWIL 1</h1>
        <p class="heading__desc mb-5 mt-60 large-text">
          1. Universitas Sumatera Utara  <br>
          2. UIN Sumatera Utara  <br>
          3. Universitas Andalas  <br>
          4. Universitas Jambi  <br>
          5. UIN Raden Fattah  <br>
          6. UIN Raden Intan  <br>
          7. Universitas Bangka Belitung  <br>
          8. Universitas Muhammadiyah Sumatera Barat <br>
          9. UIN Jambi
      </p>
      </div><!-- /col-lg-8 -->
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
                <span class="color-gray">&copy; 2024 Himapol, All Rights Reserved</span>
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
