<?

function power($val, $pow)
{
    if ($pow === 0) {
        return 1;
    } elseif ($pow === 1) {
        return $val;
    } else {
       return $val * power($val, ($pow - 1));
    } 
}