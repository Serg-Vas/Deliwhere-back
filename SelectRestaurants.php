<?php
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains

// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Rest of your PHP code here

// Establish database connection
function AddCurrentRestaurant($currentRestaurant, $restaurants) {
    if ($currentRestaurant !== null) {
        $restaurants[] = $currentRestaurant;
        return $restaurants;
    }
}

require_once 'db_connection.php'; // Include the database connection script
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch restaurant data along with their food items
    $stmt = $pdo->prepare("SELECT r.id AS restaurant_id, r.name AS restaurant_name, f.id AS food_id, f.name AS food_name, f.price, f.image
                            FROM Restaurants r
                            LEFT JOIN Food f ON r.id = f.restaurant_id
                            ORDER BY r.id, f.id;
                            ");
    $stmt->execute();

    // Initialize array to store restaurant data
    $restaurants = [];
    $currentRestaurant = null;

    // Fetch and structure data into a JSON-friendly format
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // echo $currentRestaurant['id'],"-", $row['restaurant_id'], " ";
        if ($currentRestaurant === null || $currentRestaurant['id'] !== $row['restaurant_id']) {
            // if ($currentRestaurant !== null) {
            //     $restaurants[] = $currentRestaurant;
            // }
            $restaurants = AddCurrentRestaurant($currentRestaurant, $restaurants);
            $currentRestaurant = [
                'id' => $row['restaurant_id'],
                'name' => $row['restaurant_name'],
                'food' => [] //["id" => 1, "name" => "Burger", "price" => 100]
            ];
            // echo $currentRestaurant;
        }

        if ($row['food_id'] !== null) {
            // print_r($row);
            $currentRestaurant['food'][] = [
                'id' => $row['food_id'],
                'name' => $row['food_name'],
                'price' => $row['price'],
                'image' => $row['image']
            ];
        }
        // print_r($currentRestaurant); 
        // print_r($row); 
    }
    // if ($currentRestaurant !== null) {
    //     $restaurants[] = $currentRestaurant;
    // }
    $restaurants = AddCurrentRestaurant($currentRestaurant, $restaurants);
    
    // Convert array to JSON
    $json = json_encode($restaurants, JSON_PRETTY_PRINT);

    // Output JSON
    header('Content-Type: application/json');
    echo $json;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
