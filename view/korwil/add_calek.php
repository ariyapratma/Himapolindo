<?php
session_start();

// Assuming the session has been set with the correct korwil during login
$korwil = $_SESSION["username"]; // This will be something like 'korwil1', 'korwil2', etc.
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <link href="assets_guests/images/favicon/logo-profil.png" rel="icon">
    <title>Menambah Catatan Intelektual</title>
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

    <!-- Summernote css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
</head>

<script>
    function confirmDelete() {
        if (confirm("Apakah Anda yakin ingin menghapus akun?")) {
            window.location.href = "hapus_akun_user_partner.php";
        } else {
            return false;
        }
    }
</script>

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
                            <span class="d-none d-sm-inline-block ml-1">Nama Lengkap</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="akun.php">
                                <span>Profil</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Keluar</span>
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
                    <a href="dashboard_korwil.php" class="logo">
                        <img src="../../assets_dashboard/images/logoprofil.png" />
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="dashboard_korwil.php" class="waves-effect">
                                <i class='bx bx-home-smile'></i>
                                <span>Dasbor</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-box-open"></i>
                                <span>Catatan Intelektual</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="add_calek.php">Menambah Catatan Intelektual</a></li>
                                <li><a href="list_calek.php">Lihat Catatan Intelektual</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="list_komentar_calek.php" class="waves-effect">
                                <i class='bx bx-home-smile'></i>
                                <span>Komentar</span>
                            </a>
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
                                <h4 class="mb-0 font-size-18">Menambahkan Catatan Intelektual</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="list_calek.php">Catatan Intelektual</a></li>
                                        <li class="breadcrumb-item active">Menambahkan Catatan Intelektual</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- form buat insert produk, nanti dikirim ke tujuan -->
                    <form action="h02_aksiSimpanInsertProduk.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" id="nama_Produk" placeholder="Masukkan Judul" name="nama_Produk" required>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Korwil</label>
                                    <input type="text" class="form-control" id="korwil" name="korwil" value="<?php echo $korwil; ?>" readonly>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Isi Konten</label>
                                    <textarea class="form-control" id="deskripsi" placeholder="Deskripsikan produk anda..." name="deskripsi" required></textarea>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="foto_produk">Thumbnail</label>
                                    <input type="file" name="foto_produk" id="foto_produk" class="form-control" required>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                            <input type="hidden" name="jenis" value="1">
                        </div>

                        <!-- buat dikirim ke database buat aksi selanjutnya -->
                        <button type="submit" class="btn btn-sm btn-success">Simpan!</button>
                        <a href="list_calek.php" class="btn btn-sm btn-danger">Batal</a>
                    </form>
                </div>
            </div>
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

    <!-- Summernote js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- Morris Js-->
    <script src="../../plugins/morris-js/morris.min.js"></script>
    <!-- Raphael Js-->
    <script src="../../plugins/raphael/raphael.min.js"></script>

    <!-- Morris Custom Js-->
    <script src="../../assets_dashboard/pages/dashboard-demo.js"></script>

    <!-- App js -->
    <script src="../../assets_dashboard/js/theme.js"></script>

    <!-- Inisialisasi Summernote -->
    <script>
        $(document).ready(function() {
            $('#deskripsi').summernote({
                height: 300, // Set editor height
                minHeight: null, // Set minimum height of editor
                maxHeight: null, // Set maximum height of editor
                focus: true // Set focus to editable area after initializing summernote
            });
        });
    </script>
</body>

</html>