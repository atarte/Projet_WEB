<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Etudiant');


// affichage de l'erreur
if (isset($this->err)) {
    if ($this->err == 1) {
        $smarty->assign('erreur', 'Email deja utilisé');
    }
    else {
    }
}


// affichage des etudiants
$i = 0;
$aff = '';
while ($row = $this->etudiant->fetch()) {
    $i++;

    $aff = $aff.'<div id="'.$row["id"].'">';

    $aff = $aff.'Nom : <span id="nom_'.$row['id'].'">'.$row['nom'].'</span>';

    $aff = $aff.' | Prenom : <span id="prenom_'.$row['id'].'">'.$row["prenom"].'</span>';

    $aff = $aff.' | Email : <span id="email_'.$row['id'].'">'.$row['email'].'</span>';

    $aff = $aff.' | Centre : <span id="centre_'.$row['id'].'">'.$row['centre'].'</span>';

    $aff = $aff.' | Pilote : <span id="pilote_'.$row['id'].'">'.$row['piloteNom']." ".$row['pilotePrenom'].'</span>';

    $aff = $aff.' | Promotion : <span id="promotion_'.$row['id'].'">'.$row['promotion'].'</span>';

    $aff = $aff.' | Specialite : <span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span>';

    $aff = $aff.'<button onclick=modification('.$row['id'].')>Modifier</button>';

    $aff = $aff.'<button onclick=confirmation('.$row['id'].')>Supprimer</button>';

    $aff = $aff.'<br></div>';
}
$smarty->assign('etudiant', $aff);


// Ajout des pilotes dans le select
$html = '';
while ($row = $this->pilote->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
}
$smarty->assign('pilote', $html);


// Ajout des promotions dans le select
$html = '';
while ($row = $this->promotion->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['promotion'].'</option>';
}
$smarty->assign('promotion', $html);


// Ajout des specialités dans le select
$html = '';
while ($row = $this->specialite->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['specialite'].'</option>';
}
$smarty->assign('specialite', $html);


// Ajout des centres dans le select
$html = '';
while ($row = $this->centre->fetch()) {
    $html = $html.'<option value="'.$row['id'].'">'.$row['centre'].'</option>';
}
$smarty->assign('centre', $html);


// Pagination
$page  = $this->p;
$pageBack = $page -1;
$pageForward = $page +1;

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

if ($this->p != 0) {
    $smarty->assign('pagination', $html);
}



$smarty->display(ROOT.'view/layout/Etudiant.tpl');
