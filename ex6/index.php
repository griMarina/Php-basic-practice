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
]
?>
<ul>
    <?php foreach ($menu as $submenu): ?>
	<li><a href='<?=$submenu["href"]?>'><?=$submenu["name"]?></a></li>
    <?php endforeach; ?>
</ul>