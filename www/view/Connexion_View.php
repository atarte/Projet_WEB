<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Connexion');

// $smarty->assign('url', ROOT.'connexion/verification');

if (isset($err)) {
    if ($err == 1) {
        $smarty->assign('erreur', 'Email ou mot de passe incorect');
    }
    else {
    }
}

$smarty->display(ROOT.'/view/layout/Connexion.tpl');
