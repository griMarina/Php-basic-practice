<div class="post_title">
    <h2>Cart
    </h2>
</div>
<?php if ($count != 0) :?>
    <div class="gallery_img">
        <?php foreach ($items as $item): ?>
            <form action="/cart/delete" class="form_catalog" method="POST">
                <input type="text" hidden name="id" value="<?=$item['id']?>">
                <a class="photo" href="/item/?id=<?=$item['item_id']?>"><img src="<?=IMG_SMALL . $item['item_img']?>"/></a>
                <div class="form_text">
                    <p><?=$item['item_title']?></p>
                    <p><?=$item['item_price']?> $</p>
                    <p>quantity: <?=$item['quantity']?></p>
                    <input class="submit_btn" type="submit" value="Delete">
                </div>
            </form>     
        <?php endforeach; ?>
    </div>
<?php else :?>
    <p>The cart is empty</p>    
<?php endif; ?>