<?php

function prepareVariables($page, $action) {

    $status = $_GET["status"] ?? "";
    //$layout = "main";
    $params["menu"] = getMenu();

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

        case "image_gallery":
          //  $layout = "gallery";
        
            if (!empty($_FILES)) {
                $status = uploadImg();
                header("Location:/gallery/?status=$status");
                die();
            }

            $params["title"] = "Image Gallery";
            $params["postTitle"] = "Image Gallery";
            $params["images"] = getGallery();
            $params["message"] = getMessage($status);   
            break;

        case "image":

           // $layout = "gallery";
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
        
        case "item_gallery":
           // $layout = "gallery";

            $params["title"] = "Item Gallery";
            $params["postTitle"] = "Item Gallery";
            $params["items"] = getItems();

            break;

        case "item":

            //$layout = "gallery";
            $id = (int)$_GET["id"];
            updateItemViews($id);
            $item = getItem($id);

            $params["title"] = "Item";
            $params["item"] = $item;
            $params["postTitle"] = $item["item_title"];
            break;

        case "feedback":
            if ($action == "add") {
                var_dump($_POST);
            }
            $params["title"] = "Feedback";
            $params["feedback"] = getFeedback();

            break;

        case "install":

            insertGallery();
            header("Location:/");
            die();

        default: 
            echo "Error! 404!";
            die();
    }

    return $params;
}