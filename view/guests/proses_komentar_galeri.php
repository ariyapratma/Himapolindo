<?php
include '../../function/config.php'; // Sesuaikan path sesuai dengan struktur file Anda

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id_galeri = isset($_POST['id_galeri']) ? $_POST['id_galeri'] : null;
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : null;
    $komentar = isset($_POST['komentar']) ? htmlspecialchars($_POST['komentar']) : null;

    // Validate id_galeri
    if (!$id_galeri) {
        die("Error: id_galeri tidak boleh kosong.");
    }

    // Insert into database
    $query = "INSERT INTO komentar_galeri (id_galeri, nama, komentar) 
              VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $id_galeri, $nama, $komentar);
    mysqli_stmt_execute($stmt);

    // Redirect back to the Galeri detail page after submission
    header("Location: detailbacaangaleri.php?id=" . $id_galeri);
    exit();
}

mysqli_close($conn);
