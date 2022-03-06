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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul>
    <?php foreach ($menu as $submenu): ?>
	<li><a href='<?=$submenu["href"]?>'><?=$submenu["name"]?></a></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
