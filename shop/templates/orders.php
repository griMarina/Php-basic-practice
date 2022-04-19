<?php if (isAuthorized()) :?>
    <div class="post_title">
        <h2>My Orders</h2>
    </div> <?=$orders?>
<?php else :?>
    <p>Not Authorized. Please sign in.</p>    
<?php endif; ?>
