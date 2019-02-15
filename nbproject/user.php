<!-- Ouverture de la balise PHP-->
<?php
// Début de la session
session_start();
// require_once conrrespond aux diffférentes pages php requisent pour effectuer l'action demandé
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/connexion.inc.php';
require_once 'libs/Smarty.class.php';
//On insert les parties HTML du site
include_once 'include/header.inc.php';
include_once 'include/menu.inc.php';
include_once 'include/fonction.init.php';


// Si on envoie les champs incrits dans le formulaire
if (isset($_POST['submit'])) {
    print_r2($_POST);
    print_r2($_FILES);

    $sid = isset($_POST['sid']) ? $_POST['sid'] : 0;

    /* On insert les champs nom, prenom, email, mdp et sid */
    $sql_insert = "INSERT INTO user "
            . "(nom, prenom, email, mdp, sid) "
            . "VALUES (:nom, :prenom, :email, :mdp, :sid);";
    // Prépare la requete
    $sth = $bdd->prepare($sql_insert);
    // Insert la valeur des variables dans la requete
    $sth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $sth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindValue(':mdp', cryptPassword($_POST['mdp']), PDO::PARAM_STR);
    $sth->bindValue(':sid', $sid, PDO::PARAM_STR);
// execute la requete
    $result = $sth->execute();

    var_dump($result);

    $id_user = $bdd->lastInsertId();

    // Une notification s'affiche pour comfirmer que la requete à été effectuer 
    $notification = '<b>Félicitation</b> votre utilisateur a été inséré dans la bdd.';
    $result_notification = TRUE;



    $_SESSION['notification']['message'] = $notification;
    $_SESSION['notification']['result'] = $result_notification;

    header("Location:index.php");
    exit();
} else {
    // Déclaration des paramètres de smarty pour le fichier utilisateur.tpl

    $smarty = new Smarty();

    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');
//** un-comment the following line to show the debug console
//$smarty->debugging = true;



    $smarty->display('utilisateur.tpl');
}
//On insert les parties HTML du site
include_once 'include/footer.inc.php';
?>
