<?php
$red = '#f00';
$color = 'red';
echo $$color;
// die("ERROR");
exit(-10);
// Отключаем буфер, если для директивы
// output_buffering задано значение
if (ob_get_level() > 0) ob_end_flush();
echo ob_get_level(), '<br>'; // 0
ob_start(); // Буфер 1
echo "Строка1", '<br>';
echo ob_get_level(), '<br>'; // 1
ob_start(); // Буфер 2
echo "Строка2", '<br>'; // Браузер эту строку не получит!
$str = ob_get_contents(); // Сохраняем содержимое буфера 2
ob_clean(); // Очистка буфера 2
echo ob_get_level(), '<br>'; // 2
echo "Строка3", '<br>';
ob_end_flush(); // Сброс и отключение буфера 2ф
echo ob_get_level(), '<br>'; // 1
echo "Строка4", '<br>';
$str2 = ob_get_flush(); // Сброс и отключение буфера 1
echo ob_get_level(), '<br>'; // 0
echo "Содержимое переменной \$str:", $str, '<br>';
echo "Содержимое переменной \$str2:", $str2, '<br>';
?>