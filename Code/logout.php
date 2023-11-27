<?php
// Start a session to access session variables
session_start();

// Unset and destroy the session
session_unset();
session_destroy();

// Clear the cookies
setcookie("user_id", "", time() - 3600, "/");
setcookie("user_name", "", time() - 3600, "/");
setcookie("user_level", "", time() - 3600, "/");

// Redirect the user to the login page or another landing page
header("Location: index.php");
exit;