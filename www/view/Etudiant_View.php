<?php

$smarty = new Smarty;

$smarty->assign('title', 'Gestion Etudiant');


// affichage de l'erreur
if (isset($this->err)) {
    if ($this->err == 1) {
        $smarty->assign('erreur', '<span class="erreur">Adresse email déjà utilisé</span>');
    }
}


// Affichage de l'icone de fermeture
if ($this->close) {
    $smarty->assign('close', '<a href="/Etudiant"><img class="icop"  src="http://static.projet.com/img/close.svg" alt="icone close"></a>');
}


// affichage des etudiants
$i = 0;
$aff = '';
while ($row = $this->etudiant->fetch()) {
    $i++;

    $aff = $aff.'<div id="'.$row["id"].'" class="p-1 m-1 case">';

    $aff = $aff.'<div class="gauche"><div><img class="ico" src="http://static.projet.com/img/user.svg" alt="icone user"></div>';

    $nom = strtoupper($row['nom']);
    $aff = $aff.'<div><div><span id="nom_'.$row['id'].'">'.$nom.'</span>  ';

    $prenom = ucfirst($row["prenom"]);
    $aff = $aff.'<span id="prenom_'.$row['id'].'">'.$prenom.'</span>';

    $aff = $aff.' | <span id="promotion_'.$row['id'].'">'.$row['promotion'].'</span>';

    $aff = $aff.' | <span id="centre_'.$row['id'].'">'.$row['centre'].'</span></div>';

    $aff = $aff.'<div><span id="email_'.$row['id'].'">'.$row['email'].'</span></div>';

    $aff = $aff.'<div><span id="specialite_'.$row['id'].'">'.$row['specialite'].'</span></div>';

    $piloteNom = strtoupper($row['piloteNom']);
    $pilotePrenom = ucfirst($row['pilotePrenom']);
    $aff = $aff.'<div><span id="pilote_'.$row['id'].'">'.$piloteNom." ".$pilotePrenom.'</span></div></div></div>';

    $aff = $aff.'<div><div><div><img class="icop" src="http://static.projet.com/img/update.svg" alt="icone modification" onclick=modification('.$row['id'].')></div>';

    $aff = $aff.'<div><img class="icop" src="http://static.projet.com/img/delete.svg" alt="icone suppression" onclick=confirmation('.$row['id'].')></div></div></div>';

    $aff = $aff.'</div>';
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
