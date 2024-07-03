<?php
include '../../function/config.php'; // Sesuaikan path sesuai dengan struktur file Anda

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id_artikel = isset($_POST['id_artikel']) ? $_POST['id_artikel'] : null;
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : null;
    $komentar = isset($_POST['komentar']) ? htmlspecialchars($_POST['komentar']) : null;

    // Validate id_artikel
    if (!$id_artikel) {
        die("Error: id_artikel tidak boleh kosong.");
    }

    // Insert into database
    $query = "INSERT INTO komentar_artikel (id_artikel, nama, komentar) 
              VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $id_artikel, $nama, $komentar);
    mysqli_stmt_execute($stmt);

    // Redirect back to the Artikel detail page after submission
    header("Location: detailbacaanartikel.php?id=" . $id_artikel);
    exit();
}

mysqli_close($conn);
