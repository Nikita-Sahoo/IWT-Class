<?php
session_start();

// Destroy  session variable
session_unset();

// Destroy  session itself
session_destroy();

header("Location: login.php");
exit;
?>
