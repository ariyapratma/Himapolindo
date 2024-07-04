<?php
include '../../function/config.php';

if (isset($_GET['id'])) {
    $id_calek = intval($_GET['id']); // Ensure that ID is an integer

    // Delete related comments first
    $deleteCommentsSql = "DELETE FROM komentar_calek WHERE id_calek = ?";
    $stmtComments = $conn->prepare($deleteCommentsSql);
    $stmtComments->bind_param("i", $id_calek);

    if ($stmtComments->execute()) {
        // Delete calek after related comments are deleted
        $deleteCalekSql = "DELETE FROM calek WHERE id_calek = ?";
        $stmtCalek = $conn->prepare($deleteCalekSql);
        $stmtCalek->bind_param("i", $id_calek);

        if ($stmtCalek->execute()) {
            // Redirect to the listing page
            header("Location: list_calek.php?status=success");
            exit();
        } else {
            // Redirect to the listing page with an error status
            header("Location: list_calek.php?status=error");
            exit();
        }

        $stmtCalek->close();
    } else {
        // Redirect to the listing page with an error status
        header("Location: list_calek.php?status=error");
        exit();
    }

    $stmtComments->close();
} else {
    // Redirect to the listing page with an error status
    header("Location: list_calek.php?status=no_id");
    exit();
}

$conn->close();
