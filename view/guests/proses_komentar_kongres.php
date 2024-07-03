<?php
include '../../function/config.php'; // Sesuaikan path sesuai dengan struktur file Anda

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id_kongres = isset($_POST['id_kongres']) ? $_POST['id_kongres'] : null;
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : null;
    $komentar = isset($_POST['komentar']) ? htmlspecialchars($_POST['komentar']) : null;

    // Validate id_kongres
    if (!$id_kongres) {
        die("Error: id_kongres tidak boleh kosong.");
    }

    // Insert into database
    $query = "INSERT INTO komentar_kongres (id_kongres, nama, komentar) 
              VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $id_kongres, $nama, $komentar);
    mysqli_stmt_execute($stmt);

    // Redirect back to the Kongres detail page after submission
    header("Location: detailbacaankongres.php?id=" . $id_kongres);
    exit();
}

mysqli_close($conn);
