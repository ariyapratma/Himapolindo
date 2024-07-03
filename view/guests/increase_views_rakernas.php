<?php
include '../../function/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_rakernas = $_POST['id_rakernas'];

    // Update query untuk menambah views
    $sql = "UPDATE rakernas SET views = views + 1 WHERE id_rakernas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_rakernas);

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
