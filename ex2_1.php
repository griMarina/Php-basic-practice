<?php

$a = rand(-10, 10);
$b = rand(-10, 10);

echo "a = {$a} b = {$b}<br>";

if ($a >= 0 && $b >= 0) {
    echo "a и b положительные числа";
} elseif ($a < 0 && $b < 0) {
    echo "a и b отрицательные числа";
} else {
    echo "a и b разных знаков";
}