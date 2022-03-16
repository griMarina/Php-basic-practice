<?php

function getMessage($status) {
    
    $messages = [
        "ok" => "File successfully uploaded!",
        "error" => "File uploading failed!",
        "name" => "A file with the same name already exists",
        "blacklist" => "This file type is not permitted",
        "size" => "File size exceeds the allowable limit!",
        "type" => "Sorry, only JPEG images are allowed",
        "" => "Upload your file"
    ];

    return $messages[$status];
}