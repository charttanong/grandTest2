<?php
session_start();        // Start session
session_unset();        // Remove all session variables
session_destroy();      // Destroy the session itself

header("Location: login.php"); // Redirect back to login page
exit();
?>
