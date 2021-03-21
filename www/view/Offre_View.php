<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Offre');

$html = '';
while ($row = $this->type_promo->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['spe'].'</option>';
}

$smarty->assign('Type', $html);


$html = '';
while ($row = $this->ville->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['ville'].'</option>';
}

$smarty->assign('Ville', $html);


$html = '';
while ($row = $this->entreprise->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['entreprise'].'</option>';
}

$smarty->assign('Entreprise', $html);

$smarty->display(ROOT.'/view/layout/Offre.tpl');
