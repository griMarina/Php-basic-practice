<?php
function renderMenu($menu) {
    $out = "";
    foreach ($menu as $submenu) {
        $out .= "<a class='menu_link' href='{$submenu['href']}'>{$submenu['name']}</a>";
        if (isset($submenu['submenu'])) {
            $out .= renderMenu($submenu['submenu']);
        }
    }

    return $out;
}
 ?>
 <?php if ($authorization): ?>
    <button><a class="signout" href="/logout">Sign out</a></button>
    <?php else: ?>
        <form action="/login" method="POST">
            <input type="text" name="login" placeholder="admin">
            <input type="password" name="pass" placeholder="123">
            Save? <input type="checkbox" name="save">
            <input type="submit" value="Sign in">
        </form>
    <?php endif; ?>
<div class="menu"><?=renderMenu($menu)?></div>