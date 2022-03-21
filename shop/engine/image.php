<?php

function getImage($id) {
    return getOneResult("SELECT * FROM images WHERE id = $id");
}