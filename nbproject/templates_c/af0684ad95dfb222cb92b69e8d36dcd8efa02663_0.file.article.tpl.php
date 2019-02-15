<?php
/* Smarty version 3.1.33, created on 2019-02-15 07:52:38
  from '/Users/quentinagneray/Documents/Bootstrap/nbproject/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c666fc61505e9_70113515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af0684ad95dfb222cb92b69e8d36dcd8efa02663' => 
    array (
      0 => '/Users/quentinagneray/Documents/Bootstrap/nbproject/templates/article.tpl',
      1 => 1550217148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c666fc61505e9_70113515 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
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
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['id_update_article']->value;
}?>">
                        </div>

                        <div class="form-group">
                            <label for="titre" class="col-form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" value="<?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['titre']->value;
}?>" required>
                        </div>

                        <div class="form-group">
                            <label for="texte">Texte</label>
                            <textarea class="form-control" id="texte" name="texte" rows="3"required><?php if ($_smarty_tpl->tpl_vars['action']->value == "modifier") {
echo $_smarty_tpl->tpl_vars['texte']->value;
}?> </textarea>
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
                        <button type="submit" class="btn btn-primary" name="submit" value="<?php echo '<?=';?> $action <?php echo '?>';?>"><?php echo '<?=';?> ucfirst($action) <?php echo '?>';?>Ajouter l'article</button>
                    </form>
                </div>
            </div>
        </div><?php }
}
