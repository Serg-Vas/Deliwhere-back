<?php
$GLOBALS['x'] = 10;
echo $x, '<br>';

$x = 15;
echo $x;
echo "\n Значение переменной равно ", $x, '<br>';

echo 'Значение переменной $x равно ', $x, "<br>";
echo "Значение переменной \$x равно ", $x, "<br>";
echo "Значение переменной \$x равно $x", "<br>";
echo "{$x} ${x}", "<br>";

print_r($x); // 15
$arr = [1, 2, 3];
print_r($arr); // Array ( [0] => 1 [1] => 2 [2] => 3 )
?>

<?php
$x = 15;
$txt = "<>";
$txt2 = htmlspecialchars($txt, ENT_COMPAT | ENT_HTML5,
'UTF-8');
?>
<input type="text" name="x" value="<?=$x?>">
<input type="text" name="txt" value="<?=$txt2?>">
