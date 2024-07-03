<?php
include '../../function/config.php';

if (isset($_GET['id'])) {
    $id_diesnatalis = intval($_GET['id']); // Ensure that ID is an integer

    // Delete related comments first
    $deleteCommentsSql = "DELETE FROM komentar_diesnatalis WHERE id_diesnatalis = ?";
    $stmtComments = $conn->prepare($deleteCommentsSql);
    $stmtComments->bind_param("i", $id_diesnatalis);

    if ($stmtComments->execute()) {
        // Delete diesnatalis after related comments are deleted
        $deleteDiesNatalisSql = "DELETE FROM diesnatalis WHERE id_diesnatalis = ?";
        $stmtDiesNatalis = $conn->prepare($deleteDiesNatalisSql);
        $stmtDiesNatalis->bind_param("i", $id_diesnatalis);

        if ($stmtDiesNatalis->execute()) {
            // Redirect to the listing page
            header("Location: lihat_dies_natalis.php?status=success");
            exit();
        } else {
            // Redirect to the listing page with an error status
            header("Location: lihat_dies_natalis.php?status=error");
            exit();
        }

        $stmtDiesNatalis->close();
    } else {
        // Redirect to the listing page with an error status
        header("Location: lihat_dies_natalis.php?status=error");
        exit();
    }

    $stmtComments->close();
} else {
    // Redirect to the listing page with an error status
    header("Location: lihat_dies_natalis.php?status=no_id");
    exit();
}

$conn->close();
