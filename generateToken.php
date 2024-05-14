<?php
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains

// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

$secret_key = "your_secret_key";

// Assuming you receive the input data as JSON in the request body
$input_json = file_get_contents('php://input');
$input_data = json_decode($input_json, true);

// Extract user information from input data
$user = [
    "id" => $input_data["id"],
    "name" => $input_data["name"],
    // "phone" => $input_data["phone"],
    // "email" => $input_data["email"],
    // "address" => $input_data["address"],
    // // You might want to consider hashing the password before storing it
    // "password" => password_hash($input_data["password"], PASSWORD_DEFAULT),
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Encode the user information into a JWT
$token = JWT::encode($user, $secret_key, 'HS256');

// Set the token in the Authorization header
// header("Authorization: $token");

// Respond with an empty JSON object to indicate success
echo json_encode($token);
}
