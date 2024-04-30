<?php
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains

// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

$secret_key = "your_secret_key";

// User information (you might get this from a database)
$user = [
    "id" => 1,
    "username" => "example_user",
];

// Encode the user information into a JWT
$token = JWT::encode($user, $secret_key, 'HS256');

// Return the token to the frontend in the response body
header('Content-Type: application/json');
echo json_encode(["token" => $token]);
?>