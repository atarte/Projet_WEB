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


if (isset($_COOKIE['userName'])) {
    $smarty->assign('cookie', $_COOKIE['userName']);
}

$smarty->display(ROOT.'view/layout/Connexion.tpl');
