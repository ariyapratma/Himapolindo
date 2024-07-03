<?php
// session_start();
// include "h00_konfigKoneksiProduk.php";

// // Periksa tipe pengguna yang sudah login
// $tipe_pengguna = isset($_SESSION['usertype']) ? $_SESSION['usertype'] : '';

// // Fungsi untuk mengecek apakah pengguna sudah login atau belum
// function isUserLoggedIn()
// {
//   return isset($_SESSION['username']);
// }

include '../../function/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

$query = "SELECT *, DATE_FORMAT(tanggal_rakernas, '%d %M %Y') AS tanggal_upload FROM rakernas WHERE id_rakernas = $id";
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi dan hasilnya lebih dari 0 baris
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Ambil data yang diperlukan
    $judul = htmlspecialchars($row['judul_rakernas']); // Menggunakan htmlspecialchars untuk mencegah XSS
    $deskripsi = htmlspecialchars($row['konten_rakernas']);
    $thumbnail = htmlspecialchars($row['thumbnail_rakernas']);
    $tanggal_upload = htmlspecialchars($row['tanggal_upload']); // Tambahkan tanggal upload di sini
} else {
    // Tampilkan pesan jika tidak ada data atau ID tidak valid
    $judul = "Data Rakernas Himapolindo tidak ditemukan.";
    $deskripsi = "";
    $thumbnail = ""; // Atau berikan nilai default sesuai kebutuhan
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Himapolindo">
    <link href="../../assets_guests/images/favicon/logoprofil-remove.png" rel="icon">
    <title>Himapolindo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,500,600,700%7cRoboto:400,500,700&display=swap">
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

            /* Custom styles for the features layout */
            .features-layout2 .col-lg-4,
            .features-layout2 .col-lg-8 {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .features-layout2 .col-lg-8 {
                margin-top: 20px;
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
        }

        .dropdown-menu li a:hover {
            background-color: #ddd;
            /* Highlight on hover */
        }

        .comment-section {
            max-width: 800px;
            margin: 0 auto;
            /* Untuk membuat div berada di tengah halaman */
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .comment-form {
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .comment-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            letter-spacing: 2px;
        }

        .comment-form input,
        .comment-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .comment-form input:focus,
        .comment-form textarea:focus {
            outline: none;
            border-color: #007BFF;
        }

        .comment-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ae292a;
            ;
            color: white;
            border: none;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        .comment-form button:hover {
            background-color: #FF3A3A;
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
                        <img src="../../assets_guests/images/logo/logo-profil.png" class="logo" alt="logo" width="50" height="40">
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

                    <ul class="navbar-actions d-none d-xl-flex align-items-center list-unstyled mb-0">
                        <?php
                        // if (isUserLoggedIn()) {
                        //   // Jika pengguna sudah login, tampilkan tombol sesuai dengan tipe pengguna
                        //   if ($tipe_pengguna === 'administrator') {
                        //     echo '<li><a href="dashboard-vendor.php" class="btn btn__primary"><span>DASHBOARD</span></a></li>';
                        //   } elseif ($tipe_pengguna === 'partner') {
                        //     echo '<li><a href="dashboard_partner.php" class="btn btn__primary"><span>DASHBOARD</span></a></li>';
                        //   } elseif ($tipe_pengguna === 'user') {
                        //     echo '<li><a href="dashboard-user.php" class="btn btn__primary"><span>DASHBOARD</span></a></li>';
                        //   } else {
                        //     echo '<li><a href="dashboard-user.php" class="btn btn__primary"><span>' . $tipe_pengguna . '</span></a></li>';
                        //   }
                        // } else {
                        //   // Jika pengguna belum login, tampilkan tombol login
                        //   echo '<li><a href="login.php" class="btn btn__primary"><span>MASUK</span></a></li>';
                        // }
                        ?>
                    </ul><!-- /.navbar-actions -->
                </div><!-- /.container -->
            </nav><!-- /.navbar -->
        </header><!-- /.Header -->

        <!-- ======================
    Features Layout 2
    ========================= -->


        <div class="about-section pb-40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h2><?php echo $judul; ?></h2>
                        <p><?php echo $tanggal_upload; ?></p>
                        <img src="<?php echo $thumbnail; ?>" alt="<?php echo $judul; ?>" class="img-fluid" style="max-width: 300px;">
                        <div class="quill-content">
                            <?php echo htmlspecialchars_decode($deskripsi); ?>
                        </div>
                    </div><!-- /.col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.about-section -->



        <div class="comment-section pb-40">
            <h2>KOMENTAR</h2>
            <?php
            // Query untuk mengambil komentar dari database berdasarkan id_rakernas
            $query_komentar = "SELECT * FROM komentar_rakernas WHERE id_rakernas = ?";
            $stmt_komentar = mysqli_prepare($conn, $query_komentar);
            mysqli_stmt_bind_param($stmt_komentar, "i", $id);
            mysqli_stmt_execute($stmt_komentar);
            $result_komentar = mysqli_stmt_get_result($stmt_komentar);

            if (mysqli_num_rows($result_komentar) > 0) {
                while ($row_komentar = mysqli_fetch_assoc($result_komentar)) {
                    $nama_komentar = htmlspecialchars($row_komentar['nama']);
                    $komentar = htmlspecialchars($row_komentar['komentar']);
                    $tanggal_komentar = date('d M Y H:i', strtotime($row_komentar['tanggal_komentar']));

                    echo '
                        <div class="comment">
                            <p><strong>' . $nama_komentar . '</strong> - ' . $tanggal_komentar . '</p>
                            <p>' . $komentar . '</p>
                        </div>';
                }
            } else {
                echo '<p>Belum ada komentar untuk halaman ini.</p>';
            }

            mysqli_stmt_close($stmt_komentar);
            ?>
        </div><!-- /.comment-section -->

        <center>
            <div class="comment-section pb-40">
                <form class="comment-form" method="POST" action="proses_komentar_rakernas.php">
                    <h2> KOMENTAR</h2>
                    <input type="hidden" name="id_rakernas" value="<?php echo $id; ?>">
                    <input type="text" name="nama" placeholder="Nama *" required>
                    <textarea name="komentar" rows="5" placeholder="Komentar *" required></textarea>
                    <button type="submit" name="submit">Kirim</button>
                </form>
            </div>
        </center>

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