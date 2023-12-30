<?php
function Urlencoded($servername, $username, $password, $dbname) {
    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get POST data from the form
        $username = $_POST['name'];
        echo $username;
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security
        $address = $_POST['address'];
        $phone_number = $_POST['phone'];

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
        http_response_code(201);

        // echo "User inserted successfully.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        http_response_code(400);
    }
}
function Json($servername, $username, $password, $dbname, $decoded_data) {
    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Get POST data from the form
        $username = $decoded_data['name'];
        // echo $username;
        $email = $decoded_data['email'];
        $password = password_hash($decoded_data['password'], PASSWORD_DEFAULT); // Hash the password for security
        $address = $decoded_data['address'];
        $phone_number = $decoded_data['phone'];

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
        http_response_code(201);

        // echo "User inserted successfully.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        http_response_code(400);
    }
}
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains
// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : '';
    require_once 'db_connection.php'; // Include the database connection script
    // print_r($_POST);
    switch ($contentType) {
        case "application/x-www-form-urlencoded":
            Urlencoded($servername, $username, $password, $dbname);
            break;
        case "application/json":
            $json_data = file_get_contents("php://input");
            // If data is received
            if ($json_data !== false) {
                // Decode JSON data
                $decoded_data = json_decode($json_data, true);

                // Check if decoding was successful
                if ($decoded_data !== null) {
                    // Process the received data
                    // For example, print the received data
                    // echo "Received data:\n";
                    // print_r($decoded_data);
                    Json($servername, $username, $password, $dbname, $decoded_data);
                } else {
                    // Handle JSON decoding error
                    http_response_code(400);
                    die("Error decoding JSON data.");
                }
            } else {
                // Handle error in retrieving POST data
                http_response_code(400);
                die("Error retrieving POST data.");
            }
            break;
        default:
            http_response_code(400);
            die("Script execution halted");
            break;
    }
    // if ($contentType !== "application/x-www-form-urlencoded") {
    //     http_response_code(400);
    //     die("Script execution halted");
    // }
} else {
    echo "Invalid request method. This script accepts only POST requests.";
}
?>
