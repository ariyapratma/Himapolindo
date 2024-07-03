<?php
session_start();
session_unset();
session_destroy();

// Setel flag logout di sesi
session_start();
$_SESSION['logout_success_korwil'] = true;

header("Location: http://localhost/Himapolindo/view/korwil/login.php");
exit();
