<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Creation d'un article</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">

                <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value="{if $action == "modifier"}{$id_update_article}{/if}">
                </div>

                <div class="form-group">
                    <label for="titre" class="col-form-label">Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" value="{if $action == "modifier"}{$titre}{/if}" required>
                </div>

                <div class="form-group">
                    <label for="texte">Texte</label>
                    <textarea class="form-control" id="texte" name="texte" rows="3"required>{if $action == "modifier"}{$texte}{/if} </textarea>
                </div>

                <div class="form-group">
                    <div class="custom-file">
                        <input type="file"  id="image" name="image" class="custom-file-input">
                        <label class="custom-file-label" for="image">Choisir un fichier</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label for="publie" class="form-check-label">
                            <input class="form-check-input" name="publie" id="publie" type="checkbox" value="1"> Publier
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="<?= $action ?>"><?= ucfirst($action) ?>Ajouter l'article</button>
            </form>
        </div>
    </div>
</div>