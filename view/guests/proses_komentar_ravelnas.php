<?php
include '../../function/config.php'; // Sesuaikan path sesuai dengan struktur file Anda

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id_ravelnas = isset($_POST['id_ravelnas']) ? $_POST['id_ravelnas'] : null;
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : null;
    $komentar = isset($_POST['komentar']) ? htmlspecialchars($_POST['komentar']) : null;

    // Validate id_ravelnas
    if (!$id_ravelnas) {
        die("Error: id_ravelnas tidak boleh kosong.");
    }

    // Insert into database
    $query = "INSERT INTO komentar_ravelnas (id_ravelnas, nama, komentar) 
              VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $id_ravelnas, $nama, $komentar);
    mysqli_stmt_execute($stmt);

    // Redirect back to the Ravelnas detail page after submission
    header("Location: detailbacaanravelnas.php?id=" . $id_ravelnas);
    exit();
}

mysqli_close($conn);
