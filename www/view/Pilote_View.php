<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Pilote');

$html = '';
while ($row = $Centre->fetch()) {
    $html = $html.'<option value="'.$row['Id_Centre'].'">'.$row['Centre'].'</option>';
}

$smarty->assign('Centre', $html);

$html = '';
$i = 0;
while ($row = $Pilote->fetch()) {
    $i++;
    $html = $html.$i.' Nom : '.$row['nom'].'<br> Prénom : '.$row['prenom'].'<br> Email : '.$row['email'].'<br> Centre : '.$row['centre'].'<br>
                  <button type="submit" name="supp" value"'.$row['Id_Users'].'">Supprimer</button><br><br>';
}

$smarty->assign('Pilote',$html);

if (isset($compte)) {
    if ($compte == 1) {
        $smarty->assign('erreur', 'Email déjà utilisé pour un autre compte');
    }
  else {
  }
}

$page  = $p;
$pageBack = $page -1;
$pageForward = $page +1;

// echo 'p:'.$page.'; b:'.$pageBack.'; f:'.$pageForward;

$html = '<span ';
if ($page == 1) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Pilote/page/'.$pageBack.'"> << </a></span>';

$html = $html.'<span>page '.$page.'</span>';

$html = $html.'<span ';
if ($i < 10) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Pilote/page/'.$pageForward.'"> >> </a></span>';

$smarty->assign('pagination', $html);

$smarty->display(ROOT.'view/layout/Pilote.tpl');
