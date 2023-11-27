<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPassword = '123456';
    $dbName = 'OnlineStore';

    $conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['email']; // Update the field name to 'username'
    $password = $_POST['password'];

    // SQL query to fetch user data based on the provided username
    $sql = "SELECT * FROM users WHERE username = '$username'"; // Updated to 'username'
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Authentication successful

            // Set cookies for user data
            setcookie("user_id", $row['userID'], time() + 3600, "/");
            setcookie("user_name", $row['name'], time() + 3600, "/");
            setcookie("user_level", $row['level'], time() + 3600, "/");

            // Set session variables
            session_start();
            $_SESSION['user_id'] = $row['userID'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_level'] = $row['user_level'];

            // Redirect to the dashboard or another page
            header("Location: index.php");
            exit;
        }
    }

    // Authentication failed
    header("Location: index.php?page=login&error=1");
    $conn->close();
    exit;
    // Close the database connection
}