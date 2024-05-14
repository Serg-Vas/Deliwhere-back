<?php

// require_once 'vendor/autoload.php';

// use Firebase\JWT\JWT;

// // Replace 'your-secret-key' with your actual secret key
// $secretKey = 'your-secret-key';

// // Replace 'Serge' and 'Password' with your actual username and password validation logic
// $username = 'Serge';
// $password = 'Password';

// // In a real-world scenario, validate the username and password before generating the token
// if ($username === 'Serge' && $password === 'Password') {
//     // Generate a JWT token
//     $tokenPayload = array(
//         'username' => $username,
//     );

//     $token = JWT::encode($tokenPayload, $secretKey, 'HS256');

//     // Output the token
//     echo json_encode(array('token' => $token));
// } else {
//     header('HTTP/1.1 401 Unauthorized');
//     echo json_encode(array('message' => 'Invalid username or password'));
// }

// require 'vendor/autoload.php'; // Assuming you have the required dependencies installed

// use Firebase\JWT\JWT;
// use Slim\Factory\AppFactory;

// $app = AppFactory::create();

// $app->add(new \Tuupola\Middleware\CorsMiddleware);

// $PORT = 3001;
// $SECRET_KEY = 'your-secret-key'; // Replace this value with your actual secret key

// $app->addBodyParsingMiddleware();

// $app->post('/login', function ($request, $response, $args) use ($SECRET_KEY) {
//     $data = $request->getParsedBody();
//     $username = $data['username'];
//     $password = $data['password'];

//     // Perform login and password validation, generate token if valid
//     if ($username === 'Serge' && $password === 'Password') {
//         $token = JWT::encode(['username' => $username], $SECRET_KEY, 'HS256');
//         $response->getBody()->write(json_encode(['token' => $token]));
//     } else {
//         $response->withStatus(401)->getBody()->write(json_encode(['message' => 'Incorrect username or password']));
//     }

//     return $response;
// });

// $app->get('/api/secure-data', function ($request, $response, $args) use ($SECRET_KEY) {
//     $token = $request->getHeaderLine('Authorization');

//     if (empty($token)) {
//         return $response->withStatus(403)->getBody()->write(json_encode(['message' => 'Missing authentication token']));
//     }

//     try {
//         $decoded = JWT::decode($token, $SECRET_KEY, ['HS256']);
//         // Perform additional actions if needed with $decoded data
//         $response->getBody()->write(json_encode(['message' => 'Access to secure data']));
//     } catch (\Exception $e) {
//         $response->withStatus(401)->getBody()->write(json_encode(['message' => 'Invalid authentication token']));
//     }

//     return $response;
// })->add(new Tuupola\Middleware\JwtAuthentication([
//     'secret' => $SECRET_KEY,
//     'error' => function ($response, $arguments) {
//         return $response->withStatus(401)->getBody()->write(json_encode(['message' => 'Invalid authentication token']));
//     }
// ]));

// $app->run();
