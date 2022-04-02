<?php

function getCartItems($session) {
    return getAssocResult("SELECT * FROM `cart`, `items`  WHERE `session_id` = '$session' AND cart.item_id = items.item_id"); 
}

function addToCart($item_id, $session) {
    $result = getOneResult("SELECT id FROM `cart` WHERE item_id = '$item_id'");
    
    if (isset($result)) {
        executeSql("UPDATE `cart` SET quantity = quantity + 1 WHERE id = {$result['id']}");
    } else {
        executeSql("INSERT INTO `cart` (`session_id`, `item_id`) VALUES ('$session', '$item_id')");
    }
}

function deleteFromCart($cart_id, $session) {
    $result = getOneResult("SELECT cart.id as cart_id, items.item_id as item_id, items.item_title as title, quantity FROM cart, items WHERE $cart_id = cart.id AND cart.item_id = items.item_id AND session_id = '$session'");

    if ($result['quantity'] > 1) {
        executeSql("UPDATE `cart` SET quantity = quantity - 1 WHERE id = '$cart_id'");
    } else {
        executeSql("DELETE FROM cart WHERE id = '$cart_id'");
    }
}