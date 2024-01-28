<?php
$x = 15;
$y = &$x;
var_dump($x); // int(15)
var_dump($y); // int(15)
$y = 20;
var_dump($x); // int(20)
var_dump($y); // int(20)
$x = 33;
var_dump($x); // int(33)
var_dump($y); // int(33)

unset($y);
$y = 34;
var_dump($x); // int(20)
var_dump($y); // int(33)

$a = "test";
$$a = 50;
var_dump($a); // string(4) "test"
var_dump(${$a}); // int(50)
var_dump($test); // int(50)

echo "<br>",intdiv(10, 3); // 3
echo "<br>",10 % 6; // 4
echo "<br>",10 ** 2; 
$x = 10;
$x--; // Эквивалентно $x = $x - 1;
echo "<br>",$x; // 9

$x = 5;
$y = $x++; // $y = 5, $x = 6
echo "<br>","<b>Постфиксная форма (\$y = \$x++;):</b><br>\n";
echo "\$y = $y <br>\$x = $x <br>\n";
$x = 5;
$y = ++$x; // $y = 6, $x = 6
echo "<b>Префиксная форма (\$y = ++\$x;):</b><br>\n";
echo "\$y = $y <br>\$x = $x";

$x = 5; $y = 0;
$y = ++$x + ++$x + ++$y;
echo "<br>",$y,"<br>";

$x = 100;
printf("%032b\n", $x); // 00000000000000000000000001100100
$x = ~$x;
printf("%032b\n", $x); // 11111111111111111111111110011011
echo "<br>";

$x = 100; $y = 75;
printf("%032b\n", $x); // 00000000000000000000000001100100
printf("%032b\n", $y); // 00000000000000000000000001001011
$z = $x & $y;
printf("%032b\n", $z); // 00000000000000000000000001000000
echo "<br>";

$x = 100; $y = 75;
printf("%032b\n", $x); // 00000000000000000000000001100100
printf("%032b\n", $y); // 00000000000000000000000001001011
$z = $x | $y;
printf("%032b\n", $z); // 00000000000000000000000001101111
echo "<br>";

$x = 100; $y = 250;
printf("%032b\n", $x); // 00000000000000000000000001100100
printf("%032b\n", $y); // 00000000000000000000000011111010
$z = $x ^ $y;
printf("%032b\n", $z); // 00000000000000000000000010011110
echo "<br>";

$x = 100;
printf("%032b\n", $x); // 00000000000000000000000001100100
$x = $x << 1;
printf("%032b\n", $x); // 00000000000000000000000011001000
$x = $x << 1;
printf("%032b\n", $x); // 00000000000000000000000110010000
$x = $x << 2;
printf("%032b\n", $x); // 00000000000000000000011001000000
echo "<br>";

$x = 100;
printf("%032b\n", $x); // 00000000000000000000000001100100
$x = $x >> 1;
printf("%032b\n", $x); // 00000000000000000000000000110010
$x = $x >> 1;
printf("%032b\n", $x); // 00000000000000000000000000011001
$x = $x >> 2;
printf("%032b\n", $x); // 00000000000000000000000000000110
echo "<br>";

$x = -127;
printf("%032b\n", $x); // 11111111111111111111111110000001
$x = $x >> 1;
printf("%032b\n", $x); // 11111111111111111111111111000000
$x = $x >> 1;
printf("%032b\n", $x); // 11111111111111111111111111100000
$x = $x >> 2;
printf("%032b\n", $x); // 11111111111111111111111111111000
echo "<br>";

$x = 10;
$x += 5; // Эквивалентно $x = $x + 5;
echo $x; // 15
echo "<br>";

$x = 10;
$x -= 5; // Эквивалентно $x = $x - 5;
echo $x; // 5
echo "<br>";

$x = 10;
$x *= 5; // Эквивалентно $x = $x * 5;
echo $x; // 50
echo "<br>";

$x = 10;
$x /= 5; // Эквивалентно $x = $x / 5;
echo $x; // 2
echo "<br>";

$x = 10;
$x %= 5; // Эквивалентно $x = $x % 5;
echo $x; // 0
echo "<br>";

$x = 10;
$x **= 2; // Эквивалентно $x = $x ** 2;
echo $x; // 100
echo "<br>";

$x = 100; $y = 75;
$x |= $y; // Эквивалентно $x = $x | $y;
printf("%032b\n", $x); // 00000000000000000000000001101111
echo "<br>";

var_dump( 10 == 10 ); // bool(true)
var_dump( 10 == 5 ); // bool(false)
var_dump( 10 != 5 ); // bool(true)
var_dump( 10 <> 5 ); // bool(true)
var_dump( 10 < 5 ); // bool(false)
var_dump( 10 > 5 ); // bool(true)
var_dump( 10 <= 5 ); // bool(false)
var_dump( 10 >= 5 ); // bool(true)

var_dump(1 == "1"); // bool(true)
var_dump(1 === "1"); // bool(false)

$var1 = 5;
$var2 = 5;
var_dump( $var1 == $var2 ); // bool(true)
var_dump( !($var1 == $var2) ); // bool(false)

var_dump( (10 == 10) && (5 != 3) ); // bool(true)
var_dump( (10 == 10) && (5 == 3) ); // bool(false)
var_dump( (10 == 10) and (5 != 3) ); // bool(true)
var_dump( (10 == 10) and (5 == 3) ); // bool(false)

var_dump( (10 == 10) || (5 != 3) ); // bool(true)
var_dump( (10 == 10) || (5 == 3) ); // bool(true)
var_dump( (10 == 10) or (5 != 3) ); // bool(true)
var_dump( (10 == 10) or (5 == 3) ); // bool(true)

var_dump( (10 == 10) xor (5 != 3) ); // bool(false)
var_dump( (10 == 10) xor (5 == 3) ); // bool(true)
echo "<br>";

echo 1 <=> 2; // -1
echo "<br>";
echo 3 <=> 2; // 1
echo "<br>";
echo 2 <=> 2; // 0

$a = 1;
$b = 2;
if ($a < $b) $x = -1;
elseif ($a > $b) $x = 1;
else $x = 0;
echo "<br>";
echo $x;
echo "<br>";

$y = 10;
$x = $y ?? 5;
var_dump( $x ); // int(10)
$y = null;
$x = $y ?? 5;
var_dump( $x ); // int(5)

$str = "2"; // Строка
$number = 3; // Число
$var1 = $number + $str; // Переменная содержит число 5
$var2 = $str * $number; // Переменная содержит число 6
var_dump( $var1, $var2 );

if ( ($var2 % 2) == 0 ) echo $var2 . ' — четное число';
else echo $var2 . ' — нечетное число';
