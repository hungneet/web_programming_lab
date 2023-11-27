<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <?php
    if (isset($_GET['error'])) {
        $errorCode = $_GET['error'];

        if ($errorCode == 1) {
            echo '<div class="alert alert-danger">Email does not exist!</div>';
        } elseif ($errorCode == 2) {
            echo '<div class="alert alert-danger">Incorrect password!</div>';
        } else {
            echo '<div class="alert alert-danger">Incorrect username or password!</div>';
        }
    }
    ?>

    <form method="post" action="login_processing.php">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                placeholder="Enter email"
                value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <script>
    // Use JavaScript to store the entered email in local storage
    document.getElementById('email').addEventListener('input', function() {
        localStorage.setItem('loginEmail', this.value);
    });

    // Retrieve the email from local storage and pre-fill the email field
    var storedEmail = localStorage.getItem('loginEmail');
    if (storedEmail) {
        document.getElementById('email').value = storedEmail;
    }
    </script>
</body>

</html>