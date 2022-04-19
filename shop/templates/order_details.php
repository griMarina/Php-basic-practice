<div class="post_title"><h2><?=$postTitle ?? ""?></h2></div>
<?php if (isset($orders)) :?>
    <?php foreach ($orders as $order): ?>   
    <form action=""  method="POST">
        <p>User ID: <?=$order['user_id'] ?? 'guest'?></p>
        <p>Item details: ID:<?=$order['item_id']?>, <?=$order['item_title']?>, qnt: <?=$order['quantity']?>, $<?=$order['item_price']?> </p>
    </form>
    <hr>
    <?php endforeach; ?>
<?php else :?>
    <p>This order might not exist or no longer available</p>    
<?php endif; ?>