<?php
include '../../function/config.php';

if (isset($_GET['id'])) {
    $id_kongres = intval($_GET['id']); // Ensure that ID is an integer

    // Delete related comments first
    $deleteCommentsSql = "DELETE FROM komentar_kongres WHERE id_kongres = ?";
    $stmtComments = $conn->prepare($deleteCommentsSql);
    $stmtComments->bind_param("i", $id_kongres);

    if ($stmtComments->execute()) {
        // Delete kongres after related comments are deleted
        $deleteKongresSql = "DELETE FROM kongres WHERE id_kongres = ?";
        $stmtKongres = $conn->prepare($deleteKongresSql);
        $stmtKongres->bind_param("i", $id_kongres);

        if ($stmtKongres->execute()) {
            // Redirect to the listing page
            header("Location: lihat_kongres.php?status=success");
            exit();
        } else {
            // Redirect to the listing page with an error status
            header("Location: lihat_kongres.php?status=error");
            exit();
        }

        $stmtKongres->close();
    } else {
        // Redirect to the listing page with an error status
        header("Location: lihat_kongres.php?status=error");
        exit();
    }

    $stmtComments->close();
} else {
    // Redirect to the listing page with an error status
    header("Location: lihat_kongres.php?status=no_id");
    exit();
}

$conn->close();
