<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <?php
    if (isset($_GET['error'])) {
        $errorCode = $_GET['error'];

        if ($errorCode == 1) {
            echo '<div class="alert alert-danger">Email already exists!</div>';
        } else {
            echo '<div class="alert alert-danger">Failed to register!</div>';
        }
    }
    ?>
    <form method="post" action="registration_processing.php">
        <div class="form-group">
            <label>Full Name</label>
            <input class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <script>
        // Check password length on blur
        document.getElementById('password').addEventListener('blur', function() {
            var password = this.value;

            if (password.length < 6) {
                alert('Password must be at least 6 characters!');
                this.value = ''; // Clear the field
            }
        });

        // Check password match on blur (when user clicks outside the field)
        document.getElementById('confirmPassword').addEventListener('blur', function() {
            var password = document.getElementById('password').value;
            var confirmPassword = this.value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                this.value = ''; // Clear the field
            }
        });
    </script>

</body>

</html>