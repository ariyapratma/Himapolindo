<?php
session_start();

// Konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$db = "himapolindo";

// Menghubungkan ke database
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection error: " . mysqli_connect_error());
}

// Memeriksa sesi pengguna
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    // Query untuk mendapatkan role berdasarkan username
    $sql = "SELECT role FROM login WHERE username='$username'";
    $result = mysqli_query($data, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $role = $row["role"];
    } else {
        echo "Query error: " . mysqli_error($data);
    }
} else {
    header("Location: login.php");
    exit();
}

mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Himapolindo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets_dashboard/images/logoprofil.png">

    <!-- App css -->
    <link href="../../assets_dashboard/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets_dashboard/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../../assets_dashboard/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="../../assets_dashboard/images/users/avatar-3.jpg" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1"><?php echo htmlspecialchars($username); ?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Profile</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="logout.php">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">
                <br>
                <div class="navbar-brand-box">
                    <a href="admin.php" class="logo">
                        <img src="../../assets_dashboard/images/logoprofil.png" />
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="admin.php" class="waves-effect"><i class='bx bx-home-smile'></i><span class="badge badge-pill badge-primary float-right"></span><span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Ravelnas</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_ravelnas.php">Lihat Ravelnas</a></li>
                                <li><a href="tambah_ravelnas.php">Tambah Ravelnas</a></li>
                                <li><a href="komentar_ravelnas.php">Komentar Ravelnas Himapolindo</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Kongres Himapolindo</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_kongres.php">Lihat Kongres</a></li>
                                <li><a href="tambah_kongres.php">Tambah Kongres</a></li>
                                <li><a href="komentar_kongres.php">Komentar Kongres Himapolindo</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Dies Natalis</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_dies_natalis.php">Lihat Dies Natalis</a></li>
                                <li><a href="tambah_dies_natalis.php">Tambah Dies Natalis</a></li>
                                <li><a href="komentar_dies_natalis.php">Komentar Dies Natalis</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Rakernas</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_rakernas.php">Lihat Rakernas</a></li>
                                <li><a href="tambah_rakernas.php">Tambah Rakernas</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Catatan Intelektual</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_catatan.php">Lihat Catatan Intelektual</a></li>
                                <li><a href="tambah_catatan.php">Tambah Catatan Intelektual</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Artikel</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_artikel.php">Lihat Artikel</a></li>
                                <li><a href="tambah_artikel.php">Tambah Artikel</a></li>
                                <li><a href="komentar_artikel.php">Komentar Artikel Himapolindo</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Galeri</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_galeri.php">Lihat Galeri</a></li>
                                <li><a href="tambah_galeri.php">Tambah Galeri</a></li>
                                <li><a href="komentar_galeri.php">Komentar Galeri Himapolindo</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Selamat datang, <?php echo htmlspecialchars($role); ?>!</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="../guests/index.php" class="waves-effect"><i class="fas fa-home"></i><span> Halaman Utama</span></a></li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2024 © Himapolindo.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Himapolindo
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>

    <!-- jQuery  -->
    <script src="../../assets_dashboard/js/jquery.min.js"></script>
    <script src="../../assets_dashboard/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets_dashboard/js/metismenu.min.js"></script>
    <script src="../../assets_dashboard/js/waves.js"></script>
    <script src="../../assets_dashboard/js/simplebar.min.js"></script>

    <!-- Morris Js-->
    <script src="../../plugins/morris-js/morris.min.js"></script>
    <!-- Raphael Js-->
    <script src="../../plugins/raphael/raphael.min.js"></script>

    <!-- Morris Custom Js-->
    <script src="../../assets_dashboard/pages/dashboard-demo.js"></script>

    <!-- App js -->
    <script src="../../assets_dashboard/js/theme.js"></script>

</body>

</html>