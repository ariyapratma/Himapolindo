<?php
include '../../function/config.php';

if (isset($_GET['id'])) {
    $id_rakernas = intval($_GET['id']); // Ensure that ID is an integer

    // Delete related comments first
    $deleteCommentsSql = "DELETE FROM komentar_rakernas WHERE id_rakernas = ?";
    $stmtComments = $conn->prepare($deleteCommentsSql);
    $stmtComments->bind_param("i", $id_rakernas);

    if ($stmtComments->execute()) {
        // Delete rakernas after related comments are deleted
        $deleteRakernasSql = "DELETE FROM rakernas WHERE id_rakernas = ?";
        $stmtRakernas = $conn->prepare($deleteRakernasSql);
        $stmtRakernas->bind_param("i", $id_rakernas);

        if ($stmtRakernas->execute()) {
            // Redirect to the listing page
            header("Location: lihat_rakernas.php?status=success");
            exit();
        } else {
            // Redirect to the listing page with an error status
            header("Location: lihat_rakernas.php?status=error");
            exit();
        }

        $stmtRakernas->close();
    } else {
        // Redirect to the listing page with an error status
        header("Location: lihat_rakernas.php?status=error");
        exit();
    }

    $stmtComments->close();
} else {
    // Redirect to the listing page with an error status
    header("Location: lihat_rakernas.php?status=no_id");
    exit();
}

$conn->close();
