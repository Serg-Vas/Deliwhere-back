<?php
// for ($i = 1; $i < 6; $i++) {
//     echo "Строка ", $i, "<br>";
//     sleep(1); // "Засыпаем" на 1 секунду
//     }

// for ($i = 1; $i < 6; $i++) {
// echo "Строка ", $i, "<br>";
// if (ob_get_level() > 0) ob_flush();
// flush(); // Сбрасываем системный буфер
// sleep(1); // "Засыпаем" на 1 секунду
// }

ob_implicit_flush();
for ($i = 1; $i < 6; $i++) {
$input = "Строка $i<br>";
echo str_pad($input, 4095), "\n";
if (ob_get_level() > 0) ob_flush();
sleep(1); // "Засыпаем" на 1 секунду
}