<!-- Ouverture de la balise PHP-->

<?php

//Fonction de cryptage, permettant de sécuriser le mot de passe dans la bdd
function cryptPassword($mdp) {
    $mdp_crypt = sha1($mdp);
    return $mdp_crypt;
}

//Fonction sid, permettant d'attribuer un identifiant dans la BDD aux utilisateurs 
function sid($email) {
    $sid = md5($email . time());
    return $sid;
}

//Fonction indexPagination, permet d'établir la pagination du blog en fonction du nombre de d'article présent sur les pages
function indexPagination($page_courante, $nb_articles_par_page) {
    $index = ($page_courante - 1) * $nb_articles_par_page;
    return $index;
}

// Fonction nb_total_article_publie, permet de savoir le nombre d'article publié dans la BDD
function nb_total_article_publie($bdd) {
    // Compte le nombre d'articles publiés dans la BDD
    $sql = "SELECT COUNT(*) as nb_total_article_publie "
            . "FROM Bootstrap "
            . "WHERE publie = 1 ";

//Préparationd de la requete SQL
    $sth = $bdd->prepare($sql);
// Execute la requete SQL
    $sth->execute();
// Retourne les résultats dans un tableau
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC);
    return $tab_result['nb_total_article_publie'];
}

//Fonction nb_total_article_publie_like correspond au nombre d'articcle que je souhaite rechercher avec mon moteur de recherche
function nb_total_article_publie_like($bdd, $search) {
    // Compte le nombre d'articles publiés dans la BDD correspondant à ma recherche
    $sql = "SELECT COUNT(*) as nb_total_article_publie "
            . "FROM Bootstrap "
            . "WHERE publie = 1 "
            . "AND (titre LIKE :search OR texte LIKE :search) ";
//Préparationd de la requete SQL
    $sth = $bdd->prepare($sql);
// Permet de faire passer les valeurs dans la requete 
    $sth->bindValue(':search', '%' . $_GET['search'] . '%', PDO::PARAM_STR);
// Execute la requete SQL
    $sth->execute();
// Retourne les résultats dans un tableau
    $tab_result = $sth->fetch(PDO::FETCH_ASSOC);
    return $tab_result['nb_total_article_publie'];
}
?>
<!-- Fermeture de la balise php-->