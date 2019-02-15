<?php

session_start();

require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/fonction.init.php';
require_once 'include/connexion.inc.php';

require_once('libs/Smarty.class.php');

$prenom = 'Quentin';

$smarty = new Smarty();

$smarty->setTemplateDir('/templates/');
$smarty->setCompileDir('/templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$smarty->assign('name', $prenom);

//active le débug
//** un-comment the following line to show the debug console
//$smarty->debugging = true;

include_once 'include/header.inc.php';
include_once 'include/menu.inc.php';

//Charge le template.tpl
$smarty->display('index.tpl');

include_once 'include/footer.inc.php';
?>

