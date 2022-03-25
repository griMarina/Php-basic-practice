<?php

include $_SERVER["DOCUMENT_ROOT"] . "/../config/config.php";

$url_arr = explode('/', $_SERVER['REQUEST_URI']);

if ($url_arr[1] === "") {
    $page = "index";
} else {
    $page = $url_arr[1];
}

$status = $_GET["status"] ?? "";

$layout = "main";
$params["menu"] = getMenu();

$result = 0; 
$arg1 = 0; 
$arg2 = 0;

switch ($page) {

    case "index":
        $params["title"] = "Main";
        break;

    case "catalog":
        $params["title"] = "Catalog";
        $params["catalog"] = getCatalog();
        break;

    case "about":
        $params["title"] = "About Us";
        $params["phone"] = 123123;
        break;

    case "gallery":
        $layout = "gallery";
        
        if (!empty($_FILES)) {
            $status = uploadImg();
            header("Location:/gallery/?status=$status");
            die();
        }

        $params["title"] = "Gallery";
        $params["postTitle"] = "My Gallery";
        $params["images"] = getGallery();
        $params["message"] = getMessage($status);   
        break;

    case "image":

        $layout = "gallery";
        $id = (int)$_GET["id"];
        updateViews($id);

        $params["title"] = "Image";
        $params["postTitle"] = "Image";
        $params["image"] = getImage($id);
        break;
    
    case "calculator": 
        $operation = $_GET["operation"] ?? "+";

        if (!empty($_GET)) {
            $arg1 = $_GET["arg1"];
            $arg2 = $_GET["arg2"];
        }

        $params["title"] = "Calculator";
        $params["arg1"] = $arg1;
        $params["arg2"] = $arg2;
        $params["operation"] = $operation;
        $params["result"] = mathOperation($arg1, $arg2, $operation);
        
        break;

    case "install":

        insertGallery();
        header("Location:/");
        die();

    default: 
        echo "Error! 404!";
        die();
}

echo render($page, $params, $layout);