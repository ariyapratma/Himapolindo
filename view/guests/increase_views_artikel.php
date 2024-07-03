<?php
include '../../function/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_artikel = $_POST['id_artikel'];

    // Update query untuk menambah views
    $sql = "UPDATE artikel SET views = views + 1 WHERE id_artikel = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
    $stmt->bind_param("i", $id_artikel);

    if ($stmt->execute()) {
        echo "View count updated.";
    } else {
        echo "Error executing query: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
