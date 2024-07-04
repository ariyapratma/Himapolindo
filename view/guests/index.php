<?php
include '../../function/config.php';


// Number of records per page
$records_per_page = 10;

// Current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
  $current_page = (int)$_GET['page'];
} else {
  $current_page = 1;
}

// Calculate the offset for the SQL LIMIT clause
$offset = ($current_page - 1) * $records_per_page;

// Query to count total records for ravelnas
$total_ravelnas_sql = "SELECT COUNT(*) FROM ravelnas";
$total_ravelnas_result = $conn->query($total_ravelnas_sql);
$total_ravelnas = $total_ravelnas_result->fetch_row()[0];

// Query to count total records for kongres
$total_kongres_sql = "SELECT COUNT(*) FROM kongres";
$total_kongres_result = $conn->query($total_kongres_sql);
$total_kongres = $total_kongres_result->fetch_row()[0];

// Query to count total records for diesnatalis
$total_diesnatalis_sql = "SELECT COUNT(*) FROM diesnatalis";
$total_diesnatalis_result = $conn->query($total_diesnatalis_sql);
$total_diesnatalis = $total_diesnatalis_result->fetch_row()[0];

// Query to count total records for rakernas
$total_rakernas_sql = "SELECT COUNT(*) FROM rakernas";
$total_rakernas_result = $conn->query($total_rakernas_sql);
$total_rakernas = $total_rakernas_result->fetch_row()[0];

// Query to count total records for calek
$total_calek_sql = "SELECT COUNT(*) FROM calek";
$total_calek_result = $conn->query($total_calek_sql);
$total_calek = $total_calek_result->fetch_row()[0];

// Query to count total records for artikel
$total_artikel_sql = "SELECT COUNT(*) FROM artikel";
$total_artikel_result = $conn->query($total_artikel_sql);
$total_artikel = $total_artikel_result->fetch_row()[0];

// Query to count total records for galeri
$total_galeri_sql = "SELECT COUNT(*) FROM galeri";
$total_galeri_result = $conn->query($total_galeri_sql);
$total_galeri = $total_galeri_result->fetch_row()[0];

// Total number of records
$total_records = $total_ravelnas + $total_kongres + $total_diesnatalis + $total_rakernas + $total_calek + $total_artikel + $total_galeri;

// Calculate total pages
$total_pages = ceil($total_records / $records_per_page);

// Query to fetch ravelnas records for the current page
$sql_ravelnas = "SELECT * FROM ravelnas LIMIT $records_per_page OFFSET $offset";
$result_ravelnas = $conn->query($sql_ravelnas);

// Query to fetch kongres records for the current page
$sql_kongres = "SELECT * FROM kongres LIMIT $records_per_page OFFSET $offset";
$result_kongres = $conn->query($sql_kongres);

// Query to fetch diesnatalis records for the current page
$sql_diesnatalis = "SELECT * FROM diesnatalis LIMIT $records_per_page OFFSET $offset";
$result_diesnatalis = $conn->query($sql_diesnatalis);

// Query to fetch rakernas records for the current page
$sql_rakernas = "SELECT * FROM rakernas LIMIT $records_per_page OFFSET $offset";
$result_rakernas = $conn->query($sql_rakernas);

// Query to fetch calek records for the current page
$sql_calek = "SELECT * FROM calek LIMIT $records_per_page OFFSET $offset";
$result_calek = $conn->query($sql_calek);

// Query to fetch artikel records for the current page
$sql_artikel = "SELECT * FROM artikel LIMIT $records_per_page OFFSET $offset";
$result_artikel = $conn->query($sql_artikel);

// Query to fetch galeri records for the current page
$sql_galeri = "SELECT * FROM galeri LIMIT $records_per_page OFFSET $offset";
$result_galeri = $conn->query($sql_galeri);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Himapolindo">
  <link href="../../assets_guests/images/favicon/logoprofil-remove.png" rel="icon">
  <title>Beranda | Himapolindo</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
  <link rel="stylesheet" href="../../assets_guests/css/libraries.css">
  <link rel="stylesheet" href="../../assets_guests/css/style.css">
  <script src="https://kit.fontawesome.com/17f6f0a605.js" crossorigin="anonymous"></script>
  <script src="../../particles.js-master/particles.js"></script>
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
      margin-right: auto;
      margin-left: 15px;
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

    .card {
      height: 100%;
      border: 2px solid #ddd;
      /* Warna border default */
      transition: border-color 0.3s ease;
      /* Transisi halus untuk perubahan warna border */
    }

    .card:hover {
      border-color: #ae292a;
      /* Warna border saat hover */
    }

    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      /* Ensure enough space for the title */
      height: 100%;
      background-color: #FFFFFF;
      border-top: none;
      /* Remove top border */
      padding: 1rem;
      /* Optional: Add padding if necessary */
    }

    .card-title {
      flex-shrink: 0;
      /* Prevent shrinking */
      margin-bottom: 0.5rem;
      /* Adjust margin as needed */
    }

    .card-text {
      flex-grow: 1;
      /* Allow to grow and take available space */
      margin-bottom: 0;
      /* Optional: to remove bottom margin on card-text element */
    }

    .card-footer {
      margin-top: auto;
      /* Push footer to the bottom */
    }

    .particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #AE292A;
      z-index: 0;
    }

    .slide__body {
      position: relative;
      /* Ensure z-index works properly */
      z-index: 1;
      /* Ensure text is above particles */
    }


    /* ... CSS yang sudah ada ... */
  </style>

  <script>
    particlesJS('particles-js', {
      // Konfigurasi partikel disini
      "particles": {
        "number": {
          "value": 80,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#ffffff"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#000000"
          },
          "polygon": {
            "nb_sides": 5
          }
        },
        "opacity": {
          "value": 0.5,
          "random": false,
          "anim": {
            "enable": false,
            "speed": 1,
            "opacity_min": 0.1,
            "sync": false
          }
        },
        "size": {
          "value": 3,
          "random": true,
          "anim": {
            "enable": false,
            "speed": 40,
            "size_min": 0.1,
            "sync": false
          }
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#ffffff",
          "opacity": 0.4,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 6,
          "direction": "none",
          "random": false,
          "straight": false,
          "out_mode": "out",
          "bounce": false,
          "attract": {
            "enable": false,
            "rotateX": 600,
            "rotateY": 1200
          }
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": true,
            "mode": "repulse"
          },
          "onclick": {
            "enable": true,
            "mode": "push"
          },
          "resize": true
        },
        "modes": {
          "grab": {
            "distance": 400,
            "line_linked": {
              "opacity": 1
            }
          },
          "bubble": {
            "distance": 400,
            "size": 40,
            "duration": 2,
            "opacity": 8,
            "speed": 3
          },
          "repulse": {
            "distance": 200,
            "duration": 0.4
          },
          "push": {
            "particles_nb": 4
          },
          "remove": {
            "particles_nb": 2
          }
        }
      },
      "retina_detect": true
    });
  </script>


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


    <!-- ============================
        Slider
    ============================== -->
    <!-- Slider Section with Particles.js -->
    <section class="slider" style="background-color: #AE292A;">
      <!-- Particles Container -->
      <div id="particles-js" class="particles-js"></div>

      <!-- Slick Carousel -->
      <div class="slick-carousel carousel-arrows-light carousel-dots-light m-slides-0" data-slick='{"slidesToShow": 1, "arrows": true, "dots": true, "speed": 700,"fade": true,"cssEase": "linear"}'>
        <div class="slide-item align-v-h bg-overlay bg-overlay-2">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                <div class="slide__body">
                  <h2 class="slide__title">HIMAPOLINDO</h2>
                  <p class="slide__desc">KABINET SINERGI<br>#BERGERAKBERDAMPAK</p>
                  <div class="d-flex justify-content-center">
                    <a href="aboutus.php" class="btn btn__primary mr-10">
                      <span>About Us</span>
                    </a>
                    <!-- Button to scroll to Latest Update section -->
                    <a href="#latest-update" class="btn btn__secondary ml-10">
                      <span>Latest Update</span>
                    </a>
                  </div>
                </div><!-- /.slide__body -->
              </div><!-- /.col-xl-8 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.slide-item -->
      </div><!-- /.slick-carousel -->
    </section><!-- /.slider -->

    <div class="about-section">
      <div class="container">
        <h1 class="heading__title" style="color:black; text-align: center;">ABOUT US</h1>
        <p class="heading__desc mb-40 mt-40" style="color:black;">Himpunan Mahasiswa Ilmu Politik (HIMAPOL) Indonesia merupakan organisasi yang
          menaungi himpunan mahasiswa jurusan dan atau departemen program studi ilmu politik
          yang setaraf dengan lembaga perguruan dinggi diseluruh wilayah Negara Kesatuan
          Republik Indonesia. </p>
        <a href="aboutus.php" class="btn btn__primary mr-10">
          </i><span>About Us</span>
        </a>
      </div>
    </div>

    <!-- LATEST UPDATE Section -->
    <div id="latest-update" class="container mt-60 mb-50">
      <h1 class="heading__title fz-25" style="text-align: center;">LATEST UPDATE</h1>
      <div class="row">
        <?php
        // Display ravelnas data
        if ($result_ravelnas->num_rows > 0) {
          while ($row = $result_ravelnas->fetch_assoc()) {
            $judul = $row['judul_ravelnas'];
            $deskripsi = $row['konten_ravelnas'];
            $thumbnail = $row['thumbnail_ravelnas'];
            $views = $row['views'];
            $id_ravelnas = $row['id_ravelnas'];
            $tanggal_upload = $row['tanggal_ravelnas'];

            // Format tanggal
            $date = new DateTime($tanggal_upload);
            $formatted_date = $date->format('d-m-Y');

            // Tampilkan card
            echo '
            <div class="col-md-4 mb-4">
              <a href="detailbacaanravelnas.php?id=' . $id_ravelnas . '" class="card-link" onclick="increaseViews(' . $id_ravelnas . ')">
                <div class="card">
                  <img src="' . $thumbnail . '" class="card-img-top" alt="' . $judul . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $judul . '</h5>
                    </div>
                    <div class="card-body card-footer">
                      <p class="card-text">' . $views . ' views</p>
                      <p class="card-text"><small class="text-muted">Tanggal: ' . $formatted_date . '</small></p>
                    </div>
                </div>
              </a>
            </div>';
          }
        }

        // Display kongres data
        if ($result_kongres->num_rows > 0) {
          while ($row = $result_kongres->fetch_assoc()) {
            $judul = $row['judul_kongres'];
            $deskripsi = $row['konten_kongres'];
            $thumbnail = $row['thumbnail_kongres'];
            $views = $row['views'];
            $id_kongres = $row['id_kongres'];
            $tanggal_upload = $row['tanggal_kongres'];

            // Format tanggal
            $date = new DateTime($tanggal_upload);
            $formatted_date = $date->format('d-m-Y');

            // Tampilkan card
            echo '
            <div class="col-md-4 mb-4">
              <a href="detailbacaankongres.php?id=' . $id_kongres . '" class="card-link" onclick="increaseViews(' . $id_kongres . ')">
                <div class="card">
                  <img src="' . $thumbnail . '" class="card-img-top" alt="' . $judul . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $judul . '</h5>
                    </div>
                    <div class="card-body card-footer">
                      <p class="card-text">' . $views . ' views</p>
                      <p class="card-text"><small class="text-muted">Tanggal: ' . $formatted_date . '</small></p>
                    </div>
                </div>
              </a>
            </div>';
          }
        }

        // Display diesnatalis data
        if ($result_diesnatalis->num_rows > 0) {
          while ($row = $result_diesnatalis->fetch_assoc()) {
            $judul = $row['judul_diesnatalis'];
            $deskripsi = $row['konten_diesnatalis'];
            $thumbnail = $row['thumbnail_diesnatalis'];
            $views = $row['views'];
            $id_diesnatalis = $row['id_diesnatalis'];
            $tanggal_upload = $row['tanggal_diesnatalis'];

            // Format tanggal
            $date = new DateTime($tanggal_upload);
            $formatted_date = $date->format('d-m-Y');

            // Tampilkan card
            echo '
            <div class="col-md-4 mb-4">
              <a href="detailbacaandiesnatalis.php?id=' . $id_diesnatalis . '" class="card-link" onclick="increaseViews(' . $id_diesnatalis . ')">
                <div class="card">
                  <img src="' . $thumbnail . '" class="card-img-top" alt="' . $judul . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $judul . '</h5>
                    </div>
                    <div class="card-body card-footer">
                      <p class="card-text">' . $views . ' views</p>
                      <p class="card-text"><small class="text-muted">Tanggal: ' . $formatted_date . '</small></p>
                    </div>
                </div>
              </a>
            </div>';
          }
        }

        // Display rakernas data
        if ($result_rakernas->num_rows > 0) {
          while ($row = $result_rakernas->fetch_assoc()) {
            $judul = $row['judul_rakernas'];
            $deskripsi = $row['konten_rakernas'];
            $thumbnail = $row['thumbnail_rakernas'];
            $views = $row['views'];
            $id_rakernas = $row['id_rakernas'];
            $tanggal_upload = $row['tanggal_rakernas'];

            // Format tanggal
            $date = new DateTime($tanggal_upload);
            $formatted_date = $date->format('d-m-Y');

            // Tampilkan card
            echo '
            <div class="col-md-4 mb-4">
              <a href="detailbacaanrakernas.php?id=' . $id_rakernas . '" class="card-link" onclick="increaseViews(' . $id_rakernas . ')">
                <div class="card">
                  <img src="' . $thumbnail . '" class="card-img-top" alt="' . $judul . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $judul . '</h5>
                    </div>
                    <div class="card-body card-footer">
                      <p class="card-text">' . $views . ' views</p>
                      <p class="card-text"><small class="text-muted">Tanggal: ' . $formatted_date . '</small></p>
                    </div>
                </div>
              </a>
            </div>';
          }
        }

        // Display calek data
        if ($result_calek->num_rows > 0) {
          while ($row = $result_calek->fetch_assoc()) {
            $judul = $row['judul_calek'];
            $deskripsi = $row['konten_calek'];
            $thumbnail = $row['thumbnail_calek'];
            $views = $row['views'];
            $id_calek = $row['id_calek'];
            $tanggal_upload = $row['tanggal_calek'];

            // Format tanggal
            $date = new DateTime($tanggal_upload);
            $formatted_date = $date->format('d-m-Y');

            // Tampilkan card
            echo '
            <div class="col-md-4 mb-4">
              <a href="detailbacaancalek.php?id=' . $id_calek . '" class="card-link" onclick="increaseViews(' . $id_calek . ')">
                <div class="card">
                  <img src="' . $thumbnail . '" class="card-img-top" alt="' . $judul . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $judul . '</h5>
                    </div>
                    <div class="card-body card-footer">
                      <p class="card-text">' . $views . ' views</p>
                      <p class="card-text"><small class="text-muted">Tanggal: ' . $formatted_date . '</small></p>
                    </div>
                </div>
              </a>
            </div>';
          }
        }

        // Display artikel data
        if ($result_artikel->num_rows > 0) {
          while ($row = $result_artikel->fetch_assoc()) {
            $judul = $row['judul_artikel'];
            $deskripsi = $row['konten_artikel'];
            $thumbnail = $row['thumbnail_artikel'];
            $views = $row['views'];
            $id_artikel = $row['id_artikel'];
            $tanggal_upload = $row['tanggal_artikel'];

            // Format tanggal
            $date = new DateTime($tanggal_upload);
            $formatted_date = $date->format('d-m-Y');

            // Tampilkan card
            echo '
            <div class="col-md-4 mb-4">
              <a href="detailbacaanartikel.php?id=' . $id_artikel . '" class="card-link" onclick="increaseViews(' . $id_artikel . ')">
                <div class="card">
                  <img src="' . $thumbnail . '" class="card-img-top" alt="' . $judul . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $judul . '</h5>
                    </div>
                    <div class="card-body card-footer">
                      <p class="card-text">' . $views . ' views</p>
                      <p class="card-text"><small class="text-muted">Tanggal: ' . $formatted_date . '</small></p>
                    </div>
                </div>
              </a>
            </div>';
          }
        }

        // Display galeri data
        if ($result_galeri->num_rows > 0) {
          while ($row = $result_galeri->fetch_assoc()) {
            $judul = $row['judul_galeri'];
            $deskripsi = $row['konten_galeri'];
            $thumbnail = $row['thumbnail_galeri'];
            $views = $row['views'];
            $id_galeri = $row['id_galeri'];
            $tanggal_upload = $row['tanggal_galeri'];

            // Format tanggal
            $date = new DateTime($tanggal_upload);
            $formatted_date = $date->format('d-m-Y');

            // Tampilkan card
            echo '
            <div class="col-md-4 mb-4">
              <a href="detailbacaangaleri.php?id=' . $id_galeri . '" class="card-link" onclick="increaseViews(' . $id_galeri . ')">
                <div class="card">
                  <img src="' . $thumbnail . '" class="card-img-top" alt="' . $judul . '">
                    <div class="card-body">
                      <h5 class="card-title">' . $judul . '</h5>
                    </div>
                    <div class="card-body card-footer">
                      <p class="card-text">' . $views . ' views</p>
                      <p class="card-text"><small class="text-muted">Tanggal: ' . $formatted_date . '</small></p>
                    </div>
                </div>
              </a>
            </div>';
          }
        }

        ?>
      </div>
    </div>


    <!-- Pagination -->
    <div class="row mb-50">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <nav class="pagination-area">
          <ul class="pagination justify-content-center">
            <?php
            // Previous page link
            if ($current_page > 1) {
              echo '<li><a href="?page=' . ($current_page - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
            }

            // Page links
            for ($i = 1; $i <= $total_pages; $i++) {
              if ($i == $current_page) {
                echo '<li><a class="current" href="#">' . $i . '</a></li>';
              } else {
                echo '<li><a href="?page=' . $i . '">' . $i . '</a></li>';
              }
            }

            // Next page link
            if ($current_page < $total_pages) {
              echo '<li><a href="?page=' . ($current_page + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
            }
            ?>
          </ul>
        </nav><!-- /.pagination-area -->
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
  </div>
  <!-- ========================
        Team layout 1
    ========================== -->
  <section id="team" class="team-layout1 pb-30 pt-8">
    <div class="container">
      <h1 class="heading__title fz-25" style="color:white; text-align: center;">PRESIDIUM NASIONAL</h1>
      <div class="row"><br><br>
        <!-- Member #1 -->
        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="member">
            <div class="member__img">
              <img src="../../assets_guests/images/ftim/fawwaz-tim.jpg" alt="member img">
            </div>
            <div class="member__info d-flex align-items-center justify-content-between">
              <div>
                <h5 class="member__name">M Fawwaz Naufal</h5>
                <p class="member__desc">Project Manager</p>
              </div>
              <ul class="social-icons list-unstyled mb-0">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Member #2 -->
        <div class="col-sm-4 col-md-4 col-lg-4">
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
        </div>
        <!-- Member #3 -->
        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="member">
            <div class="member__img">
              <img src="../../assets_guests/images/ftim/haris-tim.jpg" alt="member img">
            </div>
            <div class="member__info d-flex align-items-center justify-content-between">
              <div>
                <h5 class="member__name">Harits Achmad F</h5>
                <p class="member__desc">Full Stack Programmer</p>
              </div>
              <ul class="social-icons list-unstyled mb-0">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="team" class="team-layout1 pb-5 pt-5">
    <div class="container">
      <div class="row">

        <div class="col-sm-2 col-md-2 col-lg-2"></div>
        <!-- Member #4 -->
        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="member">
            <div class="member__img">
              <img src="../../assets_guests/images/ftim/akhdan-tim.jpg" alt="member img">
            </div>
            <div class="member__info d-flex align-items-center justify-content-between">
              <div>
                <h5 class="member__name">Akhdan Ravi A</h5>
                <p class="member__desc">Tester & Front End Developer</p>
              </div>
              <ul class="social-icons list-unstyled mb-0">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <!-- Member #5 -->
        <div class="col-sm-4 col-md-4 col-lg-4">
          <div class="member">
            <div class="member__img">
              <img src="../../assets_guests/images/ftim/pandu-tim.jpg" alt="member img">
            </div>
            <div class="member__info d-flex align-items-center justify-content-between">
              <div>
                <h5 class="member__name">Pandu Wicaksono</h5>
                <p class="member__desc">System & Data Analyst</p>
              </div>
              <ul class="social-icons list-unstyled mb-0">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  <script>
    particlesJS('particles-js', {
      "particles": {
        "number": {
          "value": 80,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#ffffff"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#000000"
          },
          "polygon": {
            "nb_sides": 5
          },
          "image": {
            "src": "img/github.svg",
            "width": 100,
            "height": 100
          }
        },
        "opacity": {
          "value": 0.5,
          "random": false,
          "anim": {
            "enable": false,
            "speed": 1,
            "opacity_min": 0.1,
            "sync": false
          }
        },
        "size": {
          "value": 3,
          "random": true,
          "anim": {
            "enable": false,
            "speed": 40,
            "size_min": 0.1,
            "sync": false
          }
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#ffffff",
          "opacity": 0.4,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 6,
          "direction": "none",
          "random": false,
          "straight": false,
          "out_mode": "out",
          "bounce": false,
          "attract": {
            "enable": false,
            "rotateX": 600,
            "rotateY": 1200
          }
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": true,
            "mode": "repulse" // Mengubah mode onhover menjadi repulse
          },
          "onclick": {
            "enable": true,
            "mode": "push"
          },
          "resize": true
        },
        "modes": {
          "grab": {
            "distance": 140,
            "line_linked": {
              "opacity": 1
            }
          },
          "bubble": {
            "distance": 400,
            "size": 40,
            "duration": 2,
            "opacity": 8,
            "speed": 3
          },
          "repulse": {
            "distance": 200,
            "duration": 0.4
          },
          "push": {
            "particles_nb": 4
          },
          "remove": {
            "particles_nb": 2
          }
        }
      },
      "retina_detect": true
    });
  </script>





</body>

</html>