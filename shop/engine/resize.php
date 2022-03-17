<?php

function resizeImg() {
    $image = new SimpleImage();
    $image->load(pathToImg("big"));
    $image->scale(50);
    $image->save(pathToImg("small"));
}