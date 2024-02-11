<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: http://localhost:3000');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    http_response_code(200);
    exit;
}
function checkUser($servername, $username, $password, $dbname, $input_username, $input_password) {
    try {   
        // Establish database connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL statement to select a user from the 'users' table
        $stmt = $pdo->prepare("SELECT * FROM users WHERE LOWER(username) = LOWER(:username)");

        // Bind parameters
        $stmt->bindParam(':username', $input_username);

        // Execute the SQL statement
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        // echo "Fetched user data:\n";
        // print_r($user);

        // Check if user exists and password is correct
        if ($user && password_verify($input_password, $user['password'])) {
            // User exists and password is correct
            http_response_code(200);
            echo "User authenticated successfully.";
        } else {
            // User does not exist or password is incorrect
            http_response_code(401);
            echo "Invalid username or password.";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        http_response_code(400);
    }
}

// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : '';

    // Include the database connection script
    require_once 'db_connection.php';

    // If the request is in JSON format
    if ($contentType == "application/json") {
        $json_data = file_get_contents("php://input");

        // If data is received
        if ($json_data !== false) {
            // Decode JSON data
            $decoded_data = json_decode($json_data, true);

            // Check if decoding was successful
            if ($decoded_data !== null) {
                // Process the received data
                checkUser($servername, $username, $password, $dbname, $decoded_data['name'], $decoded_data['password']);
            } else {
                // Handle JSON decoding error
                http_response_code(400);
                echo "Error decoding JSON data.";
            }
        } else {
            // Handle error in retrieving POST data
            // http_response_code(400);
            echo "Error retrieving POST data.";
        }
    } elseif ($contentType == "application/x-www-form-urlencoded") {
        // If the request is in URL-encoded format
        // echo "Received data:\n";
        // print_r($_POST);

        $input_username = isset($_POST['name']) ? $_POST['name'] : '';
        $input_password = isset($_POST['password']) ? $_POST['password'] : '';
        // echo "Processed data:\n";
        // print_r([$input_username, $input_password]);

        // Validate and process the received data
        if (!empty($input_username) && !empty($input_password)) {
            checkUser($servername, $username, $password, $dbname, $input_username, $input_password);
        } else {
            http_response_code(400);
            echo "Invalid or incomplete data.";
        }
    } else {
        http_response_code(400);
        echo "Invalid content type.";
    }
} else {
    // echo '<form action="" method="post">' .
    // '<button type="submit">Login</button>' .
    // '</form>';
    http_response_code(405);
    echo "Invalid request method. This script accepts only POST requests.";
}
?>
