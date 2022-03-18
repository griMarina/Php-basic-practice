<?php

function upload() {

    if (file_exists(pathToImg("big"))) { 
        $status = "name";
        return $status;
    } 
    
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['myimg']['name'])) {
            $status = "blacklist";
            return $status;
        }
    }
    
    if($_FILES["myimg"]["size"] > 1024*1*1024) {
        $status = "size";
        return $status;
    }
    
    if($_FILES['myimg']['type'] != "image/jpeg") {
        $status = "type";
        return $status;
    }
    
    if (move_uploaded_file($_FILES["myimg"]["tmp_name"], pathToImg("big"))) {
        $status = "ok";
        resizeImg();
    } else {
        $status = "error";
    }

    return $status;
}