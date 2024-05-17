<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, OPTIONS');
// header('Access-Control-Allow-Headers: Content-Type, Authorization');
require_once 'CORS.php';
require 'vendor/autoload.php';
require_once 'db_connection.php';

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "your_secret_key";

function fetchUserData($servername, $username, $password, $dbname, $input_username, $input_id) {
    try {
        // Establish database connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT * FROM users WHERE LOWER(username) = LOWER(:username) AND id = :id");
        $stmt->bindParam(':username', $input_username);
        $stmt->bindParam(':id', $input_id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            $userData = array(
                'id' => $user['id'],
                'name' => $user['username'],
                'email' => $user['email'],
                'phone' => $user['phone_number'],
                'address' => $user['address']
            );
            header('Content-Type: application/json');
            http_response_code(200);
            echo json_encode($userData);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "User not found."));
        }

    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Error: " . $e->getMessage()));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $ok = false;
        foreach (getallheaders() as $name => $value) {
            if ($name === "Authorization") {
                $decoded = JWT::decode($value, new Key($secret_key, 'HS256'));
                $decoded_data = (array) $decoded;

                if (isset($decoded_data['name']) && isset($decoded_data['id'])) {
                    fetchUserData($servername, $username, $password, $dbname, $decoded_data['name'], $decoded_data['id']);
                    $ok = true;
                } else {
                    http_response_code(400);
                    echo json_encode(array("message" => "Invalid token data."));
                }
            }
        }

        if (!$ok) {
            http_response_code(401);
            echo json_encode(array("message" => "Invalid token."));
        }
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(array("message" => "Invalid token: " . $e->getMessage()));
    }
} else {
    if ($_SERVER["REQUEST_METHOD"] !== "OPTIONS") {
        http_response_code(405);
        echo json_encode(array("success" => false, "message" => "Invalid request method. This script accepts only POST requests."));
    }
}
?>
