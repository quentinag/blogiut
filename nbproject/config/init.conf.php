<!-- Ouverture de la balise PHP-->
<?php

// Affichage des erreurs et avertissements PHP
error_reporting(E_ALL);
if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

// Ecrit les erreurs contenus dans le code sur la page web afin de les corriger
function print_r2($param) {
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

// Definit le nombre d'article par page
define('_nb_art_par_page', 2);
?>
<!-- Fermeture de la balise php-->