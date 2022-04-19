<?php

function getCount($session) {
    $res = getOneResult("SELECT SUM(quantity) as quantity FROM `cart` WHERE `session_id` = '$session'");
    return (int) $res["quantity"];
}

function getCartItems($session) {
    return getAssocResult("SELECT * FROM `cart`, `items`  WHERE `session_id` = '$session' AND cart.item_id = items.item_id"); 
}

function addToCart($item_id, $session, $item_price, $user_id) {
    $result = getOneResult("SELECT id FROM `cart` WHERE item_id = '$item_id' AND `session_id` = '$session'");
    
    if (isset($result)) {
        executeSql("UPDATE `cart` SET quantity = quantity + 1 WHERE id = {$result['id']}");
    } else {
        executeSql("INSERT INTO `cart` (`session_id`, `item_id`, `item_price`) VALUES ('$session', '$item_id', '$item_price')");
    }

    if (isAuthorized()) {
        executeSql("UPDATE cart SET user_id = '$user_id' WHERE `session_id` = '{$session}'");
    }
}

function deleteFromCart($cart_id, $session) {
    $result = getOneResult("SELECT cart.id as cart_id, items.item_id as item_id, items.item_title as title, quantity, session_id FROM cart, items WHERE $cart_id = cart.id AND cart.item_id = items.item_id AND session_id = '$session'");

    if ($result['quantity'] > 1) {
        executeSql("UPDATE `cart` SET quantity = quantity - 1 WHERE id = '$cart_id'");
    } else {
        executeSql("DELETE FROM cart WHERE id = '$cart_id'");
    }  
}

function getSumOneItem($cart_id, $item_id) {
    $result = getOneResult("SELECT `item_price` * `quantity` as sum FROM cart WHERE `id` = '$cart_id' AND `item_id` = '$item_id'");
    return $result['sum'];
}

function getSumItems($session) {
   $result = getOneResult("SELECT SUM(`item_price` * `quantity`)as sum FROM cart  WHERE `session_id` = '$session'");
    return $result['sum'];
}

function addOrder($name, $surname, $phone, $session) {
    
    executeSql("INSERT INTO orders (`name`, `surname`, `phone`, `session_id`) VALUES ('$name', '$surname', '$phone', '$session')");   
   
}