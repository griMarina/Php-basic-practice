<?php

function getMenu($count) {
    return [
        [
            "name" => "Main",
            "href" => "/"
        ],
        [   "name" => "About us",
            "href" => "/about"
        ],
        [   "name" => "Gallery",
            "href" => "/gallery"
        ],
        [   "name" => "Calculator",
            "href" => "/calculator"
        ],
        [
            "name" => "Catalog",
            "href" => "/catalog"
        ],
        [
            "name" => "Cart ($count)",
            "href" => "/cart"
        ],
        [   "name" => "Feedback",
            "href" => "/feedback"
        ],
    ];
}