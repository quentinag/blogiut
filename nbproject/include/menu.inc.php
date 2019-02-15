<!-- Cette partie représente le menu du site : Connection, s'inscrire, deconnexion et créer un article -->

<!-- Le code en verte et bleu représente html du site donc la partie graphique -->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">

        <a class="navbar-brand" href="#">BLOG</a>

        <form class="form-inline my-2 my-lg-0" action="index.php" method="get" enctype="multipart/form-data" id="form_search">
            <input type="text" id ="search" name="search" class="form-control input-sm">
            <button type="submit" class="btn-primary btn-sm" value="search">Rechercher</button>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <!-- Cette partie du code en php va permettre à l'utilisateur d'etre redigirer vers les différentes options du site si il c'est créé un compte -->

                <!-- Si la connection est valide l'utilisateur pourra créer un article par la suite-->
                <!-- Ouverture de la balise PHP-->
                <?php
                if (($is_connect) == "TRUE") {
                    echo'
            <li class="nav-item">
              <a class="nav-link" href="article.php?action=ajouter">Créer un Article</a>
            </li>';
                }
                ?>
                <!-- Fermeture de la balise php-->
                <!-- Si la connection n'est pas valide l'utisateur devra se rediriger vers l'option "s'isncrire" de la page web-->
                <?php
                if (($is_connect) == FALSE) {
                    echo'
            <li class="nav-item">
              <a class="nav-link" href="user.php">S\'inscrire</a>
            </li>';
                }
                ?>

                <!-- Si la connexion de l'utilisateur n'est pas valide, il restera sur la page connexion-->

                <?php
                if (($is_connect) == FALSE) {
                    echo'
            <li class="nav-item">
              <a class="nav-link" href="connexion.php">Connexion</a>
            </li>';
                }
                ?>
                <!-- Si la connexion de l'utilisateur est valide, il pourra par la suite si il le souhaite ce déconnecter -->
                <?php
                if (($is_connect) == "TRUE") {
                    echo'
            <li class="nav-item">
              <a class="nav-link" href="deconnexion.php">Deconnexion</a>
            </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
