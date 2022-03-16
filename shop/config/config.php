<?php

define("TEMPLATES_DIR", "../templates/");
define("LAYOUTS_DIR", "layouts/");
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("IMG_DIR", "/img/gallery_img/");

include "../engine/functions.php";
include "../engine/catalog.php";
include "../engine/menu.php";
include "../engine/classSimpleImage.php";
include "../engine/gallery.php";
include "../engine/upload.php";
include "../engine/messages.php";
include "../engine/pathToImg.php";