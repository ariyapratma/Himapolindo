<?php
include '../../function/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_diesnatalis = $_POST['id_diesnatalis'];

    // Update query untuk menambah views
    $sql = "UPDATE diesnatalis SET views = views + 1 WHERE id_diesnatalis = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
    $stmt->bind_param("i", $id_diesnatalis);

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
