<?php
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains
// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : '';
    if ($contentType !== "application/x-www-form-urlencoded") {
        http_response_code(400);
        die("Script execution halted");
    }
    require_once 'db_connection.php'; // Include the database connection script
    print_r($_POST);
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

        // echo "User inserted successfully.";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method. This script accepts only POST requests.";
}
?>
