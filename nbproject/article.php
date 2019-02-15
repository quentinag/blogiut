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
//On insert les parties HTML du site
include_once 'include/header.inc.php';
include_once 'include/menu.inc.php';

// Si la connexion est établie
if ($is_connect == TRUE) {
    $action = $_GET['action'];
    $publie = isset($_POST['publie']) ? $_POST['publie'] : 0;

    // Permet de supprimer un article
    if ($action == 'supprimer') {
        $id_update_article = $_GET['id'];

        // Supprime l'id demandé dans la BDD
        $sql_select = "DELETE FROM "
                . "Bootstrap "
                . "WHERE id = :id ";

        // Prépare la requete
        $sth = $bdd->prepare($sql_select);

        //Déclaration des Paramètres
        $sth->bindValue(':id', $id_update_article, PDO::PARAM_INT);

        // execute la requete
        $sth->execute();
        header("Location:index.php");
        exit();
    }

    // Si l'utilisateur veut mettre à jour son article
    if (isset($_GET['id'])) {
        $id_update_article = $_GET['id'];

        /* Selectionne l'article ou l'id correspond à l'article demandé */
        $sql_select = "SELECT "
                . "titre, "
                . "texte, "
                . "publie "
                . "FROM Bootstrap "
                . "WHERE id = :id ";

        /* Prepare la requete */
        $sth = $bdd->prepare($sql_select);

        //Déclaration des Paramètres
        $sth->bindValue(':id', $id_update_article, PDO::PARAM_INT);
        // Execute la requete
        $sth->execute();
        // Les données sont placées dans un tableau
        $tab_update = $sth->fetchall(PDO::FETCH_ASSOC);

        // Création d'unne boucle
        foreach ($tab_update as $valueUpdate) {
            $titre = $valueUpdate['titre'];
            $texte = $valueUpdate['texte'];
            $publie = $valueUpdate['publie'];
        }
        // Sinon
    } else {
        $id_update_article = "";
    }
    // Si on envoie les champs incrits dans le formulaire
    if (isset($_POST['submit'])) {
        print_r2($_POST);
        print_r2($_FILES);

        $publie = isset($_POST['publie']) ? $_POST['publie'] : 0;
        $date = date("Y-m-d");

        if ($_POST['submit'] == 'ajouter') {

            /* On insert dans la table bootstrap le titre, publie et date */
            $sql_insert = "INSERT INTO Bootstrap "
                    . "(titre, texte, publie, date)"
                    . "VALUES (:titre, :texte, :publie, :date);";
            //Prépare la requete
            $sth = $bdd->prepare($sql_insert);
            //Déclaration des Paramètres
            $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
            $sth->bindValue(':publie', $publie, PDO::PARAM_BOOL);
            $sth->bindValue(':date', $date, PDO::PARAM_STR);
        } else {
            /* Sinon on met à jour la table Bootstrap des champs titre, texte, publie ou l'id est correspandant à l'id indiqué */
            $sql_update = "UPDATE Bootstrap SET "
                    . "titre= :titre, "
                    . "texte= :texte, "
                    . "publie= :publie "
                    . "WHERE id = :id";

            //Prépare la requete
            $sth = $bdd->prepare($sql_update);
            //Déclaration des Paramètres
            $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
            $sth->bindValue(':publie', $publie, PDO::PARAM_BOOL);
            $sth->bindValue(':id', $_POST['id'], PDO::PARAM_STR);
        }
        // Execute la requete
        $result = $sth->execute();

        var_dump($result);

        if ($_POST['submit'] == 'ajouter') {
            $id_update_article = $bdd->lastInsertId();
        } else {
            $id_update_article = $_POST['id'];
        }
        // Cette partie permet d'inclure une image souhaité pour l'article lors de sa création
        if ($_FILES['image']['error'] == 0) {
            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $extension = strtolower($extension);

            $result_img = move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $id_update_article . '.' . $extension);
        }
        // Une notification appartait si le résultat attendu est obtenu
        $notification = '<b>Félicitation</b> votre article a été inséré dans la bdd.';
        $result_notification = TRUE;

        $_SESSION['notification']['message'] = $notification;
        $_SESSION['notification']['result'] = $result_notification;

        header("Location:index.php");
        exit();
    } else {
        // Déclaration des paramètres de smarty pour le fichier article.tpl
        $smarty = new Smarty();

        $smarty->setTemplateDir('templates/');
        $smarty->setCompileDir('templates_c/');

        $smarty->assign('action, $action');

        if ($action == 'modifier') {
            $smarty->assign('titre', $titre);
            $smarty->assign('texte', $texte);
            $smarty->assign('id_update_article', $id_update_article);
            $smarty->assign('publie', $publie);
        }

        if (isset($_SESSION['notification'])) {
            $smarty->assign('session_var', $_SESSION);
            $smarty->assign('color_notification', $color_notification);
            unset($_SESSION['notifications']);
        }
        $smarty->display('article.tpl');
    }

//On insert les parties HTML du site
    include_once 'include/footer.inc.php';
}
?>
