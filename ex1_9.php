<?php

// 3.1
$n = 0;

while ($n <= 100) {
    if (!($n % 3)) echo $n ." ";
    $n++;
}

// 3.2

$num = 0;

do {
    if ($num === 0) {
        echo "$num - ноль.<br>";
    } else {
        $e = ($num & 1) ? "нечётное" : "чётное"; 
        echo "$num - $e.<br>";
    }
    $num++;
} while ($num <= 10);

// 3.3

$regions = [
    "Московская область" => [
        "Москва", "Зеленоград", "Клин"
    ], 
    "Ленинградская область" => [
        "Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"
    ],
];

foreach ($regions as $key => $reg) {
    echo $key . ": <br>";
    $str_cities = "";
    
    foreach ($reg as $city) {
        $str_cities .= $city . ", ";            
    }

    $str_cities = substr_replace($str_cities, ".", -2, 1);
    echo $str_cities . "<br>";  
}

// 3.4

//error_reporting(!E_NOTICE);

const ALFABET = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

$str = "Привет Мир!";

//echo translate($str);

function translate($str, $arr = ALFABET) {
    $translate = '';

    for ($i =0; $i < mb_strlen($str); $i++) {

        $letter = mb_substr($str, $i, 1);
        $let_low = mb_strtolower($letter);
    
        if (($arr[$let_low])) {
            $translate .= ($letter == $let_low) ? $arr[$let_low] : ucfirst($arr[$let_low]);
        } else {
            $translate .= $letter;
        }
    }
    return $translate;
}

// 3.5

//echo replace($str);

function replace($str) {
    return str_replace(" ", "_", $str);
}

// 3.7

for ($i = 0; $i <= 9; print($i++));

// 3.8

foreach ($regions as $key => $reg) {
    echo $key . ": <br>";
    $str_cities = "";
    
    foreach ($reg as $city) {
        if (mb_substr($city, 0, 1) == "К") $str_cities .= $city . ", ";             
    }

    $str_cities = substr_replace($str_cities, ".", -2, 1);
    echo $str_cities . "<br>";  
}

// 3.9

function combine_fn($str) {
    return replace(translate($str));
}

echo combine_fn($str);