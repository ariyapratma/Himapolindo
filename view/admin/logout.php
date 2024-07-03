<?php
session_start();
session_unset();
session_destroy();

// Setel flag logout di sesi
session_start();
$_SESSION['logout_success'] = true;

header("Location: login.php");
exit();
