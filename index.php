<?php
// Static credentials
$valid_username = "admin";
$valid_password = "password123";

// Handle form submission
$login_error = "";
$welcome_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    if ($username === $valid_username && $password === $valid_password) {
        $welcome_msg = "Welcome from <strong>Prem</strong>!";
    } else {
        $login_error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Static PHP Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            display: flex;
            height: 100vh;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            width: 320px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: #d8000c;
            background-color: #ffdddd;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .success {
            color: #155724;
            background-color: #d4edda;
            padding: 15px;
            border-radius: 6px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .success strong {
            color: #0b3d91;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        <?php if ($login_error): ?>
            <div class="error"><?php echo $login_error; ?></div>
        <?php elseif ($welcome_msg): ?>
            <div class="success"><?php echo $welcome_msg; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
