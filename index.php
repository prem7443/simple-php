<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; }
        form {
            background: white;
            padding: 20px;
            width: 300px;
            margin: auto;
            margin-top: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        input, textarea {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        input[type=submit] {
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
// Internal "fake database" as an array
$users = [];

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
        // Save to internal array (simulating DB)
        $users[] = [
            'username' => $username,
            'password' => $pass,
            'mobile'   => $mobile,
            'address'  => $address,
            'dob'      => $dob
        ];
        echo "<p style='color:green;text-align:center;'>User registered successfully!</p>";
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
