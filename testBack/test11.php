<?php
@$x = 10.0 / 0;
@$y = 0.0 / 0;
$z = 5;
var_dump( is_infinite($x) ); // bool(true)
var_dump( is_infinite($y) ); // bool(false)
var_dump( is_infinite($z) ); // bool(false)
var_dump( is_nan($x) ); // bool(false)
var_dump( is_nan($y) ); // bool(true)
var_dump( is_nan($z) ); // bool(false)
var_dump( is_finite($x) ); // bool(false)
var_dump( is_finite($y) ); // bool(false)
var_dump( is_finite($z) ); // bool(true)
?>