<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature');


// Affichage des candidatures

$html = '';

$ok = $this->candidature->fetchAll();
print_r($ok);


$smarty->assign('candidature', $html);


$smarty->display(ROOT.'view/layout/Candidature.tpl');
