<?php

$content = renderTemplate("content", "555-555");
$menu = renderTemplate("menu");
$title = renderTemplate("title");

echo renderTemplate("layout", $content, $menu, $title);

function renderTemplate(
    $page,  
    $content = "",
    $menu = "",
    $title = ""
    )
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}