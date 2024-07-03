<?php
include '../../function/config.php';

if (isset($_GET['id'])) {
    $id_ravelnas = intval($_GET['id']); // Ensure that ID is an integer

    // Delete related comments first
    $deleteCommentsSql = "DELETE FROM komentar_ravelnas WHERE id_ravelnas = ?";
    $stmtComments = $conn->prepare($deleteCommentsSql);
    $stmtComments->bind_param("i", $id_ravelnas);

    if ($stmtComments->execute()) {
        // Delete ravelnas after related comments are deleted
        $deleteRavelnasSql = "DELETE FROM ravelnas WHERE id_ravelnas = ?";
        $stmtRavelnas = $conn->prepare($deleteRavelnasSql);
        $stmtRavelnas->bind_param("i", $id_ravelnas);

        if ($stmtRavelnas->execute()) {
            // Redirect to the listing page
            header("Location: lihat_ravelnas.php?status=success");
            exit();
        } else {
            // Redirect to the listing page with an error status
            header("Location: lihat_ravelnas.php?status=error");
            exit();
        }

        $stmtRavelnas->close();
    } else {
        // Redirect to the listing page with an error status
        header("Location: lihat_ravelnas.php?status=error");
        exit();
    }

    $stmtComments->close();
} else {
    // Redirect to the listing page with an error status
    header("Location: lihat_ravelnas.php?status=no_id");
    exit();
}

$conn->close();
