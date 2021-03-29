<?php

$smarty = new Smarty;

$smarty->assign('title', 'Candidature Délégué');

$smarty->assign('wishlist', 'hidden');

$smarty->assign('candidature', '');


$smarty->display(ROOT.'view/layout/Candidature.tpl');
