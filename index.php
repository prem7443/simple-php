<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        form {
            background: white; padding: 20px; width: 300px; margin: auto;
            margin-top: 50px; border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input, textarea {
            margin-bottom: 10px; padding: 8px; width: 100%;
            box-sizing: border-box;
        }
        input[type=submit] {
            background: #28a745; color: white; border: none; cursor: pointer;
        }
    </style>
</head>
<body>

<?php
$db = new SQLite3('users.db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $conf = $_POST['confirm'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];

    if ($pass !== $conf) {
        echo "<p style='color:red;text-align:center;'>Passwords do not match!</p>";
    } else {
        $hashed = password_hash($pass, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (username, password, mobile, address, dob) VALUES (:username, :password, :mobile, :address, :dob)");
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $hashed);
        $stmt->bindValue(':mobile', $mobile);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':dob', $dob);
        $stmt->execute();

        echo "<p style='color:green;text-align:center;'>Registered successfully!</p>";
    }
}
?>

<form method="post">
    <h2 style="text-align:center;">Register</h2>
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <input type="password" name="confirm" placeholder="Confirm Password" required />
    <input type="text" name="mobile" placeholder="Mobile Number" required />
    <textarea name="address" placeholder="Address" required></textarea>
    <input type="date" name="dob" placeholder="DOB" required />
    <input type="submit" value="Register" />
</form>

</body>
</html>
