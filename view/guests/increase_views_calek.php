<?php
include '../../function/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_calek = $_POST['id_calek'];

    // Update query untuk menambah views
    $sql = "UPDATE calek SET views = views + 1 WHERE id_calek = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_calek);

    if ($stmt->execute()) {
        echo "View count updated.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
