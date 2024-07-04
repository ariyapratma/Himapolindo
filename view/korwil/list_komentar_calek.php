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
    <title>List Komentar</title>
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

    <!-- SweetAlert css -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        .comment-content {
            max-width: 300px;
            overflow-wrap: break-word;
        }
    </style>

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
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="logout.php">
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
                            <a href="dashboard_korwil.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="fas fa-box-open"></i><span>Catatan Intelektual</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="add_calek.php">Menambah Catatan Intelektual</a></li>
                                <li><a href="list_calek.php">Lihat Catatan Intelektual</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="list_komentar_calek.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Komentar</span></a>
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
                                <h4 class="mb-0 font-size-18">Komentar Catatan Intelektual</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="lihat_catatan.php">Lihat Catatan Intelektual</a></li>
                                        <li class="breadcrumb-item active">Komentar Catatan Intelektual</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div style="overflow-x : scroll;">
                    <table class="table table-hover tablesorter" id="myTableUtama">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Catatan Intelektual</th>
                                <th>Nama Pengguna</th>
                                <th>Komentar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php
                            include '../../function/config.php'; // Pastikan ini berisi konfigurasi database dengan variabel $conn

                            // Periksa apakah sesi username telah diset
                            if (isset($_SESSION["username"])) {
                                $username = $_SESSION["username"];

                                // Query untuk mendapatkan id_login dari tabel login berdasarkan username
                                $query_id_login = "SELECT id_login FROM login WHERE username='$username'";
                                $result_id_login = $conn->query($query_id_login);

                                if ($result_id_login->num_rows > 0) {
                                    $row_id_login = $result_id_login->fetch_assoc();
                                    $id_login = $row_id_login['id_login'];

                                    // Query untuk mengambil data komentar dari calek himapolindo beserta informasi calek himapolindo yang berkaitan
                                    $sql = "SELECT k.id_komentar, d.judul_calek, k.nama, k.komentar 
                        FROM komentar_calek k 
                        JOIN calek d ON k.id_calek = d.id_calek 
                        WHERE d.id_login = '$id_login'";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . $row['judul_calek'] . "</td>";
                                            echo "<td>" . $row['nama'] . "</td>";
                                            echo "<td class='comment-content'>" . $row['komentar'] . "</td>";
                                            echo "<td><a href='javascript:void(0);' onclick='confirmDelete(" . $row['id_komentar'] . ")' class='btn btn-danger btn-sm'>Hapus</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>Tidak ada komentar untuk Calek Himapolindo Anda.</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada data sesuai dengan akun Anda.</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Session username tidak tersedia.</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>

                </div>

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
            <!-- end container-fluid -->
        </div>
        <!-- end page-content -->
    </div>
    <!-- end main-content -->

    </div>
    <!-- end layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>

    <!-- jQuery  -->
    <script src="../../assets_dashboard/js/jquery.min.js"></script>
    <script src="../../assets_dashboard/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets_dashboard/js/metismenu.min.js"></script>
    <script src="../../assets_dashboard/js/waves.js"></script>
    <script src="../../assets_dashboard/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="../../assets_dashboard/js/theme.js"></script>

    <!-- SweetAlert js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'hapus_komentar_catatan.php?id=' + id;
                }
            })
        }
    </script>
</body>

</html>