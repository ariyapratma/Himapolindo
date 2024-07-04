<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "himapolindo";

$conn = mysqli_connect($host, $user, $password, $db);
if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}

$response = [];

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    // Query to get role and id_login based on username
    $sql = "SELECT role, id_login FROM login WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $role = $row["role"];
        $id_login = $row["id_login"];
    } else {
        $response['error'] = "Query error: " . mysqli_error($conn);
    }
} else {
    header("location: login.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_calek = date('Y-m-d'); // Tanggal saat ini

    $target_dir = "../../assets_dashboard/images/uploads/thumbnail_calek/";
    $target_file = $target_dir . basename($_FILES["foto_produk"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["foto_produk"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $response['error'] = "File bukan gambar.";
        $uploadOk = 0;
    }

    if ($_FILES["foto_produk"]["size"] > 5000000) {
        $response['error'] = "File terlalu besar.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $response['error'] = "Hanya format JPG, JPEG, dan PNG yang diperbolehkan.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        $response['error'] = "File tidak terupload.";
    } else {
        if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
            // Query INSERT disini
            $sql = "INSERT INTO calek (judul_calek, thumbnail_calek, konten_calek, tanggal_calek, id_login) VALUES ('$judul', '$target_file', '$deskripsi', '$tanggal_calek', '$id_login')";

            if ($conn->query($sql) === TRUE) {
                $response['success'] = "Data berhasil ditambahkan!";
            } else {
                $response['error'] = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $response['error'] = "Terjadi kesalahan saat mengupload file.";
        }
    }

    echo json_encode($response);
    exit;
}

mysqli_close($conn);
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

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

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
                            <a href="dashboard_korwil.php" class="waves-effect">
                                <i class='bx bx-home-smile'></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-box-open"></i>
                                <span>Catatan Intelektual</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="tambah_catatan.php">Menambah Catatan Intelektual</a></li>
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
                                        <li class="breadcrumb-item"><a href="lihat_catatan.php">Catatan Intelektual</a></li>
                                        <li class="breadcrumb-item active">Menambahkan Catatan Intelektual</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- form buat insert produk, nanti dikirim ke tujuan -->
                    <form action="add_calek.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul" required>
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Korwil</label>
                                    <input type="text" class="form-control" id="korwil" name="korwil" value="<?php echo htmlspecialchars($username); ?>" readonly>
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
                        <a href="lihat_catatan.php" class="btn btn-sm btn-danger">Batal</a>
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

    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

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

        // Handle form submission with SweetAlert notification
        $('form').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            var form = $(this);
            var formData = new FormData(form[0]);

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        swal({
                            title: "Sukses!",
                            text: response.success,
                            type: "success"
                        }).then(function() {
                            window.location.href = "list_calek.php"; // Redirect to another page
                        });
                    } else {
                        swal({
                            title: "Oops!",
                            text: response.error,
                            type: "error"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    swal({
                        title: "Oops!",
                        text: "Terjadi kesalahan saat memproses data.",
                        type: "error"
                    });
                }
            });
        });
    </script>
</body>

</html>