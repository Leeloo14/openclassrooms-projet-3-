<?php $title = 'Mon blog'; ?>

<h1>Modifier le commentaire</h1>

<?php 
ob_start();
while ($data = $comment->fetch())
{
?>
    <div>
        <p>
            <strong><?= htmlspecialchars($data['author']) ?></strong> le <?= $data['comment_date_fr'] ?>
        </p>
        
        <form action="index.php?action=replaceComment&amp;id=<?= $data['id'] ?>" method="post">
            <div>
                <label for="comment"><strong> Commentaire :</strong></label><br>
                <textarea name="comment" id="commnent" rows="5" cols="50"><?= htmlspecialchars($data['comment']) ?></textarea>
            </div>
            <div>
                <input type="hidden" name="post_id" id="post_id" value="<?=$data['post_id']?>">
            </div>
            <br>
            <div>
                <input type="submit" value="Valider">
            </div>
        </form>
    </div>
<?php
}
$comment->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>