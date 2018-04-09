<?php

$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');


$posts = $db->query('SELECT * FROM posts ORDER BY id DESC');


?>

<! DOCTYPE html >
<html>

<head>
    <meta charset="utf-8"/>
    <title> administration </title>
</head>

<body>

<ul>
    <?php while($p = $posts->fetch()){ ?>
        <li><?= $p['title'] ?> - <a href="AdminPost.php?type=article&modifier=<?= $p['id'] ?>">Modifier</a> - <a href="AdminPost.php?supprimer="<?= $p['id'] ?>">Supprimer</a></li>
    <?php } ?>
</ul>

<ul>
<li><a href="AdminNewPost.php?AdminNewPost">créer un nouvel episode</a></li>
</ul>


</body>
</html>
