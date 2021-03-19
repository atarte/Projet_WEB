<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Pilote');

$html = '';
while ($row = $Centre->fetch()) {
    $html = $html.'<option value="'.$row['Id_Centre'].'">'.$row['Centre'].'</option>';
}

$smarty->assign('Centre', $html);

$html = '';
while ($row = $Pilote->fetch()) {
    $html = $html.'<div> Nom : '.$row['nom'].'<br> Prénom : '.$row['prenom'].'<br> Email : '.$row['email'].'<br> Centre : '.$row['centre'].'</div><br><br>';
}

$smarty->assign('Pilote',$html);

if (isset($err)) {
    if ($err == 1) {
        $smarty->assign('erreur', 'Email déjà utilisé pour un autre compte');
    }
  }

$smarty->display(ROOT.'view/layout/Pilote.tpl');
