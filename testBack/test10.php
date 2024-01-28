<?php
var_dump(PHP_INT_SIZE); 
var_dump(PHP_INT_MIN); // int(-2147483648)
var_dump(PHP_INT_MAX); // int(2147483647)
var_dump(PHP_INT_MAX + 1); // float(2147483648)
// Двоичное значение
var_dump(0b01110111); // int(119)
// Восьмеричное значение
var_dump(0167); // int(119)
// Шестнадцатеричное значение
var_dump(0x77); // int(119)
var_dump(0xFF); // int(255)
// Десятичное значение
var_dump(119); // int(119)
echo "<br>";

var_dump(20.0); // float(20)
var_dump(12.1e20); // float(1.21E+21)
var_dump(.123); // float(0.123)
var_dump(47.E-10); // float(4.7E-9)
echo "<br>";

var_dump( (bool)0 ); // bool(false)
var_dump( (bool)1 ); // bool(true)
var_dump( (bool)-1 ); // bool(true)
var_dump( (bool)INF ); // bool(true)
var_dump( (bool)NAN ); // bool(true)
echo "<br>";

var_dump( M_PI ); // float(3.1415926535898)
var_dump( pi() ); // float(3.1415926535898)
var_dump( M_E ); // float(2.718281828459)
echo "<br>";

var_dump( abs(-1) ); // int(1)
var_dump( pow(10, 2) ); // int(100)
var_dump( 10 ** 2 ); // int(100)
var_dump( sqrt(100) );
var_dump( max(10, 3) );
var_dump( min(10, 3) );
echo "<br>";

var_dump( ceil(1.49) ); // float(2)
var_dump( ceil(1.50) ); // float(2)
var_dump( ceil(1.51) ); // float(2)
echo "<br>";

var_dump( floor(1.49) ); // float(1)
var_dump( floor(1.50) ); // float(1)
var_dump( floor(1.51) ); // float(1)
echo "<br>";

var_dump( round(1.49) ); // float(1)
var_dump( round(1.50) ); // float(2)
var_dump( round(1.51) ); // float(2)
echo "<br>";

var_dump( sin(deg2rad(90)) );
var_dump( deg2rad(180) );
var_dump( rad2deg(M_PI) );
echo "<br>";

// Двоичное значение
var_dump( intval("0b1110111", 2) ); // int(119)
// Восьмеричное значение
var_dump( intval("0167", 8) ); // int(119)
// Шестнадцатеричное значение
var_dump( intval("0x77", 16) ); // int(119)
var_dump( intval("0xFF", 16)) ; // int(255)
// Десятичное значение
var_dump( intval("119", 10) ); // int(119)
var_dump( intval("9строка") ); // int(9)
var_dump( intval("строка9") ); // int(0)
var_dump( intval("строка") ); // int(0)
echo "<br>";

var_dump( bindec("1110111") ); // int(119)
var_dump( octdec("167") ); // int(119)
var_dump( hexdec("77") ); // int(119)
echo "<br>";

var_dump( floatval("1,2") ); // float(1)
var_dump( floatval("1.2") ); // float(1.2)
var_dump( floatval("1.2строка") ); // float(1.2)
var_dump( floatval("строка1.2") ); // float(0)
echo "<br>";

var_dump( 10 . " " . 1.2);
$x = 1234567.126;
var_dump( number_format($x) ); // string(9) "1,234,567"
var_dump( number_format($x, 2) ); // string(12) "1,234,567.13"
var_dump( number_format($x, 2, ',', ' ') );
echo "<br>";

var_dump( sprintf("%d", 10) ); // string(2) "10"
var_dump( sprintf("%f", 1.126) ); // string(8) "1.126000"
var_dump( sprintf("%.2f", 1.126) ); // string(4) "1.13"
echo "<br>";

// Двоичное значение
var_dump( sprintf("%b", 119) ); // string(7) "1110111"
// Восьмеричное значение
var_dump( sprintf("%o", 119) ); // string(3) "167"
// Шестнадцатеричное значение
var_dump( sprintf("%x", 119) ); // string(2) "77"
echo "<br>";

var_dump( base_convert(9, 10, 2) ); // string(4) "1001"
var_dump( base_convert("A", 16, 10) ); // string(2) "10"
echo "<br>";

echo mt_rand() . "\n";
echo mt_getrandmax(); // 2147483647
echo "<br>";

echo random_int(10, 100);
echo "<br>";

mt_srand(time());
echo mt_rand(10, 100);
echo "<br>";
?>

<?php
function passwGenerator(int $length = 8) : string {
if ($length < 1) return '';
$arr =
array('a','b','c','d','e','f','g','h','i','j','k','l',
'm','n','o','p','q','r','s','t','u','v','w','x','y','z',
'A','B','C','D','E','F','G','H','I','J','K','L',
'M','N','O','P','Q','R','S','T','U','V', 'W',
'X','Y','Z','1','2','3','4','5','6','7','8','9','0');
$password = '';
$max = count($arr) - 1;
for ($i = 0; $i < $length; $i++) {
$password .= $arr[ mt_rand(0, $max) ];
}
return $password;
}
echo passwGenerator(10);