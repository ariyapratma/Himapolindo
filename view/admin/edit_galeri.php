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
include '../../function/config.php';

$id_galeri = $_GET['id'];
$judul_galeri = "";
$deskripsi = "";
$thumbnail_galeri = "";
$update_success = false;

// Proses ambil data Galeri Himapolindo dari database
$sql = "SELECT * FROM galeri WHERE id_galeri = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_galeri);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $judul_galeri = $row['judul_galeri'];
    $deskripsi = strip_tags($row['konten_galeri']);
    $thumbnail_galeri = $row['thumbnail_galeri'];
} else {
    $_SESSION['flash_message'] = "Data tidak ditemukan.";
    $_SESSION['flash_type'] = "error";
    header("Location: lihat_galeri.php");
    exit();
}

// Proses update data Galeri Himapolindo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul_galeri = $_POST['judul_galeri'];
    $deskripsi = $_POST['deskripsi'];

    // Proses file upload thumbnail jika ada perubahan
    if ($_FILES["userfile"]["size"][0] > 0) {
        $target_dir = "../../assets_dashboard/images/uploads/thumbnail_galeri/";
        $target_file = $target_dir . basename($_FILES["userfile"]["name"][0]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek apakah file adalah gambar asli atau tidak untuk thumbnail
        $check = getimagesize($_FILES["userfile"]["tmp_name"][0]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $_SESSION['flash_message'] = "File bukan gambar.";
            $_SESSION['flash_type'] = "error";
            $uploadOk = 0;
        }

        // Cek ukuran file gambarnya
        if ($_FILES["userfile"]["size"][0] > 5000000) {
            $_SESSION['flash_message'] = "File terlalu besar.";
            $_SESSION['flash_type'] = "error";
            $uploadOk = 0;
        }

        // Izinkan format file tertentu untuk thumbnail
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['flash_message'] = "Hanya format JPG, JPEG, dan PNG yang diperbolehkan.";
            $_SESSION['flash_type'] = "error";
            $uploadOk = 0;
        }

        // Cek jika $uploadOk bernilai 0 karena kesalahan
        if ($uploadOk == 0) {
            header("Location: edit_galeri.php?id=$id_galeri");
            exit();
        } else {
            if (move_uploaded_file($_FILES["userfile"]["tmp_name"][0], $target_file)) {
                // Update data dengan thumbnail baru
                $sql_update = "UPDATE galeri SET judul_galeri = ?, thumbnail_galeri = ?, konten_galeri = ? WHERE id_galeri = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("sssi", $judul_galeri, $target_file, $deskripsi, $id_galeri);
            } else {
                $_SESSION['flash_message'] = "Terjadi kesalahan saat mengupload file.";
                $_SESSION['flash_type'] = "error";
                header("Location: edit_galeri.php?id=$id_galeri");
                exit();
            }
        }
    } else {
        // Update data tanpa mengubah thumbnail
        $sql_update = "UPDATE galeri SET judul_galeri = ?, konten_galeri = ? WHERE id_galeri = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssi", $judul_galeri, $deskripsi, $id_galeri);
    }

    // Eksekusi query update
    if ($stmt_update->execute()) {
        $_SESSION['flash_message'] = "Data Berhasil Diupdate!";
        $_SESSION['flash_type'] = "success";
    } else {
        $_SESSION['flash_message'] = "Error: " . $stmt_update->error;
        $_SESSION['flash_type'] = "error";
    }
    header("Location: edit_galeri.php?id=$id_galeri");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Galeri | Himapolindo</title>
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

    <style>
        #editor-container {
            height: 300px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
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

        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <br>
                <div class="navbar-brand-box">
                    <a href="admin.php" class="logo">
                        <img src="../../assets_dashboard/images/logoprofil.png" />
                    </a>
                </div>
                <div id="sidebar-menu">
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
            </div>
        </div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Edit Galeri</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="lihat_galeri.php">Lihat Galeri</a></li>
                                        <li class="breadcrumb-item active">Edit Galeri</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="edit_galeri.php?id=<?php echo $id_galeri; ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="judul_galeri">Judul Galeri</label>
                                            <input type="text" class="form-control" id="judul_galeri" name="judul_galeri" value="<?php echo htmlspecialchars($judul_galeri); ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <div id="editor-container"><?php echo htmlspecialchars($deskripsi); ?></div>
                                            <textarea name="deskripsi" id="deskripsi" style="display: none;"><?php echo htmlspecialchars($deskripsi); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="thumbnail_galeri">Thumbnail</label>
                                            <input type="file" class="form-control" id="userfile" name="userfile[]">
                                            <?php if ($thumbnail_galeri) : ?>
                                                <img src="<?php echo $thumbnail_galeri; ?>" alt="Thumbnail" class="img-thumbnail mt-2" style="width: 150px;">
                                            <?php endif; ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="lihat_galeri.php" class="btn btn-secondary">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    © <script>
                                        document.write(new Date().getFullYear())
                                    </script> © Himapolindo.
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
            <div class="rightbar-overlay"></div>

            <script src="../../assets_dashboard/js/jquery.min.js"></script>
            <script src="../../assets_dashboard/js/bootstrap.bundle.min.js"></script>
            <script src="../../assets_dashboard/js/metisMenu.min.js"></script>
            <script src="../../assets_dashboard/js/simplebar.min.js"></script>
            <script src="../../assets_dashboard/js/waves.min.js"></script>

            <!-- SweetAlert JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

            <!-- Quill JS -->
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <script>
                // Initialize Quill editor
                var quill = new Quill('#editor-container', {
                    theme: 'snow'
                });

                // Sync Quill editor content to hidden textarea
                quill.on('text-change', function() {
                    document.querySelector('textarea[name=deskripsi]').value = quill.root.innerHTML;
                });

                // Show SweetAlert flash messages
                <?php if (isset($_SESSION['flash_message'])) : ?>
                    var flashMessage = "<?php echo $_SESSION['flash_message']; ?>";
                    var flashType = "<?php echo $_SESSION['flash_type']; ?>";
                    swal({
                        title: flashType === 'success' ? 'Success' : 'Error',
                        text: flashMessage,
                        type: flashType,
                        timer: 3000,
                        showConfirmButton: false
                    });
                    <?php unset($_SESSION['flash_message']); ?>
                    <?php unset($_SESSION['flash_type']); ?>
                <?php endif; ?>
            </script>
</body>

</html>