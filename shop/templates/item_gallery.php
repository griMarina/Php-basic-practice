<div class="post_title"><h2><?=$postTitle?></h2></div>
<div class="gallery_img">
<?php foreach ($items as $item): ?>
    <div >
        <p><?=$item['item_title']?></p>
        <a class="photo" href="/item/?id=<?=$item['item_id']?>"><img src="<?=IMG_SMALL . $item['item_img']?>"/></a>
        <p>price: <?=$item['item_price']?> $</p><button>Buy</button>
        <p class="views"><?=$item['item_views']?> views</p>
        
    </div>
<?php endforeach; ?>
</div>