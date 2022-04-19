<div class="post_title">
    <h2>Orders</h2>
</div>
<?php foreach ($orders as $order): ?>   
    <form action="" method="POST">
            <p>Order ID: <?=$order['id']?></p>
            <p>Customer details: <?=$order['name']?> <?=$order['surname']?>, phone: <?=$order['phone']?></p>
        <a href="/order_details/?id=<?=$order['id']?>">Order details</a>
    </form> 
    <hr>
<?php endforeach; ?>