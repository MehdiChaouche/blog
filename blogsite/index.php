<?php
include 'config.php';
include 'functions.php';
$articles = articleIndex($bdd);

echo '<h1>Blog</h1>';
foreach ($articles as $article) {
    echo '<a href="article.php?id=' . $article["idarticles"] . '"> ' . $article["titre"] . '</a></h3><br><br>
     <a href="articleModify.php?id='.$article['idarticles'].'">Modifier</a>
     <a href="articleDelete.php?id='.$article['idarticles'].'">Supprimer</a>';
    echo '<p>' . 'Rédigé par ' . $article["prenom"] . ' ' . $article["nom"] . '.' . '</p>';
}