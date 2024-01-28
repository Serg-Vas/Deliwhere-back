<?php
$arr = array();
$arr[0] = 'Ноль';
$arr[1] = 'Один';
$arr[2] = 'Два';
$arr[3] = 'Три';
print_r( $arr );

$arr = [];
$arr[] = 'Ноль';
$arr[] = 'Один';
$arr[] = 'Два';
$arr[] = 'Три';
print_r( $arr );

$arr = array('Ноль', 'Один', 'Два', 'Три');
$arr2 = array(
0 => 'Ноль',
1 => 'Один',
2 => 'Два',
3 => 'Три'
);
print_r( $arr );

$arr = ['Ноль', 'Один', 'Два', 'Три'];
$arr2 = [
0 => 'Ноль',
1 => 'Один',
2 => 'Два',
3 => 'Три'
];
print_r( $arr );

$arr = array(
    3 => 'Ноль',
    'Один',
    8 => 'Два',
    'Три'
    );
    print_r( $arr );
    /*
    Array
    (
    [3] => Ноль
    [4] => Один
    [8] => Два
    [9] => Три
    ) */
$arr = [];
$arr2 = array_pad($arr, 5, 0);
print_r($arr2);
echo "<br>";

$arr = array('Ноль', 'Один', 'Два', 'Три');
// $var = $arr[4]; // Ошибка
$var = $arr[4] ?? "Значение по умолчанию"; // OK
print_r($var);

$arr = ['Ноль', 'Один', 'Два', 'Три'];
list($var1, $var2, $var3, $var4) = $arr;
echo $var2, '<br>'; // Переменной $var2 будет присвоено значение "Один"

$arr = ['Ноль', 'Один'];
[$var1, $var2] = $arr;
echo $var1 . ' ' . $var2; // Ноль Один

$arr = array();
$arr['Один'] = 1;
$arr['Два'] = 2;
$arr['Три'] = 3;
echo $arr['Один']; // 1

$arr = array('key1' => 1, 'key2' => 2, 'key3' => "2");
var_dump($arr['key1']); // int(1)
var_dump($arr['key5']); // NULL
echo "<br>";

$arr = array('key1' => 1, 'key2' => 2, 'key3' => "2");
if (isset($arr['key5'])) $var = $arr['key5'];
else $var = 'Значение по умолчанию';
var_dump($var); // string(40) "Значение по умолчанию"

$arr = array('key1' => null);
var_dump( isset($arr['key1']) ); // bool(false)
var_dump( array_key_exists('key1', $arr) ); // bool(true)
echo "<br>";

$arr = array('Один' => 1, 'Два' => 2, 'Три' => 3);
print_r( array_keys($arr) );
// Array ( [0] => Один [1] => Два [2] => Три )
print_r( array_values($arr) );
// Array ( [0] => 1 [1] => 2 [2] => 3 )
$arr2 = ['Ноль', 'Один', 'Два'];
print_r( array_keys($arr2) );
// Array ( [0] => 0 [1] => 1 [2] => 2 )
print_r( array_values($arr2) );
// Array ( [0] => Ноль [1] => Один [2] => Два )
echo "<br>";

$arr = array('key 1' => 1, 'key 2' => 2, 'key 3' => "2");
print_r( array_keys($arr, 2, false) );
// Array ( [0] => key 2 [1] => key 3 )
print_r( array_keys($arr, 2, true) );
// Array ( [0] => key 2 )
echo "<br>";

$arr = [
    'Иванов' => [ 'Имя' => 'Иван', 'Отчество' => 'Иванович',
    'Год рождения' => 1966 ],
    2 => [ 'Фамилия' => 'Семенов', 'Имя' => 'Сергей',
    'Отчество' => 'Николаевич', 'Год рождения' => 1980 ]
    ];
    echo $arr['Иванов']['Год рождения']; // 1966
    echo $arr[2]['Фамилия']; // Семенов

$arr = array(
    'Иванов' => array('Имя' => 'Иван', 'Отчество' => 'Иванович',
    'Год рождения' => 1966),
    'Семенов' => array('Имя' => 'Сергей', 'Отчество' => 'Николаевич',
    'Год рождения' => 1980)
    );
    $arr2 = [
    'Иванов' => [ 'Имя' => 'Иван', 'Отчество' => 'Иванович',
    'Год рождения' => 1966 ],
    'Семенов' => [ 'Имя' => 'Сергей', 'Отчество' => 'Николаевич',
    'Год рождения' => 1980 ]
];
echo $arr['Иванов']['Год рождения'];
echo $arr['Семенов']['Отчество'];
echo "<br>";


$arr = array(1, 2);
$arr[] = array(3, 4);
$arr2 = $arr;
$arr2[0] = 22;
$arr2[2][0] = 88;
print_r($arr);
// Array ( [0] => 1 [1] => 2 [2] => Array ( [0] => 3 [1] => 4 ) )
print_r($arr2);
// Array ( [0] => 22 [1] => 2 [2] => Array ( [0] => 88 [1] => 4 ) )
echo "<br>";

$arr = array(1, 2);
$arr2 = &$arr; // Присваивание по ссылке
$arr2[0] = 22;
print_r($arr); // Array ( [0] => 22 [1] => 2 )
print_r($arr2); // Array ( [0] => 22 [1] => 2 )
echo "<br>";

?>
