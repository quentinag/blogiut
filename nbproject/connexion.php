<!-- Ouverture de la balise PHP-->
<?php

// Début de la session
session_start();
// require_once conrrespond aux diffférentes pages php requisent pour effectuer l'action demandé
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/fonction.init.php';
require_once 'include/connexion.inc.php';
require_once 'libs/Smarty.class.php';
//require_once 'include/smartytest.php';
//On insert les parties HTML du site
include_once 'include/header.inc.php';
include_once 'include/menu.inc.php';

// Si la variable session n'est pas vide, la notification apparait
if (isset($_SESSION['notification'])) {
    $color_notification = $_SESSION['notification']['result'] == TRUE ? 'success' : 'danger';
}
// Si la variable submit n'est pas vide
if (isset($_POST['submit'])) {
    print_r2($_POST);
    print_r2($_FILES);

    $notification = "";
    // Selection des champs de la table user ou email et mdp correspond a ceux entrés
    $sql_insert = "SELECT * "
            . "FROM user "
            . "WHERE email = :email "
            . "AND mdp = :mdp";

    // Prépare la requete
    $sth = $bdd->prepare($sql_insert);
    //Déclaration des Paramètres
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp', cryptPassword($_POST['password']), PDO::PARAM_STR);
    // execute la requete
    $result = $sth->execute();

    var_dump($result);

    // Si il ne trouve aucun élement correspandant dans la base une notification indique que le champs est incorrect 
    if ($sth->rowCount() < 1) {
        $notification = '<b>Attention</b> login et/ou mot de passe incorrect.';
        $result_notification = FALSE;
        $url_redirect = 'connexion.php';
    } else {
        // Sinon les données inscriptes sont mit à jour 
        $sid = sid($_POST['email']);

        $sql_update = "UPDATE user "
                . "SET sid = :sid "
                . "WHERE email = :email;";

        // Prépare la requete
        $sth_update = $bdd->prepare($sql_update);

        //Sécurisation des variables
        $sth_update->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $sth_update->bindValue(':sid', $sid, PDO::PARAM_STR);
        $result = $sth->execute();
        $result_update = $sth_update->execute();

        setcookie('sid', $sid, time() + 86400);
        // Affichue une notification
        $notification = '<b>Félicitation</b> Vous êtes bien connecté.';

        $result_notification = TRUE;

        $url_redirect = 'index.php';
    }

    $_SESSION['notification']['message'] = $notification;
    $_SESSION['notification']['result'] = $result_notification;

    header("Location:$url_redirect");
    exit();
} else {
    // Déclaration des paramètres de smarty pour le fichier connexion.tpl
    $smarty = new Smarty();

    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    if (isset($_SESSION['notification'])) {
        $smarty->assign('session_var', $_SESSION);
        $smarty->assign('color_notification', $color_notification);
        unset($_SESSION['notifications']);
    }
    $smarty->display('connexion.tpl');



//On insert les parties HTML du site
    include_once 'include/footer.inc.php';
}
?>
