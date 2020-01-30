<?php
try {
    $bdd = new PDO('mysql:host=localhost:3308;dbname=dbmehdi;charset=utf8', 'Mehdi', 'VEnn26!!');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}