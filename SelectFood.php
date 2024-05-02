<?php
require_once 'db_connection.php'; // Include the database connection script

try {
    // Example query to fetch data from Restaurants table
    $stmt = $pdo->prepare("SELECT * FROM Food");
    $stmt->execute();

    // Fetch and display data
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: " . $row['id'] . " | Name: " . $row['name'] . " | Price: " . $row['price'] . " | Restaurant: " . $row['restaurant_id'] . " | Image: <img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Item Image'><br>";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
