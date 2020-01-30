<?php
include 'config.php';
include 'functions.php';

$articleID = $_GET['id'];
$articleView = articleView($bdd, $articleID);

if (isset($_POST['suppr'])) {

}





articleDelete($bdd, $articleID);


?>

<form method="post">
    <input type="submit" name="suppr" value="Supprimer">
</form>

<a href="index.php"><input type="submit" name="retour" value="Retour à l'accueil"></a>