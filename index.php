<?php
// Static credentials
$valid_username = "admin";
$valid_password = "password123";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        echo "<h2>Login successful! Welcome, $username.</h2>";
    } else {
        echo "<h2 style='color:red;'>Invalid username or password.</h2>";
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Static PHP Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
