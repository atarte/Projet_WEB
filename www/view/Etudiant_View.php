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
$html = '';
while ($row = $etudiant->fetch()) {
    $i++;
    $html = $html.$i.' nom :'.$row['nom'].'prenom :'.$row['prenom'].'email :'.$row['email'].'pilote nom :'.$row['piloteNom'].'pilote prenom :'.$row['pilotePrenom'].'centre :'.$row['centre'].'promotion :'.$row['promotion'].'spécialité :'.$row['specialite'].'<br>';
}
$smarty->assign('etudiant', $html);


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
