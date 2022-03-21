<?php

function getMenu() {
    return [
        [
            "name" => "Main",
            "href" => "/"
        ],
        [
            "name" => "Catalog",
            "href" => "/catalog"
        ],
        [   "name" => "About us",
            "href" => "/about"
        ],
        [   "name" => "Gallery",
            "href" => "/gallery"
        ],
    ];
}

function renderMenu($menu) {
    $out = "";
    foreach ($menu as $submenu) {
        $out .= "<a class='link' href='{$submenu['href']}'>{$submenu['name']}</a>";
        if (isset($submenu['submenu'])) {
            $out .= renderMenu($submenu['submenu']);
        }
    }

    return $out;
}