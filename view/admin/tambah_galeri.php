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

<?php
include '../../function/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = array();
    $judul_galeri = $_POST['judul_galeri'];
    $deskripsi = $_POST['deskripsi'];

    $target_dir = "../../assets_dashboard/images/uploads/thumbnail_galeri/";
    $target_file = $target_dir . basename($_FILES["userfile"]["name"][0]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["userfile"]["tmp_name"][0]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $response['error'] = "File bukan gambar.";
        $uploadOk = 0;
    }

    if ($_FILES["userfile"]["size"][0] > 5000000) {
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
        if (move_uploaded_file($_FILES["userfile"]["tmp_name"][0], $target_file)) {
            $sql = "INSERT INTO galeri (judul_galeri, thumbnail_galeri, konten_galeri, tanggal_galeri) VALUES ('$judul_galeri', '$target_file', '$deskripsi', NOW())";

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

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex align-items-left"></div>
                <div class="d-flex align-items-center">
                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="../../assets_dashboard/images/users/avatar-3.jpg" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1"><?php echo htmlspecialchars($role); ?></span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="logout.php">
                                <span>Log Out</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Left Sidebar Start -->
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <br>
                <div class="navbar-brand-box">
                    <a href="admin.php" class="logo">
                        <img src="../../assets_dashboard/images/logoprofil.png" />
                    </a>
                </div>

                <!-- Sidemenu -->
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>
                        <li><a href="admin.php" class="waves-effect"><i class='bx bx-home-smile'></i><span>Dashboard</span></a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Ravelnas</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_ravelnas.php">Lihat Ravelnas</a></li>
                                <li><a href="tambah_ravelnas.php">Tambah Ravelnas</a></li>
                                <li><a href="komentar_ravelnas.php">Komentar Ravelnas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Kongres Himapolindo</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_kongres.php">Lihat Kongres Himapolindo</a></li>
                                <li><a href="tambah_kongres.php">Tambah Kongres Himapolindo</a></li>
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
                                <li><a href="komentar_rakernas.php">Komentar Rakernas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Catatan Intelektual</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_catatan.php">Lihat Catatan Intelektual</a></li>
                                <li><a href="tambah_catatan.php">Tambah Catatan Intelektual</a></li>
                                <li><a href="komentar_catatan.php">Komentar Catatan Intelektual</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Artikel</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_artikel.php">Lihat Artikel</a></li>
                                <li><a href="tambah_artikel.php">Tambah Artikel</a></li>
                                <li><a href="komentar_artikel.php">Komentar Artikel</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="bx bx-file"></i><span>Galeri</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="lihat_galeri.php">Lihat Galeri</a></li>
                                <li><a href="tambah_galeri.php">Tambah Galeri</a></li>
                                <li><a href="komentar_galeri.php">Komentar Galeri</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->
        <div class="main-content" style="margin-left: 250px;">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Tambah Galeri </h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="lihat_galeri.php">Lihat Galeri</a></li>
                                        <li class="breadcrumb-item active">Tambah Galeri</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="galeriForm" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Judul Galeri</label>
                                <textarea class="form-control" name="judul_galeri" rows="3"></textarea>
                                <small class="text-danger" id="judulError"></small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <div id="deskripsi_editor" style="height: 200px;"></div>
                                <input type="hidden" name="deskripsi" id="deskripsi">
                                <small class="text-danger" id="deskripsiError"></small>
                            </div>
                            <div class="form-group">
                                <label>Foto Thumbnail <small class="text-danger">(Format : JPG/PNG, Max. 5mb)</small></label>
                                <input class="form-control" type="file" name="userfile[]">
                                <small class="text-danger"></small>
                            </div>
                            <input type="hidden" name="jenis" value="1">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <a href="lihat_galeri.php" class="btn btn-secondary">Kembali</a>
                </form>
                <div id="responseMessage"></div>
            </div>
        </div>
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
    <script src="../../pluginsmorris-js/morris.min.js"></script>
    <!-- Raphael Js-->
    <script src="../../pluginsraphael/raphael.min.js"></script>

    <!-- Morris Custom Js-->
    <script src="../../assets_dashboard/pages/dashboard-demo.js"></script>

    <!-- App js -->
    <script src="../../assets_dashboard/js/theme.js"></script>

    <!-- SweetAlert JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        $(document).ready(function() {
            var quillDeskripsi = new Quill('#deskripsi_editor', {
                theme: 'snow',
                placeholder: 'Isi deskripsi galeri di sini...'
            });

            $('#galeriForm').on('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(this);
                formData.append('deskripsi', quillDeskripsi.root.innerHTML);

                $.ajax({
                    url: '',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var jsonResponse = JSON.parse(response);

                        if (jsonResponse.success) {
                            swal({
                                title: "Sukses",
                                text: jsonResponse.success,
                                type: "success"
                            }, function() {
                                $('#galeriForm')[0].reset();
                                quillDeskripsi.root.innerHTML = '';
                            });
                        } else {
                            swal("Error", jsonResponse.error, "error");
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>