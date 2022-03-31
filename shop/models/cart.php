<?php

function getCartItems($session) {
    return getAssocResult("SELECT * FROM `cart`, `items`  WHERE `session_id` = '$session' AND cart.item_id = items.item_id"); 
}