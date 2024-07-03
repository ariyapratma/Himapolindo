<?php
include '../../function/config.php';

if (isset($_GET['id'])) {
    $id_artikel = intval($_GET['id']); // Ensure that ID is an integer

    // Delete related comments first
    $deleteCommentsSql = "DELETE FROM komentar_artikel WHERE id_artikel = ?";
    $stmtComments = $conn->prepare($deleteCommentsSql);
    $stmtComments->bind_param("i", $id_artikel);

    if ($stmtComments->execute()) {
        // Delete artikel after related comments are deleted
        $deleteArtikelSql = "DELETE FROM artikel WHERE id_artikel = ?";
        $stmtArtikel = $conn->prepare($deleteArtikelSql);
        $stmtArtikel->bind_param("i", $id_artikel);

        if ($stmtArtikel->execute()) {
            // Redirect to the listing page
            header("Location: lihat_artikel.php?status=success");
            exit();
        } else {
            // Redirect to the listing page with an error status
            header("Location: lihat_artikel.php?status=error");
            exit();
        }

        $stmtArtikel->close();
    } else {
        // Redirect to the listing page with an error status
        header("Location: lihat_artikel.php?status=error");
        exit();
    }

    $stmtComments->close();
} else {
    // Redirect to the listing page with an error status
    header("Location: lihat_artikel.php?status=no_id");
    exit();
}

$conn->close();
