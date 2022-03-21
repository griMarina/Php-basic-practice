<?php

$arr = scandir(IMG_SMALL);
$arr = array_splice($arr, 2);
foreach ($arr as $value) {
    $res = mysqli_query(getDb(), "INSERT INTO `images` (`name_img`) VALUES ('$value')");
    var_dump($res);
}