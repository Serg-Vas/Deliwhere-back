<?php
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains

// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Check if restaurant_id is provided
if (!isset($_GET['restaurant_id'])) {
    echo json_encode(["error" => "restaurant_id parameter is required"]);
    exit;
}

$restaurant_id = intval($_GET['restaurant_id']);

// Establish database connection
require_once 'db_connection.php'; // Include the database connection script
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch restaurant data along with their food items
    $stmt = $pdo->prepare("SELECT r.id AS restaurant_id, r.name AS restaurant_name, r.logo AS restaurant_logo, f.id AS food_id, f.name AS food_name, f.price, f.image
                           FROM restaurants r
                           LEFT JOIN food f ON r.id = f.restaurant_id
                           WHERE r.id = :restaurant_id
                           ORDER BY r.id, f.id");
    $stmt->bindParam(':restaurant_id', $restaurant_id, PDO::PARAM_INT);
    $stmt->execute();

    // Initialize array to store restaurant data
    $currentRestaurant = null;

    // Fetch and structure data into a JSON-friendly format
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($currentRestaurant === null) {
            $currentRestaurant = [
                'id' => $row['restaurant_id'],
                'name' => $row['restaurant_name'],
                'logo' => file_get_contents('./images/' . $restaurant_id . '.svg', true),
                'food' => []
            ];
        }

        if ($row['food_id'] !== null) {
            $currentRestaurant['food'][] = [
                'id' => $row['food_id'],
                'name' => $row['food_name'],
                'price' => $row['price'],
                'image' => file_get_contents('./foodimages/' . $row['food_id'] . '.svg', true),
            ];
        }
    }

    // Convert array to JSON
    $json = json_encode($currentRestaurant, JSON_PRETTY_PRINT);

    // Output JSON
    header('Content-Type: application/json');
    echo $json;
} catch (PDOException $e) {
    echo json_encode(["error" => "Error: " . $e->getMessage()]);
}
?>
