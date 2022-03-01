<?

function add($arg1, $arg2)
{
    return $arg1 + $arg2;
}

function subtract($arg1, $arg2)
{
    return $arg1 - $arg2;
}

function multiply($arg1, $arg2)
{
    return $arg1 * $arg2;
}

function divide($arg1, $arg2)
{
    return ($arg2 === 0) ? "error: division by zero!" : $arg1 / $arg2; 
}

function mathOperation($arg1, $arg2, $operation) 
{
    switch($operation) {
        case "add":
            return add($arg1, $arg2);
        case "subtract":
            return subtract($arg1, $arg2);
        case "multiply":
            return multiply($arg1, $arg2);
        case "divide":
            return divide($arg1, $arg2);
        default:
            return "There is no such math operation";
        }
}

echo mathOperation(10, 0, "divide");