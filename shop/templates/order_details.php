<div class="post_title"><h2><?=$postTitle ?? ""?></h2></div>
<?php if (isset($orders)) :?>
    <form action="/order_details/status/?id=<?=$id?>"  method="POST">
        <?php foreach ($orders as $order): ?> 
            <p>User ID: <?=$order['user_id'] ?? 'guest'?></p>
            <p>Item details: ID: <?=$order['item_id']?>, <?=$order['item_title']?>, qnt: <?=$order['quantity']?>, total: $<?=$order['item_price'] * $order['quantity']?> </p>
            <hr>
        <?php endforeach; ?>
        <p>Order status: <?=$status ?? "Set order status"?></p>
        <label for="status">Change order status:</label>
        <select name="status" id="status">
            <option value="pending" <?php if ($status == "pending") echo "selected"?>>Pending</option>
            <option value="awaiting payment" <?php if ($status == "awaiting payment") echo "selected"?>>Awaiting Payment </option>
            <option value="completed" <?php if ($status == "completed") echo "selected"?>>Completed</option>
            <option value="shipped" <?php if ($status == "shipped") echo "selected"?>>Shipped</option>
            <option value="refunded" <?php if ($status == "refunded") echo "selected"?>>Refunded</option>
            <option value="cancelled" <?php if ($status == "cancelled") echo "selected"?>>Cancelled</option>
        </select>
        <input type="submit" value="Submit">
    </form>
<?php else :?>
    <p>This order might not exist or no longer available</p>    
<?php endif; ?>