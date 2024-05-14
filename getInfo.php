<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
// header('Access-Control-Allow-Origin: http://localhost:3000');
header('Access-Control-Allow-Methods: POST, OPTIONS');
// header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Headers: Content-Type, Authorization');
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "your_secret_key";

foreach (getallheaders() as $name => $value) {
    if ($name == "Authorization") {
        // echo "$name: $value\n";
        $decoded = JWT::decode($value, new Key($secret_key, 'HS256')); //https://github.com/firebase/php-jwt
        print_r($decoded);
    }
}


