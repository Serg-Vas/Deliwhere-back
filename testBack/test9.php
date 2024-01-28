<?php if (isset($_GET['name'])): ?>
Hello, <?=$_GET['name']?>
<?php else: ?>
Введите ваше имя<br>
<form action="<?=$_SERVER['SCRIPT_NAME']?>">
<input type="text" name="name">
<input type="submit" value="OK">
</form>
<?php endif; ?>
<?php $var = 5;
($var == 5) ? print 'Равно ' : print 'Не равно'; 
$ch = 'a';
switch ($ch) {
case 'a':
case 'b':
case 'c':
echo "a, b или c";
break;
case 'd':
echo "Только d";
}
// for ($i = 100; $i > 0; $i--) echo $i . "<br>\n";

$arr = array(1, 2, 3);
for ($i = 0, $c = count($arr); $i < $c; $i++) {
if ($i == 0) {
$arr[] = 4; // Добавляем новые элементы
$arr[] = 5; // для доказательства
}
echo $arr[$i] . " ";
}

$i = 1;
while ($i < 10) {
echo $i . "<br>\n";
$i++;
}

$i = 1;
do {
echo $i . "<br>\n";
$i++;
}
while ($i < -10);

$arr = array('Один', 'Два', 'Три', 'Четыре');
foreach ($arr as $value) {
echo $value . "<br>\n";
}
$arr['Один'] = 1;
$arr['Два'] = 2;
$arr['Три'] = 3;
$arr['Четыре'] = 4;
foreach ($arr as $key => $value) {
echo $key . ' =&gt; ' . $value . "<br>\n";
}

$arr = [
    [1, 2],
    [3, 4]
    ];
    foreach ($arr as list($a, $b)) {
    echo $a . ', ' . $b . "<br>\n";
    }

$arr = [1, 2, 3];
    foreach ($arr as $value) {
    $value *= 2;
    }
    print_r($arr); // Array ( [0] => 1 [1] => 2 [2] => 3 )

$arr = [1, 2, 3];
    foreach ($arr as &$value) {
    $value *= 2;
    }
    // Разрываем ссылку
    unset($value);
    print_r($arr); // Array ( [0] => 2 [1] => 4 [2] => 6 )

    for ($i = 1; $i < 101; $i++) {
        if ($i > 4 && $i < 101) continue;
        echo $i . "<br>\n";
    }

    for ($i = 1; ; $i++) {
        if ($i > 5) break;
        echo $i . "<br>\n";
    }
    
    $i = 1;
    BLOCK_START: {
    if ($i > 10) goto BLOCK_END;
    echo $i . "<br>\n";
    $i++;
    goto BLOCK_START;
    }
    BLOCK_END:;
?>


<?php for ($i = 1; $i < 6; $i++): ?><br>
Строка <?=$i?><br>
<?php endfor; ?>

<?php
$ch = 'a';
?>
<?php switch ($ch):
case 'a': ?>
Значение a
<?php break;
case 'b': ?>
Значение b
<?php break;
default: ?>
Другое значение
<?php endswitch; ?>

<?php
$arr = [1, 2, 3];
$arr2 = [];
$arr2['Один'] = 1;
$arr2['Два'] = 2;
$arr2['Три'] = 3;
?>
<?php foreach ($arr as $value): ?>
Значение <?=$value?><br>
<?php endforeach; ?>
<?php foreach ($arr2 as $key => $value): ?>
Ключ <?=$key?> значение <?=$value?><br>
<?php endforeach; ?>