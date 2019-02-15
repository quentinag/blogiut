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

// Si la connexion est validé, une notificatione est incrite sur la page web pour confirmer la connexion
if (isset($_SESSION['notification'])) {
    $color_notification = $_SESSION['notification']['result'] == TRUE ? 'success' : 'danger';
}

// Si aucun article est présent est présent, la page par défault du blog est 1
$page_courante = !empty($_GET['page']) ? $_GET['page'] : 1;

$index_depart_MYSQL = indexPagination($page_courante, _nb_art_par_page);
?>

<!-- Partie htlm de l'index -->
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center mb-5">
            <h1 class="mt-5">Accueil du blog</h1>
            <?php if (isset($_SESSION['notification'])) { ?>
                <div class="alert alert-<?= $color_notification ?> alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= $_SESSION['notification']['message'] ?>
                    <?php unset($_SESSION['notification']) ?>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">

            <?php
            // Je teste pour savoir si j'ai quelque chose dans POST
            if (!empty($_GET['search'])) {
                // J'ai quelque chose donc je peux continuer
                // Selectionne l'id, titre, texte, publie, la date de la table Bootstrap ou l'id publie est le meme que celui demandé 
                $search = $_GET['search'];
                $sql_select = "SELECT "
                        . "id, "
                        . "titre, "
                        . "texte, "
                        . "publie, "
                        . "DATE_FORMAT(date, '%d/%m/%y') as date_fr "
                        . "FROM Bootstrap "
                        . "WHERE publie = :publie "
                        . "AND (titre LIKE :search OR texte LIKE :search) "
                        . "LIMIT :index_depart, :nb_limit";

                /* Prepare la requete SQL */
                $sth = $bdd->prepare($sql_select);

                // Insert la valeur des variables dans la requete
                $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
                $sth->bindValue(':nb_limit', _nb_art_par_page, PDO::PARAM_INT);
                $sth->bindValue(':index_depart', $index_depart_MYSQL, PDO::PARAM_INT);
                $sth->bindValue(':search', '%' . $_GET['search'] . '%', PDO::PARAM_STR);

                // Execute la requete 
                $sth->execute();
                // Place les valeurs dans un tableau
                $tab_bootstrap = $sth->fetchAll(PDO::FETCH_ASSOC);
                $nb_total_article_publie = nb_total_article_publie_like($bdd, $search);
                $nb_pages = ceil($nb_total_article_publie / _nb_art_par_page);

                // Sinon
            } else {
                // Selectionne l'id, titre, texte, publie, la date de la table Bootstrap ou l'id publie est le meme que celui demandé
                $sql_select = "SELECT "
                        . "id, "
                        . "titre, "
                        . "texte, "
                        . "publie, "
                        . "DATE_FORMAT(date, '%d/%m/%y') as date_fr "
                        . "FROM Bootstrap "
                        . "WHERE publie = :publie "
                        . "LIMIT :index_depart, :nb_limit";
                // Execute la requete 
                $sth = $bdd->prepare($sql_select);
                // Insert la valeur des variables dans la requete
                $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
                $sth->bindValue(':index_depart', $index_depart_MYSQL, PDO::PARAM_INT);
                $sth->bindValue(':nb_limit', _nb_art_par_page, PDO::PARAM_INT);
                // Execute la requete
                $sth->execute();
                // Place les valeurs dans un tableau
                $tab_bootstrap = $sth->fetchAll(PDO::FETCH_ASSOC);
                $nb_total_article_publie = nb_total_article_publie($bdd);
                $nb_pages = ceil($nb_total_article_publie / _nb_art_par_page);
            }
            // Mise en place d'une boucle 
            foreach ($tab_bootstrap as $value) {
                ?>
                <!-- Suite de la partie htmp-->
                <div class="card mb-5">
                    <img class="card-img-top" src="img/<?= $value['id']; ?>.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['titre']; ?></h5>
                        <p class="card-text"><?= $value['texte']; ?></p>
                        <a href="#" class="btn btn-primary"><?= $value['date_fr']; ?></a>
                        <?php if (($is_connect) == "TRUE") { ?>
                            <a href="article.php?action=modifier&id=<?= $value['id']; ?>" class="btn btn-warning" value="Modifier">Modifier</a>
                        <?php } ?>
                        <?php if (($is_connect) == "TRUE") { ?>
                            <a href="article.php?action=supprimer&id=<?= $value['id']; ?>" class="btn btn-danger" value="Supprimer">Supprimer</a>
                        <?php } ?>
                    </div>
                </div>

                <?php
            }
            if (empty($_GET['search'])) {
                $search = "";
            }
            ?>

        </div>
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $nb_pages; $i++) { ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
                </ul>
            </nav>
        </div>

        <?php
        //On insert les parties HTML du site
        include_once 'include/footer.inc.php';
        ?>
    </div>
</div>
