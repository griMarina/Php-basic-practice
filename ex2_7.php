<?

function declesion($num, $arr)
{
    $end = $num % 10;
    
    if ($num >=11 && $num <= 14) {
        return $num . " " . $arr[2];  
    } elseif ($end === 1) {
        return $num . " " . $arr[0];
    } elseif ($end >= 2 && $end <= 4) {
        return $num . " " . $arr[1];
    } else {
        return $num . " " . $arr[2];
    }
}

$h = ["час", "часа", "часов"];
$m = ["минута", "минуты", "минут"];

echo declesion(2, $h) . " " . declesion(24, $m);


/*
function hours($h)
{
    $end = $h%10;

    if ($h >=11 && $h <= 14) {
        return "$h часов";  
    } elseif ($end === 1) {
        return "$h час";
    } elseif ($end >= 2 && $end <= 4) {
        return "$h часа";
    } else {
        return "$h часов";
    }
}     

function minutes($min)
{
    $end = $min%10;

    if ($min >=11 && $min <= 14) {
        return "$min минут";  
    } elseif ($end === 1) {
        return "$min минута";
    } elseif ($end >= 2 && $end <= 4) {
        return "$min минуты";
    } else {
        return "$min минут";
    }
}
*/