<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Etudiant');

if (isset($err)) {
    if ($err == 1) {
        $smarty->assign('erreur', 'Email deja utilisé');
    }
    else {
    }
}

// affichage des etudiants
$i = 0;
$aff = '';
while ($row = $etudiant->fetch()) {
    $i++;

    $aff = $aff.'<div id="'.$row["id"].'">';
    
    $aff = $aff.'Nom :<span id="nom_'.$row['id'].'">'.$row['nom'].'</span>';

    $aff = $aff.' | Prenom :<span id="prenom_'.$row['id'].'">'.$row["prenom"].'</span>';

    $aff = $aff.' | Email :<span id="email_'.$row['id'].'">'.$row['email'].'</span>';

    $aff = $aff.' | Centre :<span id="centre_'.$row['id'].'">'.$row['centre'].'</span>';

    $aff = $aff.' | Pilote :<span id="pilote_'.$row['id'].'">'.$row['piloteNom']." ".$row['pilotePrenom'].'</span>';

    $aff = $aff.' | Promotion :<span id="promotion_'.$row['id'].'">'.$row['promotion'].'</span>';

    $aff = $aff.' | Specialite :<span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span>';

    $aff = $aff.'<button onclick=modif('.$row['id'].')>Modifier</button><br>';

    $aff = $aff.'</div>';
}
$smarty->assign('etudiant', $aff);


// Ajout des pilotes dans le select
$html = '';
while ($row = $pilote->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
}
$smarty->assign('pilote', $html);


// Ajout des promotions dans le select
$html = '';
while ($row = $promotion->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['promotion'].'</option>';
}
$smarty->assign('promotion', $html);


// Ajout des specialités dans le select
$html = '';
while ($row = $specialite->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['specialite'].'</option>';
}
$smarty->assign('specialite', $html);


// Pagination
$page  = $p;
$pageBack = $page -1;
$pageForward = $page +1;

// echo 'p:'.$page.'; b:'.$pageBack.'; f:'.$pageForward;

$html = '<span ';
if ($page == 1) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Etudiant/page/'.$pageBack.'"> << </a></span>';

$html = $html.'<span>page '.$page.'</span>';

$html = $html.'<span ';
if ($i < 10) {
    $html = $html.'hidden';
}
$html = $html.'><a href="/Etudiant/page/'.$pageForward.'"> >> </a></span>';

$smarty->assign('pagination', $html);



$smarty->display(ROOT.'view/layout/Etudiant.tpl');
