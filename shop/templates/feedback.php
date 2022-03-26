<h2>Feedback</h2>
<form action="/feedback/add/" method="POST">
    <input type="text" name="name" placeholder="Your name"><br>
    <textarea name="message" placeholder="Your message" cols="30" rows="10"></textarea><br>
    <input type="submit" value="Add">
</form>
<?php foreach ($feedback as $value): ?>
    <div><strong><?=$value["name"]?></strong>: <?=$value["text"]?></div>
    <?php endforeach; ?>