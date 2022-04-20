<?php

function getOrders() {
    return getAssocResult("SELECT `id`, `name`, `surname`, `phone` FROM `orders` ORDER BY id DESC");
}

function getOneOrder($order_id) {
    $session = getOneResult("SELECT `session_id` FROM `orders` WHERE `id` = '$order_id'")["session_id"];
    
   return getAssocResult("SELECT `user_id`, items.item_id, `item_title`, `quantity`, cart.item_price FROM `cart`, `items` WHERE `session_id` = '$session' AND cart.item_id = items.item_id");
}

function getMyOrders($login) {
    if ($login) {
        $user_id = getOneResult("SELECT `id` FROM `users` WHERE `login` = '$login'")["id"];

        return getAssocResult("SELECT `item_title`, `quantity`, cart.item_price, `item_img` FROM `cart`, `items` WHERE `user_id` = '$user_id' AND cart.item_id = items.item_id");
    }   
}

function setOrderStatus($status, $order_id) {
    executeSql("UPDATE `orders` SET `status` = '$status' WHERE id = '$order_id'");
}

function getStatus($order_id) {
    return getOneResult("SELECT `status` FROM `orders` WHERE `id` = '$order_id'")["status"];
}