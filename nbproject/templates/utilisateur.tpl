
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Nouveaux utilisateurs</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <form action="user.php" method="post" enctype="multipart/form-data" id="form_user">

                <div class="form-group">
                    <label for="nom" class="col-form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer votre nom" value="" required>
                </div>

                <div class="form-group">
                    <label for="prenom" class="col-form-label">Prenom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer votre prenom" value="" required>
                </div>

                <div class="form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Entrer votre email" value="" required>
                </div>  

                <div class="form-group">
                    <label for="mdp" class="col-form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrer votre mot de passe" value="" required>
                </div> 

                <button type="submit" class="btn btn-primary" name="submit" value="ajouter">J'ai fini</button>
            </form>
        </div>
    </div>
</div>