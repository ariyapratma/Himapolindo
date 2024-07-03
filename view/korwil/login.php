<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "himapolindo";

// Fungsi untuk membuat CSRF token
function generate_csrf_token()
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

// Fungsi untuk memverifikasi CSRF token
function verify_csrf_token($token)
{
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Fungsi untuk mengatur kadaluwarsa sesi
function check_session_expiry()
{
    $inactive = 600; // 10 menit dalam detik

    if (isset($_SESSION['loggedin']) && (time() - $_SESSION['loggedin'] > $inactive)) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    }

    $_SESSION['loggedin'] = time();
}

// Menghubungkan ke database
$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection error: " . mysqli_connect_error());
}

// Generate CSRF token
generate_csrf_token();

// Memeriksa sesi kadaluwarsa
check_session_expiry();

// Menangani permintaan login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = ['status' => 'error', 'message' => 'Unknown error'];

    if (!verify_csrf_token($_POST['csrf_token'])) {
        $response = ['status' => 'error', 'message' => 'Invalid CSRF token'];
    } else {
        $email = mysqli_real_escape_string($data, $_POST["email"]);
        $password = mysqli_real_escape_string($data, $_POST["password"]);

        $sql = "SELECT * FROM login WHERE email='$email'";
        $result = mysqli_query($data, $sql);

        if ($result) {
            $row = mysqli_fetch_array($result);
            if ($row && $password == $row["password"]) { // Sesuaikan pengecekan password dengan yang ada di database
                $_SESSION["email"] = $row["email"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $row["role"];
                $_SESSION["loggedin"] = time(); // waktu login

                $response = ['status' => 'success', 'message' => 'Login berhasil', 'username' => $row["username"], 'role' => $row["role"]];
            } else {
                $response = ['status' => 'error', 'message' => 'Email atau password salah'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Query error: ' . mysqli_error($data)];
        }
    }

    echo json_encode($response);
    exit();
}

// Periksa flag logout
$logout_success = isset($_SESSION['logout_success']);
if ($logout_success) {
    unset($_SESSION['logout_success']);
}

$logout_success_korwil = isset($_SESSION['logout_success_korwil']);
if ($logout_success_korwil) {
    unset($_SESSION['logout_success_korwil']);
}

mysqli_close($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login">
    <link href="../../assets_dashboard/images/logoprofil.png" rel="icon">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../assets_guests/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets_guests/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets_guests/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="../../assets_guests/css/iofrm-theme2.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="index.php">
                <div class="logo">
                    <img class="logo-size" src="assets_guests/images/gallery/sea.jpg" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg">
                    <img src="../../assets_guests/images/backgrounds/admin2.png" style="width: 100%;">
                </div>
                <div class="info-holder"></div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <a href="index.php">
                            <img src="../../assets_dashboard/images/logoprofil.png" style="width: 150px;">
                        </a>
                        <div class="page-links">
                            <a href="admin.php" class="active">Masuk</a>
                        </div>
                        <form id="loginForm" action="#" method="POST">
                            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                            <input class="form-control" type="text" name="email" placeholder="Alamat E-mail" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <input type="checkbox" id="chk1" name="remember"><label for="chk1">Ingat Saya</label>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Login</button> <a href="forget.php">Lupa Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault(); // Mencegah pengiriman form default

                var formData = new FormData(this);

                fetch('', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Anda Berhasil Login Sebagai: ' + data.username,
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false
                            }).then(() => {
                                if (data.role === 'admin') {
                                    window.location.href = 'admin.php';
                                } else if (data.role.startsWith('korwil')) {
                                    window.location.href = 'dashboard_korwil.php';
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: data.message,
                                icon: 'error'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });

            <?php if ($logout_success) : ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Anda Berhasil Keluar',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                });
            <?php endif; ?>

            <?php if ($logout_success_korwil) : ?>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Anda Berhasil Keluar',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: false
                });
            <?php endif; ?>
        </script>
    </div>
</body>

</html>