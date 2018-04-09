<?php

$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');


if(isset($_GET['type']) AND $_GET['type'] == 'commentaire') {


    if (isset($_GET['signalement']) AND !empty($_GET['signalement'])) {

        $req = $db->prepare('DELETE FROM comments WHERE id = ?');

        $req->execute(array($_GET['signalement']));
    }

}

$comments = $db->query('SELECT * FROM comments ORDER BY id DESC');


?>

<! DOCTYPE html >
<html>

<head>
    <meta charset="utf-8"/>
    <title> administration </title>
</head>

<body>

<ul>
    <?php while($c = $comments->fetch()){ ?>
        <p><?php if($c{'signalement'} == true) { ?> <?= $c['author'] ?> : <?= $c['comment'] ?> : <?= $c['signalement'] ?> - <a href="AdminComment.php?type=commentaire&signalement=<?= $c['id'] ?>">Supprimer</a>
            </p> <?php }} ?>
</ul>



</body>
</html>
