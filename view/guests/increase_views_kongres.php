<?php
include '../../function/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kongres = $_POST['id_kongres'];

    // Update query untuk menambah views
    $sql = "UPDATE kongres SET views = views + 1 WHERE id_kongres = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_kongres);

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
