<?php
include '../../function/config.php'; // Sesuaikan path sesuai dengan struktur file Anda

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id_calek = isset($_POST['id_calek']) ? $_POST['id_calek'] : null;
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : null;
    $komentar = isset($_POST['komentar']) ? htmlspecialchars($_POST['komentar']) : null;

    // Validate id_calek
    if (!$id_calek) {
        die("Error: id_calek tidak boleh kosong.");
    }

    // Insert into database
    $query = "INSERT INTO komentar_calek (id_calek, nama, komentar) 
              VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $id_calek, $nama, $komentar);
    mysqli_stmt_execute($stmt);

    // Redirect back to the Calek detail page after submission
    header("Location: detailbacaancalek.php?id=" . $id_calek);
    exit();
}

mysqli_close($conn);
