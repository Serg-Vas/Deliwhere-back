<?php

require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;

// Replace 'your-secret-key' with your actual secret key
$secretKey = 'your-secret-key';

// Replace 'Serge' and 'Password' with your actual username and password validation logic
$username = 'Serge';
$password = 'Password';

// In a real-world scenario, validate the username and password before generating the token
if ($username === 'Serge' && $password === 'Password') {
    // Generate a JWT token
    $tokenPayload = array(
        'username' => $username,
    );

    $token = JWT::encode($tokenPayload, $secretKey, 'HS256');

    // Output the token
    echo json_encode(array('token' => $token));
} else {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array('message' => 'Invalid username or password'));
}
