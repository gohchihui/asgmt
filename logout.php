<!-- logout.php -->
<?php
session_start();

// Destroy the session and redirect to the login page
session_destroy();
header("Location: login1.php");
exit();
?>
