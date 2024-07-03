<?php
include '../../function/config.php'; // Sesuaikan path sesuai dengan struktur file Anda

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id_rakernas = isset($_POST['id_rakernas']) ? $_POST['id_rakernas'] : null;
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : null;
    $komentar = isset($_POST['komentar']) ? htmlspecialchars($_POST['komentar']) : null;

    // Validate id_rakernas
    if (!$id_rakernas) {
        die("Error: id_rakernas tidak boleh kosong.");
    }

    // Insert into database
    $query = "INSERT INTO komentar_rakernas (id_rakernas, nama, komentar) 
              VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $id_rakernas, $nama, $komentar);
    mysqli_stmt_execute($stmt);

    // Redirect back to the Rakernas detail page after submission
    header("Location: detailbacaanrakernas.php?id=" . $id_rakernas);
    exit();
}

mysqli_close($conn);
