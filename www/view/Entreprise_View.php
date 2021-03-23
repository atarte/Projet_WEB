<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Entreprise');

$html = '';
while ($row = $this->secteur->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['centre'].'</option>';
}

$smarty->assign('Centre', $html);

$html = '';
$i = 0;
while ($row = $this->pilote->fetch()) {
    $i++;

    $html = $html.'<div id="'.$row["Id_Users"].'">';

    $html = $html.' Nom : <span id="nom_'.$row['Id_Users'].'">'.$row['nom'].'</span><br>';

    $html = $html.' Prénom : <span id="prenom_'.$row['Id_Users'].'">'.$row['prenom'].'</span><br>';

    $html = $html.' Email : <span id="email_'.$row['Id_Users'].'">'.$row['email'].'</span><br>';

    $html = $html.' Centre : <span id="centre_'.$row['Id_Users'].'">'.$row['centre'].'</span><br>';

    $html = $html.'<button onclick=confirmation('.$row['Id_Users'].')>Supprimer</button>';

    $html = $html.'<button onclick=modification('.$row['Id_Users'].')>Modifier</button><br><br>';

    $html = $html.'<br></div>';

}

$smarty->assign('Pilote',$html);

if (isset($this->err)) {
    if ($$this->err == 1) {
        $smarty->assign('erreur', 'Email déjà utilisé pour un autre compte');
    }
    else {
    }
}

$page  = $this->p;
$pageBack = $page -1;
$pageForward = $page +1;


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

if ($this->p != 0) {
    $smarty->assign('pagination', $html);
}



$smarty->display(ROOT.'view/layout/Entreprise.tpl');
