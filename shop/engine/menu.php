<?php

function getMenu() {
    return [
        [
            "name" => "Main",
            "href" => "/"
        ],
        [
            "name" => "Catalog",
            "href" => "/?page=catalog"
        ],
        [   "name" => "About us",
            "href" => "/?page=about"
        ],
        [   "name" => "Gallery",
            "href" => "/?page=gallery"
        ],
    ];
}