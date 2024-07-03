<?php
include '../../function/config.php';

if (isset($_GET['id'])) {
    $id_galeri = intval($_GET['id']); // Ensure that ID is an integer

    // Delete related comments first
    $deleteCommentsSql = "DELETE FROM komentar_galeri WHERE id_galeri = ?";
    $stmtComments = $conn->prepare($deleteCommentsSql);
    $stmtComments->bind_param("i", $id_galeri);

    if ($stmtComments->execute()) {
        // Delete galeri after related comments are deleted
        $deleteGaleriSql = "DELETE FROM galeri WHERE id_galeri = ?";
        $stmtGaleri = $conn->prepare($deleteGaleriSql);
        $stmtGaleri->bind_param("i", $id_galeri);

        if ($stmtGaleri->execute()) {
            // Redirect to the listing page
            header("Location: lihat_galeri.php?status=success");
            exit();
        } else {
            // Redirect to the listing page with an error status
            header("Location: lihat_galeri.php?status=error");
            exit();
        }

        $stmtGaleri->close();
    } else {
        // Redirect to the listing page with an error status
        header("Location: lihat_galeri.php?status=error");
        exit();
    }

    $stmtComments->close();
} else {
    // Redirect to the listing page with an error status
    header("Location: lihat_galeri.php?status=no_id");
    exit();
}

$conn->close();
