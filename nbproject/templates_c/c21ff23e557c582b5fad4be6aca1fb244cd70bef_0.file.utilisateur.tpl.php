<?php
/* Smarty version 3.1.33, created on 2019-02-01 12:36:11
  from '/Users/quentinagneray/Documents/Bootstrap/nbproject/templates/utilisateur.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c543d3b6c7349_01227924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c21ff23e557c582b5fad4be6aca1fb244cd70bef' => 
    array (
      0 => '/Users/quentinagneray/Documents/Bootstrap/nbproject/templates/utilisateur.tpl',
      1 => 1548421252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c543d3b6c7349_01227924 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
</div><?php }
}
