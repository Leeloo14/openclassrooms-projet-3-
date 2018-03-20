
<?php require_once('src/dao/PostDao.php'); ?>
<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?php /* @var $post \Blog\Model\Post */?>
        <?= htmlspecialchars($post->getTitle())  ?>
        <em>le <?= $post->getCreationDate() ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post->getContent())) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post->getId() ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
/* @var $comment \Blog\Model\Comment */
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate()  ?>
    <p><?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
