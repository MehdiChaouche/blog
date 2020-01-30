<?php
include 'config.php';
include 'functions.php';

$titre = "";
$contenu = "";
$date = "";
$degre = "";
$idauteur = 0;

if (isset($_POST['Submit'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $degre = $_POST['degre'];
    $idauteur = 1;

    if (empty($titre)) {
        echo "<p>Un titre est requis <br></p>";
    }
    if (empty($contenu)) {
        echo "<p>Un contenu est requis <br></p>";
    }
    if (!empty($titre) && !empty($contenu)) {
        $createArticle = articleCreate($bdd, $titre, $contenu, $date, $degre, $idauteur);
        echo "<p style='color:#FF0000'>L'article a été créé avec succès !</p>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Formulaire de création</title>
</head>
<header>
    <h1>Formulaire de création d'article(s)</h1><br>
</header>
<body>
<form method="post" action="articleCreate.php">
    <div class="form-group">
        <label for="exampleFormControlInput1">Titre de l'article</label>
        <input type="text" class="form-control" name="titre" placeholder="Entrez ici un titre à votre article...">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Contenu de l'article</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contenu"
                  placeholder="Entrez ici le contenu de votre article..."></textarea>
    </div>
    <p><strong>Date de publication :</strong>
        <input class="form-control" type="text" placeholder="<?php
        $dateactu = date('d-m-Y');
        $heure = date("H:i");
        echo "le $dateactu à $heure";
        ?>" readonly>
    </p>
    <p>Degré d'importance de l'article :
        <select class="custom-select custom-select-sm" name="degre">
            <option selected>Choisissez un degré d'importance</option>
            <option value="1">Prioritaire</option>
            <option value="2">Très important</option>
            <option value="3">Relativement important</option>
            <option value="3">Modéré</option>
            <option value="3">Anecdotique</option>
        </select>
    </p>
    <br>
    <input class="btn btn-primary btn-lg active" type="submit" value="Créer" name="Submit">
</form>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>