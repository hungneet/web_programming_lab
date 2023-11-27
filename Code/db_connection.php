<?php
// Database configuration
$dbServer = 'localhost';
$dbUser = 'root';
$dbPassword = '123456';
$dbName = 'OnlineStore';

// Create a new database connection
$conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>