<?php foreach ($menu as $submenu): ?>
    <a href='<?=$submenu["href"]?>'><?=$submenu["name"]?></a>
<?php endforeach;?><br>

<!-- function renderMenu($menu) {
    $out = "";
    foreach ($menu as $submenu) {
        $out .= "<a class='link' href='{$submenu['href']}'>{$submenu['name']}</a>";
        if (isset($submenu['submenu'])) {
            $out .= renderMenu($submenu['submenu']);
        }
    }

    return $out;
} -->