<div class="post_title"><h2><?=$postTitle?></h2></div>
<?php foreach ($images as $img): ?>
   
    <a rel="gallery" class="photo" href="?page=image&id=<?=$img['id']?>"><img src="/img/gallery_img/small/<?= $img['name_img']?>"/></a>

<?php endforeach; ?>
<p class="message"><?=$message?></p>
<form class="form" method="POST" enctype="multipart/form-data">
        <input type="file" name="myimg">
        <input type="submit" value="Upload">
</form>