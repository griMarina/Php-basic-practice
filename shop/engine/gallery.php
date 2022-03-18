<?php 

function getGallery($img_dir = (ROOT . IMG_DIR . "small/")) {
    $arr = scandir($img_dir);
    return array_splice($arr, 2);
}