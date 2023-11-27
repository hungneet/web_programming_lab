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

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $level = 2; // Set the default level to 2

    // Check if the email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE username = '$email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        // Email already exists, redirect with an error message
        $error_message = "Email already exists. Please use a different email.";
        header("Location: index.php?page=register&error=1");
        exit;
    }

    // Email does not exist, proceed with registration
    $insertUserQuery = "INSERT INTO users (username, password, name, level) VALUES ('$email', '$password', '$name', '$level')";

    if ($conn->query($insertUserQuery) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: index.php?page=login&registration_success=true");
        exit;
    } else {
        // Registration failed, redirect to login page with an error message
        $error_message = $conn->error;
        header("Location: index.php?page=register&error=0");
        exit;
    }
}
?>