<?php
include '../../function/config.php';

// Pastikan parameter id_komentar terdefinisi dan merupakan bilangan bulat positif
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $id_komentar = $_GET['id'];

    // Query untuk menghapus komentar berdasarkan id_komentar
    $sql = "DELETE FROM komentar_galeri WHERE id_komentar = ?";

    // Persiapkan statement
    $stmt = $conn->prepare($sql);

    // Bind parameter id_komentar ke statement
    $stmt->bind_param("i", $id_komentar);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Redirect kembali ke halaman lihat_komentar.php setelah berhasil menghapus
        header("Location: komentar_galeri.php");
        exit();
    } else {
        // Jika gagal menghapus, tampilkan pesan error
        echo "Error: " . $conn->error;
    }

    // Tutup statement dan koneksi database
    $stmt->close();
    $conn->close();
} else {
    // Jika parameter id tidak valid, tampilkan pesan error
    echo "Invalid request.";
}
