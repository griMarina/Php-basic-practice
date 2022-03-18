 <div id="main">
    <h2>My gallery</h2>
    <p class="message"><?=$message?></p>
    <form class="form" method="POST" enctype="multipart/form-data">
        <input type="file" name="myimg">
        <input type="submit" value="Upload">
    </form>
	<div class="gallery">
        <?php foreach ($images as $image): ?>
            <a rel="gallery" class="photo" target="_blanc" href= '<?= IMG_DIR . "big/" . $image?>'><img src='<?= IMG_DIR . "small/" . $image?>'/></a>
        <?php endforeach; ?>
    </div> 
</div>