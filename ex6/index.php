<?php

$menu = [
    ["name" => "Меню 1",
    "href" => "#1"],
    ["name" => "Меню 2",
    "href" => "#2"],
    ["name" => "Меню 3",
    "href" => "#3"],
    ["name" => "Меню 4",
    "href" => "#4"],
];

include "menu.php";

/*  
Пыталась сделать вложенное меню, но не осилила :(

    $menu = [
    ["name" => "Меню 1",
    "href" => "#1"],
    [
        ["name" => "Меню 2.1",
        "href" => "#2_1"],
        ["name" => "Меню 2.2",
        "href" => "#2_2"],
        ["name" => "Меню 2.3",
        "href" => "#2_3"]
    ],
    ["name" => "Меню 3",
    "href" => "#3"],
    ["name" => "Меню 4",
    "href" => "#4"],
];

function renderMenu($menu) {
    foreach ($menu as $submenu) {
        if (is_array($submenu)) {
            renderMenu($submenu);
        } else {?>
            <li><a href='<?=$menu["href"]?>'><?=$menu["name"]?></a></li>
        <?php }
    }
}
*/