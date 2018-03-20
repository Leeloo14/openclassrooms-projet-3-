<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur le blog de Jean Forteroche</h1>
<p>Derniers épisodes publiés :</p>


<?php
/* @var $post \Blog\Model\Post */
foreach ($posts as $post) {
    ?>
  <div class="news">
    <h3>
        <?= htmlspecialchars($post->getTitle()) ?>
      <em>le <?= $post->getCreationDate() ?></em>
    </h3>

    <p>

      <br/>
      <em><a href="index.php?action=post&amp;id=<?= $post->getId() ?>">Lire l'épisode</a></em>
    </p>
  </div>
    <?php
}

?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
