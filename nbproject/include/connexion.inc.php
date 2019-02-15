<!-- Ouverture de la balise PHP-->
<?php
$is_connect = FALSE;

if (isset($_COOKIE['sid']) AND ! empty($_COOKIE['sid'])) {
    /* @VAR $bdd PDO */
    // selection du sid dans la bdd qui correspond à celui present dans le cookie
    // Selectionne tout de la table user ou le sid est correspondant inscrit dans la BDD
    $select = "SELECT * "
            . "FROM user "
            . "WHERE sid = :sid";
    //preparation du résultat
    $sth = $bdd->prepare($select);
    //sécurisation et déclaration des valeurs
    $sth->bindValue(':sid', $_COOKIE['sid'], PDO::PARAM_STR);
    //execution du résultat
    $sth->execute();
    //liste le nombre de ligne précédante
    if ($sth->rowCount() > 0) {
        $tab_result_connexion = $sth->fetch(PDO::FETCH_ASSOC);

        // Si la connexione est valide les valeurs sont retournés dans un tableau
        $is_connect = TRUE;
        $nom_connect = $tab_result_connexion['nom'];
        $prenom_connect = $tab_result_connexion['prenom'];
    }
}



