<?php 

include "classSimpleImage.php";

define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define("IMG_DIR", "/gallery_img/");

function getGallery($img_dir = (ROOT . IMG_DIR . "small/")) {
    $arr = scandir($img_dir);
    return array_splice($arr, 2);
};

$messages = [
    "ok" => "File successfully uploaded!",
    "error" => "File uploading failed!",
    "name" => "A file with the same name already exists",
    "blacklist" => "This file type is not permitted",
    "size" => "File size exceeds the allowable limit!",
    "type" => "Sorry, only JPEG images are allowed",
];

if (!empty($_FILES)) {

    $pathToBig = ROOT . IMG_DIR . "big/" . basename($_FILES["myimg"]["name"]);
    $pathToSmall = ROOT . IMG_DIR . "small/" . basename($_FILES["myimg"]["name"]);

    if (file_exists($pathToBig)) { 
        $message = "name";
        goto end;
    } 

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
        if (preg_match("/$item\$/i", $_FILES['myimg']['name'])) {
            $message = "blacklist";
            goto end;
        }
    }

    if($_FILES["myimg"]["size"] > 1024*1*1024) {
        $message = "size";
        goto end;
    }
   
    if($_FILES['myimg']['type'] != "image/jpeg") {
        $message = "type";
        goto end;
    }

    if (move_uploaded_file($_FILES["myimg"]["tmp_name"], $pathToBig)) {
        $message = "ok";
    } else {
        $message = "error";
    }

    $image = new SimpleImage();
    $image->load($pathToBig);
    $image->scale(50);
    $image->save($pathToSmall);

    end:
    header("Location: index.php?status=$message");
    die();
}

$message = $messages[$_GET["status"]];

$images = getGallery();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
</head>
<body>
    <div id="main">
        <div class="post_title"><h2>My gallery</h2></div>
        <p><?=$message?></p>
        <form class="form" method="POST" enctype="multipart/form-data">
            <input type="file" name="myimg">
            <input type="submit" value="Download">
        </form>
	    <div class="gallery">
            <?php foreach ($images as $image): ?>
                <a rel="gallery" class="photo" href= '<?= IMG_DIR . "big/" . $image?>'><img src='<?= IMG_DIR . "small/" . $image?>'/></a>
                <?php endforeach; ?>
        </div>
    </div>
</body>
</html>