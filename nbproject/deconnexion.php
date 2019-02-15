<!-- Ouverture de la balise PHP-->
<?php
// Debut de la session
session_start();

// require_once conrrespond aux diffférentes pages php requisent pour effectuer l'action demandé 
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/fonction.init.php';
require_once 'include/connexion.inc.php';

// include_once permet d'inclure les page html ou php qu'on souhaite dans cette page
include_once 'include/header.inc.php';
include_once 'include/menu.inc.php';

// Definit le cookie à une durée de vie de -1
setcookie('sid', '', -1);
header("Location: index.php");
?>
<!-- Fermeture de la balise php-->