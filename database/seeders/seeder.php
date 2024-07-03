<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "himapolindo";

$data = mysqli_connect($host, $user, $password, $db);
if (!$data) {
    die("Connection error: " . mysqli_connect_error());
}

$korwil_users = [];
for ($i = 1; $i <= 8; $i++) {
    $korwil_users[] = "('korwil{$i}@example.com', 'password{$i}', 'korwil{$i}', 'korwil')";
}

$korwil_users_sql = "INSERT INTO login (email, password, username, role) VALUES " . implode(', ', $korwil_users);

if (mysqli_query($data, $korwil_users_sql)) {
    echo "Korwil users inserted successfully.";
} else {
    echo "Error inserting korwil users: " . mysqli_error($data);
}

mysqli_close($data);
