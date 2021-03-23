<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Entreprise');

$html = '';
while ($row = $this->secteur->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['secteur'].'</option>';
}

$smarty->assign('Secteur', $html);

$html = '';
$i = 0;
while ($row = $this->nom->fetch()) {
    $i++;

    $html = $html.'<div id="'.$row["Id_Entreprise"].'">';

    $html = $html.' Nom : <span id="nom_'.$row['Id_Entreprise'].'">'.$row['nom'].'</span><br>';

    $html = $html.' Email : <span id="email_'.$row['Id_Entreprise'].'">'.$row['email'].'</span><br>';

    $html = $html.' Adresse : <span id="adresse_'.$row['Id_Entreprise'].'">'.$row['adresse'].'</span><br>';
        
    $html = $html.' Code Postal : <span id="codePostal_'.$row['Id_Entreprise'].'">'.$row['adresse'].'</span><br>';

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
