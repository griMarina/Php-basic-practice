<?php

function getOrders() {
    return getAssocResult("SELECT `id`, `name`, `surname`, `phone` FROM `orders` ORDER BY id DESC");
}

function getOneOrder($order_id) {
    $session = getOneResult("SELECT `session_id` FROM `orders` WHERE `id` = '$order_id'")["session_id"];
    
   return getAssocResult("SELECT `user_id`, items.item_id, `item_title`, `quantity`, cart.item_price FROM `cart`, `items` WHERE `session_id` = '$session' AND cart.item_id = items.item_id");
}

function getMyOrders() {
    
}