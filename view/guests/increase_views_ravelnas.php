<?php
include '../../function/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_ravelnas = $_POST['id_ravelnas'];

    // Update query untuk menambah views
    $sql = "UPDATE ravelnas SET views = views + 1 WHERE id_ravelnas = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_ravelnas);

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
