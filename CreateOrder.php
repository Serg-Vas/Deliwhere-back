<?php
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains
// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
function submitOrder($servername, $username, $password, $dbname, $inputData) {
    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $json_data = '[{"id":1,"name":"Hamburger","amount":1},{"id":5,"name":"Hamburger","amount":1}]';

        // Decode JSON data into an associative array
        // $foodItems = json_decode($json_data, true);
        
        $foodItems = json_decode($inputData['foodItems'], true);
        // Check if decoding was successful
        if ($foodItems === null && json_last_error() !== JSON_ERROR_NONE) {
            echo "Error decoding JSON: " . json_last_error_msg();
            // Handle the error appropriately, such as returning an error response
            exit;
        }

        // Check if $foodItems is an array
        if (!is_array($foodItems)) {
            echo "Error: Decoded JSON is not an array.";
            // Handle the error appropriately
            exit;
        }

        // Extract order data from the input JSON
        $clientName = $inputData['client'];
        $deliveryAddress = $inputData['deliveryAddress'];
        $comment = $inputData['comment'];
        $totalPrice = $inputData['totalPrice'];

        // Insert order data into the 'orders' table
        $stmt = $pdo->prepare("INSERT INTO orders (client_name, delivery_address, comment, total_amount) VALUES (:clientName, :deliveryAddress, :comment, :totalPrice)");
        $stmt->bindParam(':clientName', $clientName);
        $stmt->bindParam(':deliveryAddress', $deliveryAddress);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':totalPrice', $totalPrice);
        $stmt->execute();
        $orderID = $pdo->lastInsertId(); // Get the ID of the inserted order

        // Insert order items into the 'order_items' table
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id, food_id, quantity) VALUES (:orderID, :id, :amount)");
        foreach ($foodItems as $item) {
            $stmt->bindParam(':orderID', $orderID);
            $stmt->bindParam(':id', $item['id']);
            $stmt->bindParam(':amount', $item['amount']);
            $stmt->execute();
        }

        // Send a success response
        http_response_code(201);
        echo json_encode(array("success" => true, "message" => "Order submitted successfully"));
    } catch(PDOException $e) {
        // Handle database errors
        http_response_code(400);
        echo json_encode(array("success" => false, "message" => "Error submitting order: " . $e->getMessage()));
    }
}

// Set headers to allow cross-origin requests
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
// header("Access-Control-Allow-Headers: *");


// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : '';

    // Include the database connection script
    require_once 'db_connection.php';

    // Process the request based on the content type
    switch ($contentType) {
        case "application/json":
            $json_data = file_get_contents("php://input");
            if ($json_data !== false) {
                $inputData = json_decode($json_data, true);
                if ($inputData !== null) {
                    submitOrder($servername, $username, $password, $dbname, $inputData);
                } else {
                    http_response_code(400);
                    echo json_encode(array("success" => false, "message" => "Error decoding JSON data."));
                }
            } else {
                http_response_code(400);
                echo json_encode(array("success" => false, "message" => "Error retrieving POST data."));
            }
            break;
        default:
            http_response_code(400);
            echo json_encode(array("success" => false, "message" => "Unsupported content type."));
            break;
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] !== "OPTIONS") {
        http_response_code(405);
        echo json_encode(array("success" => false, "message" => "Invalid request method. This script accepts only POST requests."));
    }
}
?>
