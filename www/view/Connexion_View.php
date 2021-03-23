<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Connexion');

if (isset($err)) {
    if ($err == 1) {
        $smarty->assign('erreur', '<span class="erreur">Adresse email ou mot de passe incorrect</span>');
    }
    else {
    }
}

$smarty->display(ROOT.'view/layout/Connexion.tpl');
