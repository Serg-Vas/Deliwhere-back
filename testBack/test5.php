<?php
$var = null;
echo gettype($var), "\n"; // NULL
var_dump($var); // NULL
$var = true;
echo gettype($var), "\n"; // boolean
var_dump($var); // bool(true)
$var = 7;
echo gettype($var), "\n"; // integer
var_dump($var); // int(7)
$var = 7.8;
echo gettype($var), "\n"; // double
var_dump($var); // float(7.8)
$var = 'Строка';
echo gettype($var), "\n"; // string
var_dump($var); // string(12) "Строка"
$var = array();
echo gettype($var), "\n"; // array
var_dump($var); // array(0) {}

$var = 7;
if (is_int($var)) {
echo 'Переменная $var имеет тип int', '<br>';
}

$var = 1.5;
settype($var, "string");
var_dump($var); // string(3) "1.5"
settype($var, "int");
var_dump($var); 

$var = 0;
var_dump($var); // int(0)
$var2 = (bool)$var;
var_dump($var2); // bool(false)

$var = 0;
var_dump($var); // int(0)
$var2 = strval($var);
var_dump($var2); // string(1) "0"

if (isset($_GET['name'])) {
echo 'Hello, ' . $_GET['name'];
}
else {
echo 'Введите ваше имя<br>';
echo '<form action="' . $_SERVER['SCRIPT_NAME'] . '">';
echo '<input type="text" name="name">';
echo '<input type="submit" value="OK">';
echo '</form>';
}

if (isset($str)) echo "Существует";
else echo '<br>',"Нет";
echo "<br>";
if (empty($str)) echo "Пустая";
else echo "Нет";

$str = "Строка";
if (isset($str)) echo '<br>',"Существует";
else echo "Нет";
unset($str);
echo "<br>";
if (isset($str)) echo "Существует";
else echo "Нет",'<br>';

define('AUTHOR1', 'Николай');
echo AUTHOR1, '<br>'; // Николай
const AUTHOR = 'Николай';
echo AUTHOR, '<br>';
define('MY_CONST', array(1, 2, 3));
echo MY_CONST[0], '<br>'; // 1

function test() {
    define('AUTHOR1', 'Николай'); // OK
    echo AUTHOR1, '<br>';
    // const AUTHOR2 = 'Сергей'; // Ошибка
}

define('MY_CONST1', 3);
echo constant('MY_CONST1'); // 3

define('AUTHOR3', 'Николай');
if (defined('AUTHOR3')) echo '<br>','Объявлена';
else echo 'Не объявлена';

echo __FILE__ . "<br>";
echo __LINE__ . "<br>";
echo PHP_OS . "<br>";
echo PHP_VERSION . "<br>";