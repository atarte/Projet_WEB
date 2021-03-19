<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Etudiant');

$html = '';
while ($row = $etudiant->fetch()) {
    $html = $html.'nom :'.$row['nom'].'prenom :'.$row['prenom'].'email :'.$row['email'].'pilote nom :'.$row['piloteNom'].'pilote prenom :'.$row['pilotePrenom'].'centre :'.$row['centre'].'promotion :'.$row['promotion'].'spécialité :'.$row['specialite'].'<br>';
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


$smarty->display(ROOT.'/view/layout/Etudiant.tpl');
