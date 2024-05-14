<?php
// Set headers to allow cross-origin requests
header("Access-Control-Allow-Origin: *"); // Replace * with your allowed domain or use * to allow all domains

// Set other CORS headers as needed (e.g., methods, headers, etc.)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

// Функція для перевірки токена
function verifyToken($token, $secret_key)
{
    try {
        $decodedToken = JWT::decode($token, $secret_key, array('HS256'));

        // Return the decoded token
        return $decodedToken;
    } catch (Exception $e) {
        return null; // Return null if token verification fails
    }
}
$secret_key = "your_secret_key";

// Отримання токена з заголовка або параметра запиту
$token = isset(getallheaders()['Authorization']) ? getallheaders()['Authorization'] : null;

// Перевірка токена
if ($token && verifyToken($token, $secret_key)) {
    // Якщо токен валідний, виводимо захищений контент
    echo json_encode($decodedToken);
} else {
    // Якщо токен невалідний або відсутній, виводимо повідомлення про відмову в доступі
    echo "Access denied. Please provide a valid token.";
}
?>
