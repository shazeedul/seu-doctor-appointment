<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'doctor_appointment';

try {
    // Connect to MySQL server (without selecting DB)
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Use the existing database
    $pdo->exec("USE $dbname");

    // Add 'message' column if it doesn't exist
    $pdo->exec("ALTER TABLE appointments ADD COLUMN message TEXT");
    echo "Column 'message' added to the 'appointments' table successfully!<br>";

} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}
?>
