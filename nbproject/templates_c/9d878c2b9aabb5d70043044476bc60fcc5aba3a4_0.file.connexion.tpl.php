<?php
/* Smarty version 3.1.33, created on 2019-02-10 11:20:07
  from '/Users/quentinagneray/Documents/Bootstrap/nbproject/templates/connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c6008e70d7fc0_53840429',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d878c2b9aabb5d70043044476bc60fcc5aba3a4' => 
    array (
      0 => '/Users/quentinagneray/Documents/Bootstrap/nbproject/templates/connexion.tpl',
      1 => 1549797464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c6008e70d7fc0_53840429 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Connexion</h1>
                <?php echo '<?php ';?>if (isset($_SESSION['notification'])) { <?php echo '?>';?>
                    <div class="alert alert-<?php echo $_smarty_tpl->tpl_vars['color_notification']->value;
echo '?>';?> alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?php echo '<?=';?> $_SESSION['notification']['message'] <?php echo '?>';?>
                        <?php echo '<?php ';?>unset($_SESSION['notification']) <?php echo '?>';?>
                    </div>
                <?php echo '<?php ';?>} <?php echo '?>';?>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion">

                                <div class="form-group">
                                    <label for="email" class="col-form-label">Adresse Mail :</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrer votre Adresse Mail" value="" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Mot de Passe :</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrer votre Mot de Passe" value="" required>
                                </div>

                                <div class="form-group">
                                    <label for="souvenir">Garder ma session active</label>
                                    <input type="checkbox" name="souvenir" />
                                </div>

                                <button type="submit" class="btn btn-primary" name="submit" value="ajouter">Se Connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><?php }
}
