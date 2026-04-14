<?php
$celcius = 37.841;

$c_f = ($celcius * 9/5) + 32;
$c_r = $celcius * 4/5;
$c_k = $celcius + 273.15;

echo "Fahrenheit (F) = " . number_format($c_f, 4, ",") . "<br>";
echo "Reaumur (R) = " . number_format($c_r, 4, ",") . "<br>";
echo "Kelvin (K) = " . number_format($c_k, 4, ",") . "<br>";