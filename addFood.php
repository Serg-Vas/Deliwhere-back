считать svg файл як текстовий
update food set image=:image where id=:id
update field in php mysql

<?php
try{
require_once 'db_connection.php';
$path = "D:\work\Food shop\back\images\\nachos.svg";
$id = 15;
$name = 'Nachos';
$price = 3.95;
$restaurant_id = 5;
$image = file_get_contents($path);
// echo $image;
$stmt = $pdo->prepare("UPDATE food SET name=:name, price=:price, restaurant_id=:restaurant_id, image=:image WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);
$stmt->bindParam(':restaurant_id', $restaurant_id);
$stmt->bindParam(':image', $image);

$stmt->execute();
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

