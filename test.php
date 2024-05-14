<?php  
//   echo "qwerty"; // Output the variable content
  // var_dump($_POST);

// // Отримання даних у форматі JSON, які були відправлені з форми
// $data = json_decode(file_get_contents('php://input'), true);

// if ($data) {  
//     // Обробка отриманих даних
//     $jsonData = $data['data'];
//     echo "Отримано дані у форматі JSON: " . $jsonData;
// } else {
//     echo "Дані не отримані у форматі JSON";
// }
// /*
// перевірка чи можна передати в форму application/json?
// в test.html є форма яка посилається на test.php 
// */

// Print Request Content Type
// $data = file_get_contents('php://input');
// echo '<br>';
// echo gettype($data);
// echo '<br>';
// var_dump($data);
// echo '<br>';
// $requestContentType = isset($_SERVER["CONTENT_TYPE"]) ? $_SERVER["CONTENT_TYPE"] : 'Not set';
// echo "Request Content Type: $requestContentType<br>";
// Simulate some processing for demonstration purposes
// In a real-world scenario, you might handle the request and generate a response

// Print Response Content Type
// $responseContentType = "application/json"; // Replace with your actual content type
// header("Content-Type: $responseContentType");
// echo "Response Content Type: $responseContentType<br>";
?>
