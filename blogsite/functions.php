<?php
function articleIndex(PDO $bdd)
{
    $query = $bdd->query('SELECT *
    FROM articles
    INNER JOIN auteurs ON articles.auteurs_idauteurs = auteurs.idauteurs
    limit 0,10');
    $reponse = $query->fetchAll();
    return $reponse;
}

function articleView(?PDO $bdd, ?int $articleID)
{
    $query = $bdd->query('
SELECT *, auteurs.nom
FROM articles
INNER JOIN auteurs on articles.auteurs_idauteurs = idauteurs
WHERE articles.idarticles=' . $articleID . ' ');
    $reponse = $query->fetch();
    return $reponse;
}

/**
 * Cette fonction me retourne la liste des commentaires pour un article
 * @param PDO $bdd
 * @param int $id
 * @return array
 */
function commentsArticle(PDO $bdd, int $id): array
{
    $query = $bdd->query('
SELECT *
FROM commentaires
INNER JOIN auteurs a on commentaires.auteurs_idauteurs = a.idauteurs
WHERE articles_idarticles =' . $id . ' ');
    $reponse = $query->fetchAll();
    return $reponse;
}

function articleCreate($bdd, ?string $titre, ?string $contenu, $date, $degre, ?int $idauteur)
{
    $sql = 'INSERT INTO articles (titre, texte, datefin, degreimportance, auteurs_idauteurs)
                    VALUES (:titre, :contenu, :date, :degre, :idauteur);';
    $query = $bdd->prepare($sql);
    $query->execute(array('titre' => $titre, 'contenu' => $contenu, 'date' => $date, 'degre' => $degre, 'idauteur' => $idauteur));
}

function articleModify(PDO $bdd, $titre, $contenu, $articleID){
    $query = $bdd->prepare('UPDATE articles 
SET titre = :titre,
    texte = :contenu
WHERE idarticles= :articleID');
    $query->execute(array('titre' => $titre, 'contenu' => $contenu, 'articleID' => $articleID));
    return $query;
}

function articleDelete(PDO $bdd, $articleID){ // Cette fonction fonctionne, mais uniquement pour les articles nouvellement créés... /!\
    $query = $bdd->query('DELETE FROM `articles` WHERE articles.idarticles = ' .$articleID );
    return $query;
}

function debug($var)
{
    highlight_string("<?php\n" . var_export($var, true) . ";\n?>");
}

