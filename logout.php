<?php
// Start or resume the session
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session completely
session_destroy();

// Redirect to the homepage or login page
header("Location: index.php");
exit();
?>
