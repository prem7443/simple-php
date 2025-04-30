<?php
$db = new SQLite3('users.db');

// Create users table if not exists
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT,
    password TEXT,
    mobile TEXT,
    address TEXT,
    dob TEXT
)");

echo "Database and table created.";
?>
