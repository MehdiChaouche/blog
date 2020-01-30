<?php
include 'config.php';
include 'functions.php';
$id = $_GET['id'];
$articleView = articleView($bdd, $id);
$articleComment = commentsArticle($bdd, $id)
?>
<h2><?= $articleView['titre']; ?></h2>

<p><strong><u>Nouveauté : </u></strong><?= $articleView['texte']; ?></p>
<p><strong><u>Commentaire(s) : </u></strong></p>
<?php foreach($articleComment as $commentaire): ?>
<?= $commentaire['texte']?> (Ecrit par <?= $commentaire['prenom']?> <?= $commentaire['nom'] ?>).
<br>
<?php endforeach; ?>

