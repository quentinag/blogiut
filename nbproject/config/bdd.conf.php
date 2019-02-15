<?php

// Définition des différents champs de la Base De Donnée afin de ce connecter à celle-ci
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Bootstrap;charset=utf8', 'root', 'root');
    $bdd->exec("set names utf8");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
// Si la connection ne s'effectue pas, une erreur apparait sur la page 
    die('Erreur : ' . $e->getMessage());
}
