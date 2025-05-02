<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'doctor_appointment';

try {
    // Connect to MySQL server (without selecting DB)
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    echo "Database created successfully!<br>";

    // Use the new database
    $pdo->exec("USE $dbname");

    // Create users table (doctors and patients)
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        role ENUM('doctor', 'patient') NOT NULL
    )");
    echo "Users table created successfully!<br>";

    // Ensure that the 'full_name' column exists (in case it was missed)
    $pdo->exec("ALTER TABLE users ADD COLUMN IF NOT EXISTS full_name VARCHAR(255) NOT NULL");
    echo "Ensured 'full_name' column exists in the 'users' table!<br>";

    // Create password resets table
    $pdo->exec("CREATE TABLE IF NOT EXISTS password_resets (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) NOT NULL,
        token VARCHAR(255) NOT NULL,
        expires INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "Password resets table created successfully!<br>";

} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}
?>
