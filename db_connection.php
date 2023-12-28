<?php
// Database configuration
$servername = "localhost"; // Change this to your MySQL server hostname if different
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "fooddelivery"; // Replace with your MySQL database name

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Uncomment for testing
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
