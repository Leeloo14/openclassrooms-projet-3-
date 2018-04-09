<?php

$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');



?>
<form action="index.php?action=create&amp;id={{ post.id }}">
    <div>
        <label for="title">titre</label><br />
        <input type="text" id="title" name="title" />
    </div>
    <div>
        <label for="content">texte</label><br />
        <textarea id="content" name="content"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>