<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature');


// Affichage des candidatures

$html = '';



$smarty->assign('candidature', $html);


$smarty->display(ROOT.'view/layout/Candidature.tpl');
