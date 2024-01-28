<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
<title>Первая программа</title>
</head>
<body>
<?="Hello, world\n"?>
<?php $x = 10; ?>
x = <?=$x?>
<?php
echo '<br>Строка1<br>
Строка2<br>
Строка3<br>
';
?>
<?php
echo 10.5125484, "\n"; // 10.5125484
$len = printf("%.2f", 10.5125484); // 10.51
printf("\n Длина строки равна %d", $len);
// Длина строки равна 5
?>
<?php
for ($i = 1; $i < 6; $i++) {
echo "Строка ", $i, "<br>";
if (ob_get_level() > 0) ob_flush();
flush(); // Сбрасываем системный буфер
sleep(1); // "Засыпаем" на 1 секунду
}?>
<?php
echo ini_get('output_buffering'); // 4096
if (ob_get_level() > 0) ob_end_flush();
ob_implicit_flush();
for ($i = 1; $i < 6; $i++) {
$input = "Строка $i<br>";
echo str_pad($input, 4095), "\n";
sleep(1); // "Засыпаем" на 1 секунду
}?>
</body>
</html>