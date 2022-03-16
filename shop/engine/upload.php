<?php

function upload() {

    $imgBig = pathToImg("big");
    $imgBig = pathToImg("small");

    if (file_exists($imgBig)) { 
        $status = "name";
        goto end;
    } 
    
    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['myimg']['name'])) {
            $status = "blacklist";
            goto end;        
        }
    }
    
    if($_FILES["myimg"]["size"] > 1024*1*1024) {
        $status = "size";
        goto end;
    }
    
    if($_FILES['myimg']['type'] != "image/jpeg") {
        $status = "type";
        goto end;   
    }
    
    if (move_uploaded_file($_FILES["myimg"]["tmp_name"], $imgBig)) {
        $status = "ok";
    } else {
        $status = "error";
    }
    
    $image = new SimpleImage();
    $image->load($imgBig);
    $image->scale(50);
    $image->save($imgBig);

    end:
    return $status;
}