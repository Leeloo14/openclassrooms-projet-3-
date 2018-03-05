<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Bienvenue sur le blog de Jean Forteroche</h1>
<p>Derniers épisodes publiés :</p>


<?php
while ($posts && $data = $posts->fetch()) {
    ?>
  <div class="news">
    <h3>
        <?= htmlspecialchars($data['title']) ?>
      <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>

    <p>

      <br/>
      <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire l'épisode</a></em>
    </p>
  </div>
    <?php
}
if ($posts) {
    $posts->closeCursor();
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
