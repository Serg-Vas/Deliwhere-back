<?php
require 'vendor/autoload.php';
use \Firebase\JWT\JWT;
$secret_key = "key";
$user = "info";
$token = JWT::encode($user, $secret_key, 'HS256');
echo $token. " ";
$decodedInfo = JWT::decode($token, $secret_key, array('HS256'));
echo $decodedInfo;