<?php

function pathToImg($dir) {
    return ROOT . IMG_DIR . $dir . basename($_FILES["myimg"]["name"]);
}