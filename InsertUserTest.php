<?php
require_once 'db_connection.php'; // Include the database connection script

try {
    // Establish database connection
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // User details to insert
    $username = "JohnDoe";
    $email = "john@example.com";
    $phone_number = "09912312312";
    $password = password_hash("password123", PASSWORD_DEFAULT); // Hash the password for security
    $address = "Arsenalna";

    // Prepare the SQL statement to insert a user into the 'users' table
    $stmt = $pdo->prepare("INSERT INTO users(username, password, address, phone_number, email) VALUES (:username, :password, :address, :phone_number, :email)");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Execute the SQL statement
    $stmt->execute();

    echo "User inserted successfully.";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
