<div class="post_title"><h2><?=$postTitle?></h2></div>
<div class="gallery_img">
<?php foreach ($items as $item): ?>
    <form action="" >
        <p><?=$item['item_title']?></p>
        <a class="photo" href="/item/?id=<?=$item['item_id']?>"><img src="<?=IMG_SMALL . $item['item_img']?>"/></a>
        <p>price: <?=$item['item_price']?> $</p>
        <p class="views"><?=$item['item_views']?> views</p>
        <button type="submit">Buy</button>
    </form>     
<?php endforeach; ?>
</div>