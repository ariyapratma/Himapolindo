<?php
include '../../function/config.php'; // Sesuaikan path sesuai dengan struktur file Anda

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $id_diesnatalis = isset($_POST['id_diesnatalis']) ? $_POST['id_diesnatalis'] : null;
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : null;
    $komentar = isset($_POST['komentar']) ? htmlspecialchars($_POST['komentar']) : null;

    // Validate id_diesnatalis
    if (!$id_diesnatalis) {
        die("Error: id_diesnatalis tidak boleh kosong.");
    }

    // Insert into database
    $query = "INSERT INTO komentar_diesnatalis (id_diesnatalis, nama, komentar) 
              VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "iss", $id_diesnatalis, $nama, $komentar);
    mysqli_stmt_execute($stmt);

    // Redirect back to the Dies Natalis detail page after submission
    header("Location: detailbacaandiesnatalis.php?id=" . $id_diesnatalis);
    exit();
}

mysqli_close($conn);
